<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";

              //  error_reporting(0);

                $impl = new empresa_empresa();
                $empresa = new empresa();

         
                $empresa->setNombre($_POST['nombre']);
                $empresa->setRazonSocial($_POST['razon-social']);
                $empresa->setIdentificacion($_POST['identificacion']);
                $empresa->setTipoIdentificacion($_POST['tipo-documento']);
                $empresa->setPais($_POST['pais']);
                $empresa->setProvincia($_POST['provincia']);
                $empresa->setCiudad($_POST['ciudad']);
                $empresa->setMovil($_POST['movil']);
                $empresa->setTelefono($_POST['telf-fijo']);
                $empresa->setIndustria($_POST['industria']);
                $empresa->setEmailContacto($_POST['email']);
                $empresa->setSitioWeb($_POST['sitio-web']);
              //  $_POST['area-interes'];

    

                
                $estado = $impl::editEmpresa($empresa,$link);
               
                
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