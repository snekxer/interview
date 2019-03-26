<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Emprendedor
 *
 * @author snekxer
 */

class emprendedor {
    
    private $emailContacto; 
    private $telefono;
    private $movil;
    private $sitioWeb;
    private $foto;
    private $encabezado;
    private $video;
    private $tema;
    private $id; 
    private $nombre;
    private $industria;
    private $acercaDe;
    private $pais;
    private $provincia;
    private $ciudad;
    private $estado;
    private $ingreso;
    
    function buildEmprendedor($data, $link){ 
        $this->id = $data['usr_id'] ?? ''; 
        $this->emailContacto = $data['email_contacto'] ?? '';
        $this->telefono = $data['telefono'] ?? '';
        $this->movil = $data['movil'] ?? '';
        $this->sitioWeb = $data['sitio_web'] ?? '';
        $this->foto = $data['foto'] ?? '';
        $this->encabezado = $data['encabezado'] ?? '';
        $this->video = $data['video'] ?? '';
        $this->nombre = $data['nombre'] ?? '';
        $this->industria = meta_global::getIndustria($data['industria'] ?? '', $link);
        $this->acercaDe = $data['acerca_de'] ?? '';
        $this->pais = meta_global::getPais($data['pais'] ?? '', $link);
        $this->provincia = meta_global::getProvincia($data['provincia'] ?? '', $link);
        $this->ciudad = meta_global::getCiudad($data['ciudad'] ?? '', $link);
        $this->tema = meta_global::getTema($data['tema'] ?? '', $link);
        $this->estado = $data['estado'] ?? '';
        $this->ingreso = $data['ingreso'] ?? '';
    }
    
    function name() {
         return get_class($this);
    }
    
    function getEmailContacto() {
        return $this->emailContacto;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getMovil() {
        return $this->movil;
    }

    function getSitioWeb() {
        return $this->sitioWeb;
    }

    function getFoto() {
        return $this->foto;
    }

    function getEncabezado() {
        return $this->encabezado;
    }

    function getVideo() {
        return $this->video;
    }

    function getTema() {
        return $this->tema;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getIndustria() {
        return $this->industria;
    }

    function getAcercaDe() {
        return $this->acercaDe;
    }

    function getPais() {
        return $this->pais;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getEstado() {
        return $this->estado;
    }

    function getIngreso() {
        return $this->ingreso;
    }

    function setEmailContacto($emailContacto) {
        $this->emailContacto = $emailContacto;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setMovil($movil) {
        $this->movil = $movil;
    }

    function setSitioWeb($sitioWeb) {
        $this->sitioWeb = $sitioWeb;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setEncabezado($encabezado) {
        $this->encabezado = $encabezado;
    }

    function setVideo($video) {
        $this->video = $video;
    }

    function setTema($tema) {
        $this->tema = $tema;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setIndustria($industria) {
        $this->industria = $industria;
    }

    function setAcercaDe($acercaDe) {
        $this->acercaDe = $acercaDe;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setIngreso($ingreso) {
        $this->ingreso = $ingreso;
    }


    
}
