<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Edad
 *
 * @author pauli
 */
class edad {
    private $id;
    private $nombre;
    
    function buildEdad($data){
        $this->id = $data['id'] ?? '';
        $this->nombre = $data['nombre'] ?? '';
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}
