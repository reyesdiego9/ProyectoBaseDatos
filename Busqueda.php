<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body aria-busy="true">
<div class="top-container">
    <?php

    $busqueda = strtolower($_REQUEST['busqueda']);
    if(empty($busqueda)){
        header("location: base.php");
    }
    ?>
      <nav class="navbar nav1 navbar-expand-lg navbar-dark">
        <a href="#" class="navbar-brand">
          <img src="./img/logo_1.png" alt="" width="80px" height="80px">
        </a>
        <form action="Busqueda.php" method="get" class="form-inline my-2 my-lg-0 visible" >
          <input class="form-control mr-sm-2" name="busqueda" id="busqueda" type="text" placeholder="Escriba su busqueda" aria-label="Search" value="<?php echo $busqueda;?>">
          <input class="btn btn-outline-light my-2 my-sm-0" type="submit" value="Buscar" >
        </form>
        <div class='content'>
          <a href="./cart.html" class="navbar-brand" id="navbarNav">
            <img src="./img/outline_shopping_cart_white_18dp.png" alt="" width="30px" height="30px">
          </a>
          <a href="./login.html" class="navbar-brand" id="navbarNav">
            <img src="./img/baseline_account_circle_white_18dp.png" alt="" width="30px" height="30px">
          </a>
        </div>
        
      </nav>
  </div>

  <div class="header" id="myHeader">
      <nav class="navbar hola navbar-expand-lg navbar-dark" id="myHeader">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center " id="navbarNav">
          <ul class="navbar-nav ">
              <li class="nav-item active">
                <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Ropa</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    Zapatos  
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="#">Hombre &raquo</a>
                        <ul class="submenu dropdown-menu">
                          <?php
                            $sql1 = "SELECT Nombre_Categoria FROM CAT WHERE CAT_ID_CATEGORIA = 69" ;
                            $conn = oci_connect("jordi", "clave", "localhost:1521/xe", 'AL32UTF8');
                            $prueba = oci_parse($conn, $sql1);
                            oci_execute($prueba);
                            while($row = oci_fetch_array($prueba)){
                          ?>
                            <li>
                              <a class="dropdown-item" href="">
                                <?php  
                                  echo $row['NOMBRE_CATEGORIA'];
                                ?>
                              </a>
                            </li>
                          <?php
                          }
                          ?>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Niño &raquo</a>
                        <ul class="submenu dropdown-menu">
                          <?php
                            $sql1 = "SELECT * FROM CAT WHERE CAT_ID_CATEGORIA = 70" ;
                            $conn = oci_connect("jordi", "clave", "localhost:1521/xe", 'AL32UTF8');
                            $prueba = oci_parse($conn, $sql1);
                            oci_execute($prueba);
                            while($row = oci_fetch_array($prueba)){
                          ?>
                            <li>
                              <?php  
                                  echo "<a class='dropdown-item' href='compras.php?id=".$row['CAT_ID_CATEGORIA']."'>".$row['NOMBRE_CATEGORIA']."</a>";
                              ?>
                              </a>
                            </li>
                          <?php
                          }
                          ?>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Mujer &raquo</a>
                        <ul class="submenu dropdown-menu">
                          <?php
                            $sql1 = "SELECT Nombre_Categoria FROM CAT WHERE CAT_ID_CATEGORIA = 71" ;
                            $conn = oci_connect("jordi", "clave", "localhost:1521/xe", 'AL32UTF8');
                            $prueba = oci_parse($conn, $sql1);
                            oci_execute($prueba);
                            while($row = oci_fetch_array($prueba)){
                          ?>
                            <li>
                              <a class="dropdown-item" href="">
                                <?php  
                                  echo $row['NOMBRE_CATEGORIA'];
                                ?>
                              </a>
                            </li>
                          <?php
                          }
                          ?>
                        </ul>
                    </li>
                  </ul>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Electrodomesticos</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Celulares
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php
                    $sql1 = "SELECT NOMBRE_CATEGORIA, ID_CATEGORIA FROM CAT WHERE CAT_ID_CATEGORIA = 11" ;
                    $conn = oci_connect("jordi", "clave", "localhost:1521/xe", 'AL32UTF8');
                    $prueba = oci_parse($conn, $sql1);
                    oci_execute($prueba);
                    while($row = oci_fetch_array($prueba)){
                  ?>
                      <?php  
                        echo "<a class='dropdown-item' href='compras.php?id=".$row['ID_CATEGORIA']."'>".$row['NOMBRE_CATEGORIA']."</a>";
                      ?>
                    </a>
                    <?php
                    }
                    ?>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Audio
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php
                    $sql1 = "SELECT ID_CATEGORIA, NOMBRE_CATEGORIA 
                    FROM CAT 
                    WHERE CAT_ID_CATEGORIA = 5";
                    $conn = oci_connect("jordi", "clave", "localhost:1521/xe", 'AL32UTF8');
                    $prueba = oci_parse($conn, $sql1);
                    oci_execute($prueba);
                    while($row = oci_fetch_array($prueba)){
                  ?>
                      <?php  
                        echo "<a class='dropdown-item' href='compras.php?id=".$row['ID_CATEGORIA']."'>".$row['NOMBRE_CATEGORIA']."</a>";
                      ?>
                    <?php
                    }
                    ?>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Tv y Video
                </a>
                
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php
                    $sql1 = "SELECT Nombre_Categoria from CAT WHERE CAT_ID_CATEGORIA = 48 OR CAT_ID_CATEGORIA = 63";
                    $conn = oci_connect("jordi", "clave", "localhost:1521/xe", 'AL32UTF8');
                    $prueba = oci_parse($conn, $sql1);
                    oci_execute($prueba);
                    while($row = oci_fetch_array($prueba)){
                  ?>
                    <a class="dropdown-item menunav" href="#">
                      <?php  
                      echo $row['NOMBRE_CATEGORIA'];
                      ?>
                    </a>
                    <?php
                    }
                    ?>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Videojuegos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php
                    $sql1 = "SELECT Nombre_Categoria FROM CAT WHERE CAT_ID_CATEGORIA = 0" ;
                    $conn = oci_connect("jordi", "clave", "localhost:1521/xe", 'AL32UTF8');
                    $prueba = oci_parse($conn, $sql1);
                    oci_execute($prueba);
                    while($row = oci_fetch_array($prueba)){
                  ?>
                    <a class="dropdown-item menunav" href="#">
                      <?php  
                      echo $row['NOMBRE_CATEGORIA'];
                      ?>
                    </a>
                    <?php
                    }
                    ?>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Computación
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php
                    $sql1 = "SELECT Nombre_Categoria FROM CAT WHERE CAT_ID_CATEGORIA = 23" ;
                    $conn = oci_connect("jordi", "clave", "localhost:1521/xe", 'AL32UTF8');
                    $prueba = oci_parse($conn, $sql1);
                    oci_execute($prueba);
                    while($row = oci_fetch_array($prueba)){
                  ?>
                    <a class="dropdown-item menunav" href="#">
                      <?php  
                      echo $row['NOMBRE_CATEGORIA'];
                      ?>
                    </a>
                    <?php
                    }
                    ?>
                </div>
              </li>
          </ul>
        </div>
      </nav>
  </div>

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
                    FROM prod INNER JOIN cat ON prod.cat_id_categoria = cat.id_categoria WHERE upper(nombre_producto) LIKE upper('%$busqueda%')";
                    $conn = oci_connect("jordi", "clave", "localhost:1521/xe", 'AL32UTF8');
                    $prueba = oci_parse($conn, $sql1);
                    oci_execute($prueba);
                    while($row = oci_fetch_array($prueba)){
                    ?>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <a href="" class="waves-effect waves-light">
                            <?php
                            echo "<img src='prueba.php?id=".$row['ID_PRODUCTO']."' class='img-responsive producto_imagen' alt='' >"
                            ?>
                        </a>
                        <div class="card">
                            <div class="card-body">
                                <p class="mb-1 texto_producto">
                                    <a href="" class="font-weight-bold black-text">
                                        <?php
                                        echo $row['NOMBRE_PRODUCTO'];
                                        ?>
                                    </a>
                                </p>
                                <p class="mb-1 texto_categoria">
                                    <a href="" class="font-weight-bold black-text">
                                        <?php
                                        echo $row['NOMBRE_CATEGORIA'];
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
                                <button type="button" class="btn btn-black btn-rounded btn-sm px-3">Buy Now</button>
                                <button type="button" class="btn btn-outline-black btn-rounded btn-sm px-3 waves-effect">Details</button>
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
              <!-- Grid column -->
                <?php
                    $rand = range(1, 500);
                    shuffle($rand);
                    $i = 1;
                    $sql1 = "SELECT * FROM 
                    (SELECT * FROM PROD INNER JOIN cat ON prod.cat_id_categoria = cat.id_categoria ORDER BY dbms_random.value)
                    WHERE rownum <= 4";
                    $conn = oci_connect("jordi", "clave", "localhost:1521/xe", 'AL32UTF8');
                    $prueba = oci_parse($conn, $sql1);
                    oci_execute($prueba);
                    while($row = oci_fetch_array($prueba)){
                ?>
                <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
                    <!-- Card -->
                    <div class="card align-items-center">
                    <!-- Card image -->
                    <div class="view overlay">
                        <?php
                        echo "<img src='prueba.php?id=".$row['ID_PRODUCTO']."' class='card-img-top'/>";
                        ?>
                        <a>
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <!-- Card image -->
                    <!-- Card content -->
                    <div class="card-body text-center">
                        <!-- Category & Title -->
                        <a href="" class="grey-text">
                        <?php
                            echo "<h6>".$row['NOMBRE_CATEGORIA']."</h6>";
                        ?> 
                        </a>
                        <h5 class="mb-3">
                        <strong>
                            <?php
                            echo "<a href='producto.php?id=".$row['ID_PRODUCTO']."' class='dark-grey-text'>".$row['NOMBRE_PRODUCTO']."</a>";
                            ?>
                        </strong>
                        </h5>
                        <h5 class="font-weight-bold blue-text mb-0">
                            <?php
                                echo "<strong>Q.".$row['PRECIO']."</strong>"
                            ?>
                        </h5>
                    </div>
                    <!-- Card content -->
                    </div>
                    <!-- Card -->
                </div>
                <?php
                 $i++;
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