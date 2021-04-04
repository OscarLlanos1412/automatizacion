<?php
    require_once('../conec/connec.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/empleados.css">
    <title>Tabla Empleados</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navi">
        <a class="navbar-brand" href="#">Empleados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active navegar">
                    <a class="nav-link nav-tex" href="admin.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active navegar">
                    <a class="nav-link nav-tex" href="empleados.php">Empleados</a>
                </li>
                <li class="nav-item active navegar">
                    <a class="nav-link nav-tex" href="crear.php">Crear Empleados</a>
                </li>
                <li class="nav-item active navegar">
                    <a class="nav-link active nav-tex" href="../php/cerrarsesion.php" tabindex="-1" aria-disabled="true">Cerrar Sesion</a>
                </li>
            </ul>
        </div>
    </nav>
    
    </div>
    <div class="container">
    <table class="ve-tabla">
        <thead class="tab">
            <tr class="tab-ml">
                <td class="tab-ml">Documento Empleado</td>
                <td class="tab-ml">Nombre De Empleado</td>
                <td class="tab-ml">Apellido De Empleado</td>
                <td class="tab-ml">Usuario Asignado</td>
                <td class="tab-ml">Acciones</td>
            </tr>
        </thead>
        <form action="../php/acciones.php" method="post">
            <tbody>
                <?php
                    $cons_user = "SELECT * FROM user WHERE id_tip_user = '2'";
                    $query = mysqli_query($mysqli,$cons_user);
                    while($file = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td class="info" name="documento"><?php echo $file[0]; ?></td>
                    <td class="info" name="nombre"><?php echo $file[1]; ?></td>
                    <td class="info" name="apellido"><?php echo $file[2]; ?></td>
                    <td class="info" name="user"><?php echo $file[3]; ?></td>
                    <td class="info"> <a href="../php/elim.php?documento=<?php echo $eliminar=$file[0]; ?>">Eliminar</a> </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </form>
    </table>
    </div>
</body>
</html>