<?php
    include_once './global/config.php';
    include_once './global/conexion.php';
    include './carrito.php';
    include './templates/header.php';
?>
    <?php
        $sql3 = "SELECT * FROM PROD WHERE ID_PRODUCTO = ". (int) $_GET['id'];
        $conn = oci_connect("DiegoReyes", "toor", "localhost:1521/xe", 'AL32UTF8');
        $prueba = oci_parse($conn, $sql3);
        oci_execute($prueba);
        while($row = oci_fetch_array($prueba)){
    ?>
    <div class="container my-5 py-5 z-depth-1">

        <!--Section: Content-->
        <section class="text-center">

        <!-- Section heading -->
        <h3 class="font-weight-bold mb-5">Product Details</h3>

        <div class="row muestra-producto">
            <div class="col-lg-6">
            <!--Carousel Wrapper-->
            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                <!--Slides-->
                    <?php
                     echo "<img src='prueba.php?id=".$row['ID_PRODUCTO']."' alt='First slide' class='img-fluid'>"
                    ?>
                <!--/.Slides-->
            </div>
            <!--/.Carousel Wrapper-->

            </div>

            <div class="col-lg-5 text-center text-md-left">

            <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
                <?php
                    echo "<strong>".$row['NOMBRE_PRODUCTO']."</strong>"
                ?>
            </h2>
            <span class="badge badge-danger product mb-4 ml-xl-0 ml-4">bestseller</span>
            <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
                <?php
                    if($row['DESCUENTO'] == 0){
                        echo "<span class='red-text font-weight-bold'>
                            <strong>Q.".$row['PRECIO']."</strong>
                        </span>";
                    }else{
                        echo "<span class='red-text font-weight-bold'>
                        <strong>Q.".$row['DESCUENTO']."</strong>
                        </span>
                        <span class='grey-text'>
                        <small>
                            <s>Q.".$row['PRECIO']."</s>
                        </small>
                        </span>";
                    }
                ?>
                
            </h3>

            <!--/.Accordion wrapper-->
            <div class="font-weight-normal">
          
                <p class="ml-xl-0 ml-4">
                    <?php
                        echo $row['DESCRIPCION'];
                    ?>
                </p>
                    
                    
                    <form action="" method="POST">
                        <div class='d-flex justify-content-around'>
                            <p class="ml-xl-0 ml-4">
                            <strong>Stock: </strong>
                                <?php
                                    echo $row['STOCK'];
                                ?>
                            </p>
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($row['ID_PRODUCTO'],COD,KEY);?>" />
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($row['NOMBRE_PRODUCTO'],COD,KEY);?>" />
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($row['PRECIO'],COD,KEY);?>" />
                            <div class="sm-form">
                                <input type="number" 
                                id="cantidad"
                                name="cantidad"
                                value="1"
                                min="1"
                                max=<?php echo $row['STOCK'];?>
                                >
                            </div>
                        </div>
                        
                        <button  
                        class="btn btn-primary btn-lg btn-block waves-effect float-sm-right boton_compra" 
                        type="submit"
                        value="Agregar" 
                        name='btnAccion'> 
                        Carrito
                        </button>
                    </form>

            </div>
           

            </div>

        </div>

        </section>
        <!--Section: Content-->


        </div>
    <?php
     }
    ?>

<?php include './templates/footer.php'; ?>
