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
class trayectoria_global implements TrayectoriaInt{
    
    function getTrayectoria($omp, $link){
        $st = $link -> prepare("SELECT * FROM trayectoria WHERE omp_id=:id AND estado='A'");
        $st -> bindParam(':id', $omp->getId());
        $st -> execute();
        $data = $st -> fetch();
        $tra = new trayectoria();
        $tra ->buildTrayectoria($data, $link);
        return $tra;
    }
    
    function getGalerias($tra, $link){
        $st = $link -> prepare("SELECT * FROM tra_galeria WHERE tra_id=:id AND estado='A'");
        $st -> bindParam(':id', $tra->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $gal = new tra_galeria();
            $gal ->buildTraGaleria($data);
            $gals[$i] = $gal;
            unset($gal);
            $i++;
        }
        return $gals;
    }
    
    function getProyectos($tra,$link){
        $st = $link -> prepare("SELECT * FROM tra_proyecto WHERE tra_id=:id AND estado='A'");
        $st -> bindParam(':id', $tra->getEmprendedor()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $pro = new tra_proyecto();
            $pro ->buildTraProyecto($data);
            $pros[$i] = $pro;
            unset($pro);
            $i++;
        }
        return $pros;
    }
    
    
    function getAllTrayectoria($omp,$link){
        $tra = getTrayectoria($omp, $link);
        $gals = getGalerias($tra, $link);
        $pros = getProyectos($tra, $link);
        $array = array(
            $tra,
            $gals,
            $pros
        );
        return $array;
    }
    
    function getMyTra($link){}
    
    function newTrayectoria($omp, $link){}
    function newGaleria($tra, $link){}
    function newProyecto($tra,$link){}
 
    function delGaleria($tra, $link){}
    function delProyecto($tra,$link){}
    
    function editTrayectoria($omp, $link){}
    function editGaleria($tra, $link){}
    function editProyecto($tra,$link){}
    
}
