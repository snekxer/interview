<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author snekxer
 */
interface UsuarioGlobal {
    
	public function registro($usuario, $link);
	public function desactivar($link);
        public function login($usuario, $link);
        public function recuperarPsswd($usuario, $link);
        public function cambiarUser($usuario, $link);
        public function cambiarMail($usuario, $link); 
        public function getMyUsr($link);
        public function searchUsr($usr_id,$link);
}
