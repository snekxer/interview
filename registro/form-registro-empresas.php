
<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";


              
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
        //        $_POST['area-interes'];


                
                $estado = $impl->newEmpresa($empresa,$link);
                $hisl = new historia_empresa;
                $his = new historia;
                $his->setContacto(1);
                $his->setMision(' ');
                $his->setVision(' ');
                $his->setQuienesSomos(' ');
                $his->setSlogan(' ');
                $his->setValores(' ');
                $his->setEmpresa($impl->getMyUsr($link));
                $hisl->newHistoria($his, $link);
                
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