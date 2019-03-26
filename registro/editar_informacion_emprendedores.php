<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";

              //  error_reporting(0);

                $imp = new emprendedor_emprendedor();
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
              //  $_POST['area-interes'];

    

                
                $estado = $imp->editEmprendedor($emprendedor,$link);
               
                
                if($estado){

                    
                    
                     $response = true;
                     echo $response;

                    
                    
                 //   $response = array();

               //     $response['status'] = true;

             //       echo json_encode($response);

              


                }else{
                    $error_message = false;
                     echo $error_message;
                    //header('Location: ../auth/iniciar-sesion.php');
                    //die('no registrado');
                }


              

        ?>