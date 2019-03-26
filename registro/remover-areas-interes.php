<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";

                $impl_global = new usuario_global();

                $ids_areas = $_POST['id_area_int'];

                $area = new area();
                $area->setId($ids_areas);
                $estado = $impl_global->delAreaInt($area,$link);

                if($estado){
                	echo true;
                }



                /*
                
                foreach($ids_areas as $ids_areas){
                    $area = new area();
                    $area->setId($ids_areas);
                    $impl_global->delAreaInt($area,$link);
                    unset($area);
                }
                */



?>
