<?php

        include $_SERVER['DOCUMENT_ROOT']."/h.php";

        //error_reporting(0);



                $impl = new usuario_global();

                $usuario = new usuario();

                $usuario->setEmail($_POST['email']);



                $impl->checkEmail($usuario->getEmail(), $link)








 

        ?>

