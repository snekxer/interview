<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tags
 *
 * @author pauli
 */
class tags{
    
    //tag tiene que ser creado despues de crear el elemento porque necesita del id
    function __construct($kword, $elem, $link){
        $class = $elem->name();
        $user = unserialize($_SESSION['user']);
        switch($class){
           case('oferta'):
               $tipo = 'O';
               break;
           case('servicio'):
               $tipo = 'S';
               break;
           case('producto'):
               $tipo = 'PR';
               break;
           case('portafolio'):
               $tipo = 'PT';
               break;
       }
       $st = $link -> prepare("INSERT INTO tags (id, usr_id, tag, tipo) VALUES (:id, :usr, :tag :tipo)");
       $st->bindParam(':id', $elem->getId());
       $st->bindParam(':usr',$user->getId());
       $st->bindParam(':tag',$kword);
       $st->bindParam('tipo', $tipo);
       $state = $st->execute();
    } 
    
}
