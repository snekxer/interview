<?php
          
          include $_SERVER['DOCUMENT_ROOT']."/h.php";
               
                $prov_id = $_POST['provincia_id'];
                $meta = new meta_global();
                $ciudades = $meta->getAllCiudades($prov_id, $link);

                foreach ($ciudades as $ciudad){
                    $id = $ciudad->getId();
                    $nombre = $ciudad->getNombre();
                    $ciudades_arr[] = array('id'=>$id, 'nombre'=>$nombre);
                    

                }
                
                echo json_encode($ciudades_arr);
                    
        ?>