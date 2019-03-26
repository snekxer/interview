<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Competencias
 *
 * @author snekxer
 */
class competencias{
    
    private $curriculum;
    private $id;
    private $competencia;
    private $nivel;
    private $estado;

    
    function buildCompetencia($data, $link){
        $this->id = $data['id'] ?? '';
        $this->curriculum = $data['curr_id'] ?? '';
        $this->competencia = $data['nombre'] ?? '';
        $this->nivel = meta_global::getNivel($data['nivel'] ?? '',$link);
        $this->estado = $data['estado'] ?? '';
    }
    
    function getId() {
        return $this->id;
    }

    function getCompetencia() {
        return $this->competencia;
    }

    function getNivel() {
        return $this->nivel;
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

    function setCompetencia($competencia) {
        $this->competencia = $competencia;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



}
