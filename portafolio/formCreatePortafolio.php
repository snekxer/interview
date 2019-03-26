<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";
          
               
                $impl = new usuario_global();
                //$uploader = new uploader();
                $persona = $impl->getMyUsr($link);
                $port_impl = new portafolio_persona();
                $portafolio= new portafolio();
                $portafolio->setPersona($persona);
                $portafolio->setTitulo($_POST['titulo']);
                $portafolio->setDescripcion($_POST['descripcion']);
                //$path = $uploader->uploadImgPort();
                //$portafolio->setImagen($path);
    
                $estado = $port_impl->newPortafolio($portafolio,$link);              
                
                
        ?>