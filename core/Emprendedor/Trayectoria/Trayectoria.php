<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Trayectoria
 *
 * @author snekxer
 */
class trayectoria {
    
    private $emprendedor;
    private $acercaDe;
    private $contacto;
    private $estado;
    
    function buildTrayectoria($data, $link){
        $this->emprendedor = emprendedor_global::getEmprendedor($data['omp_id'] ?? '', $link);
        $this->acercaDe = $data['acerca_de'] ?? '';
        $this->contacto = $data['contacto'] ?? '';
        $this->estado = $data['estado'] ?? '';
    }
    
    function buildTrayectoriaEmprendedor($data, $link){
        $this->emprendedor = emprendedor_emprendedor::getEmprendedor($data['omp_id'] ?? '', $link);
        $this->acercaDe = $data['acerca_de'] ?? '';
        $this->contacto = $data['contacto'] ?? '';
        $this->estado = $data['estado'] ?? '';
    }
   
    function getEmprendedor() {
        return $this->emprendedor;
    }

    function getAcercaDe() {
        return $this->acercaDe;
    }

    function getContacto() {
        return $this->contacto;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEmprendedor($emprendedor) {
        $this->emprendedor = $emprendedor;
    }

    function setAcercaDe($acercaDe) {
        $this->acercaDe = $acercaDe;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



    
}
