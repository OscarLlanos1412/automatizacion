<?php
    require_once('../conec/connec.php');
    
    if($_POST['facturar']){
      $id = $_POST['documento'];
      $cons_user = "SELECT nombre, apellido FROM user WHERE doc_user = '$id' AND id_tip_user = '3'";
      $query = mysqli_query($mysqli,$cons_user);
      $file = mysqli_fetch_assoc($query);

      $nom = $file['nombre'];
      $ape = $file['apellido'];

      $cons_fac = "SELECT num_fac FROM compra WHERE doc_user = '$id'";
      $query2 = mysqli_query($mysqli,$cons_fac);
      $file2 = mysqli_fetch_assoc($query2);

      $numero_fac = $file2['num_fac'];
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
  </head>
  <body>
    <div class="container" id="conten">
        <form action="" class="fac">
            <h1>Nombre Supermercado</h1>
            <h3>Documento <?php echo $id; ?></h3>
            <h3>Nombre <?php echo $nom; ?></h3>
            <h3>Apellido <?php echo $ape; ?></h3>
            <h3>Numero De Factura <?php echo $numero_fac; ?></h3>
            <table id="tabla" class="tabla"><br>
                <tr>
                    <!-- <td class="campos">Numero De Factura</td> -->
                    <td class="campos">Identificador del producto</td>
                    <td class="campos">Nombre Del Producto</td>
                    <td class="campos">Precio Producto</td>
                    <td class="campos">Cantidad</td>
                    <td class="campos">Subtotal</td>
                </tr>
                <?php
                    $sql="SELECT * FROM deta_compra INNER JOIN producto ON deta_compra.id_prod = producto.id_prod 
                    INNER JOIN compra ON deta_compra.num_fac = compra.num_fac WHERE doc_user = '$id'";
                    $result=mysqli_query($mysqli,$sql);
                    while($mostrar=mysqli_fetch_array($result)){
                        $numero = $mostrar['num_fac']; 
                ?>
                <tr>
                    <!-- <td class="campos"><?php echo $mostrar['num_fac'] ?></td> -->
                    <td class="campos"><?php echo $mostrar['id_prod'] ?></td>
                    <td class="campos"><?php echo $mostrar['nom_produ'] ?></td>
                    <td class="campos"><?php echo $mostrar['precio'] ?></td>
                    <td class="campos"><?php echo $mostrar['cantidad'] ?></td>
                    <td class="campos" id="sub"><?php echo $mostrar['subtotal'] ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
            <div class="tabl">
                <label class="campo" name="num_fac" for="" id="total">Total =</label>
                <?php
                $consult = "SELECT SUM(subtotal) FROM deta_compra where num_fac = '$numero'";
                $total = mysqli_query($mysqli,$consult);
                $tfac = mysqli_fetch_array($total);
                echo($tfac[0]);
                ?>
            </div>
        </form>
    </div>
    <button onclick="imprimir()">Generar Recibo</button>
    <button><a href="../cajero/caja.php">Regresar</a></button>
      <script>
        function imprimir(){
	        var mywindow = window.open('', 'PRINT', 'height=1000,width=900');
            mywindow.document.write('<html><head>');
	        mywindow.document.write('<style>#tabla{width:100%;border-collapse:collapse;margin:16px 0 16px 0;}#tabla th{border:1px solid #ddd;padding:4px;background-color:#d4eefd;text-align:left;font-size:15px;}#tabla td{border:1px solid #ddd;text-align:left;padding:6px;}</style>');
            mywindow.document.write('</head><body >');
            mywindow.document.write(document.getElementById('conten').innerHTML);
            mywindow.document.write('</body></html>');
            mywindow.document.close(); // necesario para IE >= 10
            mywindow.focus(); // necesario para IE >= 10
            mywindow.print();
            mywindow.close();
            return true;
        }
      </script>
  </body>
  </html>
<?php
    }