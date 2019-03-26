<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Educacion
 *
 * @author snekxer
 */
class educacion {
    
    private $curriculum;
    private $id;
    private $institucion;
    private $descripcion;
    private $fechaIni;
    private $fechaFin;
    private $titulo;
    private $nivel;
    private $estado;

    
    function buildEducacion($data,$link){
        $this->id = $data['id'] ?? '';
        $this->curriculum = $data['curr_id'] ?? '';
        $this->institucion = $data['institucion'] ?? '';
        $this->descripcion = $data['descripcion'] ?? '';
        $this->fechaIni = $data['fecha_ini'] ?? '';
        $this->fechaFin = $data['fecha_fin'] ?? '';
        $this->titulo = $data['titulo'] ?? '';
        $this->nivel = meta_global::getNivelEdu($data['nivel'] ?? '',$link);
        $this->estado = $data['estado'] ?? '';
        
    }
    
    function getCurriculum() {
        return $this->curriculum;
    }

    function getId() {
        return $this->id;
    }

    function getInstitucion() {
        return $this->institucion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFechaIni() {
        return $this->fechaIni;
    }

    function getFechaFin() {
        return $this->fechaFin;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getEstado() {
        return $this->estado;
    }

    function setCurriculum($curriculum) {
        $this->curriculum = $curriculum;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setInstitucion($institucion) {
        $this->institucion = $institucion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFechaIni($fechaIni) {
        $this->fechaIni = $fechaIni;
    }

    function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



    
}
