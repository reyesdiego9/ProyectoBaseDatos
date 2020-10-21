<?php
 session_start();
 $mensaje = "";

 if(isset($_POST['btnAccion'])){
     switch($_POST['btnAccion']){
        case 'Agregar':
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID = openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje = "ok ID correcto".$ID;
            }else{
                $mensaje = "Upss...".$ID;
            }
            
            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $NOMBRE = openssl_decrypt($_POST['nombre'],COD,KEY);
            }else{ $mensaje = "Upss...".$ID; break;}
            
            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $PRECIO = openssl_decrypt($_POST['precio'],COD,KEY);
            }else{ $mensaje = "Upss...".$ID; break;}
            
            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $CANTIDAD = openssl_decrypt($_POST['cantidad'],COD,KEY);
            }else{ $mensaje = "Upss...".$ID; break;}

            if(!isset($_SESSION['CARRITO'])){
                $producto=array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'PRECIO' => $PRECIO,
                    'CANTIDAD' => $CANTIDAD
                );
                $_SESSION['CARRITO'][0] = $producto;
                $mensaje = "Producto agregado al carrito";
            }else{
                $idProductos=array_column($_SESSION['CARRITO'], "ID");
                if(in_array($ID, $idProductos)){
                    echo "<script>alert('El producto ya ha sido seleccionado...');</script>";
                }else{
                    
                    
                    $numeroProductos = count($_SESSION['CARRITO']);
                    $producto=array(
                        'ID' => $ID,
                        'NOMBRE' => $NOMBRE,
                        'PRECIO' => $PRECIO,
                        'CANTIDAD' => $CANTIDAD
                    );
                    $_SESSION['CARRITO'][$numeroProductos] = $producto;
                    $mensaje = "Producto agregado al carrito";
                }
            }
            // $mensaje = print_r($_SESSION, true);
        break;
        case 'Eliminar':
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID = openssl_decrypt($_POST['id'],COD,KEY);
                foreach($_SESSION['CARRITO'] as $indice => $producto){
                    if($producto['ID'] == $ID){
                        unset($_SESSION['CARRITO'][$indice]);
                        echo "<script> alert('Elemento borrado...'); </script>";
                    }
                }
            }else{
                $mensaje = "Upss...".$ID;
            }
        break;
     }
 }
?>