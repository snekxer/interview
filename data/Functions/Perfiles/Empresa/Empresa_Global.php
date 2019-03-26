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
class empresa_global implements EmpresaInt{
    
    public function getEmpresa($emp_id, $link){
        $st=$link->prepare('SELECT * FROM empresa WHERE usr_id=:id');
        $st -> bindParam(':id',$emp_id);
        $st -> execute();
        $data = $st->fetch();
        $empresa = new empresa();
        $empresa -> buildEmpresa($data, $link);
        return $empresa;
    }
    
    public function getEmpresaUsr($usuario, $link){
        $usr = $usuario->getId();
        $st=$link->prepapre('SELECT * FROM empresa WHERE usr_id=:id');
        $st -> bindParam(':id',$usr);
        $st -> execute();
        $data = $st->fetch();
        $empresa = new empresa();
        $empresa -> buildEmpresa($data, $link);
        return $empresa;
    }
    
    public function newEmpresa($empresa, $link){}
    public function delEmpresa($link){}
    public function editEmpresa($empresa,$link){}
    public function editPerfil($empresa, $link){}
}
