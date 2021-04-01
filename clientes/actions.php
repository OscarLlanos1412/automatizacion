<?php
    //consulta para determinar la cantidad de dias que han transcurrido desde que inicio la EP
    include_once('../conec/connec.php');
    
    if(!empty($_POST['busqueda']))   //se envioa por post porque del MAIN.JS viaja por este metodo
    {
        $busqueda=explode(" ",$_POST['busqueda']);    //divide un string en varios string
        $sql="SELECT * FROM producto WHERE nom_produ LIKE '%".$busqueda[0]."%'";
        for($i=1; $i < count($busqueda); $i++){
            if(!empty($busqueda[$i])){
                $sql.= "AND nom_produ like '%".$busqueda[$i]."%'";
            }
        }
        $sql .="LIMIT 5";
        
        $result = mysqli_query($mysqli, $sql);
        while($item = mysqli_fetch_assoc($result))  //para devolver todo un arreglo de la consulta, es decir las columnas
        {
            echo '
                <li class="item">
                    <div class="title1">
                        <h4>'.$item['nom_produ'].'</h4>
                    </div>
                    <div class="price">
                        <span>'.$item['precio'].'</span>
                    </div>
                    <div class="btn1">
                        <button><a href="../php/prod.php?accion=modificar&cod='.$item['id_prod'].'"?>Agregar Al Carro</a></button>
                    </div>
                </li>
            ';
        }
          
    }

?>