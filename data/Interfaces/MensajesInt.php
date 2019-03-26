<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author pauli
 */
interface MensajesInt {
    
    public function sendMensaje($msn, $link);
    public function getUsrs($link);
    public function getLastActivity($user,$link);
    public function getMensajesFromUsr($user, $link);
    public function getNewMensajes($mensajes,$user, $link);
    
    
    
}
