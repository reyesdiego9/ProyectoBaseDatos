<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=}, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <div class="container my-5 py-5">
            <section class="text-center">
                <div class="row">
                    <?php
                        $sql = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, PRECIO, DESCUENTO
                        FROM PROD
                        INNER JOIN cat ON prod.cat_id_categoria = cat.id_categoria
                        WHERE prod.cat_id_categoria = ". (int) $_GET['id'];
                        $conn = oci_connect("diegopapi", "toor", "localhost:1521/xe", 'AL32UTF8');
                        $prueba = oci_parse($conn, $sql);
                        oci_execute($prueba);
                        while($row = oci_fetch_array($prueba)){
                    ?>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <a href="" class="waves-effect waves-light">
                            <?php
                            echo "<img src='prueba.php?id=".$row['ID_PRODUCTO']."' class='img-responsive producto_imagen' alt='' >"
                            ?>
                        </a>
                        <div class="card">
                            <div class="card-body">
                                <p class="mb-1 texto_producto">
                                    <a href="" class="font-weight-bold black-text">
                                        <?php
                                        echo $row['NOMBRE_PRODUCTO'];
                                        ?>
                                    </a>
                                </p>
                                <p class="mb-1">
                                    <small class="mr-1">
                                        <?php
                                            if($row['DESCUENTO'] == 0){
                                                echo "<span class='red-text font-weight-bold precio_producto'>
                                                    <strong>Q.".$row['PRECIO']."</strong>
                                                </span>";
                                            }else{
                                                echo "
                                                <span class='red-text font-weight-bold precio_producto'>
                                                    <strong>Q.".$row['DESCUENTO']."</strong>
                                                </span>
                                                <span class='grey-text precio_producto'>
                                                <small>
                                                    <s>Q.".$row['PRECIO']."</s>
                                                </small>
                                                </span>";
                                            }
                                        ?>
                                    </small>
                                </p>
                                <button type="button" class="btn btn-black btn-rounded btn-sm px-3">Buy Now</button>
                                <button type="button" class="btn btn-outline-black btn-rounded btn-sm px-3 waves-effect">Details</button>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            <!--Grid row-->


            </section>
        <!--Section: Content-->


        </div>
    </main>

    <script src="https://kit.fontawesome.com/42c6529a12.js" crossorigin="anonymous"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>