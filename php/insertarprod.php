<?php
    require '../conec/connec.php';

    if($_POST["agregar"]){
        $id = $_POST['id'];
        $prod = $_POST["nom-prod"];
        $cantid = $_POST["cant"];
        $precio = $_POST["precio"];
        $total = $_POST["tota"];
        $docume = $_SESSION['docc'];

        $consul2 = "SELECT * FROM compra WHERE doc_user = '$docume'";
        $query2 = mysqli_query($mysqli,$consul2);
        $fila2 = mysqli_fetch_assoc($query2);
        $fac = $fila2['num_fac'];
        $consul = "INSERT INTO deta_compra(id_det_comp, num_fac, id_prod, iva, cantidad, id_tipo_pag, subtotal, total_comp) VALUES('', '$fac', '$id', '', '$cantid', 1, '$total', '')";
        $query = mysqli_query($mysqli,$consul);
        
        if(!$query){
            echo '<script> alert ("Error al registra el producto");</script>';
            echo '<script> window.location="../cliente/clie.php" </script>';
        }
        else{
            echo '<script> alert ("Exito al registrar producto");</script>';
            echo '<script> window.location="../cliente/clie.php" </script>';

        }
    }
    
?>