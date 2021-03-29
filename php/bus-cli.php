<?php
    require_once('../conec/connec.php');
    // $docume = $_SESSION['docc'];

    if(isset($_POST['facturar'])){
        $id = $_POST['nume-fa'];
        
        
        $consul = "SELECT * FROM compra, deta_compra WHERE deta_compra.num_fac and compra.doc_user = '$id'";
        $query = mysqli_query($mysqli,$consul);
        $file = mysqli_fetch_assoc($query);

        if($file){
?>         
          <!DOCTYPE html>
          <html lang="en">
            <head>
              <link rel="stylesheet" href="../estilos/caja.css">
              <title>Document</title>
            </head>
            <body>
              <div>
                <form action="inserprod.php" method="POST" class="fac">
                    <h1>Total Compra</h1>
                    <table class="tabla"><br>
                      <tr>
                        <td class="campos">Identificador del producto</td>
                        <td class="campos">Numero De Factura</td>
                        <td class="campos">iva</td>
                        <td class="campos">Cantidad</td>
                        <td class="campos">Sub-Total</td>
                      </tr>
                        <?php
                            $sql="SELECT * FROM deta_compra";
                            $result=mysqli_query($mysqli,$sql);
                            while($mostrar=mysqli_fetch_array($result)){ 
                        ?>
                          <tr>
                          <td class="campos"><?php echo $mostrar['id_prod'] ?></td>
                          <td class="campos"><?php echo $mostrar['num_fac'] ?></td>
                          <td class="campos"><?php echo $mostrar['iva'] ?></td>
                          <td class="campos"><?php echo $mostrar['cantidad'] ?></td>
                          <td class="campos" id="sub"><?php echo $mostrar['subtotal'] ?></td>
                          </tr>
                          <?php
                              }
                          ?>
                    </table>
                    <div class="tabl">
                        <label class="campo" for="" id="total">Total =</label>
                        <?php
                        $consult = "SELECT SUM(subtotal) FROM deta_compra";
                        $total = mysqli_query($mysqli,$consult);
                        $tfac = mysqli_fetch_array($total);
                        echo($tfac[0]);
                        ?>
                    </div>

                </form>




            </div>
                        <script>
                          const precio = document.getElementById('precio').value;
                          const canti = document.getElementById('canti');
                          const total = document.getElementById('total');
                          canti.addEventListener('keyup', function(e){
                            e.preventDefault();
                            let preciototal = precio * canti.value;
                            total.value = preciototal;
                          })
                        </script>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <script type="text/javascript" src="../js/modal.js"></script>
            </body>
          </html>
    <?php      
                  }
                }
