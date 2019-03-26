<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Area
 *
 * @author pauli
 */
class area {
    private $id;
    private $nombre;
    private $imgServ;
    private $imgOferF;
    private $imgOferM;
    
    function buildArea($data){
        $this->id = $data['id'] ?? '';
        $this->nombre = $data['nombre'] ?? '';
        $this->imgServ = $data['img_serv'] ?? '';
        $this->imgOferF = $data['img_oferF'] ?? '';
        $this->imgOferM = $data['img_oferM'] ?? '';
    }
    
    function getImg($oferta){
        $gen = $oferta->getGenero();
        $gens = array('F', 'M');
        switch($gen){
            case('F'):
                return $this->imgOferF;
            case('M'):
                return $this->imgOferM;
            default:
                $rand = array_rand($gens, 1);
                switch($rand){
                    case('F'):
                        return $this->imgOferF;
                    case('M'):
                        return $this->imgOferM;
                    default:
                        return $this->imgOferF;
                }
        }
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getImgServ() {
        return $this->imgServ;
    }

    function getImgOferF() {
        return $this->imgOferF;
    }

    function getImgOferM() {
        return $this->imgOferM;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setImgServ($imgServ) {
        $this->imgServ = $imgServ;
    }

    function setImgOferF($imgOferF) {
        $this->imgOferF = $imgOferF;
    }

    function setImgOferM($imgOferM) {
        $this->imgOferM = $imgOferM;
    }


}
