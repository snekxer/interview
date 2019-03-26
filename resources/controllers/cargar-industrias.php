<?php
            
            include $_SERVER['DOCUMENT_ROOT']."/h.php";
               
    
                $meta = new meta_global();
                $industrias = $meta->getAllIndustrias($link);

                foreach ($industrias as $industria){
                    $id = $industria->getId();
                    $nombre = $industria->getNombre();
                    $industrias_arr[] = array('id'=>$id, 'nombre'=>$nombre);
                    

                }
                
                echo json_encode($industrias_arr);
                    
        ?>
