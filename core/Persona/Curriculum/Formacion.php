<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Formacion
 *
 * @author snekxer
 */
class formacion {
    
    private $curriculum;
    private $id;
    private $titulo;
    private $descripcion;
    private $institucion;
    private $tipo;
    private $fechaIni;
    private $fechaFin;
    private $duracion;
    private $estado;
    
    
    function buildFormacion($data){
        $this->id = $data['id'] ?? '';
        $this->curriculum = $data['curr_id'] ?? '';
        $this->titulo = $data['titulo'] ?? '';
        $this->descripcion = $data['descripcion'] ?? '';
        $this->institucion = $data['institucion'] ?? '';
        $this->tipo = $data['tipo'] ?? '';
        $this->fechaIni = $data['fecha_ini'] ?? '';
        $this->fechaFin = $data['fecha_fin'] ?? '';
        $this->duracion = $data['duracion'] ?? '';
        $this->estado = $data['estado'] ?? '';
    }
    
    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getInstitucion() {
        return $this->institucion;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getFechaIni() {
        return $this->fechaIni;
    }

    function getFechaFin() {
        return $this->fechaFin;
    }

    function getDuracion() {
        return $this->duracion;
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

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setInstitucion($institucion) {
        $this->institucion = $institucion;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setFechaIni($fechaIni) {
        $this->fechaIni = $fechaIni;
    }

    function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }

    function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



}
