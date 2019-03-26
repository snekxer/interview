<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface PersonaInt {
    
    public function getPersona($per_id,$link);
    public function getPersonaUsr($usuario,$link);
    
    public function newPersona($persona, $link);
    public function delPersona($link);
    public function editPersona($persona,$link);
    public function editPerfil($link);//aqui va encabezado, foto, video y tema exclusivamente. Se agregan los paths, que son determinados por 
                                                //el uploader, al objeto.
}