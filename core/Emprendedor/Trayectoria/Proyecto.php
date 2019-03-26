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
class tra_proyecto {
   
    private $trayectoria;
    private $id;
    private $nombre; //nombre de contratista del proyectp
    private $logo; //logo del contratista
    private $duracion;
    private $titulo; //titulo del proyecto
    private $descripcion;
    private $foto;
    private $estado;
    
    function buildTraProyecto($data){
        $this->id = $data['id'] ?? '';
        $this->trayectoria = $data['tra_id'] ?? '';
        $this->nombre = $data['emp_nombre'] ?? '';
        $this->logo = $data['emp_logo']  ?? '';
        $this->duracion = $data['duracion'] ?? '';
        $this->titulo = $data['titulo'] ?? '';
        $this->descripcion = $data['descripcion'] ?? '';
        $this->foto = $data['foto'] ?? '';
        $this->estado = $data['estado'] ?? '';
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

            
    function getTrayectoria() {
        return $this->trayectoria;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getLogo() {
        return $this->logo;
    }

    function getDuracion() {
        return $this->duracion;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFoto() {
        return $this->foto;
    }

    function setTrayectoria($trayectoria) {
        $this->trayectoria = $trayectoria;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

    function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }
    
}
