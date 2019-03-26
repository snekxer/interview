<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Galeria
 *
 * @author snekxer
 */
class his_galeria {
    
    private $historia;
    private $id;
    private $titulo;
    private $descripcion;
    private $foto;
    private $estado;
    
    function buildHisGaleria($data){
        $this->historia = $data['emp_id'] ?? '';
        $this->id = $data['id'] ?? '';
        $this->titulo = $data['titulo'] ?? '';
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

    function getTitulo() {
        return $this->titulo;
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

    function setTitulo($titulo) {
        $this->titulo = $titulo;
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
