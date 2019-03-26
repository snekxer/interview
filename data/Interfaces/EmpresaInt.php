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
interface EmpresaInt {
   
    public function getEmpresa($emp_id, $link);
    public function getEmpresaUsr($user, $link);
    
    public function newEmpresa($empresa, $link);
    public function delEmpresa($link);
    public function editEmpresa($empresa,$link);
    public function editPerfil($empresa, $link);
}
