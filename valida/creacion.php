<?php
    require '../conec/connec.php';

    if($_POST["registro"]){
        //Declaramos las variables para almacenar los datos digitados
        $doc = $_POST["docu"];
        $nom = $_POST["nombre"];
        $ape = $_POST["apel"];
        $usern = $_POST["userna"];
        $pass = $_POST["clave"];
        $tipo = $_POST["tip-user"];
        
        //Hacemos la consulta para que me seleccione los datos en la BD y valide
        $consul = "INSERT INTO user(doc_user, nombre, apellido, username, clave, id_tip_user) VALUES('$doc', '$nom', '$ape', '$usern', '$pass', '$tipo')";
        $query = mysqli_query($mysqli,$consul);

        if(!$query){
            echo '<script> alert ("Error al registrarlo");</script>';
            echo '<script> window.location="../admin/admin.php" </script>';
        }
        else{
            echo '<script> alert ("Exito al registrarlo");</script>';
            echo '<script> window.location="../admin/admin.php" </script>';
        }
    }
    else{
        echo '<script> alert ("Ups algo fallo, intentalo de nuevo");</script>';
        echo '<script> window.location="../admin/admin.php" </script>';
    }

?>