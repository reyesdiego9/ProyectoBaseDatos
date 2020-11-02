<div class="col-lg-4 col-md-12 mb-4">
    <a <?php echo "href='producto.php?id=".$row['ID_PRODUCTO']."'"; ?> class="waves-effect waves-light">
        <?php
        echo "<img src='prueba.php?id=".$row['ID_PRODUCTO']."' class='img-responsive producto_imagen' alt='' >"
        ?>
    </a>
    <div class="card">
        <div class="card-body">
            <p class="mb-1 texto_producto">
                <a <?php echo "href='producto.php?id=".$row['ID_PRODUCTO']."'"; ?> class="font-weight-bold black-text">
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
                            $desc = $row['PRECIO']*($row['DESCUENTO']/100);
                            $precio = $row['PRECIO'] - $desc;
                            echo "<span class='red-text font-weight-bold precio_producto'>
                            <strong>Q.".$precio."</strong>
                            </span>
                            <span class='red-text font-weight-bold precio_producto'>
                            <small>
                                <s>Q.".$row['PRECIO']."</s>
                            </small>
                            </span>";
                        }
                    ?>
                </small>
            </p>
            
            <form action="" method="POST">
                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($row['ID_PRODUCTO'],COD,KEY);?>" />
                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($row['NOMBRE_PRODUCTO'],COD,KEY);?>" />
                <?php
                    if($row['DESCUENTO']  == 0){
                ?>
                    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($row['PRECIO'],COD,KEY);?>" />
                <?php
                    }else{
                ?>
                        <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($row['DESCUENTO'],COD,KEY);?>" />
                <?php
                    }
                ?>
                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>" />
                <button  
                class="btn btn-outline-black btn-rounded btn-sm px-3 waves-effect boton_compra two" 
                type="submit"
                value="Agregar" 
                name='btnAccion'> 
                    Carrito
                </button>
            </form>
        </div>
    </div>
</div>