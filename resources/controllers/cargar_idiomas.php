<?php
            
            include $_SERVER['DOCUMENT_ROOT']."/h.php";
               
    
                $meta = new meta_global();   

                $idiomas = $meta-> getAllIdiomas($link);

              foreach ($idiomas as $idiomas){
                $id = $idiomas->getId();
                $nombre = $idiomas->getNombre();

                $idiomas_arr[] = array('id'=>$id, 'nombre'=>$nombre);


              }

                
                echo json_encode($idiomas_arr);      
        ?>