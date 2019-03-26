<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Historia
 *
 * @author snekxer
 */
class historia {
    
    private $empresa;
    private $quienesSomos;
    private $mision;
    private $vision;    
    private $contacto;
    private $valores;
    private $slogan;
    private $estado;
    
    function buildHistoria($data, $link){ 
        $this->empresa = empresa_global::getEmpresa($data['emp_id'] ?? '', $link);
        $this->quienesSomos = $data['quienes_somos'] ?? '';
        $this->mision = $data['mision'] ?? '';
        $this->vision = $data['vision'] ?? '';
        $this->contacto = $data['contacto'] ?? '';
        $this->valores = $data['valores'] ?? '';
        $this->slogan = $data['slogan'] ?? '';
        $this->estado = $data['estado'] ?? '';
    }
    
    function buildHistoriaEmpresa($data, $link){ 
        $this->empresa = empresa_empresa::getEmpresa($data['emp_id'] ?? '', $link);
        $this->quienesSomos = $data['quienes_somos'] ?? '';
        $this->mision = $data['mision'] ?? '';
        $this->vision = $data['vision'] ?? '';
        $this->contacto = $data['contacto'] ?? '';
        $this->valores = $data['valores'] ?? '';
        $this->slogan = $data['slogan'] ?? '';
        $this->estado = $data['estado'] ?? '';
    }
    
    function getSlogan() {
        return $this->slogan;
    }

    function setSlogan($slogan) {
        $this->slogan = $slogan;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function getId() {
        return $this->id;
    }

    function getQuienesSomos() {
        return $this->quienesSomos;
    }

    function getMision() {
        return $this->mision;
    }

    function getVision() {
        return $this->vision;
    }

    function getContacto() {
        return $this->contacto;
    }

    function getValores() {
        return $this->valores;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setQuienesSomos($quienesSomos) {
        $this->quienesSomos = $quienesSomos;
    }

    function setMision($mision) {
        $this->mision = $mision;
    }

    function setVision($vision) {
        $this->vision = $vision;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    function setValores($valores) {
        $this->valores = $valores;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



    
}
