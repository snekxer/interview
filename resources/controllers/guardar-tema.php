<?php
     include $_SERVER['DOCUMENT_ROOT']."/h.php";  

         //error_reporting(0);
        $tema = new tema();
        $tema->setId($_POST['tema']);
        //;

        $estado = $impl->setTema($tema,$link);  
	
     

				if($estado){ 
                    $message = true;
                    echo $message;
                   // $user = unserialize($_SESSION['user']);
                  // echo $user->getEmail();
                }else{
                    $error_message = false;
                     echo $error_message;
                    //header('Location: ../auth/iniciar-sesion.php');
                    //die('no registrado');
                }        

       ?>