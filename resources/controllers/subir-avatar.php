<?php
     include $_SERVER['DOCUMENT_ROOT']."/h.php";  

         //error_reporting(0);
     
        $estado = $impl->upImgPerf($link);  
	
     

				if($estado){ 
                    echo $path;
                   // $user = unserialize($_SESSION['user']);
                  // echo $user->getEmail();
                }else{
                    $error_message = false;
                     echo $error_message;
                    //header('Location: ../auth/iniciar-sesion.php');
                    //die('no registrado');
                }        

       ?>