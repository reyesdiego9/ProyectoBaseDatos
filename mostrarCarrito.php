<?php
    include_once './global/config.php';
    include './carrito.php';
    include './templates/header.php';
?>

<br>
<h3>Lista del carrito</h3>
<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <div class="container my-5 py-3 z-depth-1 rounded">


  <!--Section: Content-->
  <section class="dark-grey-text">

    <!-- Shopping Cart table -->
    <div class="table-responsive">
      <table class="table product-table mb-0">
            <thead class="mdb-color lighten-5">
                <tr>
                    <th></th>
                    <th class="font-weight-bold">
                    <strong>Product</strong>
                    </th>
                    <th></th>
                    <th class="font-weight-bold">
                    <strong>Price</strong>
                    </th>
                    <th class="font-weight-bold">
                    <strong>QTY</strong>
                    </th>
                    <th class="font-weight-bold">
                    <strong>Amount</strong>
                    </th>
                    <th></th>
                </tr>
            </thead>
        <tbody>
        <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
        <tr>
            <th scope="row">
            <img src='prueba.php?id=<?php echo $producto['ID']?>' alt="" class="img-fluid z-depth-0">
            </th>
            <td>
            <h5 class="mt-3">  
                <strong><?php echo $producto['NOMBRE'] ?></strong>
            </h5>
            <p class="text-muted">Apple</p>
            </td>
            <td></td>
            <td>Q<?php echo $producto['PRECIO'] ?></td>
            <td>
            <input name="cantidad" id="cantidad" type="number" value="<?php echo $producto['CANTIDAD'] ?>" aria-label="Search" class="form-control" style="width: 100px">
            </td>
            <td class="font-weight-bold">
            <strong>Q<?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2)  ?></strong>
            </td>
            <td>
            <form action="" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>" />
                <button
                type="submit"
                class="btn btn-sm btn-primary"
                data-toggle="tooltip"
                data-placement="top"
                title="Remove item"
                name='btnAccion'
                value='Eliminar'>X
                </button>
            </form>
            </td>
        </tr>
        <?php $total = $total + ($producto['PRECIO']*$producto['CANTIDAD']); ?>
        <?php } ?>

        <tr>
        <td colspan="3"></td>
        <td>
            <h4 class="mt-2">
            <strong>Total</strong>
            </h4>
        </td>
        <td class="text-right">
            <h4 class="mt-2">
            <strong>Q<?php echo number_format($total,2) ?></strong>
            </h4>
        </td>
        <td colspan="3" class="text-right">
            <button type="button" class="btn btn-primary btn-rounded">Complete purchase
            <i class="fas fa-angle-right right"></i>
            </button>
        </td>
        </tr>
          <!-- Fourth row -->

        </tbody>
      </table>
    </div>
  </section>
  <!--Section: Content-->
</div>
<?php }else{ ?>
    <div class="alert alert-success">
        No hay productos en el carrito..
    </div>
<?php } ?>


<?php
    include './templates/footer.php'
?>