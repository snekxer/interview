<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";


                if($tipo=='O'){
                    $impl = new servicios_emprendedor();

                }else{
                    $impl = new servicios_empresa();
                }
                
                $servicio = new servicio();

                $servicio->setId($_POST['id']);
                            
                $estado = $impl->delServicio($servicio,$link);
                           

        ?>