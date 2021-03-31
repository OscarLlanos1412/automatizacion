<?php
    require '../conec/connec.php';

    if($_POST['compra']){
        // global $doc;
        $doc = $_POST['docume'];
        $nome = $_POST['nomb'];
        $ape = $_POST['apel'];
        $tip_usu = 3;
        $esta = 1;

        //Hacemos la consulta para que me seleccione los datos en la BD y valide
        $consul = "INSERT INTO user(doc_user, nombre, apellido, username, clave, id_tip_user) VALUES('$doc', '$nome', '$ape', '', '', '$tip_usu')";
        $query = mysqli_query($mysqli,$consul);
        
        if(!$query){
            echo '<script> alert ("Error al registrarse");</script>';
            echo '<script> window.location="../index.php" </script>';
        }
        else{
            //Obtener valores por medio de una sesion
            $_SESSION['docc'] = $doc;
            $_SESSION['nomm'] = $nome;
            $_SESSION['apell'] = $ape;

            //Obtener una hora
            date_default_timezone_set("America/Bogota");
            $fecha_ini = date("o-m-d H:i:s");
            $fecha_fin = strtotime ( '+3 hour' , strtotime($fecha_ini) );
            $fecha_fin = date('o-m-d H:i:s', $fecha_fin );
            // $fecha_total = 
            //Mensaje de exito e insercion
            echo '<script> alert ("Exito al registrarlo");</script>';
            echo '<script> window.location="../clientes/busca.php" </script>';
            $consul = "INSERT INTO compra(num_fac, doc_user, time_ini, time_fin, id_esta_comp) VALUES('', '$doc', '$fecha_ini', '$fecha_fin', '$esta')";
            $query = mysqli_query($mysqli,$consul);
            echo "Si se inserto en la otra"; 
            
        }
    }
    else{
        echo '<script> alert ("Ups algo fallo, intentalo de nuevo");</script>';
        echo '<script> window.location="../index.php" </script>';
    }
    // <script src="../js/reloj.js"></script<
?>