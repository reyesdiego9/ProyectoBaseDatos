<?php
include_once './global/config.php';
include_once './global/conexion.php';
include './carrito.php';
include './templates/header.php';
if(!empty($user)){
?>
<form action="Ccompra.php" method="get" class="my-2 my-lg-0 visible " >

<div class="card formulariocompra">
<h3 class="titulocompra">
CONFIRMACION DE COMPRA    
</h3>
<div class="form-group">
    <label for="exampleInputPassword1">Correo</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $user['EMAIL']?>" disabled>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nombres</label>
    <input type="text" class="form-control" name="nombres" id="exampleInputPassword1" value="<?php echo $user['NOMBRE_CLIENTE']?>" disabled>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Apellidos</label>
    <input type="text" class="form-control" name="apellidos" id="exampleInputPassword1" value="<?php echo $user['APELLIDOS_CLIENTE']?>" disabled>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Direccion</label>
    <input type="text" class="form-control" name="direccion" id="exampleInputPassword1" value="<?php echo $user['DIRECCION']?>" disabled>
  </div>
  <div class="form-group">
  <label for="inputState">Metodo de pago</label>
      <select class="form-control" name="metodop" id="metodop" >
        <?php
            $sql1 = "SELECT ID_PAGO, NOMBRE_PAGO FROM MPAGO";
            $conn = oci_connect("diego2", "clave", "localhost:1521/xe", 'AL32UTF8');
            $prueba = oci_parse($conn, $sql1);
            oci_execute($prueba);
            while($row = oci_fetch_array($prueba)){
                ?>
        <option value="<?php echo $row['ID_PAGO']?>">
        <?php 
        echo $row['NOMBRE_PAGO']?>
        </option>
        <?php
            }
        ?>
      </select>
  </div>
  <button type="submit" class="btn btn-primary">Confirmar compra</button>
  </div>
</form>
<?php
}else{
?>
<form action="Ccompra.php" method="get" class="my-2 my-lg-0 visible" >
<div class="card formulariocompra">
<h3 class="titulocompra">
CONFIRMACION DE COMPRA    
</h3>
  <div class="form-group">
    <label for="exampleInputPassword1">Nombres</label>
    <input type="text" class="form-control" name="nombres" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Apellidos</label>
    <input type="text" class="form-control" name="apellidos"id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Direccion</label>
    <input type="text" class="form-control" name="direccion" id="exampleInputPassword1">
  </div>
  <div class="form-group">
  <label for="inputState">Metodo de pago</label>
      <select class="form-control" name="metodop" id="metodop" >
        <?php
            $sql1 = "SELECT ID_PAGO, NOMBRE_PAGO FROM MPAGO";
            $conn = oci_connect("diego2", "clave", "localhost:1521/xe", 'AL32UTF8');
            $prueba = oci_parse($conn, $sql1);
            oci_execute($prueba);
            while($row = oci_fetch_array($prueba)){
                ?>
        <option value="<?php echo $row['ID_PAGO']?>">
        <?php 
        echo $row['NOMBRE_PAGO']?>
        </option>
        <?php
            }
        ?>
      </select>
  </div>
  <button type="submit" class="btn btn-primary">Confirmar compra</button>
  </div>
</form>
<?php
}
include './templates/footer.php'
?>