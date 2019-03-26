<?php
        include $_SERVER['DOCUMENT_ROOT']."/h.php";
        //error_reporting(0);

                $impl = new usuario_global();
                $usuario = new usuario();

                $usuario->setEmail($_POST['email']);
                $usuario->setUsername($_POST['username']);
                $usuario->setTipo($_POST['tipo_usuario']);
                $usuario->setContrasena($_POST['password']);

                $estado = $impl->login($usuario,$link);
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

                    header('Location: https://interview.ec/auth/login.php');
       
                }
             

        ?>