<?php
include_once './global/config.php';
include_once './global/conexion.php';
include './carrito.php';
include './templates/header.php';
?>
<h3>Estado de la compra</h3>
<?php
if(!empty($_SESSION['CARRITO'])){
$conn = oci_connect("DiegoReyes", "toor", "localhost:1521/xe", 'AL32UTF8');
$delivdate = date('d-m-o');
 if(!empty($user)){
    $correo =$user['EMAIL'];
    $nombre=$user['NOMBRE_CLIENTE'];
    $apellido=$user['APELLIDOS_CLIENTE'];
    $direccion=$user['DIRECCION'];
}else{
    $correo = "anonimo";
    $nombre=$_GET['nombres'];
    $apellido=$_GET['apellidos'];
    $direccion=$_GET['direccion'];
}
$idpago=$_GET['metodop'];
//NUMERO DE FACTURA CORRESPONDIENTE
$sql1 = "SELECT MAX(ID_FACTURA) AS REG FROM FACTURA"; 
$prueba = oci_parse($conn, $sql1); 
oci_execute($prueba);
$idfact=0;
if($row = oci_fetch_array($prueba)){
    if($row['REG']!=null){
        $idfact=$row['REG'];
        $idfact++;
    }else{
        $idfact=1;  
    }
} 
//INSERSION DE FACTURA
$fecha= "to_date('".$delivdate."','DD/MM/YYYY')";
$sql1 = "INSERT INTO FACTURA (ID_FACTURA, FECHA, ID_PAGO, EMAIL, NOMBRE, APELLIDO, DIRECCION)
VALUES ($idfact, to_date('".$delivdate."','DD/MM/YYYY'), $idpago,'$correo', upper('$nombre'),upper('$apellido'),upper('$direccion'))"; 
$prueba = oci_parse($conn, $sql1); 
oci_execute($prueba);
//ENCONTRAR NUMERO DE DETALLE
$sql1 = "SELECT MAX(NUM_DETALLE) AS REG FROM DETALLE"; 
$prueba = oci_parse($conn, $sql1); 
oci_execute($prueba);
$i=0;
if($row = oci_fetch_array($prueba)){
    if($row['REG']!=null){
        $i=$row['REG'];
        $i++;
    }else{
        $i=1;  
    }
} 
foreach($_SESSION['CARRITO'] as $indice=>$producto){

$total=$producto['PRECIO']*$producto['CANTIDAD'];
$num_det=$i++;
$idprod=$producto['ID'];
$cantidad= $producto['CANTIDAD'];
$sql1 = "INSERT INTO DETALLE (NUM_DETALLE, CANTIDAD, PRECIO, ID_FACTURA, ID_PRODUCTO)
VALUES ($num_det, $cantidad, $total, $idfact, $idprod)"; 
$prueba = oci_parse($conn, $sql1); 
oci_execute($prueba);
//STOCK UPDATE
$sql1 = "SELECT STOCK FROM PROD WHERE ID_PRODUCTO = $idprod";
$prueba = oci_parse($conn, $sql1); 
oci_execute($prueba);
$stock_p = 0;
if($row = oci_fetch_array($prueba)){
    $stock_p = $row['STOCK'];
}
$nuevo_stock = $stock_p-$cantidad; 
$sql1 = "UPDATE PROD SET STOCK = $nuevo_stock WHERE ID_PRODUCTO = $idprod";
$prueba = oci_parse($conn, $sql1); 
oci_execute($prueba);

}

if($idpago==2){
    ?>
    <div class="alert alert-success">
           SE ESTA FACTURANDO SU COMPRA...
    </div>
   <?php
include './Formulario_de_pago.php';
}else{
    echo "<script>alert('SU COMPRA HA SIDO REALIZADA CON EXITO')</script>";
    ?>
     <div class="alert alert-success">
            SE REALIZO SU COMPRA CON EXITO
        </div>
    <?php
    foreach($_SESSION['CARRITO'] as $indice => $producto){
        unset($_SESSION['CARRITO'][$indice]);
    }
}
   
include './templates/footer.php';

}
?>