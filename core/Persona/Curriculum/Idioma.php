<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Idioma
 *
 * @author snekxer
 */
class idioma {
    
    private $curriculum;
    private $id;
    private $idioma;
    private $escrito;
    private $oral;
    private $estado;

    function buildIdioma($data,$link){
        $this->id = $data['id'] ?? '';
        $this->curriculum = $data['curr_id'] ?? '';
        $this->idioma = meta_global::getIdioma($data['idioma'] ?? '',$link);
        $this->escrito = meta_global::getNivel($data['escrito'] ?? '',$link);
        $this->oral = meta_global::getNivel($data['oral'] ?? '',$link);
        $this->estado = $data['estado'] ?? '';
    }
    
    function getId() {
        return $this->id;
    }

    function getIdioma() {
        return $this->idioma;
    }

    function getEscrito() {
        return $this->escrito;
    }

    function getOral() {
        return $this->oral;
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

    function setIdioma($idioma) {
        $this->idioma = $idioma;
    }

    function setEscrito($escrito) {
        $this->escrito = $escrito;
    }

    function setOral($oral) {
        $this->oral = $oral;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



    
}
