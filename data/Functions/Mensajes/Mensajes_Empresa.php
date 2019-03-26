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
class mensajes_empresa implements MensajesInt{
    public function sendMensaje($msn, $link){
        $myuser = unserialize($_SESSION['user']);       
            $st = $link -> prepare("INSERT INTO mensajes (usr_emisor, usr_receptor, mensaje) VALUES (:myid, :usr, :msn)");
            $st -> bindParam(':myid', $myuser -> getId());
            $st -> bindParam(':usr', $msn -> getReceptor());
            $st -> bindParam(':msn', $msn-> getContenido());
            $state = $st -> execute();
                
            return $state;
            
    }
    
    public function activity($link){
        $user = unserialize($_SESSION['user']);
        $st = $link -> prepare("SELECT * FROM mensajes_usr WHERE usr_id=:usr");
        $st->bindParam(':usr',$user->getId());
        $st->execute();
        $count = $st -> rowCount();
        if($count>0){
            $s = $link -> prepare("UPDATE mensajes_usr SET ingreso=NOW()");
            $state = $s -> execute();
            return $state;
        } else {
            $s = $link -> prepare("INSERT INTO mensajes_usr (usr_id,ingreso) VALUES (:id, NOW())");
            $st->bindParam(':id',$user->getId());
            $state = $s -> execute();
            return $state;
        }
    }
    
    public function getLastActivity($user,$link){
        //QUERY dice si el usuario NO ha ingresado en los 30 ultimos segundos. Si retorna algo, esta inactivo.
        $st = $link -> prepare("SELECT * FROM mensajes_usr WHERE usr_id=:usr AND ingreso < SUBTIME(NOW(),'1:0:30')");
        $st->bindParam(':usr',$user->getId());
        $st -> execute();
        $count = $st->rowCount();
        if ($count>0){
            return false;
        }else{
            return true;
        }
    }
    
    public function getUsrs($link){
        $myuser = unserialize($_SESSION['user']);
        $q = $link->prepare("SELECT * FROM user WHERE id IN((SELECT DISTINCT usr_emisor FROM mensajes WHERE usr_receptor=:myid AND estado='A'), (SELECT DISTINCT usr_receptor FROM mensajes WHERE usr_emisor=:myid1 AND estado='A'))");
        $q -> bindParam(':myid', $myuser -> getId());
        $q -> bindParam(':myid1', $myuser -> getId());
        $q -> execute();
        $data = $q->fetchAll();
        $i=0;
        if($data != null){
            foreach ($data as $data){
                $user = new usuario();
                $user->buildUsuario($data);
                $users[$i]=$user;
                unset($user);
                $i++;
            }
            return $users;
        } else {
            return false;
        }
    }
    
    public function getMensajesFromUsr($user, $link){
        $myuser = unserialize($_SESSION['user']);
        $q = $link->prepare("SELECT * FROM mensajes WHERE usr_emisor IN (:rec, :myid) AND usr_receptor IN (:rec1, :myid1) AND estado='A' ORDER BY ingreso");
        $q -> bindParam(':myid', $myuser -> getId());
        $q -> bindParam(':rec', $user -> getId());
        $q -> bindParam(':myid1', $myuser -> getId());
        $q -> bindParam(':rec1', $user -> getId());
        $q -> execute();
        $data = $q ->fetchAll();
        $i=0;
        foreach ($data as $data){
            $user = new mensaje();
            $user->buildMensaje($data,$link);
            $users[$i]=$user;
            unset($user);
            $i++;
        }
        return $users;
    }
    
    public function getNewMensajes($mensajes,$user, $link){
        if(getLastActivity($user,$link)){
            $new = getMensajesFromUsr($user,$link);
            $i=0;
            foreach($mensajes as $old){
                $msn = new mensaje();
                $msns = array();
                if(!($old===$new[$i])){
                    array_push($msns, $msn);
                }
                $i++;
            }
            return $msns;
        } else {
            return false;
        }
            
    }
}
