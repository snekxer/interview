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
    
class persona_global implements PersonaInt {
    
    function getPersona($per_id,$link) {
        $st=$link->prepare('SELECT * FROM persona WHERE usr_id=:id');
        $st -> bindParam(':id',$per_id);
        $st -> execute();
        $data = $st->fetch();
        if($data!=null){
            $persona = new persona();
            $persona -> buildPersona($data, $link);
            return $persona;
        } else {
            return false;
        }
    }
        
    function getPersonaUsr($usuario,$link){
        $usr = $usuario->getId();
        $st=$link->prepare('SELECT * FROM persona WHERE usr_id=:id');
        $st -> bindParam(':id',$usr);
        $st -> execute();
        $data = $st->fetch();
        $persona = new persona();
        $persona -> buildPersona($data, $link);
        return $persona;
    }
    
    public function newPersona($persona, $link){}
    
    public function delPersona($link){}
    
    public function editPersona($persona,$link){}
    
    public function editPerfil($link){}
    
}
