<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Servicio
 *
 * @author snekxer
 */
class servicio {
    
    private $id;
    private $usuario;
    private $titulo;
    private $descripcion;
    private $area;
    private $subarea;
    private $rangoDesde;
    private $rangoHasta;
    private $modalidad; //presencial, remoto, etc
    private $pais;
    private $provincia;
    private $ciudad;
    private $adjunto;
    private $ingreso;
    private $estado;

    
    function buildServicio($data, $link){
        $this->id = $data['id'] ?? '';
        $this->usuario = usuario_global::searchUsr($data['usr_id'] ?? '', $link);
        $this->titulo = $data['titulo'] ?? '';
        $this->descripcion = $data['descripcion'] ?? '';
        $this->area = meta_global::getArea($data['area'] ?? '', $link);
        $this->subarea = meta_global::getSubarea($data['subarea'] ?? '', $link);
        $this->rangoDesde = $data['rango_des'] ?? '';
        $this->rangoHasta = $data['rango_has'] ?? '';
        $this->modalidad = meta_global::getModalidad($data['modalidad'] ?? '',$link);
        $this->pais = meta_global::getPais($data['pais'] ?? '', $link);
        $this->provincia = meta_global::getProvincia($data['provincia'] ?? '', $link);
        $this->ciudad = meta_global::getCiudad($data['ciudad'] ?? '', $link);
        $this->adjunto = $data['adjunto'] ?? '';
        $this->ingreso = $data['ingreso'] ?? '';
        $this->estado = $data['estado'] ?? '';
    }
    
    function name() {
         return get_class($this);
    }
    
    function getId() {
        return $this->id;
    }

    function getUsuario() {
        return $this->usuario;
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

    function getRangoDesde() {
        return $this->rangoDesde;
    }

    function getRangoHasta() {
        return $this->rangoHasta;
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

    function getAdjunto() {
        return $this->adjunto;
    }

    function getIngreso() {
        return $this->ingreso;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
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

    function setRangoDesde($rangoDesde) {
        $this->rangoDesde = $rangoDesde;
    }

    function setRangoHasta($rangoHasta) {
        $this->rangoHasta = $rangoHasta;
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

    function setAdjunto($adjunto) {
        $this->adjunto = $adjunto;
    }

    function setIngreso($ingreso) {
        $this->ingreso = $ingreso;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



    
}
