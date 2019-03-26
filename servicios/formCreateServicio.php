<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";


                if($tipo=='O'){
                    $impl = new servicios_emprendedor();

                }else{
                    $impl = new servicios_empresa();
                }
               
                $servicio = new servicio();
                $servicio->setTitulo($_POST['titulo']);
                $servicio->setDescripcion($_POST['descripcion']);
                $servicio->setArea($_POST['area']);
                $servicio->setSubarea($_POST['sub-area']);
                $servicio->setPais($_POST['pais']);
                $servicio->setProvincia($_POST['provincia']);
                $servicio->setCiudad($_POST['ciudad']);
                $servicio->setModalidad($_POST['modalidad']);
                $servicio->setRangoDesde($_POST['rango-desde']);
                $servicio->setRangoHasta($_POST['rango-hasta']);       

                
                $estado = $impl->newServicio($servicio,$link);
               
             

        ?>