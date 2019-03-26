<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Proyectos
 *
 * @author snekxer
 */
class his_proyecto {
    
    private $historia;
    private $id;
    private $nombre; //nombre de la empresa para la que se desarrollo el poryecto
    private $logo; //logo de la empresa o entidad para la cual se desarrollo el proyecto
    private $proyecto; //nombre del proyecto
    private $descripcion;
    private $foto;
    private $estado;

    function buildHisProyecto($data){
        $this->id = $data['id'] ?? '';
        $this->historia = $data['emp_id'] ?? '';
        $this->nombre = $data['emp_nombre'] ?? '';
        $this->logo = $data['emp_logo'] ?? '';
        $this->proyecto = $data['proyecto'] ?? '';
        $this->descripcion = $data['descripcion'] ?? '';
        $this->foto = $data['foto'] ?? '';
        $this->estado = $data['estado'] ?? '';
    }
    
    function getHistoria() {
        return $this->historia;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getLogo() {
        return $this->logo;
    }

    function getProyecto() {
        return $this->proyecto;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFoto() {
        return $this->foto;
    }

    function getEstado() {
        return $this->estado;
    }

    function setHistoria($historia) {
        $this->historia = $historia;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

    function setProyecto($proyecto) {
        $this->proyecto = $proyecto;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
}
