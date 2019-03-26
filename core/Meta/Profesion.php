<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Profesion
 *
 * @author pauli
 */
class profesion {
    private $id;
    private $nombre;
    //private $tipo;
    //private $ingreso;
    //private $estado;
    
    function buildProfesion($data){
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
