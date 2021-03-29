<?php
    include_once('../conec/connec.php');
    include_once('head.php');
    include_once('search.php');
    if(!empty($_GET['busqueda']))
    {
        $busqueda=$_GET['busqueda'];
        $sql="SELECT * FROM productos WHERE name LIKE '%".$busqueda."%'";
        $result = mysqli_query($con, $sql);
        echo '<div class="single">';
        while($item = mysqli_fetch_assoc($result))  //para devolver todo un arreglo de la consulta, es decir las columnas
        {
            echo '
                <div class="product">
                    <div class="img">
                        <img src="'.$item['img'].'">
                    </div>
                    <div class="title">
                        <h4>'.$item['name'].'</h4>
                    </div>
                    <div class="price">
                        <span>'.$item['date'].'</span>
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


    include_once('footer.php');
?>