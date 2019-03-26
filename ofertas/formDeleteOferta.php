<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";

                $impl = new ofertas_empresa();
                $oferta = new oferta();

                $oferta->setId($_POST['id']);
                            
                $estado = $impl->delOferta($oferta,$link);
             

        ?>