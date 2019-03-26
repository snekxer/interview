<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author snekxer
 */


class usuario_global {	
    
        function registro($usuario, $link){
            $tipo = $usuario->getTipo();
            $pwd = md5($usuario->getContrasena());
            $st = $link -> prepare("INSERT INTO user (email, username, contrasena, tipo) VALUES (:email,:user,:passwd,:tipo)");
            $st -> bindParam(':email', $usuario->getEmail());
            $st -> bindParam(':user', $usuario->getUsername());
            $st -> bindParam(':passwd', $pwd);
            $st -> bindParam(':tipo', $tipo);
            $state = $st -> execute();
            if($state){
                $estado = $this->login($usuario, $link);
                return $estado;
            }                  
	}
        
        public function login($usuario, $link){
            $pwd = md5($usuario->getContrasena());
            $st = $link -> prepare("SELECT * FROM user WHERE email=:email AND contrasena=:passwd AND tipo=:tipo AND estado='A'");
            $st -> bindParam(':email', $usuario->getEmail());
            $st -> bindParam(':passwd', $pwd);
            $st -> bindParam(':tipo', $usuario->getTipo());
            $st -> execute();
            $data = $st->fetch();
            $count = $st->rowCount();
            if ($count>0){
                $user = new usuario();
                $user -> buildUsuario($data);
                $_SESSION['user'] = serialize($user);
                return true;
            } else {
                return false;
            }
        }
        
        public function login2($usuario, $link){
            $pwd = md5($usuario->getContrasena());
            $st = $link -> prepare("SELECT * FROM user WHERE email=:email AND username=:user AND contrasena=:passwd AND tipo=:tipo AND estado='A'");
            $st -> bindParam(':email', $usuario->getEmail());
            $st -> bindParam(':user', $usuario->getUsername());
            $st -> bindParam(':passwd', $pwd);
            $st -> bindParam(':tipo', $usuario->getTipo());
            $st -> execute();
            $data = $st->fetch();
            $count = $st->rowCount();
            if ($count>0){
                $user = new usuario();
                $user -> buildUsuario($data);
                $_SESSION['user'] = serialize($user);
                return true;
            } else {
                return false;
            }
        }
        
        public function loginTemp($usuario, $link){
            $pwd = md5($usuario->getContrasena());
            $st = $link -> prepare("SELECT * FROM user WHERE email=:email AND contrasena=:passwd AND tipo=:tipo AND estado='A'");
            $st -> bindParam(':email', $usuario->getEmail());
            $st -> bindParam(':passwd', $pwd);
            $st -> bindParam(':tipo', $usuario->getTipo());
            $st -> execute();
            $data = $st->fetch();
            $count = $st->rowCount();
            if ($count>0){
                $user = new usuario();
                $user -> buildUsuario($data);
                $_SESSION['user'] = serialize($user);
                return true;
            } else {
                return false;
            }
        }
        
        public function fakeLogin($email, $link){
            $st = $link -> prepare("SELECT * FROM user WHERE email=:email AND estado='A'");
            $st -> bindParam(':email', $email);
            $st -> execute();
            $data = $st->fetch();
            $count = $st->rowCount();
            if ($count>0){
                $user = new usuario();
                $user -> buildUsuario($data);
                $_SESSION['user'] = serialize($user);
                return true;
            } else {
                return false;
            }
        }
        
        public function setUsername($username,$link){
            $user = unserialize($_SESSION['user']);
            if($user!=null){
                $st = $link -> prepare("UPDATE user SET username=:user WHERE email=:email AND tipo=:tipo AND estado='A'");
                $st -> bindParam(':email', $user->getEmail());
                $st -> bindParam(':user', $username);
                $st -> bindParam(':tipo', $user->getTipo());
                $st -> execute();
                $data = $st->fetch();
                $count = $st->rowCount();
                if ($count>0){
                    $user = new usuario();
                    $user -> buildUsuario($data);
                    $_SESSION['user'] = serialize($user);
                    return true;
                } else {
                    return false;
                }
            }
        }
        
        public function logout(){
            session_destroy();
            unset($_SESSION['user']);
        }
        
        public function getMyUsr($link){
            $user = unserialize($_SESSION['user']);
            if($user!=null){
                $tipo = $user->getTipo();
                switch($tipo){
                    case('E'):
                        $str = "SELECT * FROM empresa WHERE usr_id=:id";
                        break;
                    case('P'):
                        $str = "SELECT * FROM persona WHERE usr_id=:id";
                        break;
                    case('O'):
                        $str = "SELECT * FROM emprendedor WHERE usr_id=:id";
                        break;
                }
                $st1 = $link -> prepare($str);
                $st1 -> bindParam(':id', $user->getId());
                $st1 -> execute();
                $data = $st1->fetch();
                if($data!=null){
                    switch($tipo){
                        case('E'):
                            $info = new empresa();
                            $info->buildEmpresa($data,$link);
                            break;
                        case('P'):
                            $info = new persona();
                            $info->buildPersona($data,$link);
                            break;
                        case('O'):
                            $info = new emprendedor();
                            $info->buildEmprendedor($data,$link);
                            break;
                    }
                    return $info; 
                } else {
                    return false;
                }
            }
        }
        
        public function searchUsr($usr_id, $link){
            $st = $link -> prepare("SELECT * FROM user WHERE id=:id AND estado='A'");
            $st -> bindParam(':id', $usr_id);
            $st -> execute();
            $data1 = $st->fetch();
            switch($data1['tipo']){
                case('E'):
                    $str = "SELECT * FROM empresa WHERE usr_id=:id";
                    break;
                case('P'):
                    $str = "SELECT * FROM persona WHERE usr_id=:id";
                    break;
                case('O'):
                    $str = "SELECT * FROM emprendedor WHERE usr_id=:id";
                    break;
            }
            $st1 = $link -> prepare($str);
            $st1 -> bindParam(':id', $usr_id);
            $st1 -> execute();
            $data = $st1->fetch();
            switch($data1['tipo']){
                case('E'):
                    $info = new empresa();
                    $info->buildEmpresa($data,$link);
                    break;
                case('P'):
                    $info = new persona();
                    $info->buildPersona($data,$link);
                    break;
                case('O'):
                    $info = new emprendedor();
                    $info->buildEmprendedor($data,$link);
                    break;
            }
            return $info;
        }   

        public function searchUsrById($usr_id, $link){
            $st = $link -> prepare("SELECT * FROM user WHERE id=:id AND estado='A'");
            $st -> bindParam(':id', $usr_id);
            $st -> execute();
            $data1 = $st->fetch();
            $user = new usuario;
            $user->buildUsuario($data1);
            return $user;
        }   
        
        public function searchUsrMsn($usr, $link){
            switch($usr->getTipo()){
                case('E'):
                    $str = "SELECT * FROM empresa WHERE usr_id=:id";
                    break;
                case('P'):
                    $str = "SELECT * FROM persona WHERE usr_id=:id";
                    break;
                case('O'):
                    $str = "SELECT * FROM emprendedor WHERE usr_id=:id";
                    break;
            }
            $st1 = $link -> prepare($str);
            $st1 -> bindParam(':id', $usr->getId());
            $st1 -> execute();
            $data = $st1->fetch();
            switch($usr->getTipo()){
                case('E'):
                    $info = new empresa();
                    $info->buildEmpresa($data,$link);
                    break;
                case('P'):
                    $info = new persona();
                    $info->buildPersona($data,$link);
                    break;
                case('O'):
                    $info = new emprendedor();
                    $info->buildEmprendedor($data,$link);
                    break;
            }
            return $info;
        }  
        
        public function searchPerfil($perfil, $link){
            $st1 = $link -> prepare("SELECT * FROM user WHERE id =:id");
            $st1 -> bindParam(':id', $perfil->getId());
            $st1 -> execute();
            $data = $st1->fetch();
            $user = new usuario();
            $user ->buildUsuario($data);
            return $user;
        }
        
        public function upImgPerf($link){
            $user = unserialize($_SESSION['user']);
            if($user!=null){
                $tipo = $user->getTipo();
                $uploader = new uploader();
                switch($tipo){
                    case('E'):
                        $str = "UPDATE empresa SET foto=:path WHERE usr_id=:id ";
                        $path = $uploader->uploadImgEmp();
                        break;
                    case('P'):
                        $str = "UPDATE persona SET foto=:path WHERE usr_id=:id ";
                        $path = $uploader->uploadImgPer();
                        break;
                    case('O'):
                        $str = "UPDATE emprendedor SET foto=:path WHERE usr_id=:id ";
                        $path = $uploader->uploadImgOmp();
                        break;
                }
                if(isset($path)){
                    $st = $link -> prepare($str);
                    $st -> bindParam(':path', $path);
                    $st -> bindParam(':id', $user->getId());
                    $state = $st -> execute();
                    return $state;
                } else {
                    return false;
                }             
            }
        }
        
        public function upEncPerf($link){
            $user = unserialize($_SESSION['user']);
            if($user!=null){
                $tipo = $user->getTipo();
                $uploader = new uploader();
                switch($tipo){
                    case('E'):
                        $str = "UPDATE empresa SET encabezado=:path WHERE usr_id=:id ";
                        $path = $uploader->uploadEncEmp();
                        break;
                    case('P'):
                        $str = "UPDATE persona SET encabezado=:path WHERE usr_id=:id ";
                        $path = $uploader->uploadEncPer();
                        break;
                    case('O'):
                        $str = "UPDATE emprendedor SET encabezado=:path WHERE usr_id=:id ";
                        $path = $uploader->uploadEncOmp();
                        break;
                } 
                if(isset($path)){
                    $st = $link -> prepare($str);
                    $st -> bindParam(':path', $path);
                    $st -> bindParam(':id', $user->getId());
                    $state = $st -> execute();
                    return $state;
                } else {
                    return false;
                }        
            }
        }
        
        public function upVidPerf($link){
            $user = unserialize($_SESSION['user']);
            if($user!=null){
                $tipo = $user->getTipo();
                $uploader = new uploader();
                switch($tipo){
                    case('E'):
                        $str = "UPDATE empresa SET video=:path WHERE usr_id=:id ";
                        $path = $uploader->uploadVidEmp();
                        break;
                    case('P'):
                        $str = "UPDATE persona SET video=:path WHERE usr_id=:id ";
                        $path = $uploader->uploadVidPer();
                        break;
                    case('O'):
                        $str = "UPDATE emprendedor SET video=:path WHERE usr_id=:id ";
                        $path = $uploader->uploadVidOmp();
                        break;
                } 
                if(isset($path)){
                    echo 'si';
                    $st = $link -> prepare($str);
                    $st -> bindParam(':path', $path);
                    $st -> bindParam(':id', $user->getId());
                    $state = $st -> execute();
                    return $state;
                } else {
                    return false;
                }    
            }
        }
        
        public function isLogged(){
            if (isset($_SESSION['user'])){
                return true;
            } else {
                return false;
            }
        }
        
        public function desactivar($link){}
        
        public function recuperarPsswd($usuario, $link){}
        
        public function cambiarPsswd($psswd,$link){
            $usr = unserialize($_SESSION['user']);
            $pass = md5($psswd);
            if($usr!=null){
                $st = $link -> prepare("UPDATE user SET contrasena=:pass WHERE id=:id AND email=:email AND username=:usrn AND estado='A'");
                $st -> bindParam(':pass', $pass);
                $st -> bindParam(':id', $usr->getId());
                $st -> bindParam(':email', $usr->getEmail());
                $st -> bindParam(':usrn', $usr->getUsername());
                $state = $st -> execute();
                return $state;
            }
        }
        
        public function cambiarMail($usuario, $link){}
        
        public function setAreaInt($area,$link){
            $usr = unserialize($_SESSION['user']);
            if($usr!=null){
                $st = $link -> prepare("INSERT INTO areas_interes (usr_id, area_id) VALUES (:usr,:area)");
                $st -> bindParam(':usr',$usr->getId());
                $st -> bindParam(':area',$area->getId()); 
                $state = $st -> execute();
                return $state;
            }
        }
        
        public function getAreasInt($link){
            $user = unserialize($_SESSION['user']);
            if($user!=null){
                $st = $link -> prepare("SELECT * FROM area WHERE id IN (SELECT area_id FROM areas_interes WHERE usr_id=:usr AND estado='A')");
                $st -> bindParam(':usr',$user->getId());
                $st -> execute();
                $data = $st -> fetchAll();
                $i=0;
                foreach ($data as $data){
                    $area = new area();
                    $area->buildArea($data);
                    $areas[$i] = $area;
                    unset($area);
                    $i++;
                }
                return $areas;
            }
        }
        
        public function delAreaInt($area,$link){
            $usr = unserialize($_SESSION['user']);
            if($usr!=null){
                $st = $link -> prepare("UPDATE areas_interes SET estado='I' WHERE usr_id=:usr AND area_id=:area");
                $st -> bindParam(':usr',$usr->getId());
                $st -> bindParam(':area',$area->getId()); 
                $state = $st -> execute();
                return $state;
            }
        }
        
        public function setTema($tema,$link){
            $user = unserialize($_SESSION['user']);
            if($user!=null){
                $tipo = $user->getTipo();
                switch($tipo){
                    case('E'):
                        $str = "UPDATE empresa SET tema=:tema WHERE usr_id=:id ";
                        break;
                    case('P'):
                        $str = "UPDATE persona SET tema=:tema WHERE usr_id=:id ";
                        break;
                    case('O'):
                        $str = "UPDATE emprendedor SET tema=:tema WHERE usr_id=:id ";
                        break;
                } 
                $st = $link -> prepare($str);
                $st -> bindParam(':tema', $tema->getId());
                $st -> bindParam(':id', $user->getId());
                $state = $st -> execute();
                return $state;       
            }
        }
        
        public function checkEmail($email,$link){
            $st = $link->prepare("SELECT * FROM user WHERE email=:email");
            $st -> bindParam(':email', $email);
            $st -> execute();
            $count = $st -> rowCount();
            if($count>0){
                echo 'Ya esta tomado este mail, intenta otro.';
                return false;
            } else {
                return true;
            }          
        }
        
        public function checkUsername($username,$link){
            $st = $link->prepare("SELECT * FROM user WHERE username=:username");
            $st -> bindParam(':username', $username);
            $st -> execute();
            $count = $st -> rowCount();
            if($count>0){
                echo 'Ya esta tomado este usuario, intenta otro.';
                return false;
            } else {
                return true;
            }          
        }
        
}