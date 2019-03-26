<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";


                if($tipo=='O'){
                    $impl = new servicios_emprendedor();

                }else{
                    $impl = new servicios_empresa();
                }
                
                $servicio = new servicio();

                $servicio->setId($_POST['id_serv']);
                $servicio->setTitulo($_POST['titulo']);
                $servicio->setDescripcion($_POST['descripcion']);
                $servicio->setArea($_POST['area']);
                $servicio->setSubarea($_POST['sub-area']);
                $servicio->setPais($_POST['pais']);
                $servicio->setProvincia($_POST['provincia']);
                $servicio->setCiudad($_POST['ciudad']);
                $servicio->setModalidad($_POST['modalidad']);
                $servicio->setRangoDesde($_POST['rango-desde']);
                $servicio->setRangoHasta($_POST['rango-hasta']);
       

                
                $estado = $impl->editServicio($servicio,$link);
               
                
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