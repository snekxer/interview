<?php
           
           include $_SERVER['DOCUMENT_ROOT']."/h.php";

               
    
                $meta = new meta_global();
                $areas = $meta->getAllAreas($link);

                foreach ($areas as $area){
                    $id = $area->getId();
                    $nombre = $area->getNombre();
                    $areas_arr[] = array('id'=>$id,'nombre'=>$nombre);
                    

                }
                
                echo json_encode($areas_arr);
                    
        ?>
