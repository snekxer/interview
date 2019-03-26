<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Notificaciones
 *
 * @author pauli
 */
class notificacion {
    private $areas;
    private $servicios;
    private $ofertas;
    
    function __construct($link) {
        $impl = new usuario_global;
        $areas = $impl->getAreasInt($link);
        if($areas!=null){
            $this->areas = $areas;
            $id = array();
            foreach ($areas as $area){
                array_push($id,$area->getId());
            }
            if(unserialize($_SESSION['user'])->getTipo()=='P'){
                $st = $link->prepare("SELECT * FROM ofertas WHERE estado='A' AND area IN (?) AND "
                . "( ( TO_DAYS(CURRENT_DATE()) - TO_DAYS(CONVERT(ingreso,DATE)) ) BETWEEN 0 AND 15 )"
                . " ORDER BY ingreso");
                $st->execute($id);
                $data = $st->fetchAll();
                $i=0;
                foreach($data as $data){
                    $ofer=new oferta();
                    $ofer->buildOferta($data, $link);
                    $ofers[$i]=$ofer;
                    unset($ofer);
                    $i++;
                }
                $this->ofertas = $ofers;
            }
            $st1 = $link->prepare("SELECT * FROM servicios WHERE estado='A' AND area IN (?) AND "
            . "( ( TO_DAYS(CURRENT_DATE()) - TO_DAYS(CONVERT(ingreso,DATE)) ) BETWEEN 0 AND 15 )"
            . " ORDER BY ingreso");
            //call_user_func(array($st1, "bindParam"),':areas', $id);
            //$st1->bindParam(':areas',$areas);
            $st1->execute($id);
            $data1 = $st1->fetchAll();
            $j=0;
            foreach($data1 as $data){
                $serv=new servicio();
                $serv->buildServicio($data, $link);
                $servs[$j]=$serv;
                unset($serv);
                $j++;
            }
            $this->servicios = $servs;
        }
    }
    
    function getAreas() {
        return $this->areas;
    }

    function getServicios() {
        return $this->servicios;
    }

    function getOfertas() {
        return $this->ofertas;
    }


}
