<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface TrayectoriaInt {
    function getTrayectoria($omp, $link);
    function getGalerias($tra, $link);
    function getProyectos($tra,$link);
    function getAllTrayectoria($omp,$link);
    
    function getMyTra($link);
    
    function newTrayectoria($omp, $link);
    function newGaleria($tra, $link);
    function newProyecto($tra,$link);
 
    function delGaleria($tra, $link);
    function delProyecto($tra,$link);
    
    function editTrayectoria($omp, $link);
    function editGaleria($tra, $link);
    function editProyecto($tra,$link);
}
