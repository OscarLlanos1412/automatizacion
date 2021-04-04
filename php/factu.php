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
    <link rel="stylesheet" href="../estilos/factura.css">
    <title>Document</title>
</head>
<body>
    <form action="" class="fac">
        <h1>Total Compra</h1>
        <h3>Documento <?php echo $docu; ?></h3>
        <table class="tabla"><br>
                    <tr>
                        <!-- <td class="campos">Numero De Factura</td> -->
                        <td class="campos">Nombre Del Producto</td>
                        <td class="campos">Precio Producto</td>
                        <td class="campos">Cantidad</td>
                        <td class="campos">Subtotal</td>
                    </tr>
                <?php
                    $sql="SELECT * FROM deta_compra INNER JOIN producto ON deta_compra.id_prod = producto.id_prod 
                    INNER JOIN compra ON deta_compra.num_fac = compra.num_fac WHERE doc_user = '$docu'";
                    $result=mysqli_query($mysqli,$sql);
                    while($mostrar=mysqli_fetch_array($result)){
                        $numero = $mostrar['num_fac']; 
                ?>
                    <tr>
                        <!-- <td class="campos"></td> -->
                        <td class="campos"><?php echo $mostrar['nom_produ'] ?></td>
                        <td class="campos"><?php echo $mostrar['precio'] ?></td>
                        <td class="campos"><?php echo $mostrar['cantidad'] ?></td>
                        <td class="campos" id="sub"><?php echo $mostrar['subtotal'] ?></td>
                    </tr>
                    <?php

                        }
                    ?>
        </table>
        <div class="tabl">
            <label class="campo" name="num_fac" for="" id="total">Total =</label>
            <?php
            $consult = "SELECT SUM(subtotal) FROM deta_compra where num_fac = '$numero'";
            $total = mysqli_query($mysqli,$consult);
            $tfac = mysqli_fetch_array($total);
            echo($tfac[0]);
            ?> <br><br>
            <button class="buton1"><a href="cerrar.php">Terminar Compra</a></button>
            <button class="buton1"><a href="../clientes/busca.php">Regresar</a></button>
        </div>

    </form>
</body>
</html>