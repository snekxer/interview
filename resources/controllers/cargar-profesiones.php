<?php
                include $_SERVER['DOCUMENT_ROOT']."/h.php";

               
    
                $meta = new meta_global();
                $profesiones = $meta->getAllProfesiones($link);

                foreach ($profesiones as $profesion){
                    $id = $profesion->getId();
                    $nombre = $profesion->getNombre();
                    $profesiones_arr[] = array('id'=>$id, 'nombre'=>$nombre);
                    

                }
                
                echo json_encode($profesiones_arr);
                    
        ?>
