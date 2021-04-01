<?php
    require_once('../conec/connec.php');
    $docu = $_SESSION['docc'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="../estilos/clie.css">
    <link rel="stylesheet" href="css/style.css">    
</head>
<body>
    <div class="compra">
        <a href="../php/factu.php"> <img src="../img/carcom.png" class="car" alt=""></a>
    </div>
    <div class="title">
        <h1> Bienvenido, ¿cuáles son las compras que desea realizar hoy?</h1>
    </div>
    <div class="conta-regre">
            <div class="portada" id="portada">
                <div class="header">
                    <h1 class="logotipo">Tiempo Limite Para Comprar</h1>
                    <?php
                        $sql3="SELECT time_ini, time_fin FROM compra WHERE doc_user = '$docu'";
                        $res=mysqli_query($mysqli,$sql3);
                        global $most;
                        while($most=mysqli_fetch_array($res)){
                    ?>
                            <label for=""><?php echo $most[0]; ?></label><br>
                            <label id="fec-fin" for=""><?php echo $most[1]; ?></label>
                            <script>
                                let $fec_fin = document.getElementById("fec-fin").textContent;
                                let fecha_ac = new Date().getTime();
                                let fecha_fin = new Date($fec_fin).getTime();
                                let time_in_hours = 1000 * 60;
                                let resta = fecha_fin - fecha_ac;
                                console.log(resta / time_in_hours);
                                if(resta / time_in_hours <= 30){
                                    let alerta = alert("Le quedan 30 Minutos");
                                }
                                else if(resta / time_in_hours == 0){
                                    let mensaje = confirm("Desea continuar");
                                }
                            </script>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
</body>
</html>