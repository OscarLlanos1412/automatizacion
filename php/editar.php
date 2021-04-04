<?php
    require_once ('../conec/connec.php');

    if (isset($_GET['editar'])){
        $delete = $_GET['editar'];

        $quitar = "SELECT * FROM user WHERE id_tip_user = '2' AND doc_user = '$delete'";
        $consul = mysqli_query($mysqli,$quitar);
        if ($consul){
            echo'<script type="text/javascript">
                        alert("Se ha eliminado correctamente");
                        window.location.href="consultar.php";
                    </script>';
        }else{
            echo'<script type="text/javascript">
                        alert("Error :(");
                        window.location.href="consultar.php";
                    </script>';
        }
    }

?>