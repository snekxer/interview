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
interface CurriculumInt {
    
    public function getCurriculum($persona, $link);
    public function getCompetencias($curriculum, $link);
    public function getConocimientos($curriculum, $link);
    public function getEducacion($curriculum, $link);
    public function getExperiencia($curriculum, $link);
    public function getFormacion($curriculum, $link);
    public function getIdiomas($curriculum, $link);
    public function getReferencias($curriculum, $link);
    public function getFullCurriculum($persona, $link);
    
    public function newCurriculum($persona, $link);
    public function newCompetencia($comp,$link);
    public function newConocimiento($cono, $link);
    public function newEducacion($edu, $link);
    public function newExperiencia($exp, $link);
    public function newFormacion($form, $link);
    public function newIdioma($idio, $link);
    public function newReferencia($ref, $link);
    
    public function editCurriculum($curr,$link);
    public function editCompetencia($comp, $link);
    public function editConocimiento($cono, $link);
    public function editEducacion($edu, $link);
    public function editExperiencia($exp, $link);
    public function editFormacion($form, $link);
    public function editIdioma($idio, $link);
    public function editReferencia($ref, $link);
    
    public function delCompetencia($comp, $link);
    public function delConocimiento($cono, $link);
    public function delEducacion($edu, $link);
    public function delExperiencia($exp, $link);
    public function delFormacion($form, $link);
    public function delIdioma($idio, $link);
    public function delReferencia($ref, $link);
    
    public function getMyCurr($link);
    
}
