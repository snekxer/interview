<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/** 
 * Description of Oferta
 *
 * @author snekxer
 */
class oferta {
    
    private $id; 
    private $empresa;
    private $titulo;
    private $descripcion;
    private $area;
    private $subarea;
    private $tipoContrato;
    private $discapacidad;
    private $modalidad; //presencial, remoto, etc
    private $pais;
    private $provincia;
    private $ciudad;
    private $renumeracion; //cada cuanto se paga;
    private $rangoDesde;  //cuanto se paga;
    private $rangoHasta;
    private $ingreso;
    private $estado;
    //requisitos
    private $genero;
    private $edad;
    private $experiencia;
    
    function buildOferta($data, $link){
        $this->id = $data['id'] ?? '';
        $this->empresa = empresa_global::getEmpresa($data['emp_id'] ?? '', $link);
        $this->titulo = $data['titulo'] ?? '';
        $this->descripcion = $data['descripcion'] ?? '';
        $this->area = meta_global::getArea($data['area'] ?? '', $link);
        $this->subarea = meta_global::getSubarea($data['subarea'] ?? '', $link);
        $this->tipoContrato = meta_global::getContrato($data['contrato'] ?? '',$link);
        $this->discapacidad = $data['discapacidad'] ?? '';
        $this->modalidad = meta_global::getModalidad($data['modalidad'] ?? '',$link);
        $this->pais = meta_global::getPais($data['pais'] ?? '', $link);
        $this->provincia = meta_global::getProvincia($data['provincia'] ?? '', $link);
        $this->ciudad = meta_global::getCiudad($data['ciudad'] ?? '', $link);
        $this->renumeracion = meta_global::getRenumeracion($data['renumeracion'] ?? '',$link);
        $this->rangoDesde = $data['rango_des'] ?? '';
        $this->rangoHasta = $data['rango_has'] ?? '';
        $this->genero = $data['genero'] ?? '';
        $this->edad = meta_global::getEdad($data['edad'] ?? '',$link);
        $this->experiencia = meta_global::getExp($data['experiencia'] ?? '',$link);
        $this->estado = $data['estado'] ?? '';
        $this->ingreso = $data['ingreso'] ?? '';
    }
    
    function buildOfertaEmpresa($data, $link){
        $this->id = $data['id'] ?? '';
        $this->empresa = empresa_empresa::getEmpresa($data['emp_id'] ?? '', $link);
        $this->titulo = $data['titulo'] ?? '';
        $this->descripcion = $data['descripcion'] ?? '';
        $this->area = meta_global::getArea($data['area'] ?? '', $link);
        $this->subarea = meta_global::getSubarea($data['subarea'] ?? '', $link);
        $this->tipoContrato = meta_global::getContrato($data['contrato'] ?? '',$link);
        $this->discapacidad = $data['discapacidad'] ?? '';
        $this->modalidad = meta_global::getModalidad($data['modalidad'] ?? '',$link);
        $this->pais = meta_global::getPais($data['pais'] ?? '', $link);
        $this->provincia = meta_global::getProvincia($data['provincia'] ?? '', $link);
        $this->ciudad = meta_global::getCiudad($data['ciudad'] ?? '', $link);
        $this->renumeracion = meta_global::getRenumeracion($data['renumeracion'] ?? '',$link);
        $this->rangoDesde = $data['rango_des'] ?? '';
        $this->rangoHasta = $data['rango_has'] ?? '';
        $this->genero = $data['genero'] ?? '';
        $this->edad = meta_global::getEdad($data['edad'] ?? '',$link);
        $this->experiencia = meta_global::getExp($data['experiencia'] ?? '',$link);
        $this->estado = $data['estado'] ?? '';
        $this->ingreso = $data['ingreso'] ?? '';
    }
    
    function name() {
         return get_class($this);
    }
    
    function getIngreso() {
        return $this->ingreso;
    }

    function getPaisRes() {
        return $this->paisRes;
    }

    function setIngreso($ingreso) {
        $this->ingreso = $ingreso;
    }

    function setPaisRes($paisRes) {
        $this->paisRes = $paisRes;
    }

    function getId() {
        return $this->id;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getArea() {
        return $this->area;
    }

    function getSubarea() {
        return $this->subarea;
    }

    function getTipoContrato() {
        return $this->tipoContrato;
    }

    function getSenority() {
        return $this->senority;
    }

    function getSucursal() {
        return $this->sucursal;
    }

    function getDiscapacidad() {
        return $this->discapacidad;
    }

    function getModalidad() {
        return $this->modalidad;
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

    function getEmail() {
        return $this->email;
    }

    function getRenumeracion() {
        return $this->renumeracion;
    }

    function getRangoDesde() {
        return $this->rangoDesde;
    }

    function getRangoHasta() {
        return $this->rangoHasta;
    }

    function getEstado() {
        return $this->estado;
    }

    function getGenero() {
        return $this->genero;
    }

    function getEdad() {
        return $this->edad;
    }

    function getExperiencia() {
        return $this->experiencia;
    }

    function getProvRes() {
        return $this->provRes;
    }

    function getCiuRes() {
        return $this->ciuRes;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setSubarea($subarea) {
        $this->subarea = $subarea;
    }

    function setTipoContrato($tipoContrato) {
        $this->tipoContrato = $tipoContrato;
    }

    function setSenority($senority) {
        $this->senority = $senority;
    }

    function setSucursal($sucursal) {
        $this->sucursal = $sucursal;
    }

    function setDiscapacidad($discapacidad) {
        $this->discapacidad = $discapacidad;
    }

    function setModalidad($modalidad) {
        $this->modalidad = $modalidad;
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

    function setEmail($email) {
        $this->email = $email;
    }

    function setRenumeracion($renumeracion) {
        $this->renumeracion = $renumeracion;
    }

    function setRangoDesde($rangoDesde) {
        $this->rangoDesde = $rangoDesde;
    }

    function setRangoHasta($rangoHasta) {
        $this->rangoHasta = $rangoHasta;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }


    function setEdad($edadHasta) {
        $this->edad = $edadHasta;
    }

    function setExperiencia($experiencia) {
        $this->experiencia = $experiencia;
    }

    function setProvRes($provRes) {
        $this->provRes = $provRes;
    }

    function setCiuRes($ciuRes) {
        $this->ciuRes = $ciuRes;
    }




}
