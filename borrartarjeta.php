<?php
include_once './global/config.php';
include_once './global/conexion.php';
include './carrito.php';
include './templates/header.php';
$conn = oci_connect("diego2", "clave", "localhost:1521/xe", 'AL32UTF8');
$correo=$user['EMAIL'];
$sql1 = "DELETE FROM TARJETAS WHERE EMAIL='$correo'"; 
$prueba = oci_parse($conn, $sql1);
oci_execute($prueba);
?>
    <div class="alert alert-success">
           SE ESTA FACTURANDO SU COMPRA...
    </div>
   <?php
include './Formulario_de_pago.php';
include './templates/footer.php';
?>