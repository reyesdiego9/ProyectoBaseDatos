<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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
            <p class="ml-xl-0 ml-4">
            <strong>Stock: </strong>
                <?php
                    echo $row['STOCK'];
                ?>
            </p>
        </div>
           

            </div>

        </div>

        </section>
        <!--Section: Content-->


        </div>
    <?php
     }
    ?>
    <script src="https://kit.fontawesome.com/42c6529a12.js" crossorigin="anonymous"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>