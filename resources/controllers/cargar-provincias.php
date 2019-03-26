<?php

                 include $_SERVER['DOCUMENT_ROOT']."/h.php";

               
                $pais_id =  $_POST['pais_id'];
                $meta = new meta_global();
                $provincias = $meta->getAllProvincias($pais_id, $link);

                foreach ($provincias as $provincia){
                    $id = $provincia->getId();
                    $nombre = $provincia->getNombre();
                    $provincias_arr[] = array('id'=>$id, 'nombre'=>$nombre);
                    

                }
                
                echo json_encode($provincias_arr);
                    
        ?>