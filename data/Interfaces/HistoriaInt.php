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
interface HistoriaInt {
    function getHistoria($emp, $link);
    function getGalerias($his, $link);
    function getProyectos($his,$link);
    function getAllHistoria($emp,$link);
    
    function getMyHis($link);
    
    function newHistoria($emp, $link);
    function newGaleria($his, $link);
    function newProyecto($his,$link);
 
    function delGaleria($gal, $link);
    function delProyecto($pro,$link);
    
    function editHistoria($emp, $link);
    function editGaleria($gal, $link);
    function editProyecto($pro,$link);
}
