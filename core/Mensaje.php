<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mensaje
 *
 * @author snekxer
 */
class mensaje {
    
    private $id;
    private $emisor;
    private $receptor;
    private $leido;
    private $leido_ingreso;
    private $contenido;
    private $ingreso;
    private $estado;

    
    function buildMensaje($data, $link){
        $this->id = $data['id'] ?? '';
        $this->emisor = usuario_global::searchUsr($data['usr_emisor'] ?? '', $link);
        $this->receptor = usuario_global::searchUsr($data['usr_receptor'] ?? '', $link);
        $this->contenido = $data['mensaje'] ?? '';
        $this->ingreso = $data['ingreso' ?? ''];
        //$this->leido = $data['leido'] ?? '';
        //$this->leido_ingreso = $data['leido_ingreso'] ?? '';
        $this->estado = $data['estado'] ?? '';
    }
    
    function getId() {
        return $this->id;
    }

    function getEmisor() {
        return $this->emisor;
    }

    function getReceptor() {
        return $this->receptor;
    }

    function getLeido() {
        return $this->leido;
    }

    function getLeido_ingreso() {
        return $this->leido_ingreso;
    }

    function getContenido() {
        return $this->contenido;
    }

    function getIngreso() {
        return $this->ingreso;
    }

    function getEstado() {
        return $this->estado;
        
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmisor($emisor) {
        $this->emisor = $emisor;
    }

    function setReceptor($receptor) {
        $this->receptor = $receptor;
    }

    function setLeido($leido) {
        $this->leido = $leido;
    }

    function setLeido_ingreso($leido_ingreso) {
        $this->leido_ingreso = $leido_ingreso;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    function setIngreso($ingreso) {
        $this->ingreso = $ingreso;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}
