<?php
    session_start();
    include './global/conexion.php';
    if(!empty($_POST['email']) &&
    !empty($_POST['psw'])
    ){
        $sql = "SELECT EMAIL, CONTRASEÑA
        FROM CLIENTE 
        WHERE EMAIL=:email
        ";
        $conn = oci_connect("DiegoReyes", "toor", "localhost:1521/xe", 'AL32UTF8');
        $prueba = oci_parse($conn, $sql);  
        $correo = strtolower($_POST['email']);
        oci_bind_by_name($prueba, ':email', $correo);
        oci_execute($prueba);
        if($result = oci_fetch_array($prueba)){
            $message = '';
            if(count($result) > 0 && password_verify($_POST['psw'], $result['CONTRASEÑA'])){
                echo "<script> alert($message); </script>";
                $_SESSION['user_id'] = $result['EMAIL'];
                header('Location: /Oracle/base.php');
            }else{
                $message = 'Lo siento , estas credenciales no coinciden';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <?php if(!empty($message)) : ?>
        <p><?php echo $message ?></p>
    <?php endif; ?>


  <main>
    <div class="container px-4 py-5 mx-auto">
      <div class="card card0">
          <div class="d-flex flex-lg-row flex-column-reverse">
              <div class="card card1">
                  <form action="login.php" method="post">
                      <div class="row justify-content-center my-auto">
                          <div class="col-md-8 col-10 my-5">
                              <div class="row justify-content-center px-3 mb-3"> <a href="./base.php"><img id="logo" src="./img/Sin título-1.png"></a></div>
                              <h3 class="mb-5 text-center heading">Somos Alvah</h3>
                              <h6 class="msg-info">Porfavor entre con tu cuenta</h6>
                              <div class="form-group"> <label class="form-control-label text-muted">Username</label> <input type="text" id="email" name="email" placeholder="Phone no or email id" class="form-control"> </div>
                              <div class="form-group"> <label class="form-control-label text-muted">Password</label> <input type="password" id="psw" name="psw" placeholder="Password" class="form-control"> </div>
                              <div class="row justify-content-center my-3 px-3"> <button class="btn-block btn-color">Login to Tidi</button> </div>
                              <div class="row justify-content-center my-2"> <a href="#"><small class="text-muted">Forgot Password?</small></a> </div>
                          </div>
                      </div>
                      <div class="bottom text-center mb-5">
                          <a href="./signin.php" class="sm-text mx-auto mb-3">Don't have an account?<button class="btn btn-white ml-2">Create new</button></a>
                      </div>
                  </form>
              </div>
              <div class="card card2">
                  <div class="my-auto mx-md-5 px-md-5 right">
                      <h3 class="text-white">We are more than just a company</h3> <small class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </main>
    <script src="https://kit.fontawesome.com/42c6529a12.js" crossorigin="anonymous"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>