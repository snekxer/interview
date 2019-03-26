<?php
         
         include $_SERVER['DOCUMENT_ROOT']."/h.php";
               
    
                $meta = new meta_global();
                $paises = $meta->getAllPaises($link);

                foreach ($paises as $pais){
                    $id = $pais->getId();
                    $nombre = $pais->getNombre();
                    $paises_arr[] = array('id'=>$id, 'nombre'=>$nombre);
                    

                }
                
                echo json_encode($paises_arr);
                    
        ?>
