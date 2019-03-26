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
interface EmprendedorInt {
    
    public function getEmprendedor($omp_id,$link);
    public function getEmprendedorUsr($usuario,$link);
    
    public function newEmprendedor($emprendedor, $link);
    public function delEmprendedor($link);
    public function editEmprendedor($emprendedor,$link);
    public function editPerfil($link);
    
}
