<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tag
 *
 * @author pauli
 */
class tag {
    private $id;
    private $usr;
    private $tag;
    private $tipo;
    private $estado;
    
    function getId() {
        return $this->id;
    }

    function getUsr() {
        return $this->usr;
    }

    function getTag() {
        return $this->tag;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsr($usr) {
        $this->usr = $usr;
    }

    function setTag($tag) {
        $this->tag = $tag;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}
