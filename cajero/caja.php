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
    <title>Document</title>
</head>
<body>
    <form action="../php/bus-cli.php" class="formu-prod" method="POST">
        <label for="">Buscar Cliente</label>
        <input type="number" name="documento" class="prod" placeholder="Ingrese Documento Para la Factura" autocomplete="off">
        <input type="submit" name="facturar" id="en-pro" value="Buscar">
    </form>
</body>
</html>