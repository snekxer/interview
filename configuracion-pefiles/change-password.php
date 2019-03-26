<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";
        //error_reporting(0);
                $impl = new usuario_global();
                $usuario = new usuario();             
                $estado = $impl->cambiarPsswd($_POST['password'],$link);
                if($estado){
                     switch(unserialize($_SESSION['user'])->getTipo()){
                        case('P'):
                             header('Location: https://interview.ec/perfiles/personas/perfil-personas.php');
                            break;
                        case('E'):
                             header('Location: https://interview.ec/perfiles/empresas/perfil-empresas.php');
                            break;
                        case('O'):
                             header('Location: https://interview.ec/perfiles/emprendedores/perfil-emprendedores.php');
                            break;
                        default:
                             header('Location: https://interview.ec/404.html');
                            break;
                    }                     
                }else{
                    header('Location: https://interview.ec/configuracion-perfiles/configuracion.php');       
                }            

        ?>