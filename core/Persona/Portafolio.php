<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Portafolio
 *
 * @author snekxer
 */
class portafolio {
    private $id;
    private $persona;
    private $titulo;
    private $descripcion;
    private $imagen;
    private $ingreso;
    private $estado;

    
    function buildPortafolioPersona($data, $link){
        $this->id = $data['id'] ?? '';
        $this->persona = persona_persona::getPersona($data['per_id'] ?? '', $link);
        $this->titulo = $data['titulo'] ?? '';
        $this->descripcion = $data['descripcion'] ?? '';
        $this->imagen = $data['imagen'] ?? '';
        $this->ingreso = $data['ingreso'] ?? '';
        $this->estado = $data['estado'] ?? '';
    }
    
    function buildPortafolio($data, $link){
        $this->id = $data['id'] ?? '';
        $this->persona = persona_global::getPersona($data['per_id'] ?? '', $link);
        $this->titulo = $data['titulo'] ?? '';
        $this->descripcion = $data['descripcion'] ?? '';
        $this->imagen = $data['imagen'] ?? '';
        $this->ingreso = $data['ingreso'] ?? '';
        $this->estado = $data['estado'] ?? '';
    }
    
    function name() {
         return get_class($this);
    }
    
    function getPersona() {
        return $this->Persona;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getId() {
        return $this->id;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
        
    function setPersona($persona) {
        $this->persona = $persona;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }



}
