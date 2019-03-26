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
class ofertas_global implements OfertasInt{
    
    public function getOferta($ofer_id, $link){
        $st = $link -> prepare("SELECT * FROM ofertas WHERE id=:id AND estado='A'");
        $st -> bindParam(':id', $ofer_id);
        $st -> execute();
        $data = $st->fetch();
        if($data!=null){
            $ofer = new oferta();
            $ofer -> buildOferta($data,$link);
            return $ofer;
        } else {
            return false;
        }
    }
    
    public function getOfertas($empresa, $link){
        $id = $empresa->getId();
        $st = $link -> prepare("SELECT * FROM ofertas WHERE emp_id=:id AND estado='A'");
        $st -> bindParam(':id', $id);
        $st -> execute();
        $data = $st->fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $ofer = new oferta();
                $ofer -> buildOferta($data,$link);
                $ofertas[$i] = $ofer;
                unset($ofer);
                $i++;
            }
            return $ofertas;
        } else {
            return false;
        }
    }
    
    public function postOferta($oferta,$link){}
    public function delPostOferta($oferta, $link){}
    
    public function newOferta($oferta, $link){}
    public function delOferta($oferta, $link){}
    public function editOferta($oferta, $link){}
    
    public function getPostulantes($oferta, $link){}
    public function getAllPostulantes($link){}
    public function filtrarPostulantes ($filtrosP, $filtrosC, $edu, $idiomas, $areas, $oferta, $link){}
}
