<?php
include_once './global/config.php';
include_once './global/conexion.php';
include './carrito.php';
include './templates/header.php';
if((!empty($user)) and (!empty($_GET['save_cc']))){
$guardado=$_GET['save_cc'];
$mail=$user['EMAIL'];
$nombret=$_GET['nombretarjeta'];
$numt=$_GET['cc_number'];
$año=$_GET['año'];
$mes=$_GET['mes'];
    $conn = oci_connect("diego2", "clave", "localhost:1521/xe", 'AL32UTF8');
    $sql1 = "INSERT INTO TARJETAS (ID_TARJETA, NOMBRE_TARJETA, EMAIL, MES, AÑO) 
    VALUES ($numt, '$nombret', '$mail', '$mes','$año')"; 
    $prueba = oci_parse($conn, $sql1); 
    oci_execute($prueba);
    echo "<script>alert('SU COMPRA HA SIDO REALIZADA CON EXITO')</script>";
    ?>
     <div class="alert alert-success">
            SE REALIZO SU COMPRA CON EXITO Y SE GUARDO SU TARJETA.
        </div>
    <?php
}else{
echo "<script>alert('SU COMPRA HA SIDO REALIZADA CON EXITO')</script>";
    ?>
     <div class="alert alert-success">
            SE REALIZO SU COMPRA CON EXITO Y NO SE GUARDO SU TARJETA.
        </div>
    <?php
}
foreach($_SESSION['CARRITO'] as $indice => $producto){
    unset($_SESSION['CARRITO'][$indice]);
} 
include './templates/footer.php'
?>