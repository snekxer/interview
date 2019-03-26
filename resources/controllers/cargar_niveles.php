<?php
           
           include $_SERVER['DOCUMENT_ROOT']."/h.php";
               
    
                $meta = new meta_global();
                $niveles = $meta->getAllNiveles($link);

              foreach ($niveles as $niveles){
                $id = $niveles->getId();
                $nombre = $niveles->getNombre();

                $niveles_arr[] = array('id'=>$id, 'nombre'=>$nombre);
                    

              }

                
                echo json_encode($niveles_arr);      
        ?>