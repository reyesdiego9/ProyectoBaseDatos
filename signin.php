<?php
  include './global/conexion.php'; 
  if(!empty($_POST['nombre']) && 
    !empty($_POST['apellido']) && 
    !empty($_POST['correo']) && 
    !empty($_POST['apellido']) &&
    !empty($_POST['passw']) &&
    !empty($_POST['telefono']) &&
    !empty($_POST['dir'])
    ){
        $mensaje = "";
        $sql = 'INSERT INTO 
        CLIENTE(EMAIL, NOMBRE_CLIENTE, APELLIDOS_CLIENTE, DIRECCION, CONTRASEÑA, NUM_TELEFONO)
        VALUES (:correo, :nombre, :apellido, :dir, :passw, :telefono)';
        $conn = oci_connect("jordi2", "clave", "localhost:1521/xe", 'AL32UTF8');
        $prueba = oci_parse($conn, $sql);
        oci_bind_by_name($prueba, ':correo', strtolower($_POST['correo']));
        oci_bind_by_name($prueba, ':nombre', strtoupper($_POST['nombre']));
        oci_bind_by_name($prueba, ':apellido', strtoupper($_POST['apellido']));
        oci_bind_by_name($prueba, ':telefono', $_POST['telefono']);
        oci_bind_by_name($prueba, ':dir', strtoupper($_POST['dir']));
        $password = password_hash( $_POST['passw'], PASSWORD_BCRYPT);
        oci_bind_by_name($prueba, ':passw', $password);
        oci_execute($prueba);
        if( oci_execute($prueba)){
        $mensaje = "Usuario Registrado";
        }else{
        $mensaje = "Error con el usuario";
        }
    }else{
        $mensaje = "Error";
    }
?>
<html>
    <head>
        <base target="_parent">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">
        <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/mdb.min.css">
        <link rel="stylesheet" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-addons-4.19.1.min.css">
        <link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/mdb-plugins-gathered.min.css">
        <link rel="stylesheet" href="./css/sigin.css">
    </head>
    <body aria-busy="true">

<!-- Main navigation -->
<header>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
    <div class="container">
      <a class="navbar-brand" href="#">
        <strong>MDB</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link waves-effect waves-light" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="#">Profile</a>
          </li>
        </ul>
        <form class="form-inline">
          <div class="md-form my-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          </div>
        </form>
      </div>
    </div>
  </nav>
  <!-- Navbar -->
  <!-- Full Page Intro -->
  <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/89.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <!-- Mask & flexbox options-->
    <div class="mask rgba-indigo-strong d-flex justify-content-center align-items-center">
      <!-- Content -->
      <div class="container">
        <!--Grid row-->
        <div class="row pt-lg-5 mt-lg-5">
          <div class="col-md-6 col-xl-5 mb-4">
            <!--Form-->
            <div class="card wow fadeInRight" data-wow-delay="0.3s">
              <div class="card-body z-depth-2">
                <!--Header-->
                <div class="text-center">
                  <h3 class="dark-grey-text">
                    <strong>Registrate</strong>
                  </h3>
                  <hr>
                </div>
                <!--Body-->
                <div class='alert alert-success'>
                  <?php
                    echo $mensaje;
                  ?>
                </div>
                <form action="signin.php" method="post">
                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="form3" class="form-control" name="nombre" required>
                    <label for="form1">Nombre</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="form2" class="form-control" name="apellido" required>
                    <label for="form2">Apellido</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="email" id="form2" class="form-control" name='correo' required>
                    <label for="form3">Correo</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" id="form2" class="form-control" name='passw' required>
                    <label for="form4" pass>Contraseña</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-phone prefix grey-text"></i>
                    <input type="tel" id="form2" class="form-control" name='telefono' required>
                    <label for="form5">Telefono</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-street-view prefix grey-text"></i>
                    <input type="tel" id="form2" class="form-control" name='dir' required>
                    <label for="form6">Dirección</label>
                  </div>
                  <div class="text-center mt-3">
                    <button type='submit' value='send' class="btn btn-indigo btn-rounded waves-effect waves-light">Send</button>
                  </div>
                </form>
              </div>
            </div>
            <!--/.Form-->
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Content -->
    </div>
    <!-- Mask & flexbox options-->
  </div>
  <!-- Full Page Intro -->
</header>
<!-- Main navigation --><script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/js/jquery.min.js"></script><script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/js/popper.min.js"></script><script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/js/bootstrap.min.js"></script><script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/js/mdb.min.js"></script><script type="text/javascript" src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/bundles/4.19.1/compiled-addons.min.js"></script><script type="text/javascript" src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/plugins/mdb-plugins-gathered.min.js"></script><script type="text/javascript">{}</script><div class="hiddendiv common"></div></body></html>