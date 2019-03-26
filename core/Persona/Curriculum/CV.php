<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CV
 *
 * @author pauli
 */
class CV {
    private $curriculum;
    private $competencias;
    private $conocimientos;
    private $educacion;
    private $experiencia;
    private $formacion;
    private $idioma;
    private $referencias;
    
    function buildCV($per_id, $link) {
        $currl = new curriculum_global;
        $this->curriculum = $currl->getCurriculumFromId($per_id, $link);
        $this->competencias = $currl->getCompetencias($this->curriculum, $link);
        $this->conocimientos = $currl->getConocimientos($this->curriculum, $link);
        $this->educacion = $currl->getEducacion($this->curriculum, $link);
        $this->experiencia = $currl->getExperiencia($this->curriculum, $link);
        $this->formacion = $currl->getFormacion($this->curriculum, $link);
        $this->idioma = $currl->getIdiomas($this->curriculum, $link);
        $this->referencias = $currl->getReferencias($this->curriculum, $link);
    }
    
    function buildCVPersona($per_id, $link) {
        $currl = new curriculum_persona;
        $this->curriculum = $currl->getCurriculumFromId($per_id, $link);
        $this->competencias = $currl->getCompetencias($this->curriculum, $link);
        $this->conocimientos = $currl->getConocimientos($this->curriculum, $link);
        $this->educacion = $currl->getEducacion($this->curriculum, $link);
        $this->experiencia = $currl->getExperiencia($this->curriculum, $link);
        $this->formacion = $currl->getFormacion($this->curriculum, $link);
        $this->idioma = $currl->getIdiomas($this->curriculum, $link);
        $this->referencias = $currl->getReferencias($this->curriculum, $link);
    }

    
    function getCurriculum() {
        return $this->curriculum;
    }

    function getCompetencias() {
        return $this->competencias;
    }

    function getConocimientos() {
        return $this->conocimientos;
    }

    function getEducacion() {
        return $this->educacion;
    }

    function getExperiencia() {
        return $this->experiencia;
    }

    function getFormacion() {
        return $this->formacion;
    }

    function getIdioma() {
        return $this->idioma;
    }

    function getReferencias() {
        return $this->referencias;
    }


    
}
