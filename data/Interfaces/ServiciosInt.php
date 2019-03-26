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
interface ServiciosInt {
    
    public function postServicio($serv, $comment, $valor, $link);
    public function delPostServicio($serv, $link);
    
    public function getServicio($serv_id, $link);
    public function getServicios($empresa, $link);
    
    public function newServicio($serv, $link);
    public function delServicio($serv, $link);
    public function editServicio($serv, $link);
    
    public function getPostulantes($serv, $link);
    public function getAllPostulantes($serv);
    
}
