<?php
    require_once('../conec/connec.php');
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/caja.css">
    <title>Buscador</title>
</head>
<body>
    <form action="../php/bus-cli.php" class="formu-prod" method="POST">
        <label for="">Buscar Cliente</label><br><br>
        <input type="number" name="documento" class="prod" placeholder="Ingrese Documento Cliente" autocomplete="off"><br><br>
        <select name="sel_tip" id="sele" autocomplete="off">
            <option value="0">Tipo de pago</option>
            <?php
                $tipo = "SELECT * FROM tipo_pago";
                $inser = mysqli_query($mysqli,$tipo);
                while($tip = mysqli_fetch_array($inser)){
            ?>
            <option name="tipo" value="<?php echo $tip[0]; ?>"><?php echo $tip[1]; ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" name="facturar" id="en-pro" value="Buscar"><br><br>
    </form>
</body>
</html>