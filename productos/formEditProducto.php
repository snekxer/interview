<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";
         //error_reporting(0);
         

                $impl = new usuario_global();
                $empresa = $impl->getMyUsr($link);
                $producto_impl = new productos_empresa(); 
                $producto = new producto();
                $producto->setEmpresa($empresa);
                $producto->setId($_POST['product_id']);
                $producto->setTitulo($_POST['titulo']);
                $producto->setDescripcion($_POST['descripcion']);
   
                $estado = $producto_impl->editProducto($producto,$link);
               
                 
              

        ?>