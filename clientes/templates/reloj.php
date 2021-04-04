<?php
    require_once './../../conec/connec.php';
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['docu']) && isset($_GET['fecha_fin'])){
            $docu = $_GET['docu'];
            $fecha = $_GET['fecha_fin'];
        
            $fecha_fin = strtotime ( '+1 hour' , strtotime($fecha) );
            $fecha_fin = date('o-m-d H:i:s', $fecha_fin );

            $consul = "UPDATE compra SET time_fin = '$fecha_fin' WHERE doc_user = '$docu'";
            $act = mysqli_query($mysqli,$consul);
            
            echo json_encode('ok');
        }elseif(isset($_GET['docu'])){
            $docu = $_GET['docu'];

            $consul = "UPDATE compra SET id_esta_comp = '2' WHERE doc_user = '$docu'";
            $act = mysqli_query($mysqli,$consul);
            
            echo json_encode('ok2');
        }
    }


?>