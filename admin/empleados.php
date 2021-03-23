<!---->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/empleados.css">
    <title>Document</title>
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
                    <a class="nav-link active nav-tex" href="#" tabindex="-1" aria-disabled="true">Cerrar Sesion</a>
                </li>
            </ul>
        </div>
    </nav>
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
        <tbody>
            <tr>
                <td class="info">Hola</td>
                <td class="info">Hola</td>
                <td class="info">Hola</td>
                <td class="info">Hola</td>
                <td class="info"><a href="">Editar</a> - <a href="">Eliminar</a> - <a href="../php/crear.php">Crear</a> </td>
            </tr>
        </tbody>
    </table>
    </div>
</body>
</html>