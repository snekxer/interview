<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";

                $impl = new emprendedor_emprendedor();
                $emprendedor = new emprendedor();

      
                $emprendedor->setNombre($_POST['nombre']);
                $emprendedor->setPais($_POST['pais']);
                $emprendedor->setProvincia($_POST['provincia']);
                $emprendedor->setCiudad($_POST['ciudad']);
                $emprendedor->setMovil($_POST['movil']);
                $emprendedor->setTelefono($_POST['telf-fijo']);
                $emprendedor->setIndustria($_POST['industria']);
                $emprendedor->setEmailContacto($_POST['email']);
                $emprendedor->setSitioWeb($_POST['sitio-web']);
//                $_POST['area-interes'];

                
                $estado = $impl->newEmprendedor($emprendedor,$link);
                $tral = new trayectoria_emprendedor;
                $tra = new trayectoria;
                $tra->setAcercaDe(' ');
                $tra->setContacto(1);
                $tra->setEmprendedor($impl->getMyUsr($link));
               
                
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