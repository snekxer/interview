<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Referencias
 *
 * @author snekxer
 */
class referencias {
    
    private $curriculum;
    private $id;
    private $nombre;
    private $telefono;
    private $email;
    private $relacion;
    private $estado;

    
    function buildReferencia($data){
        $this->id = $data['id'] ?? '';
        $this->curriculum = $data['curr_id'] ?? '';
        $this->nombre = $data['nombre'] ?? '';
        $this->telefono = $data['telefono'] ?? '';
        $this->email = $data['email'] ?? '';
        $this->relacion = $data['relacion'] ?? '';
        $this->estado = $data['estado'] ?? '';
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getRelacion() {
        return $this->relacion;
    }

    function getEstado() {
        return $this->estado;
    }
    
    function getCurriculum() {
        return $this->curriculum;
    }

    function setCurriculum($curriculum) {
        $this->curriculum = $curriculum;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setRelacion($relacion) {
        $this->relacion = $relacion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



}
