<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MensajeUsr
 *
 * @author pauli
 */
class mensajeUsr {
    private $usr;
    private $ingreso;
    
    function buildMsnUsr($data){
        $this->usr = $data['usr_id'] ?? '';
        $this->ingreso = $data['ingreso'] ?? '';
    }
    
    function getUsr() {
        return $this->usr;
    }

    function getIngreso() {
        return $this->ingreso;
    }

    function setUsr($usr) {
        $this->usr = $usr;
    }

    function setIngreso($ingreso) {
        $this->ingreso = $ingreso;
    }


}
