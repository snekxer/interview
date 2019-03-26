<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Subarea
 *
 * @author pauli
 */
class subarea {
    private $id;
    private $area;
    private $nombre;
    
    function buildSubarea($data, $link){
        $this->id = $data['id'] ?? '';
        $this->area = meta_global::getArea($data['area_id'] ?? '', $link);
        $this->nombre = $data['nombre'] ?? '';
    }
    
    function getId() {
        return $this->id;
    }

    function getArea() {
        return $this->area;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


    
}
