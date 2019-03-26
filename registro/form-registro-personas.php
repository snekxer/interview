<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";



                $impl_persona = new persona_persona();
                $impl_global = new usuario_global();
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
             


             //   $ids_areas = new array();
              //   $ids_areas = $_POST['areas_interes'];

                $ids_areas = array(5, 6);
            
                foreach($ids_areas as $ids_areas){
                    $area = new area();
                    $area->setId($ids_areas);
                    $impl_global->setAreaInt($area,$link);
                    unset($area);
                }


                
                $estado = $impl_persona->newPersona($persona,$link);
                $currl = new curriculum_persona;
                $curr = new curriculum;
                $curr->setAspSalarial(0);
                $curr->setDiscapacidad(0);
                $curr->setDiscapacidadDetalle(' ');
                $curr->setDispTiempo(0);
                $curr->setLicencia(0);
                $curr->setSituacionAct(0);
                $curr->setPersona($impl->getMyUsr($link));
                $currl->newCurriculum($curr, $link);
                    
               
                
                if($estado){
                     $response = "La información ha sido guardada de manera éxitosa";
                     echo $response;

                }else{
                    $error_message = "Ha ocurrido un error, vuelva a intentar";
                     echo $error_message;
                
                }


              

        ?>