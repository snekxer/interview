<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";

      
              
                $impl = new ofertas_empresa();
                $oferta = new oferta();
                $oferta->setTitulo($_POST['titulo']);
                $oferta->setEmail($_POST['email']);
                $oferta->setDescripcion($_POST['descripcion']);
                $oferta->setArea($_POST['area']);
                $oferta->setSubarea($_POST['sub-area']);
                $oferta->setTipoContrato($_POST['tipo-contrato']);

                if($_POST['discapacidad'] == null ){ $oferta->setDiscapacidad(0); }else{ $oferta->setDiscapacidad(1);}
                $oferta->setModalidad($_POST['modalidad']);
                $oferta->setPais($_POST['pais']);
                $oferta->setProvincia($_POST['provincia']);
                $oferta->setCiudad($_POST['ciudad']);
                $oferta->setRenumeracion($_POST['remuneracion']);
                $oferta->setRangoDesde($_POST['desde']);
                $oferta->setRangoHasta($_POST['hasta']);
                $oferta->setGenero($_POST['genero']);
                $oferta->setEdad($_POST['rango-edad']);
                $oferta->setExperiencia($_POST['rango-experiencia']);

                
                $estado = $impl->newOferta($oferta,$link);
               
                
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