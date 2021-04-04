<?php
    require_once('../conec/connec.php');
    
    if($_POST['facturar']){
      $id = $_POST['documento'];
      $sele = $_POST['sel_tip'];  
      $cons_user = "SELECT * FROM user WHERE doc_user = '$id' AND id_tip_user = '3'";
      $query = mysqli_query($mysqli,$cons_user);
      $file = mysqli_fetch_assoc($query);
      
      if($file){
          $_SESSION['docu'] = $file['doc_user'];
            $nom = $file['nombre'];
        $ape = $file['apellido']; 
          if($_SESSION['docu'] == $id){
            $cons_fac = "SELECT * FROM compra WHERE doc_user = '$id'";
            $query2 = mysqli_query($mysqli,$cons_fac);
            $file2 = mysqli_fetch_assoc($query2);
      
            $numero_fac = $file2['num_fac'];
            $time_ini = $file2['time_ini'];
            $time_fin = $file2['time_fin'];
      
            $fact = "SELECT * FROM deta_compra INNER JOIN tipo_pago ON deta_compra.id_tipo_pag = tipo_pago.id_tipo_pag WHERE num_fac = '$numero_fac'";
            $query3 = mysqli_query($mysqli,$fact);
            $file3 = mysqli_fetch_array($query3);
      
            $tipo_pago = $file3['tipo_pago'];
      
            $actu_det_com = "UPDATE deta_compra SET id_tipo_pag = $sele WHERE num_fac = '$numero_fac'";
            $actu_com = mysqli_query($mysqli,$actu_det_com);
?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet"href="../estilos/factu.css">
                <title>Factura Cajero</title>
            </head>
            <body>
              <div class="container" id="conten">
                  <form action="" class="fac">
                      <h1>Nombre Supermercado</h1>
                      <h3 class="datos">Documento: <?php echo $id; ?></h3>
                      <h3 class="datos">Nombre: <?php echo $nom; ?></h3>
                      <h3 class="datos">Apellido: <?php echo $ape; ?></h3>
                      <h3 class="factu">Numero De Factura: <?php echo $numero_fac; ?></h3>
                      <h3 class="factu">Fecha Inicio: <?php echo $time_ini; ?></h3>
                      <h3 class="factu">Fecha Fin: <?php echo $time_fin; ?></h3>
                      <h3 class="factu">Tipo De Pago: <?php echo $tipo_pago; ?></h3>
                      <table id="tabla" class="tabla">
                          <tr>
                              <!-- <td class="campos">Numero De Factura</td> -->
                              <td class="campos1">Identificador del producto</td>
                              <td class="campos1">Nombre Del Producto</td>
                              <td class="campos1">Precio Producto</td>
                              <td class="campos1">Cantidad</td>
                              <td class="campos1">Subtotal</td>
                          </tr>
                          <?php
                              $sql="SELECT * FROM deta_compra INNER JOIN producto ON deta_compra.id_prod = producto.id_prod 
                              INNER JOIN compra ON deta_compra.num_fac = compra.num_fac WHERE doc_user = '$id'";
                              $result=mysqli_query($mysqli,$sql);
                              while($mostrar=mysqli_fetch_array($result)){
                                  $numero = $mostrar['num_fac']; 
                          ?>
                          <tr>
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
                          if($tfac){
                              // $actualiza = implode($tfac);
                              $actual = "UPDATE deta_compra SET total_comp = $tfac[0] WHERE num_fac = '$numero'";
                              $ac = mysqli_query($mysqli,$actual);
                          }
                          ?>
                      </div>
                  </form>
              </div>
              <button class="boton" name="gene" onclick="imprimir()">Generar Recibo</button>
              <button class="link"><a href="../cajero/caja.php">Regresar</a></button>
                <script>
                  function imprimir(){
                      var mywindow = window.open('', 'PRINT', 'height=1000,width=900');
                      mywindow.document.write('<html><head>');
                      mywindow.document.write('<style>#tabla{width:100%;border-collapse:collapse;margin:16px 0 16px 0;}#tabla th{border:1px solid #ddd;padding:4px;background-color:#d4eefd;text-align:left;font-size:15px;}#tabla td{border:1px solid #ddd;text-align:left;padding:6px;}}</style>');
                      mywindow.document.write('</head><body>');
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
        else{
            echo '<script> alert ("Ups algo fallo, intentalo de nuevo");</script>';
            echo '<script> window.location="../cajero/caja.php" </script>';
        }
    } 
    else{
        echo '<script> alert ("Digite Documento");</script>';
        echo '<script> window.location="../cajero/caja.php" </script>';
    }
?>
<?php
    }