<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";
          
                $portafolio_id = $_POST['portafolio_id'];
                
                $persona = $impl->getMyUsr($link);
                $port_impl = new portafolio_persona();
                
                $portafolio = $port_impl->getPortafolio($portafolio_id, $link);
                
                $portafolio->setTitulo($_POST['titulo']);
                $portafolio->setDescripcion($_POST['descripcion']);

                $estado = $port_impl->editPortafolio($portafolio,$link);
               
                
                if($estado){
                     $data = true;
                     echo $data;

                }else{
                    $error_message = false;
                     echo $error_message;

                }        

        ?>