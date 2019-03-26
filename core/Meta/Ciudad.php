<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ciudad
 *
 * @author pauli
 */
class ciudad {
    private $id;
    private $nombre;
    private $prov_id;
    private $pais_id;
    
    function buildCiudad($data, $link){
        $this->id = $data['id'] ?? '' ;
        $this->nombre = $data['nombre'] ?? '';
        $this->prov_id = meta_global::getProvincia($data['prov_id'] ?? '', $link);
        $this->pais_id = meta_global::getPais($data['pais_id'] ?? '', $link);
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getProv_id() {
        return $this->prov_id;
    }

    function getPais_id() {
        return $this->pais_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setProv_id($prov_id) {
        $this->prov_id = $prov_id;
    }

    function setPais_id($pais_id) {
        $this->pais_id = $pais_id;
    }


}
