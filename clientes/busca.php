<?php
    include_once('../conec/connec.php');
    include_once('templates/head.php');
    include_once('templates/search.php');
    if(!empty($_GET['busqueda']))
    {
        $busqueda=$_GET['busqueda'];
        $sql="SELECT * FROM producto WHERE nom_produ LIKE '%".$busqueda."%'";
        $result = mysqli_query($mysqli, $sql);
        echo '<div class="single">';
        while($item = mysqli_fetch_array($result))    //para devolver todo un arreglo de la consulta, es decir las columnas
        {
            echo '
                <div class="product">
                    <div class="title">
                        <h4>'.$item['nom_produ'].'</h4>
                    </div>
                    <div class="price">
                        <span>'.$item['precio'].'</span>
                    </div>
                    <div class="btn1">
                        <buton>Modificar</buton>
                    </div>
                    <div class="btn2">
                        <buton>Modificar</buton>
                    </div>
                </div>
            ';

        }   
        echo'</div>';
    }


    include_once('templates/footer.php');
?>