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
class historia_global implements HistoriaInt{
    function getHistoria($emp, $link){
        $st = $link -> prepare("SELECT * FROM historia WHERE emp_id=:emp AND estado='A'");
        $st -> bindParam(':emp', $emp->getId());
        $st -> execute();
        $data = $st -> fetch();
        $his = new historia($data);
        $his ->buildHistoria($data, $link);
        return $his;
    }
    
    function getGalerias($his, $link){
        $st = $link -> prepare("SELECT * FROM his_galeria WHERE emp_id=:his AND estado='A'");
        $st -> bindParam(':his', $his->getEmpresa()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $gal = new his_galeria();   
            $gal->buildHisGaleria($data);
            $gals[$i] = $gal;
            unset($gal);
            $i++;
        }
        return $gals;
    }
    
    function getProyectos($his,$link){
        $st = $link -> prepare("SELECT * FROM his_proyecto WHERE emp_id=:his AND estado='A'");
        $st -> bindParam(':his', $his->getEmpresa()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $pro = new his_proyecto();
            $pro->buildHisProyecto($data);
            $pros[$i] = $pro;
            unset($pro);
            $i++;
        }
        return $pros;
    }
    
    function getAllHistoria($emp, $link){
        $his = getHistoria($emp,$link);
        $gals = getGalerias($his, $link);
        $pros =  getProyectos($his,$link);
        $array = array(
            $his,
            $gals,
            $pros
        );
        return $array;
    }
    
    function getMyHis($link){}
    
    function newHistoria($emp, $link){}
    function newGaleria($his, $link){}
    function newProyecto($his,$link){}
 
    function delGaleria($gal, $link){}
    function delProyecto($pro,$link){}
    
    function editHistoria($emp, $link){}
    function editGaleria($gal, $link){}
    function editProyecto($pro,$link){}
}
