<?php 
  include_once './global/config.php';
  include_once './global/conexion.php';
  include './carrito.php';
  include './templates/header.php';
?> 
  <main class="content">
        <div class="container-md ">
            <div id="carousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="producto.php?id=614"><img class="d-block w-100" src="./img/carousel/2k21 azul.jpg" alt="First slide"></a>   
                </div>
                <div class="carousel-item">
                    <a href="producto.php?id=594"><img class="d-block w-100" src="./img/carousel/fall guys rosado.jpg" alt="Second slide"></a>
                </div>
                <div class="carousel-item">
                    <a href="producto.php?id=593"><img class="d-block w-100" src="./img/carousel/red dead rosado.jpg" alt="Third slide"></a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
        <div class="container-md contenerdocarousel">
            <div id="contenedor2">
            <div id="carousel2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner first" id="inside-carousel">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./img/carousel/JBL go 2.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./img/carousel/s20.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./img/carousel/rog maximus.jpg" alt="Third slide">
                </div>
                </div>
            </div>
            </div>
            <div id="contenedor3">
            <div id="carousel3" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./img/carousel/yeti amarillo.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./img/carousel/xiaomi amarillo.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./img/carousel/2080 amarillo.jpg" alt="Third slide">
                </div>
                </div>
            </div>
                <div id="carousel3" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="./img/carousel/beat saber azul.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="./img/carousel/i9 rosado.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="./img/carousel/cyberpunk AZUL.jpg" alt="Third slide">
                    </div>
                </div>
                </div>
            </div>
        </div>

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
                        $prueba = oci_parse($conn, $sql1);
                        oci_execute($prueba);
                        while($row = oci_fetch_array($prueba)){
                            include './templates/muestra_producto.php';
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
                        $conn = oci_connect("diego2", "clave", "localhost:1521/xe", 'AL32UTF8');
                        $prueba = oci_parse($conn, $sql1);
                        oci_execute($prueba);
                        while($row = oci_fetch_array($prueba)){
                            include './templates/muestra_producto.php';
                        }
                    ?>
                </div>
            <!-- Grid row -->    
          </section>
          <!--Section: Content-->
        </div>
      </section>
    </main>
<?php 
include './templates/footer.php';
?>