<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";


                if($tipo=='O'){
                    $impl = new servicios_emprendedor();

                }else{
                    $impl = new servicios_empresa();
                }
                
                $servicio = new servicio();

                $servicio->setId($_POST['id_serv']);
                            
                $estado = $impl->delServicio($servicio,$link);
               
                
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