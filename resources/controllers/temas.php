<?php

            
                include $_SERVER['DOCUMENT_ROOT']."/h.php";
        

                $meta = new meta_global();
                $subareas = $meta->getAllTemas($link);

                foreach ($subareas as $subarea){
                    $id = $subarea->getId();
                    $nombre = $subarea->getNombre();
                    $imagen = $subarea->getImg();
                    $subareas_arr[] = array('id'=>$id, 'nombre'=>$nombre, 'img'=>$imagen);
                    

                }
                
                echo json_encode($subareas_arr);
                    
        ?>

