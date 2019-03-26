<?php
              //cargar industria
include $_SERVER['DOCUMENT_ROOT']."/h.php";


  $impl = new usuario_global();
  $meta = new meta_global();


              $rango_sal = $meta->getAllModalidades($link);

              foreach ($rango_sal as $rango_sal){
                $id = $rango_sal->getId();
                $nombre = $rango_sal->getNombre();

                echo '<option value="' . $id . '">' . $nombre . '</option>';


              }

              ?>