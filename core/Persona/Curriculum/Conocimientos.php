<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conocimientos
 *
 * @author snekxer
 */
class conocimientos {
    
    private $curriculum;
    private $id;
    private $conocimiento;
    private $nivel;
    private $area;
    private $subarea;
    private $estado;

    
    function buildConocimiento($data, $link){
        $this->id = $data['id'] ?? '';
        $this->curriculum = $data['curr_id'] ?? '';
        $this->conocimiento = $data['nombre'] ?? '';
        $this->nivel = meta_global::getNivel($data['nivel'] ?? '',$link);
        $this->area = meta_global::getArea($data['area'] ?? '', $link);
        $this->subarea = meta_global::getSubarea($data['subarea'] ?? '', $link);
        $this->estado = $data['estado'] ?? '';
    }
    
    function getId() {
        return $this->id;
    }

    function getConocimiento() {
        return $this->conocimiento;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getArea() {
        return $this->area;
    }

    function getSubarea() {
        return $this->subarea;
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

    function setConocimiento($conocimiento) {
        $this->conocimiento = $conocimiento;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setSubarea($subarea) {
        $this->subarea = $subarea;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



    
}
