<?php
    require '../conec/connec.php';

    if($_POST["compra"]){
        header('location: ../cliente/clie.php');
        exit();
    }
    else{
        echo '<script> alert ("Ups algo fallo, intentalo de nuevo");</script>';
        echo '<script> window.location="../index.php" </script>';
    }
?>