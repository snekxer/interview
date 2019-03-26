<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";
         error_reporting(0);
         

             //   $impl = new usuario_global();
     //           $uploader = new uploader();
             //   $empresa = $impl->getMyUsr($link);

                $producto_impl = new productos_empresa(); 
                $producto = $producto_impl->getProducto($_POST['product_id'], $link);
               
                $estado = $producto_impl->delProducto($producto,$link);
               
                
                if($estado){
                     $data = true;
                     echo $data;
                     //header('Location: ../perfiles/empresas/perfil-empresas.php');

                }else{
                    $error_message = false;
                     echo $error_message;
                    //header('Location: ../auth/iniciar-sesion.php');
                    //die('no registrado');
                }        
              

        ?>