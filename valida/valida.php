<?php
    require '../conec/connec.php';

    if($_POST["ingreso"]){
        //Declaramos las variables para almacenar los datos digitados
        $user = $_POST['userna'];
        $clave = $_POST['clave'];

        //Hacemos la consulta para que me seleccione los datos en la BD y valide
        $consul = "SELECT * FROM user WHERE username = '$user' AND clave = '$clave'";
        $query = mysqli_query($mysqli,$consul);
        $fila = mysqli_fetch_assoc($query);

        //Hacemos una toma de decision para que se logee el usuario correctamente
        if($fila){
            $_SESSION['id_tip_usu'] = $fila['id_tip_user'];
            
            //Hacemos la toma de decision para determinar quien se va a logear
            if($_SESSION['id_tip_usu'] == 1){
                header('location: ../admin/admin.php');
                exit();
            }
            elseif($_SESSION['id_tip_usu'] == 2){
                header('location: ../cajero/caja.php');
                exit();
            }
            else{
                echo "No perro no cogio";
            }
        }
        else{
            echo '<script> alert ("Verifica que el usuario y contraseña esten ingresados correctamente");</script>';
            echo '<script> window.location="../index.php" </script>';
        }
    }
    else{
        echo '<script> alert ("Ups algo fallo, intentalo de nuevo");</script>';
        echo '<script> window.location="../index.php" </script>';
    }
?>