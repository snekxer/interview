<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Experiencia
 *
 * @author snekxer
 */
class experiencia {
    
    private $curriculum;
    private $id;
    private $empresa;
    private $fechaIni;
    private $fechaFin;
    private $cargo;
    private $area;
    private $subarea;
    private $pais;
    private $provincia;
    private $ciudad;
    private $empresaIndustria;
    private $descripcionCargo;
    private $descripcionFunciones;
    //referencia del trabajo
    private $nombre;
    private $relacion;
    private $telefono;
    private $email;    
    private $estado;
    
    function buildExperiencia($data, $link){
        $this->id = $data['id'] ?? '';
        $this->curriculum = $data['curr_id'] ?? '';
        $this->empresa = $data['empresa'] ?? '';
        $this->fechaIni = $data['fecha_ini'] ?? '';
        $this->fechaFin = $data['fecha_fin'] ?? '';
        $this->cargo = $data['cargo'] ?? '';
        $this->area = meta_global::getArea($data['area'] ?? '', $link);
        $this->subarea = meta_global::getSubarea($data['subarea'] ?? '', $link);
        $this->pais = meta_global::getPais($data['pais'] ?? '', $link);
        $this->provincia = meta_global::getProvincia($data['provincia'] ?? '', $link);
        $this->ciudad = meta_global::getCiudad($data['ciudad'] ?? '', $link);
        $this->empresaIndustria = meta_global::getIndustria($data['industria'] ?? '', $link);
        $this->descripcionCargo = $data['descripcion_cargo'] ?? '';
        $this->descripcionFunciones = $data['descripcion_funciones'] ?? '';
        $this->nombre = $data['ref_nombre'] ?? '';
        $this->relacion = $data['ref_relacion'] ?? '';
        $this->telefono = $data['ref_telefono'] ?? '';
        $this->email = $data['ref_email'] ?? '';
        $this->estado = $data['estado'] ?? '';
    }
    
    function getId() {
        return $this->id;
    }

    function getEstado() {
        return $this->estado;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function getFechaIni() {
        return $this->fechaIni;
    }

    function getFechaFin() {
        return $this->fechaFin;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getArea() {
        return $this->area;
    }

    function getSubarea() {
        return $this->subarea;
    }

    function getPais() {
        return $this->pais;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getEmpresaIndustria() {
        return $this->empresaIndustria;
    }

    function getDescripcionCargo() {
        return $this->descripcionCargo;
    }

    function getDescripcionFunciones() {
        return $this->descripcionFunciones;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getRelacion() {
        return $this->relacion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
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

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    function setFechaIni($fechaIni) {
        $this->fechaIni = $fechaIni;
    }

    function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setSubarea($subarea) {
        $this->subarea = $subarea;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setEmpresaIndustria($empresaIndustria) {
        $this->empresaIndustria = $empresaIndustria;
    }

    function setDescripcionCargo($descripcionCargo) {
        $this->descripcionCargo = $descripcionCargo;
    }

    function setDescripcionFunciones($descripcionFunciones) {
        $this->descripcionFunciones = $descripcionFunciones;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setRelacion($relacion) {
        $this->relacion = $relacion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }



    
    
}
