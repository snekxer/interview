<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";

              //  error_reporting(0);

                $impl = new persona_persona();
                $persona = new persona();

         
                $persona->setNombres($_POST['nombres']);
                $persona->setApellidos($_POST['apellidos']);
                $persona->setFechaNac($_POST['fecha-nacimiento']);
                $persona->setIdentificacion($_POST['identificacion']);
                $persona->setTipoIdentificacion($_POST['tipo-documento']);
                $persona->setProfesion($_POST['profesion']);
                $persona->setArea($_POST['area']);
                $persona->setSubarea($_POST['sub-area']);
                $persona->setNacionalidad($_POST['nacionalidad']);
                $persona->setPais($_POST['pais']);
                $persona->setProvincia($_POST['provincia']);
                $persona->setCiudad($_POST['ciudad']);
                $persona->setMovil($_POST['movil']);
                $persona->setTelefono($_POST['telf-fijo']);
                $persona->setEstadoCivil($_POST['estado-civil']);
                $persona->setGenero($_POST['genero']);
                $persona->setEmailContacto($_POST['email']);
                $persona->setSitioWeb($_POST['sitio-web']);
                $persona->setAcercaDe($_POST['acerca-de']);
              //  $_POST['area-interes'];

    

                
                $estado = $impl::editPersona($persona,$link);
               
                
                if($estado){
                     $response = "La información ha sido actualizada de forma éxitosa";
                     echo $response;

                }else{
                    $error_message = "Ha ocurrido un error, vuelva a intentar";
                     echo $error_message;

                }


              

        ?>