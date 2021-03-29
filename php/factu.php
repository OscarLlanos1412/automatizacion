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
    <title>Document</title>
</head>
<body>
    <form action="inserprod.php" method="POST" class="fac">
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
        <div>
            <label for="" id="total">Total </label>
        </div>

    </form>
</body>
</html>