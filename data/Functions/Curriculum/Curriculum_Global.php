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
class curriculum_global implements CurriculumInt{
    
    public function getCurriculum($persona, $link){
        $st = $link -> prepare("SELECT * FROM curriculum WHERE per_id=:id AND estado='A'");
        $st -> bindParam(':id', $persona->getId());
        $st -> execute();
        $data = $st -> fetch();
        $curr = new curriculum();
        $curr ->buildCurriculum($data, $link);
        return $curr;
    }
    
    public function getCompetencias($curr, $link){
        $st = $link -> prepare("SELECT * FROM curr_competencias WHERE curr_id=:id AND estado='A'");
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $info = new competencias();
                $info ->buildCompetencia($data,$link);
                $infos[$i]=$info;
                unset($info);
                $i++;
            }
            return $infos;
        } else {
            return false;
        }
    }
    
    public function getConocimientos($curr, $link){
        $st = $link -> prepare("SELECT * FROM curr_conocimientos WHERE curr_id=:id AND estado='A'");
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $info = new conocimientos();
                $info ->buildConocimiento($data, $link);
                $infos[$i]=$info;
                unset($info);
                $i++;
            }
            return $infos;
        } else {
            return false;
        }
    }
    
    public function getEducacion($curr, $link){
        $st = $link -> prepare("SELECT * FROM curr_educacion WHERE curr_id=:id AND estado='A'");
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $info = new educacion();
                $info ->buildEducacion($data,$link);
                $infos[$i]=$info;
                unset($info);
                $i++;
            }
            return $infos;
        } else {
            return false;
        }
    }
    
    public function getExperiencia($curr, $link){
        $st = $link -> prepare("SELECT * FROM curr_experiencia WHERE curr_id=:id AND estado='A'");
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $info = new experiencia();
                $info ->buildExperiencia($data,$link);
                $infos[$i]=$info;
                unset($info);
                $i++;
            }
            return $infos;
        } else {
            return false;
        }
    }
    
    public function getFormacion($curr, $link){
        $st = $link -> prepare("SELECT * FROM curr_formacion WHERE curr_id=:id AND estado='A'");
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $info = new formacion();
                $info ->buildFormacion($data);
                $infos[$i]=$info;
                unset($info);
                $i++;
            }
            return $infos;
        } else {
            return false;
        }
    }
    
    public function getIdiomas($curr, $link){
        $st = $link -> prepare("SELECT * FROM curr_idiomas WHERE curr_id=:id AND estado='A'");
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $info = new idioma();
                $info ->buildIdioma($data,$link);
                $infos[$i]=$info;
                unset($info);
                $i++;
            }
            return $infos;
        } else {
            return false;
        }
    }
    
    public function getReferencias($curr, $link){
        $st = $link -> prepare("SELECT * FROM curr_referencias WHERE curr_id=:id AND estado='A'");
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> execute();
        $data = $st -> fetch();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $info = new referencias();
                $info ->buildReferencia($data);
                $infos[$i]=$info;
                unset($info);
                $i++;
            }
            return $infos;
        } else {
            return false;
        }
    }
    
    public function getFullCurriculum($persona,$link){
        $curr = getCurriculum($persona, $link);
        $comps = getCompetencias($curr, $link);
        $conos = getConocimientos ($curr, $link);
        $edus = getEducacion($curr, $link);
        $exps = getExperiencia($curr, $link);
        $forms = getFormacion($curr, $link);
        $idios = getIdiomas($curr, $link);
        $refs = getReferencias($curr, $link);
        $array =  array(
            $curr,
            $comps,
            $conos,
            $edus,
            $exps,
            $forms,
            $idios,
            $refs,
        );
        return $array;
    }
    
    public function getCurriculumFromId($per_id, $link){
        $st = $link -> prepare("SELECT * FROM curriculum WHERE per_id=:id AND estado='A'");
        $st -> bindParam(':id', $per_id);
        $st -> execute();
        $data = $st -> fetch();
        $curr = new curriculum();
        $curr ->buildCurriculum($data, $link);
        return $curr;
    }
    
    public function getFullCurriculumFromPerId($per_id,$link){
        $curr = getCurriculumFromId($per_id, $link);
        $comps = getCompetencias($curr, $link);
        $conos = getConocimientos ($curr, $link);
        $edus = getEducacion($curr, $link);
        $exps = getExperiencia($curr, $link);
        $forms = getFormacion($curr, $link);
        $idios = getIdiomas($curr, $link);
        $refs = getReferencias($curr, $link);
        $array =  array(
            $curr,
            $comps,
            $conos,
            $edus,
            $exps,
            $forms,
            $idios,
            $refs,
        );
        return $array;
    }
    
    public function newCurriculum($persona, $link){}
    public function newCompetencia($comp,$link){}
    public function newConocimiento($cono, $link){}
    public function newEducacion($edu, $link){}
    public function newExperiencia($exp, $link){}
    public function newFormacion($form, $link){}
    public function newIdioma($idio, $link){}
    public function newReferencia($ref, $link){}
    
    public function editCurriculum($curr,$link){}
    public function editCompetencia($comp, $link){}
    public function editConocimiento($cono, $link){}
    public function editEducacion($edu, $link){}
    public function editExperiencia($exp, $link){}
    public function editFormacion($form, $link){}
    public function editIdioma($idio, $link){}
    public function editReferencia($ref, $link){}
    
    public function delCompetencia($comp, $link){}
    public function delConocimiento($cono, $link){}
    public function delEducacion($edu, $link){}
    public function delExperiencia($exp, $link){}
    public function delFormacion($form, $link){}
    public function delIdioma($idio, $link){}
    public function delReferencia($ref, $link){}
    
    public function getMyCurr($link){}
    
}
