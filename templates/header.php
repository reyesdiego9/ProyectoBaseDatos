<?php 
  
  include 'singConexion.php';
?>
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
      <nav class="navbar nav1 navbar-expand-lg navbar-dark">
        <a href="#" class="navbar-brand">
          <img src="./img/logo_1.png" alt="" width="80px" height="80px">
        </a>
        <form action="Busqueda.php" method="get" class="form-inline my-2 my-lg-0 visible" >
          <input class="form-control mr-sm-2" name="busqueda" id="busqueda" type="text" placeholder="Escriba su busqueda" aria-label="Search" value="<?php if(empty($busqueda)){echo "";}else if(!empty($busqueda)){echo $busqueda;}?>">
          <input class="btn btn-outline-light my-2 my-sm-0" type="submit" value="Buscar" >
        </form>
        <div class='content'>
        <?php if(empty($user)) : ?>
          <a href="./mostrarCarrito.php" class="navbar-brand" id="navbarNav">
            <img src="./img/outline_shopping_cart_white_18dp.png" alt="" width="30px" height="30px">
          </a>
          <a href="./login.php" class="navbar-brand" id="navbarNav">
            <img src="./img/baseline_account_circle_white_18dp.png" alt="" width="30px" height="30px">
          </a>
        <?php else: ?>
          
          <ul class="navbar-nav"> 
            <li "nav-item active">
              <a href="./mostrarCarrito.php" class="navbar-brand" id="navbarNav">
                <img src="./img/outline_shopping_cart_white_18dp.png" alt="" width="30px" height="30px">
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $user['NOMBRE_CLIENTE'] ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="logout.php">Cerrar Sesion</a>
              </div>
            </li>
          </ul>
        <?php endif; ?>
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
                            $sql1 = "SELECT ID_CATEGORIA, NOMBRE_CATEGORIA 
                            FROM CAT 
                            WHERE CAT_ID_CATEGORIA = 69" ;
                            $conn = oci_connect("jordi2", "clave", "localhost:1521/xe", 'AL32UTF8');
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
                            $conn = oci_connect("jordi2", "clave", "localhost:1521/xe", 'AL32UTF8');
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
                            $conn = oci_connect("jordi2", "clave", "localhost:1521/xe", 'AL32UTF8');
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
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hogar
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php
                        $sql1 = "SELECT ID_CATEGORIA, NOMBRE_CATEGORIA
                        FROM CAT
                        WHERE CAT_ID_CATEGORIA = 38" ;
                        $conn = oci_connect("jordi2", "clave", "localhost:1521/xe", 'AL32UTF8');
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
                  Celulares
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php
                    $sql1 = "SELECT ID_CATEGORIA, NOMBRE_CATEGORIA
                    FROM CAT
                    WHERE CAT_ID_CATEGORIA = 11" ;
                    $conn = oci_connect("jordi2", "clave", "localhost:1521/xe", 'AL32UTF8');
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
                    $conn = oci_connect("jordi2", "clave", "localhost:1521/xe", 'AL32UTF8');
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
                    $conn = oci_connect("jordi2", "clave", "localhost:1521/xe", 'AL32UTF8');
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
                    $sql1 = "SELECT ID_CATEGORIA, NOMBRE_CATEGORIA
                    FROM CAT
                    WHERE CAT_ID_CATEGORIA = 0" ;
                    $conn = oci_connect("jordi2", "clave", "localhost:1521/xe", 'AL32UTF8');
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
                  Computación
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php
                    $sql1 = "SELECT Nombre_Categoria FROM CAT WHERE CAT_ID_CATEGORIA = 23" ;
                    $conn = oci_connect("jordi2", "clave", "localhost:1521/xe", 'AL32UTF8');
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