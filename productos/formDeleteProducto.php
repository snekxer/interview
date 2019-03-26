<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";
         //error_reporting(0);

                $producto_impl = new productos_empresa(); 
                $producto = $producto_impl->getProducto($_POST['id'], $link);
               
                $estado = $producto_impl->delProducto($producto,$link);
              

        ?>