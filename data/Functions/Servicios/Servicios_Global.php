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
class servicios_global implements ServiciosInt{
    
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
    
    public function postServicio($serv, $comment, $valor, $link){}
    public function delPostServicio($serv, $link){}
    
    public function newServicio($serv, $link){}
    public function delServicio($serv, $link){}
    public function editServicio($serv, $link){}
    
    public function getPostulantes($serv, $link){}
    public function getAllPostulantes($serv){}
    
    
}
