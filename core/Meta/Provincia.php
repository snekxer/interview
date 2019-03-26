<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Provincia
 *
 * @author pauli
 */
class provincia {
    private $id;
    private $pais;
    private $nombre;
    
    function buildProvincia($data, $link){
        $this->id = $data['id'] ?? '';
        $this->pais = meta_global::getPais($data['pais_id'] ?? '', $link);
        $this->nombre = $data['nombre']?? '';
    }
    
    function getId() {
        return $this->id;
    }

    function getPais() {
        return $this->pais;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}
