
<?php
  $busqueda = strtolower($_REQUEST['busqueda']);
    if(empty($busqueda)){
        header("location: base.php");
    }
    include_once './global/config.php';
    include_once './global/conexion.php';
    include './carrito.php';
    include './templates/header.php';
?>
  <main class="content">
        <hr>
        <section id='productos1'>
        <div class="container mt-5">
          <!--Section: Content-->
          <section class="dark-grey-text text-center">  
            <!-- Section heading -->
            <h3 class="font-weight-bold mb-4 pb-2 nombrebusqueda">
           <?php echo $busqueda ?>
            </h3>
            <!-- Section description -->
            <p class="grey-text w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit fugit, error amet numquam iure provident voluptate esse quasi nostrum quisquam eum porro a pariatur veniam.</p>      
            <!-- Grid row -->
            <div class="row">
                    <?php
                       $sql1 = "SELECT ID_PRODUCTO, NOMBRE_CATEGORIA, PRECIO, NOMBRE_PRODUCTO, DESCUENTO
                       FROM prod INNER JOIN cat ON prod.cat_id_categoria = cat.id_categoria WHERE upper(nombre_producto) LIKE upper('%$busqueda%')
                       OR upper(nombre_producto) LIKE upper('%$busqueda%')
                       OR upper(nombre_categoria) LIKE upper('%$busqueda%')";
                       $conn = oci_connect("DiegoReyes", "toor", "localhost:1521/xe", 'AL32UTF8');
                       $prueba = oci_parse($conn, $sql1);
                       oci_execute($prueba);
                       while($row = oci_fetch_array($prueba)){
                    ?>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <a <?php echo "href='producto.php?id=".$row['ID_PRODUCTO']."'"; ?> class="waves-effect waves-light">
                            <?php
                            echo "<img src='prueba.php?id=".$row['ID_PRODUCTO']."' class='img-responsive producto_imagen' alt='' >"
                            ?>
                        </a>
                        <div class="card">
                            <div class="card-body">
                                <p class="mb-1 texto_producto">
                                    <a <?php echo "href='producto.php?id=".$row['ID_PRODUCTO']."'"; ?> class="font-weight-bold black-text">
                                        <?php
                                        echo $row['NOMBRE_PRODUCTO'];
                                        ?>
                                    </a>
                                </p>
                                <p class="mb-1">
                                    <small class="mr-1">
                                        <?php
                                            if($row['DESCUENTO'] == 0){
                                                echo "<span class='red-text font-weight-bold precio_producto'>
                                                    <strong>Q.".$row['PRECIO']."</strong>
                                                </span>";
                                            }else{
                                                echo "
                                                <span class='red-text font-weight-bold precio_producto'>
                                                    <strong>Q.".$row['DESCUENTO']."</strong>
                                                </span>
                                                <span class='grey-text precio_producto'>
                                                <small>
                                                    <s>Q.".$row['PRECIO']."</s>
                                                </small>
                                                </span>";
                                            }
                                        ?>
                                    </small>
                                </p>
                                
                                <form action="" method="POST">
                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($row['ID_PRODUCTO'],COD,KEY);?>" />
                                    <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($row['NOMBRE_PRODUCTO'],COD,KEY);?>" />
                                    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($row['PRECIO'],COD,KEY);?>" />
                                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>" />
                                    <button  
                                    class="btn btn-outline-black btn-rounded btn-sm px-3 waves-effect boton_compra2" 
                                    type="submit"
                                    value="Agregar" 
                                    name='btnAccion'> 
                                    Carrito
                                </button>
                                <a 
                                type="submit"
                                class="btn btn-black btn-rounded btn-sm px-3 boton_compra two"
                                value="Agregar" 
                                name='btnAccion'
                                href="./mostrarCarrito.php">Informacion
                                </a>
                            </form>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            <!-- Grid row -->    
          </section>
          <!--Section: Content-->
        </div>
      </section>

      <hr>
        <section id='productos1'>
        <div class="container mt-5">
          <!--Section: Content-->
          <section class="dark-grey-text text-center">  
            <!-- Section heading -->
            <h3 class="font-weight-bold mb-4 pb-2">Our bestsellers</h3>
            <!-- Section description -->
            <p class="grey-text w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit fugit, error amet numquam iure provident voluptate esse quasi nostrum quisquam eum porro a pariatur veniam.</p>      
            <!-- Grid row -->
            <div class="row">
                    <?php
                      $rand = range(1, 500);
                      shuffle($rand);
                      $i = 1;
                      $sql1 = "SELECT * FROM 
                      (SELECT * FROM PROD INNER JOIN cat ON prod.cat_id_categoria = cat.id_categoria ORDER BY dbms_random.value)
                      WHERE rownum <= 3";
                      $conn = oci_connect("DiegoReyes", "toor", "localhost:1521/xe", 'AL32UTF8');
                      $prueba = oci_parse($conn, $sql1);
                      oci_execute($prueba);
                      while($row = oci_fetch_array($prueba)){
                    ?>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <a <?php echo "href='producto.php?id=".$row['ID_PRODUCTO']."'"; ?> class="waves-effect waves-light">
                            <?php
                            echo "<img src='prueba.php?id=".$row['ID_PRODUCTO']."' class='img-responsive producto_imagen' alt='' >"
                            ?>
                        </a>
                        <div class="card">
                            <div class="card-body">
                                <p class="mb-1 texto_producto">
                                    <a <?php echo "href='producto.php?id=".$row['ID_PRODUCTO']."'"; ?> class="font-weight-bold black-text">
                                        <?php
                                        echo $row['NOMBRE_PRODUCTO'];
                                        ?>
                                    </a>
                                </p>
                                <p class="mb-1">
                                    <small class="mr-1">
                                        <?php
                                            if($row['DESCUENTO'] == 0){
                                                echo "<span class='red-text font-weight-bold precio_producto'>
                                                    <strong>Q.".$row['PRECIO']."</strong>
                                                </span>";
                                            }else{
                                                echo "
                                                <span class='red-text font-weight-bold precio_producto'>
                                                    <strong>Q.".$row['DESCUENTO']."</strong>
                                                </span>
                                                <span class='grey-text precio_producto'>
                                                <small>
                                                    <s>Q.".$row['PRECIO']."</s>
                                                </small>
                                                </span>";
                                            }
                                        ?>
                                    </small>
                                </p>
                                
                                <form action="" method="POST">
                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($row['ID_PRODUCTO'],COD,KEY);?>" />
                                    <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($row['NOMBRE_PRODUCTO'],COD,KEY);?>" />
                                    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($row['PRECIO'],COD,KEY);?>" />
                                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>" />
                                    <button  
                                    class="btn btn-outline-black btn-rounded btn-sm px-3 waves-effect boton_compra2" 
                                    type="submit"
                                    value="Agregar" 
                                    name='btnAccion'> 
                                    Carrito
                                </button>
                                <a 
                                type="submit"
                                class="btn btn-black btn-rounded btn-sm px-3 boton_compra two"
                                value="Agregar" 
                                name='btnAccion'
                                href="./mostrarCarrito.php">Informacion
                                </a>
                            </form>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            <!-- Grid row -->    
          </section>
          <!--Section: Content-->
        </div>
      </section>
    </main>
    <footer class="page-footer font-small purple py-4 text-light">
    <!-- Footer Elements -->
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3 class="font-weight-bold mb-0">MDB</h3>
          </div>
          <div class="col-md-4">
            <ul class="list-unstyled d-flex justify-content-center mb-0 mt-2 text-uppercase">
              <li>
                <a class="mx-3" role="button">About</a>
              </li>
              <li>
                <a class="mx-3" role="button">Blog</a>
              </li>
              <li>
                <a class="mx-3" role="button">Policy</a>
              </li>
              <li>
                <a class="mx-3" role="button">Contact</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4 text-light">
            <ul class="list-unstyled d-flex justify-content-end mb-0 mt-2">
              <li>
                <a class="mx-3" role="button"><i class="fab fa-facebook-f"></i></a>
              </li>
              <li>
                <a class="mx-3" role="button"><i class="fab fa-twitter"></i></a>
              </li>
              <li>
                <a class="mx-3" role="button"><i class="fab fa-instagram"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <script>
      window.onscroll = function() {myFunction()};
      
      var header = document.getElementById("myHeader");
      var sticky = header.offsetTop;
      
      function myFunction() {
        if (window.pageYOffset > sticky) {
          header.classList.add("sticky");
        } else {
          header.classList.remove("sticky");
        }
      }
      </script>
    <script src="https://kit.fontawesome.com/42c6529a12.js" crossorigin="anonymous"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>