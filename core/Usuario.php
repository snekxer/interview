<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Perfil
 *
 * @author snekxer
 */
class usuario {
    private $id;
    private $email;
    private $username;
    private $contrasena;
    private $tipo;
    private $estado;
    private $ingreso;
    
    //para consultar al servidor
    function buildUsuario($data){
        $this->id = $data['id'] ?? '';
        $this->email = $data['email'] ?? '';
	$this->username = $data['username'] ?? '';
        $this->contrasena = null;
        $this->tipo = $data['tipo'] ?? '';
        $this->estado = $data['estado'] ?? '';
        $this->ingreso = $data['ingreso'] ?? '';
    }
    
    function generateUsername($link){
        $str = explode('@', $this->email);
        $num = rand(0, 5000);
        $username = $str[0].$num;
        $impl = new usuario_global;
        if($impl->checkUsername($username, $link)){
            $this->username = $username;
        } else {
            usuario::generateUsername($link);
        }   
    }
    
    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }
	
    function getUsername() {
        return $this->username;
    }
	
    function getContrasena() {
        return $this->contrasena;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getEstado() {
        return $this->estado;
    }   
    
    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }
	
    function setUsername($username) {
        $this->username = $username;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }    

}
