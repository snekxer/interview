<?php

        include $_SERVER['DOCUMENT_ROOT']."/h.php";

         //error_reporting(0);
        
        $file = $_POST['crop'];
        
        list($type, $file) = explode(';', $file);
        list(, $file)      = explode(',', $file);
        
        $file = base64_decode($file);

        $impu = new usuario_global();
        $estado = $impu->upImgPerf($file, $link);
        
        if($estado){
          $responde = array();
          $response['imagen_encabezado'] = $path; 
                    echo json_encode($response);
                   // $user = unserialize($_SESSION['user']);
                  // echo $user->getEmail();
                }else{
                    $error_message = false;
                     echo $error_message;
                    //header('Location: ../auth/iniciar-sesion.php');
                    //die('no registrado');
                }        

       ?>