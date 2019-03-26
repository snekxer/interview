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
class portafolio_global implements PortafolioInt{
    public function getPortafolio($port_id, $link){
        $st = $link -> prepare("SELECT * FROM portafolio WHERE id=:port AND estado='A'");
        $st -> bindParam(':port', $port_id);
        $st -> execute();
        $data = $st -> fetch();
        if($data!=null){
            $port = new portafolio();
            $port->buildPortafolio($data, $link);
            return $port;
        } else {
            return false;
        }
    }
    
    public function getPortafolios($persona, $link){
        $st = $link -> prepare("SELECT * FROM portafolio WHERE per_id=:id AND estado='A'");
        $st -> bindParam(':id', $persona->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
        foreach ($data as $data){
            $port = new portafolio();
            $port->buildPortafolio($data, $link);
            $ports[$i] = $port;
            unset($port);
            $i++;
        }
        return $ports;
        } else {
            return false;
        }
    }
    
    public function newPortafolio($portafolio, $link){}
    public function delPortafolio($portafolio, $link){}
    public function editPortafolio($portafolio, $link){}
    
}
