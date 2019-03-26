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
class emprendedor_global implements EmprendedorInt {
    public function getEmprendedor($omp_id,$link){
        $st=$link->prepare('SELECT * FROM emprendedor WHERE usr_id=:id');
        $st -> bindParam(':id',$omp_id);
        $st -> execute();
        $data = $st->fetch();
        $emprendedor = new emprendedor();
        $emprendedor -> buildEmprendedor($data,$link);
        return $emprendedor;
    }
    
    public function getEmprendedorUsr($usuario,$link){
        $usr = $usuario->getId();
        $st=$link->prepare('SELECT * FROM emprendedor WHERE usr_id=:id');
        $st -> bindParam(':id',$usr);
        $st -> execute();
        $data = $st->fetch();
        $emprendedor = new emprendedor();
        $emprendedor -> buildEmprendedor($data,$link);
        return $emprendedor;
    }
    
    public function newEmprendedor($emprendedor, $link){
    }
    
    public function editEmprendedor($emprendedor,$link){
    }
    
    public function editPerfil($link){}
    public function delEmprendedor($link){}
    
    
}
