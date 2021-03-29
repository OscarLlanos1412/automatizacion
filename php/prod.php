<?php
    require '../conec/connec.php';

    if($_POST['btn-pro']){
        $id = $_POST['produ'];
        
        
        $consul = "SELECT precio, nom_produ FROM producto WHERE id_prod = '$id'";
        $query = mysqli_query($mysqli,$consul);
        $file = mysqli_fetch_assoc($query);

        if($file){
          // $_SESSION['id_producto'] = $file['id_prod'];
?>          
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <link rel="stylesheet" href="../estilos/clie-pro.css">
                <title>Document</title>
            </head>
            <body>
              <div class="modal is-visible" id="modal1" data-animation="slideInOutLeft">
                <div class="modal-dialog">
                  <header class="modal-header">
                    Agregar Productos Al Carro
                    <button class="close-modal" aria-label="close modal" data-close>
                      ✕  
                    </button>
                  </header>
                  <section class="modal-content">
                    <form action="../php/insertarprod.php" method="POST" class="form-prod">
                      <label for="">Producto</label><br>
                      <input type="text" name="nom-prod" value="<?php echo $file['nom_produ']; ?>"><br>
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <label for="">Cantidad</label><br>
                      <input type="number" name="cant" id="canti" placeholder="Ingrese Cantidad"><br>
                      <label for="">Precio Por Unidad</label><br>
                      <input type="number" name="precio" id="precio" value="<?php echo $file['precio']; ?>"><br>
                      <label for="">Total</label><br>
                      <input type="number" name="tota" id="total"><br>
                      <input type="submit" name="agregar" id="agre" value="Agregar Producto">
                    </form>
                  </section>
                </div>
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
