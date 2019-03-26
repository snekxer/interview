<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Promocion
 *
 * @author snekxer
 */
abstract class promocion {
    private $id;
    private $producto;
    private $descripcion;
    private $tipo; //define el tipo de promocion que es. descuento, 2x1, etc
    private $concepto; // define el concepto de la promocion. cuanto descuento, cuantos gratis, etc
    private $estado;

     
    function getId() {
        return $this->id;
    }

    function getProducto() {
        return $this->producto;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getConcepto() {
        return $this->concepto;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setProducto($producto) {
        $this->producto = $producto;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setConcepto($concepto) {
        $this->concepto = $concepto;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



    
}
