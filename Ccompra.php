
<?php
include_once './global/config.php';
include_once './global/conexion.php';
include './carrito.php';
include './templates/header.php';

//$delivdate = strval(['deliveryDate']);
$delivdate = date('d-m-o');
$correo ='jordiquintal622@gmail.com';
$fecha= "to_date('".$delivdate."','DD/MM/YYYY')";
$idfact=1;
$idpago=1;
$conn = oci_connect("jordi2", "clave", "localhost:1521/xe", 'AL32UTF8');
$sql1 = "INSERT INTO FACTURA (ID_FACTURA, FECHA, ID_PAGO, EMAIL)
VALUES ($idfact, to_date('".$delivdate."','DD/MM/YYYY'), $idpago,'$correo' )"; 
$prueba = oci_parse($conn, $sql1); 
oci_execute($prueba);
$i=1;
foreach($_SESSION['CARRITO'] as $indice=>$producto){
$total=$producto['PRECIO']*$producto['CANTIDAD'];
$num_det=$i++;
$idprod=$producto['ID'];
$cantidad= $producto['CANTIDAD'];
$conn = oci_connect("jordi2", "clave", "localhost:1521/xe", 'AL32UTF8');
$sql1 = "INSERT INTO DETALLE (NUM_DETALLE, CANTIDAD, PRECIO, ID_FACTURA, ID_PRODUCTO)
VALUES ($num_det, $cantidad, $total, $idfact, $idprod)"; 
$prueba = oci_parse($conn, $sql1); 
oci_execute($prueba);
}



?>


