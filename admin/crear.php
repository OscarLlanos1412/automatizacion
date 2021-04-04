<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/crear.css">
    <title>Creacion Empleados</title>
</head>
<body>
    <form action="../valida/creacion.php" method="POST" class="formu">
        <h2>Registro De Empleados</h2>
        <label for="doc">Documento Del Empleado</label><br>
        <input type="number" class="docu" name="docu" placeholder="Ingrese Documento" autocomplete="off"><br>
        <label for="nom">Nombre Del Empleado</label><br>
        <input type="text" class="nombr" name="nombre" placeholder="Ingrese Nombre" autocomplete="off"><br>
        <label for="ape">Apellido Del Empleado</label><br>
        <input type="text" class="ape" name="apel" placeholder="Ingrese Apellido" autocomplete="off"><br>
        <label for="doc">Username Del Empleado</label><br>
        <input type="text" class="user" name="userna" placeholder="Ingrese Username" autocomplete="off"><br>
        <label for="doc">Tipo De Usuario</label><br>
        <input type="number" class="tip-user" name="tip-user" value="2" placeholder="Ingrese Tipo Usuario" autocomplete="off"><br>
        <label for="doc">Clave Del Empleado</label><br>
        <input type="password" class="clav" name="clave" placeholder="Ingrese Clave"><br><br>
        <input type="submit" class="btn" name="registro" value="Crear Empleado">
        <button class="btn"><a href="admin.php">Regresar</a></button>
    </form>
</body>
</html>