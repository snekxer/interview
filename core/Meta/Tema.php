<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tema
 *
 * @author pauli 
 */
class tema {
    private $id;
    private $nombre;
    private $img;
    private $color;
    private $colorDeg;
    private $colorDeg1;
    private $colorBg;
    private $encabezado;
    private $text;
    
    function buildTema($data){
        $this->id = $data['id'] ?? '';
        $this->nombre = $data['nombre'] ?? '';
        $this->img = $data['img'] ?? '';
        $this->color = $data['color'] ?? '';
        $this->colorDeg = $data['color_deg'] ?? '';
        $this->colorDeg1 = $data['color_deg1'] ?? '';
        $this->colorBg = $data['color_bg'] ?? '';
        $this->encabezado = $data['enc'] ?? '';
        $this->text = $data['text'] ?? '';
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getImg() {
        return $this->img;
    }

    function getColor() {
        return $this->color;
    }

    function getColorDeg() {
        return $this->colorDeg;
    }

    function getColorDeg1() {
        return $this->colorDeg1;
    }

    function getColorBg() {
        return $this->colorBg;
    }

    function getEncabezado() {
        return $this->encabezado;
    }

    function getText() {
        return $this->text;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setImg($img) {
        $this->img = $img;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setColorDeg($colorDeg) {
        $this->colorDeg = $colorDeg;
    }

    function setColorDeg1($colorDeg1) {
        $this->colorDeg1 = $colorDeg1;
    }

    function setColorBg($colorBg) {
        $this->colorBg = $colorBg;
    }

    function setEncabezado($encabezado) {
        $this->encabezado = $encabezado;
    }

    function setText($text) {
        $this->text = $text;
    }


}
