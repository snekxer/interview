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
class ofertas_persona implements OfertasInt{
    
    public function postOferta($oferta,$link){
        if(ofertas_persona::checkPost($oferta,$link)){
            $per = usuario_global::getMyUsr($link);
            $st = $link -> prepare("INSERT INTO ofertas_pos (ofer_id, emp_id, per_id) VALUES (:ofer,:emp,:per)");
            $st -> bindParam(':ofer', $oferta->getId());
            $st -> bindParam(':emp', $oferta->getEmpresa()->getId());
            $st -> bindParam(':per',$per->getId());
            if($st -> execute()){
                echo 'Postulado';
                return true;
            } else {
                echo 'Hubo un problema al postular. Intente nuevamente.';
                return false;
            }
        } else {
            echo 'Ya has postulado a esta oferta';
            return false;
        }
    }
    
    public function checkPost($oferta,$link){
        $per = usuario_global::getMyUsr($link);
        $st = $link -> prepare("SELECT per_id FROM ofertas_pos WHERE ofer_id=:ofer AND emp_id=:emp AND per_id=:id AND estado='A'");
        $st -> bindParam(':id', $per->getId());
        $st -> bindParam(':ofer', $oferta->getId());
        $st -> bindParam(':emp', $oferta->getEmpresa()->getId());
        $st -> execute();
        $data = $st -> fetch();
        if($data==null){
            return true;
        } else {
            return false;
        }
    }
    
    public function delPostOferta($oferta, $link){
        $per = usuario_global::getMyUsr($link);
        $st = $link -> prepare("UPDATE ofertas_pos SET estado='I' WHERE 
                ofer_id=:ofer AND emp_id=:emp AND per_id:per");
        $st -> bindParam(':ofer', $oferta->getId());
        $st -> bindParam(':emp', $oferta->getEmpresa()->getId());
        $st -> bindParam(':per',$per->getId());
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
    
    function getPostulaciones($link){
        $usr = usuario_global::getMyUsr($link);
        $st = $link -> prepare("SELECT * FROM ofertas WHERE estado='A' AND id IN (SELECT ofer_id FROM ofertas_pos WHERE estado='A' AND per_id=:per)");
        $st->bindparam(':per', $usr->getId());
        $st -> execute();
        $data = $st-> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $ofer = new oferta();
                $ofer->buildOferta($data,$link);
                $ofers[$i] = $ofer;
                unset($ofer);
                $i++;
            }
            return $ofers;
        } else {
            return false;
        }
    }
    
    public function newOferta($oferta, $link){}
    public function delOferta($oferta, $link){}
    public function editOferta($oferta, $link){}
    public function filtrarPostulantes ($filtrosP, $filtrosC, $edu, $idiomas, $areas, $oferta, $link){}
    
    public function getPostulantes($oferta, $link){}
    public function getAllPostulantes($link){}
    
}
