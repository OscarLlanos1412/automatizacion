<?php
    require_once('../conec/connec.php');
    $docu = $_SESSION['docc'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="title">
        <h1> Bienvenido, ¿cuáles son las compras que desea realizar hoy?
    </div>
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
            </div>
        </div>
</body>
</html>