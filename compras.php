<?php
    include_once './global/config.php';
    include_once './global/conexion.php';
    include './carrito.php';
    include './templates/header.php';
?>
    <main>
        <div class="container my-5 py-5">
        <?php 
            if($mensaje != ""){

        ?>
            <div class='alert alert-success'>
                <?php
                echo $mensaje;
                ?>
                <a href="./mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
            </div>
        <?php
            }    
        ?>
            <section class="text-center">
                <div class="row">
                    <?php
                        $sql = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, PRECIO, DESCUENTO, STOCK
                        FROM PROD
                        INNER JOIN cat ON prod.cat_id_categoria = cat.id_categoria
                        WHERE prod.cat_id_categoria = ". (int) $_GET['id'];
                        $conn = oci_connect("diego2", "clave", "localhost:1521/xe", 'AL32UTF8');
                        $prueba = oci_parse($conn, $sql);
                        oci_execute($prueba);
                        while($row = oci_fetch_array($prueba)){ 
                            if($row['STOCK'] > 0){
                                include './templates/muestra_producto.php';
                            }
                        }
                    ?>
                </div>
            <!--Grid row-->


            </section>
        <!--Section: Content-->


        </div>
    </main>

<?php include './templates/footer.php' ?>