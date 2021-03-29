<?php
    require_once('../conec/connec.php');
    $docu = $_SESSION['docc'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/clie.css">
    <title>Document</title>
</head>
<body>
    <div>
        <div class="title">
            <h1> Bienvenido, ¿cuáles son las compras que desea realizar hoy?
        </div>

        <!--Factura o Carro De Compra-->
        <div class="compra">
          <a href="../php/factu.php"> <img src="../img/carcom.png" class="car" alt=""></a>
        </div><br><br>

        <!--Formulario de Producto-->
        <form action="../php/prod.php" class="formu-prod" method="POST">
            <label for="">Escoga Su Producto</label>
            <input type="number" name="produ" class="prod" placeholder="Ingrese Identificador Producto" autocomplete="off">
            <input type="submit" name="btn-pro" id="en-pro" value="Buscar">
        </form>

        <!--Cuenta Regresiva-->
        <div class="conta-regre">
            <div class="portada" id="portada">
                <div class="header">
                    <h1 class="logotipo">Cuenta Regresiva </h1>
                    <?php
                        $sql3="SELECT time_ini, time_fin FROM compra WHERE doc_user = '$docu'";
                        $res=mysqli_query($mysqli,$sql3);
                        global $most;
                        while($most=mysqli_fetch_array($res)){
                    ?>
                            <label for=""><?php echo $most[0]; ?></label><br>
                            <label for=""><?php echo $most[1]; ?></label>
                    <?php
                        }
                    ?>
                    <p class="mensaje">Tiempo Limite Para Comprar</p>
                </div>
                <div id="cuenta"></div>
            </div>
        </div>

        <!--Tabla De prodcutos Mas Vendidos-->
        <form action="" method="POST">
            <table class="tabla"><br>
                    <tr>
                        <td class="campos">ID Producto</td>
                        <td class="campos">Nombre Producto</td>
                        <td class="campos">Precio Porducto</td>
                        <td class="campos">Tipo Del Pordcuto</td>
                    </tr>
                <?php
                    $sql="SELECT * FROM producto INNER JOIN tipo_produc ON producto.id_tipo_prod = tipo_produc.id_tipo_prod";
                    $result=mysqli_query($mysqli,$sql);
                    while($mostrar=mysqli_fetch_array($result)){ 
                ?>
                    <tr>
                        <td class="campos"><?php echo $mostrar['id_prod'] ?></td>
                        <td class="campos"><?php echo $mostrar['nom_produ'] ?></td>
                        <td class="campos"><?php echo $mostrar['precio'] ?></td>
                        <td class="campos"><?php echo $mostrar['nom_tipo_prod'] ?></td>
                    </tr>
                        
                    <?php
                        }
                    ?>
            </table>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>

    <script src="../js/countdown.jquery.min.js"></script>
    <script src="../js/reloj.js"></script>
</body>
</html>