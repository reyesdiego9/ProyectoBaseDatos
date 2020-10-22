<?php
include_once './global/config.php';
include_once './global/conexion.php';
include './carrito.php';
include './templates/header.php';
if(!empty($_SESSION['CARRITO'])){
$guardado=$_POST['save_cc'];
$mail=$user['EMAIL'];
$nombret=$_POST['nombretarjeta'];
$numt=$_POST['cc_number'];
$año=$_POST['año'];
$mes=$_POST['mes'];
    echo $numt;
    echo $nombret;
    echo $mail;
    echo $mes;
    echo $año;
    $conn = oci_connect("jordi2", "clave", "localhost:1521/xe", 'AL32UTF8');
    $sql1 = "INSERT INTO TARJETAS (ID_TARJETA, NOMBRE_TARJETA, EMAIL, MES, AÑO) 
    VALUES ($numt, '$nombret', '$mail', '$mes','$año'"; 
    $prueba = oci_parse($conn, $sql1); 
    oci_execute($prueba);
    
}/* 
echo "<script>alert('SU COMPRA HA SIDO REALIZADA CON EXITO')</script>";
    ?>
     <div class="alert alert-success">
            SE REALIZO SU COMPRA CON EXITO
        </div>
    <?php */
include './templates/footer.php'
?>