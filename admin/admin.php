<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/admin.css">
    <title>Administrador</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Bienvenido Administrador</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active navegar">
                    <a class="nav-link" href="admin.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active navegar">
                    <a class="nav-link" href="empleados.php">Empleados</a>
                </li>
                <li class="nav-item active navegar">
                    <a class="nav-link nav-tex" href="crear.php">Crear Empleados</a>
                </li>
                <li class="nav-item active navegar">
                    <a class="nav-link active" href="../php/cerrarsesion.php" tabindex="-1" aria-disabled="true">Cerrar Sesion</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1>Nombre Supermercado</h1>
    <div class="slider">
        <img  name="slider" alt="" width="800px" height="460px" style="border-radius: 12px; border: 2px solid black;">
    </div>
    <script>
        window.addEventListener('load', function(){
            console.log('El contenido se cargo');
            
            var imagenes = [];
            imagenes[0] = "../img/adminis.jpg";
            imagenes[1] = "../img/adminis2.jpg";
            imagenes[2] = "../img/adminis3.jpeg";
            imagenes[3] = "../img/adminis4.jpg";

            var indice = 0;

            function cambiarImagenes(){
                document.slider.src = imagenes[indice];
                if(indice < 2){
                    indice ++;
                }
                else{
                    indice = 0;
                }
            }
            setInterval(cambiarImagenes, 3000);
            
        })
    </script>
</body>
</html>