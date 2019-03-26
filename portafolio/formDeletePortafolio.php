<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";
          
                $portafolio_id = $_POST['id'];

                $impl = new usuario_global();
      
                $persona = $impl->getMyUsr($link);
                $port_impl = new portafolio_persona();


                $portafolio = $port_impl->getPortafolio($portafolio_id, $link);
       

                $estado = $port_impl->delPortafolio($portafolio, $link);
               
                
                if($estado){
                     $data = true;
                     echo $data;
         
                }else{
                    $error_message = false;
                     echo $error_message;
    
                }        

        ?>