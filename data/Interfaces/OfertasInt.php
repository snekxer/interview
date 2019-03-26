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
interface OfertasInt {
    
    public function getOferta($ofer_id, $link);
    public function getOfertas($empresa, $link);
    
    public function postOferta($oferta,$link);
    public function delPostOferta($oferta, $link);
    
    public function newOferta($oferta, $link);
    public function delOferta($oferta, $link);
    public function editOferta($oferta, $link);
    
    public function getPostulantes($oferta, $link);
    public function getAllPostulantes($link);
    public function filtrarPostulantes ($filtrosP, $filtrosC, $edu, $idiomas, $areas, $oferta, $link);
    
}
