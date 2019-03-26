<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author snekxer
 */
class producto {
    
    private $id;
    private $titulo;
    private $descripcion;
    private $imagen;
    private $empresa;
    private $estado;

    
    function buildProducto($data, $link){
        $this->id = $data['id'] ?? '';
        $this->empresa = usuario_global::searchUsr($data['usr_id'] ?? '', $link);
        $this->titulo = $data['titulo'] ?? '';
        $this->descripcion = $data['descripcion'] ?? '';
        $this->imagen = $data['imagen'] ?? '';
        $this->ingreso = $data['ingreso'] ?? '';
        $this->estado = $data['estado'] ?? '';
    }
    
    function name() {
         return get_class($this);
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

    function getImagen() {
        return $this->imagen;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function getEstado() {
        return $this->estado;
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

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


    

}
