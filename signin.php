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
        $conn = oci_connect("diego2", "clave", "localhost:1521/xe", 'AL32UTF8');
        $prueba = oci_parse($conn, $sql);
        $correo =  strtolower($_POST['correo']);
        oci_bind_by_name($prueba, ':correo', $correo);
        $nombre =  strtoupper($_POST['nombre']);
        oci_bind_by_name($prueba, ':nombre', $nombre);
        $apellido = strtoupper($_POST['apellido']);
        oci_bind_by_name($prueba, ':apellido', $apellido);
        oci_bind_by_name($prueba, ':telefono', $_POST['telefono']);
        $dir = strtoupper($_POST['dir']);
        oci_bind_by_name($prueba, ':dir', $dir);
        $password = password_hash( $_POST['passw'], PASSWORD_BCRYPT);
        oci_bind_by_name($prueba, ':passw', $password);
       

        if(oci_execute($prueba)){
          header('Location: login.php');
        }else{
          $mensaje = "Error al ingresar cuenta";
        }
    }else{
        $mensaje = "";
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
        <link rel="stylesheet" type="text/css" href="css/util.css">
	      <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body aria-busy="true">
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <div class="login100-form-title" style="background-image: url(https://wallpapercave.com/wp/wp6943475.jpg);">
            <span class="login100-form-title-1">
              Crea tu usuario, es GRATIS!!
            </span>
          </div>
          <form action="signin.php" method="post" class='formulario'>
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
              <div class="d-flex justify-content-center">
                <button type='submit' value='send' class="btn btn-success btn-rounded waves-effect waves-light">Send</button>
              </div>
              <div class="row justify-content-center my-2"> <a href="./login.php"><strong class="text-muted">Tienes una cuenta? Ingresa ya</strong></a> </div>
            </form>
        </div>
      </div>
    </div>


<!-- Main navigation --><script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/js/jquery.min.js"></script><script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/js/popper.min.js"></script><script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/js/bootstrap.min.js"></script><script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/js/mdb.min.js"></script><script type="text/javascript" src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/bundles/4.19.1/compiled-addons.min.js"></script><script type="text/javascript" src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/plugins/mdb-plugins-gathered.min.js"></script><script type="text/javascript">{}</script><div class="hiddendiv common"></div></body></html>