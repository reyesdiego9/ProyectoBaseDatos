<?php
include_once './global/config.php';
include_once './global/conexion.php';
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Formulario de pago</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./css/Estilo.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
  <style>
    body{
      background-color: rgba(0,0, 0, 0.80);  
    }

  </style>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="modal">
    <div class="modal__container">
      <div class="modal__featured">
        <button type="button" class="button--transparent button--close">
          <svg class="nc-icon glyph" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
            <g><path fill="#ffffff" d="M1.293,15.293L11,5.586L12.414,7l-8,8H31v2H4.414l8,8L11,26.414l-9.707-9.707 C0.902,16.316,0.902,15.684,1.293,15.293z"></path> </g></svg>
          <span class="visuallyhidden">Volver a la página del producto</span>
        </button>
        <div class="modal__circle"></div>
        <img src="https://i.ibb.co/1m1f2f2/Whats-App-Image-2020-10-21-at-6-23-14-PM.jpg" class="modal__product" />
      </div>
      <div class="modal__content">
        <h2>Sus datos de pago</h2>
<?php
if(!empty($user)){
  $tarjeta=$user['EMAIL'];
  $sql1 = "SELECT ID_TARJETA, NOMBRE_TARJETA, MES, AÑO FROM TARJETAS WHERE EMAIL = '$tarjeta'";
  $conn = oci_connect("diego2", "clave", "localhost:1521/xe", 'AL32UTF8');
  $prueba = oci_parse($conn, $sql1);
  oci_execute($prueba);
  $row=oci_fetch_array($prueba);
}
  if($row != null){
  ?>
  <form action="guardartarjeta.php" method="get">
          <ul class="form-list">
            <li class="form-list__row">
              <label>Nombre</label>
              <input type="text" name="nombretarjeta" id="nombretarjeta" required="" value="<?php echo $row['NOMBRE_TARJETA']?>" disabled/>
            </li>
            <li class="form-list__row">
              <label>Número de tarjeta</label>
              <div id="input--cc" class="creditcard-icon">
                <input type="text" name="cc_number" id="cc_number" required="" value="<?php echo $row['ID_TARJETA']?>" disabled/>
              </div>
            </li>
            <li class="form-list__row form-list__row--inline">
              <div>
                <label>Fecha de caducidad</label>
                <div class="form-list__input-inline">
                  <input type="text" name="mes" id="mes" placeholder="MM"  minlength="2" maxlength="2" required="" value="<?php echo $row['MES']?>" disabled/>
                  <input type="text" name="año" id="año" placeholder="YY"  minlength="2" maxlength="2" required="" value="<?php echo $row['AÑO']?>" disabled/>
                </div>
              </div>
              <div>
                <label>
                  CVC

                  <a href="#cvv-modal" class="button--transparent modal-open button--info">
                    <svg class="nc-icon glyph" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16"><g> <path fill="#35a4fb" d="M8,0C3.6,0,0,3.6,0,8s3.6,8,8,8s8-3.6,8-8S12.4,0,8,0z M8,13c-0.6,0-1-0.4-1-1c0-0.6,0.4-1,1-1s1,0.4,1,1 C9,12.6,8.6,13,8,13z M9.5,8.4C9,8.7,9,8.8,9,9v1H7V9c0-1.3,0.8-1.9,1.4-2.3C8.9,6.4,9,6.3,9,6c0-0.6-0.4-1-1-1 C7.6,5,7.3,5.2,7.1,5.5L6.6,6.4l-1.7-1l0.5-0.9C5.9,3.6,6.9,3,8,3c1.7,0,3,1.3,3,3C11,7.4,10.1,8,9.5,8.4z"></path> </g></svg>
                    <span class="visuallyhidden">Qué es CVV?</span>
                  </a>
                </label>
                <input type="text" name="cc_cvc" placeholder="123"  minlength="3" maxlength="4" required="" />
              </div>
            </li>
            <li class="form-list__row form-list__row--agree">
              <label>
              <input type="checkbox" name="save_cc" value="bird" disabled>
                Su tarjeta se encuentra guardada
              </label>
            </li>
            <li>
              <button type="submit" class="button">Pagar ahora</button>
            </li>
          </ul>
        </form>
            <form action="borrartarjeta.php">
          
              <button type="submit" class="button">Cambiar Tarjeta</button>
      
            </form>
  <?php  
  }else{
  ?>
<form action="guardartarjeta.php" method="get">
          <ul class="form-list">
            <li class="form-list__row">
              <label>Nombre</label>
              <input type="text" name="nombretarjeta" id="nombretarjeta" required="" />
            </li>
            <li class="form-list__row">
              <label>Número de tarjeta</label>
              <div id="input--cc" class="creditcard-icon">
                <input type="text" name="cc_number" id="cc_number" required="" maxlength='16'/>
              </div>
            </li>
            <li class="form-list__row form-list__row--inline">
              <div>
                <label>Fecha de caducidad</label>
                <div class="form-list__input-inline">
                  <input type="text" name="mes" id="mes" placeholder="MM"  minlength="2" maxlength="2" required="" />
                  <input type="text" name="año" id="año" placeholder="YY"  minlength="2" maxlength="2" required="" />
                </div>
              </div>
              <div>
                <label>
                  CVC

                  <a href="#cvv-modal" class="button--transparent modal-open button--info">
                    <svg class="nc-icon glyph" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16"><g> <path fill="#35a4fb" d="M8,0C3.6,0,0,3.6,0,8s3.6,8,8,8s8-3.6,8-8S12.4,0,8,0z M8,13c-0.6,0-1-0.4-1-1c0-0.6,0.4-1,1-1s1,0.4,1,1 C9,12.6,8.6,13,8,13z M9.5,8.4C9,8.7,9,8.8,9,9v1H7V9c0-1.3,0.8-1.9,1.4-2.3C8.9,6.4,9,6.3,9,6c0-0.6-0.4-1-1-1 C7.6,5,7.3,5.2,7.1,5.5L6.6,6.4l-1.7-1l0.5-0.9C5.9,3.6,6.9,3,8,3c1.7,0,3,1.3,3,3C11,7.4,10.1,8,9.5,8.4z"></path> </g></svg>
                    <span class="visuallyhidden">Qué es CVV?</span>
                  </a>
                </label>
                <input type="text" name="cc_cvc" placeholder="123"  minlength="3" maxlength="4" required="" />
              </div>
            </li>
            <li class="form-list__row form-list__row--agree">
              <label>
              <?php
            if(empty($user)){
              ?>
              <input type="checkbox" name="save_cc" value="bird" disabled>
            <?php  
            }else{
            ?>
             <input type="checkbox" name="save_cc" checked="checked">
            <?php
            }
            ?>
                Guardar mi tarjeta para futuras compras
              </label>
            </li>
            <li>
              <button type="submit" class="button">Pagar ahora</button>
            </li>
          </ul>
        </form>

  <?php  
  }
?>
      </div> <!-- END: .modal__content -->
    </div> <!-- END: .modal__container -->
  </div> <!-- END: .modal -->
<!-- partial -->
  <script>
    
  </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script  src="./script/Script.js"></script>
  <script  src="./script/token.js"></script>

</body>
</html>
