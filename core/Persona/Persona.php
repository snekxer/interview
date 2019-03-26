<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Persona
 *
 * @author snekxer
 */
class persona {
    private $usuario; 
    private $emailContacto;
    private $telefono;
    private $movil;
    private $sitioWeb;
    private $foto;
    private $encabezado;
    private $video;
    private $tema;
    private $id;
    private $nombres;
    private $apellidos;
    private $fechaNac;
    private $genero;
    private $nacionalidad;
    private $profesion;
    private $estadoCivil;
    private $tipoIdentficacion;
    private $identificacion;
    private $area;
    private $subarea;
    private $pais;
    private $provincia;
    private $ciudad;
    private $acercaDe;
    private $estado;
    private $ingreso;
    
    function buildPersona($data, $link){
        $this->id = $data['usr_id'] ?? '';
        $this->emailContacto = $data['email_contacto'] ?? '';
        $this->telefono = $data['telefono'] ?? '';
        $this->movil = $data['movil'] ?? '';
        $this->sitioWeb = $data['sitio_web'] ?? '';
        $this->foto = $data['foto'] ?? '';
        $this->encabezado = $data['encabezado'] ?? '';
        $this->video = $data['video'] ?? '';
        $this->tema = meta_global::getTema($data['tema'] ?? '', $link);
        $this->nombres = $data['nombres'] ?? '';
        $this->apellidos = $data['apellidos'] ?? '';
        $this->fechaNac = $data['fecha_nac'] ?? '';
        $this->genero = $data['genero'] ?? '';
        $this->nacionalidad = meta_global::getPais($data['nacionalidad'] ?? '',$link);
        $this->profesion = meta_global::getProfesion($data['profesion'] ?? '', $link);
        $this->estadoCivil = meta_global::getEstCivil($data['estado_civil'] ?? '',$link);
        $this->tipoIdentficacion = $data['tipo_identificacion'] ?? '';
        $this->identificacion = $data['identificacion'] ?? '';
        $this->area = meta_global::getArea($data['area'] ?? '', $link);
        $this->subarea = meta_global::getSubarea($data['subarea'] ?? '', $link);
        $this->pais = meta_global::getPais($data['pais'] ?? '', $link);
        $this->provincia = meta_global::getProvincia($data['provincia'] ?? '', $link);
        $this->ciudad = meta_global::getCiudad($data['ciudad'] ?? '', $link);
        $this->acercaDe = $data['acerca_de'] ?? '';
        $this->estado = $data['estado'] ?? '';
        $this->ingreso = $data['ingreso'] ?? '';
    }
    
    function name() {
         return get_class($this);
    }
    
    function getIngreso() {
        return $this->ingreso;
    }

    function setIngreso($ingreso) {
        $this->ingreso = $ingreso;
    }

    function getTipoIdentficacion() {
        return $this->tipoIdentficacion;
    }

    function setTipoIdentficacion($tipoIdentficacion) {
        $this->tipoIdentficacion = $tipoIdentficacion;
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

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setEncabezado($encabezado) {
        $this->encabezado = $encabezado;
    }

    function setVideo($video) {
        $this->video = $video;
    }

        
    function getGenero() {
        return $this->genero;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function getTema() {
        return $this->tema;
    }

    function setTema($tema) {
        $this->tema = $tema;
    }
     
    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getFechaNac() {
        return $this->fechaNac;
    }

    function getNacionalidad() {
        return $this->nacionalidad;
    }

    function getProfesion() {
        return $this->profesion;
    }

    function getEstadoCivil() {
        return $this->estadoCivil;
    }

    function getTipoIdentificacion() {
        return $this->tipoIdentficacion;
    }

    function getIdentificacion() {
        return $this->identificacion;
    }

    function getArea() {
        return $this->area;
    }

    function getSubarea() {
        return $this->subarea;
    }

    function getAcercaDe() {
        return $this->acercaDe;
    }

    function getUsuario() {
        return $this->usuario;
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
    
    function getId() {
        return $this->id;
    }

    function getEstado() {
        return $this->estado;
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

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEstado($estado) {
        $this->estado = $estado;
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
        
    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    
    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setFechaNac($fechaNac) {
        $this->fechaNac = $fechaNac;
    }

    function setNacionalidad($nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }

    function setProfesion($profesion) {
        $this->profesion = $profesion;
    }

    function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    function setTipoIdentificacion($tipoIdentficacion) {
        $this->tipoIdentficacion = $tipoIdentficacion;
    }

    function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setSubarea($subarea) {
        $this->subarea = $subarea;
    }

    function setAcercaDe($acercaDe) {
        $this->acercaDe = $acercaDe;
    }



    
    
    
    
}
