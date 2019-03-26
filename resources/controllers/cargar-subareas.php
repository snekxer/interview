<?php

            
                include $_SERVER['DOCUMENT_ROOT']."/h.php";

               
                $area_id = $_POST['area_id'];
                $meta = new meta_global();
                $subareas = $meta->getAllSubareas($area_id, $link);

                foreach ($subareas as $subarea){
                    $id = $subarea->getId();
                    $nombre = $subarea->getNombre();
                    $subareas_arr[] = array('id'=>$id, 'nombre'=>$nombre);
                    

                }
                
                echo json_encode($subareas_arr);
                    
        ?>

