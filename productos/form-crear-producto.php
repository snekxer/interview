<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";
         error_reporting(0);
         

                $impl = new usuario_global();
     //           $uploader = new uploader();
                $empresa = $impl->getMyUsr($link);
                $producto_impl = new productos_empresa(); 
                $producto = new producto();
                $producto->setEmpresa($empresa);
                $producto->setTitulo($_POST['titulo']);
                $producto->setDescripcion($_POST['descripcion']);
    
                $estado = $producto_impl->newProducto($producto,$link);
               
                
                if($estado){
                     $data = true;
                     echo $data;
                   // $user = unserialize($_SESSION['user']);
                  // echo $user->getEmail();
                }else{
                    $error_message = false;
                     echo $error_message;
                    //header('Location: ../auth/iniciar-sesion.php');
                    //die('no registrado');
                }        
              

        ?>