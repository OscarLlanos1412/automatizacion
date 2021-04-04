<?php 
    require_once('../conec/connec.php');
    $docu = $_SESSION['docc'];
    session_start();
    session_destroy();
    session_write_close();
    $consul = "UPDATE compra SET id_esta_comp = '2' WHERE doc_user = '$docu'";
    $act = mysqli_query($mysqli,$consul);
    header("Location: ../index.php");

?>