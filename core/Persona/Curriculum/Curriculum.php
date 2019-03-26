<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Curriculum
 *
 * @author snekxer
 */
class curriculum {
    
    private $persona;
    private $id;
    private $aspSalarial;
    private $dispTiempo;
    private $discapacidad;
    private $discapacidadDetalle;
    private $situacionAct;
    private $licencia;
    private $estado;

    
    function buildCurriculum($data, $link) {
        $this->id = $data['id'] ?? '';
        $this->persona = persona_global::getPersona($data['per_id'] ?? '', $link);
        $this->aspSalarial = meta_global::getRangoSal($data['asp_salarial'] ?? '',$link);
        $this->dispTiempo = meta_global::getDispTiempo($data['disp_tiempo'] ?? '',$link);
        $this->discapacidad = $data['discapacidad'] ?? '';
        $this->discapacidadDetalle = $data['discapacidad_detalle'] ?? '';
        $this->situacionAct = $data['sit_actual'] ?? '';
        $this->licencia = meta_global::getLicencia($data['licencia'] ?? '',$link);
        $this->estado = $data['estado'] ?? '';
    }

    function buildCurriculumPersona($data, $link) {
        $this->id = $data['id'] ?? '';
        $this->persona = persona_persona::getPersona($data['per_id'] ?? '', $link);
        $this->aspSalarial = meta_global::getRangoSal($data['asp_salarial'] ?? '',$link);
        $this->dispTiempo = meta_global::getDispTiempo($data['disp_tiempo'] ?? '',$link);
        $this->discapacidad = $data['discapacidad'] ?? '';
        $this->discapacidadDetalle = $data['discapacidad_detalle'] ?? '';
        $this->situacionAct = $data['sit_actual'] ?? '';
        $this->licencia = meta_global::getLicencia($data['licencia'] ?? '',$link);
        $this->estado = $data['estado'] ?? '';
    }
    
    function getPersona() {
        return $this->persona;
    }

    function getId() {
        return $this->id;
    }

    function getAspSalarial() {
        return $this->aspSalarial;
    }

    function getDispTiempo() {
        return $this->dispTiempo;
    }

    function getDiscapacidad() {
        return $this->discapacidad;
    }

    function getDiscapacidadDetalle() {
        return $this->discapacidadDetalle;
    }

    function getSituacionAct() {
        return $this->situacionAct;
    }

    function getLicencia() {
        return $this->licencia;
    }

    function getEstado() {
        return $this->estado;
    }

    function setPersona($persona) {
        $this->persona = $persona;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAspSalarial($aspSalarial) {
        $this->aspSalarial = $aspSalarial;
    }

    function setDispTiempo($dispTiempo) {
        $this->dispTiempo = $dispTiempo;
    }

    function setDiscapacidad($discapacidad) {
        $this->discapacidad = $discapacidad;
    }

    function setDiscapacidadDetalle($discapacidadDetalle) {
        $this->discapacidadDetalle = $discapacidadDetalle;
    }

    function setSituacionAct($situacionAct) {
        $this->situacionAct = $situacionAct;
    }

    function setLicencia($licencia) {
        $this->licencia = $licencia;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



}

