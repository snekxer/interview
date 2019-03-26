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
class servicios_persona implements ServiciosInt{
    
    
    public function postServicio($serv, $comment, $valor, $link){
        if(servicios_persona::checkPost($serv,$link)){
            $user = unserialize($_SESSION['user']);
        $st = $link -> prepare("INSERT INTO servicios_pos (ser_id, pub_usr_id, pos_usr_id, comentario, valor) "
                . "VALUES (:serv, :pub, :pos, :com, :val)");
        $st -> bindParam(':serv', $serv->getId());
        $st -> bindParam(':pub', $serv->getUsuario()->getId());
        $st -> bindParam(':pos', $user->getId());
        $st -> bindParam(':com', $comment);
        $st -> bindParam(':val', $valor);
        if($st -> execute()){
                echo 'Postulado';
                return true;
            } else {
                echo 'Hubo un problema al postular. Intente nuevamente.';
                return false;
            }
        } else {
            echo 'Ya has postulado a este servicio';
            return false;
        }
    }
    
     public function checkPost($serv,$link){
        $per = usuario_global::getMyUsr($link);
        $st = $link -> prepare("SELECT pos_usr_id FROM servicios_pos WHERE ser_id=:ser AND pub_usr_id=:usr AND estado='A'");
        $st -> bindParam(':ser', $serv->getId());
        $st -> bindParam(':usr', $serv->getUsuario()->getId());
        $st -> execute();
        $data = $st -> fetch();
        if($data==null){
            return true;
        } else {
            return false;
        }        
    }
    
    public function delPostServicio($serv, $link){
        $user = unserialize($_SESSION['user']);
        $st = $link -> prepare("UPDATE servicios_pos SET estado='I' WHERE serv_id=:serv AND pub_usr_id=:pub"
                . " AND pos_usr_id=:pos");
        $st -> bindParam(':serv', $serv->getId());
        $st -> bindParam(':pub', $serv->getUsuario()->getId());
        $st -> bindParam(':pos', $user->getId());
        $st -> execute();
        $state = $st -> fetch();
       if($state){
                echo 'Postulación eliminada';
                return true;
            } else {
                echo 'Hubo un problema al eliminar la postulación. Intente nuevamente.';
                return false;
            }
    }
    
    public function getServicio($serv_id, $link){
        $st = $link -> prepare("SELECT * FROM servicios WHERE id=:id AND estado='A'");
        $st->bindParam(':id',$serv_id);
        $st->execute();
        $data = $st->fetch();
        if($data!=null){
            $serv = new servicio();
            $serv->buildServicio($data, $link);
            return $serv;
        } else {
            return false;
        }
    }
    public function getServicios($perfil, $link){
        $st = $link -> prepare("SELECT * FROM servicios WHERE usr_id=:id AND estado='A'");
        $st->bindParam(':id',$perfil->getId());
        $st->execute();
        $data = $st->fetchAll();
        $i = 0;
        if($data!=null){
            foreach($data as $data){
                $serv = new servicio();
                $serv->buildServicio($data, $link);
                $servs[$i] = $serv;
                unset($serv);
                $i++;
            }
            return $servs;
        } else {
            return false;
        }
    }
    
    function getPostulaciones($link){
        $usr = unserialize($_SESSION['user']);
        $st = $link -> prepare("SELECT * FROM servicios WHERE estado='A' AND id IN (SELECT ser_id FROM servicios_pos WHERE estado='A' AND pos_usr_id=:per)");
        $st->bindparam(':per', $usr->getId());
        $st -> execute();
        $data = $st-> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $ofer = new servicio();
                $ofer->buildServicio($data,$link);
                $ofers[$i] = $ofer;
                unset($ofer);
                $i++;
            }
            return $ofers;
        } else {
            return false;
        }
    }
    
    public function newServicio($serv, $link){}
    public function delServicio($serv, $link){}
    public function editServicio($serv, $link){}
    
    public function getPostulantes($serv, $link){}
    public function getAllPostulantes($serv){}
}
