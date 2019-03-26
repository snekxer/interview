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
class curriculum_persona implements CurriculumInt{
    
    public function getMyCurr($link){
        $usr = unserialize($_SESSION['user']);
        if ($usr->getTipo()=='P'){
            $st = $link->prepare("SELECT * FROM curriculum WHERE per_id=:id");
            $st -> bindParam(':id',$usr->getId());
            $st -> execute();
            $data = $st->fetch();
            if($data!=null){
                $curr = new curriculum();
                $curr->buildCurriculumPersona($data, $link);
                return $curr;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public function newCurriculum($curr, $link){
        $st = $link -> prepare("INSERT INTO curriculum (per_id, asp_salarial, disp_tiempo, discapacidad, disc_detalle, sit_actual, licencia)
				    VALUES (:id, :aspS, :dispT, :disc, :discD, :sitA, :lic)");
        $per = usuario_global::getMyUsr($link);
        $user = unserialize($_SESSION['user']);
        if ($user->getTipo()=='P'){
            $st -> bindParam(':id', $per->getId());
            $st -> bindParam(':aspS', $curr->getAspSalarial());
            $st -> bindParam(':dispT', $curr->getDispTiempo());
            $st -> bindParam(':disc', $curr->getDiscapacidad());
            $st -> bindParam(':discD', $curr->getDiscapacidadDetalle());
            $st -> bindParam(':sitA', $curr->getSituacionAct());
            $st -> bindParam(':lic', $curr->getLicencia());
            $state = $st -> execute();
            return $state;
        } else { 
            return false;
        }
    }
    
    public function newCompetencia($comp, $link){
        $st = $link -> prepare("INSERT INTO curr_competencias (curr_id, nombre, nivel)
				    VALUES (:id, :comp, :nivel)");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':comp', $comp->getCompetencia());
        $st -> bindParam(':nivel', $comp->getNivel());
        $state = $st -> execute();
        return $state;
    }
    
    public function newConocimiento($cono,$link){
        $st = $link -> prepare("INSERT INTO curr_conocimientos (curr_id, nombre, nivel, area, subarea)
				    VALUES (:id, :cono, :nivel, :area, :subarea)");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':cono', $cono->getConocimiento());
        $st -> bindParam(':nivel', $cono->getNivel());
        $st -> bindParam(':area', $cono->getArea());
        $st -> bindParam(':subarea', $cono->getSubarea());
        $state = $st -> execute();
        return $state;
    }
    
    public function newEducacion($edu, $link){
        $st = $link -> prepare("INSERT INTO curr_educacion (curr_id, institucion, descripcion, fecha_ini, fecha_fin,
            titulo, nivel) VALUES (:id, :inst, :desc, :fecI, :fecF, :tit, :niv)");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':inst', $edu->getInstitucion());
        $st -> bindParam(':desc', $edu->getDescripcion());
        $st -> bindParam(':fecI', $edu->getFechaIni());
        $st -> bindParam(':fecF', $edu->getFechaFin());
        $st -> bindParam(':tit', $edu->getTitulo());
        $st -> bindParam(':niv', $edu->getNivel());
        $state = $st -> execute();
        return $state;
    }
    
    public function newExperiencia($exp, $link){
        $st = $link -> prepare("INSERT INTO curr_experiencia (curr_id, empresa, fecha_ini, fecha_fin, cargo, area, subarea, pais,"
                . "provincia, ciudad, industria, descripcion_cargo, descripcion_funciones, ref_nombre, ref_relacion, ref_telefono, ref_email) "
                . "VALUES (:id, :emp, :fecI, :fecF, :carg, :area, :suba, :pais, :prov, :ciu, :ind, :descC, :descF, :refN, :refR, "
                . ":refT, :refE)");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':emp', $exp->getEmpresa());
        $st -> bindParam(':fecI', $exp->getFechaIni());
        $st -> bindParam(':fecF', $exp->getFechaFin());
        $st -> bindParam(':carg', $exp->getCargo());
        $st -> bindParam(':area', $exp->getArea());
        $st -> bindParam(':suba', $exp->getSubarea());
        $st -> bindParam(':pais', $exp->getPais());
        $st -> bindParam(':prov', $exp->getProvincia());
        $st -> bindParam(':ciu', $exp->getCiudad());
        $st -> bindParam(':ind', $exp->getEmpresaIndustria());
        $st -> bindParam(':descC', $exp->getDescripcionCargo());
        $st -> bindParam(':descF', $exp->getDescripcionFunciones());
        $st -> bindParam(':refN', $exp->getNombre());
        $st -> bindParam(':refR', $exp->getRelacion());
        $st -> bindParam(':refT', $exp->getTelefono());
        $st -> bindParam(':refE', $exp->getEmail());
        $state = $st -> execute();
        return $state;
    }
    
    public function newFormacion($form, $link){
        $st = $link -> prepare("INSERT INTO curr_formacion (curr_id, institucion, descripcion, fecha_ini, fecha_fin,
            titulo, tipo, duracion) VALUES (:id, :inst, :desc, :fecI, :fecF, :tit, :tipo, :dur)");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':inst', $form->getInstitucion());
        $st -> bindParam(':desc', $form->getDescripcion());
        $st -> bindParam(':fecI', $form->getFechaIni());
        $st -> bindParam(':fecF', $form->getFechaFin());
        $st -> bindParam(':tit', $form->getTitulo());
        $st -> bindParam(':tipo', $form->getTipo());
        $st -> bindParam(':dur', $form->getDuracion());
        $state = $st -> execute();
        return $state;
    }
    
    public function newIdioma($idio, $link){
        $st = $link -> prepare("INSERT INTO curr_idiomas (curr_id, idioma, escrito, oral)"
                . "VALUES (:id, :idio, :esc, :oral)");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':idio', $idio->getIdioma());
        $st -> bindParam(':esc', $idio->getEscrito());
        $st -> bindParam(':oral', $idio->getOral());
        $state = $st -> execute();
        return $state;
    }
       
    public function newReferencia($ref, $link){
        $st = $link -> prepare("INSERT INTO curr_referencias (curr_id, nombre, telefono, email, relacion)"
                . " VALUES (:id, :nom, :tel, :email, :rel)");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':nom', $ref->getNombre());
        $st -> bindParam(':tel', $ref->getTelefono());
        $st -> bindParam(':email', $ref->getEmail());
        $st -> bindParam(':rel', $ref->getRelacion());
        $state = $st -> execute();
        return $state;
    }
    
    public function editCurriculum($curr, $link){
        $myCurr = curriculum_persona::getMyCurr($link);
        $st = $link -> prepare("UPDATE curriculum SET asp_salarial=:asp, disp_tiempo=:disp, discapacidad=:disc, disc_detalle=:det,"
                . "sit_actual=:sit, licencia=:lic WHERE per_id=:per_id AND estado='A'");
            $st -> bindParam(':per_id', $myCurr->getPersona()->getId());
            $st -> bindParam(':asp', $curr->getAspSalarial());
            $st -> bindParam(':disp', $curr->getDispTiempo());
            $st -> bindParam(':disc', $curr->getDiscapacidad());
            $st -> bindParam(':det', $curr->getDiscapacidadDetalle());
            $st -> bindParam(':sit', $curr->getSituacionAct());
            $st -> bindParam(':lic', $curr->getLicencia());
            $state = $st -> execute();
            return $state;
    }
    
    public function editCompetencia($comp, $link){
        $st = $link -> prepare("UPDATE curr_competencias SET nombre=:comp, nivel=:nivel WHERE curr_id=:id AND id=:ide AND estado='A'");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':ide', $comp->getId());
        $st -> bindParam(':comp', $comp->getCompetencia());
        $st -> bindParam(':nivel', $comp->getNivel());
        $state = $st -> execute();
        return $state;
    }
    
    public function editConocimiento($cono, $link){
        $st = $link -> prepare("UPDATE curr_conocimientos SET nombre=:cono, nivel=:nivel, area=:area, subarea=:subarea 
				    WHERE curr_id=:id AND id=:ide AND estado='A'");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':ide', $cono->getId());
        $st -> bindParam(':cono', $cono->getConocimiento());
        $st -> bindParam(':nivel', $cono->getNivel());
        $st -> bindParam(':area', $cono->getArea());
        $st -> bindParam(':subarea', $cono->getSubarea());
        $state = $st -> execute();
        return $state;
    }
    
    public function editEducacion($edu, $link){
        $currl = new curriculum_persona;
        $st = $link -> prepare("UPDATE curr_educacion SET institucion=:inst, descripcion=:desc, fecha_ini=:fecI, fecha_fin=:fecF,
            titulo=:tit, nivel=:niv WHERE curr_id=:id AND id=:ide AND estado='A'");
        $curr = $currl->getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':ide', $edu->getId());
        $st -> bindParam(':inst', $edu->getInstitucion());
        $st -> bindParam(':desc', $edu->getDescripcion());
        $st -> bindParam(':fecI', $edu->getFechaIni());
        $st -> bindParam(':fecF', $edu->getFechaFin());
        $st -> bindParam(':tit', $edu->getTitulo());
        $st -> bindParam(':niv', $edu->getNivel());
        $state = $st -> execute();
        return $state;
        
    }
    
    public function editExperiencia($exp, $link){
        $st = $link -> prepare("UPDATE curr_experiencia SET empresa=:emp, fecha_ini=:fecI, fecha_fin=:fecF, cargo=:carg, area=:area, subarea=:suba, pais=:pais,"
                . "provincia=:prov, ciudad=:ciu, industria=:ind, descripcion_cargo=:descC, descripcion_funciones=:descF, ref_nombre=:refN, ref_relacion=:refR, ref_telefono=:refT,"
                . " ref_email=:refE WHERE curr_id=:id AND id=:ide AND estado='A'");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':ide', $exp->getId());
        $st -> bindParam(':emp', $exp->getEmpresa());
        $st -> bindParam(':fecI', $exp->getFechaIni());
        $st -> bindParam(':fecF', $exp->getFechaFin());
        $st -> bindParam(':carg', $exp->getCargo());
        $st -> bindParam(':area', $exp->getArea());
        $st -> bindParam(':suba', $exp->getSubarea());
        $st -> bindParam(':pais', $exp->getPais());
        $st -> bindParam(':prov', $exp->getProvincia());
        $st -> bindParam(':ciu', $exp->getCiudad());
        $st -> bindParam(':ind', $exp->getEmpresaIndustria());
        $st -> bindParam(':descC', $exp->getDescripcionCargo());
        $st -> bindParam(':descF', $exp->getDescripcionFunciones());
        $st -> bindParam(':refN', $exp->getNombre());
        $st -> bindParam(':refR', $exp->getRelacion());
        $st -> bindParam(':refT', $exp->getTelefono());
        $st -> bindParam(':refE', $exp->getEmail());
        $state = $st -> execute();
        return $state;
    }
    
    public function editFormacion($form, $link){
        $st = $link -> prepare("UPDATE curr_formacion SET institucion=:inst, descripcion=:desc, fecha_ini=:fecI, fecha_fin=:fecF,
            titulo=:tit, tipo=:tipo, duracion=:dur WHERE curr_id=:id AND id=:ide AND estado='A'");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':ide', $form->getId());
        $st -> bindParam(':inst', $form->getInstitucion());
        $st -> bindParam(':desc', $form->getDescripcion());
        $st -> bindParam(':fecI', $form->getFechaIni());
        $st -> bindParam(':fecF', $form->getFechaFin());
        $st -> bindParam(':tit', $form->getTitulo());
        $st -> bindParam(':tipo', $form->getTipo());
        $st -> bindParam(':dur', $form->getDuracion());
        $state = $st -> execute();
        return $state;
    }
    
    public function editIdioma($idio, $link){
        $st = $link -> prepare("UPDATE curr_idiomas SET idioma=:idio, escrito=:esc, oral=:oral WHERE curr_id=:id AND id=:ide AND estado='A'");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':ide', $idio->getId());
        $st -> bindParam(':idio', $idio->getIdioma());
        $st -> bindParam(':esc', $idio->getEscrito());
        $st -> bindParam(':oral', $idio->getOral());
        $state = $st -> execute();
        return $state;
    }
    
    public function editReferencia($ref, $link){
        $st = $link -> prepare(" UPDATE curr_referencias SET nombre=:nom, telefono=:tel, email=:email, relacion=:rel WHERE curr_id=:id AND id=:ide AND estado='A'");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':ide', $ref->getId());
        $st -> bindParam(':nom', $ref->getNombre());
        $st -> bindParam(':tel', $ref->getTelefono());
        $st -> bindParam(':email', $ref->getEmail());
        $st -> bindParam(':rel', $ref->getRelacion());
        $state = $st -> execute();
        return $state;
    }
    
    public function delCompetencia($comp, $link){
        $st = $link -> prepare("UPDATE curr_competencias SET estado='I' WHERE curr_id=:id AND id=:ide AND estado='A'");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':ide', $comp->getId());
        $state = $st -> execute();
        return $state;
    }
    
    public function delConocimiento($cono, $link){
        $st = $link -> prepare("UPDATE curr_conocimientos SET estado='I' WHERE curr_id=:id AND id=:ide AND estado='A'");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':ide', $cono->getId());
        $state = $st -> execute();
        return $state;
    }
    
    public function delEducacion($edu, $link){
        $st = $link -> prepare("UPDATE curr_educacion SET estado='I' WHERE curr_id=:id AND id=:ide");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':ide', $edu->getId());
        $state = $st -> execute();
        return $state;
    }
    
    public function delExperiencia($exp, $link){
        $st = $link -> prepare("UPDATE curr_experiencia SET estado='I' WHERE curr_id=:id AND id=:ide AND estado='A'");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':ide', $exp->getId());
        $state = $st -> execute();
        return $state;
    }
    
    public function delFormacion($form, $link){
        $st = $link -> prepare("UPDATE curr_formacion SET estado='I' WHERE curr_id=:id AND id=:ide AND estado='A'");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':ide', $form->getId());
        $state = $st -> execute();
        return $state;
    }
    
    public function delIdioma($idio, $link){
        $st = $link -> prepare("UPDATE curr_idiomas SET estado='I' WHERE curr_id=:id AND id=:ide ");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':ide', $idio->getId());
        $state = $st -> execute();
        return $state;
    }
    
    public function delReferencia($ref, $link){
        $st = $link -> prepare("UPDATE curr_referencias SET estado='I' WHERE curr_id=:id AND id=:ide AND estado='A'");
        $curr = curriculum_persona::getMyCurr($link);
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> bindParam(':ide', $ref->getId());
        $state = $st -> execute();
        return $state;
    }
    
    public function getCurriculum($persona, $link){
        $st = $link -> prepare("SELECT * FROM curriculum WHERE per_id=:id AND estado='A'");
        $st -> bindParam(':id', $persona->getId());
        $st -> execute();
        $data = $st -> fetch();
        $curr = new curriculum();
        $curr ->buildCurriculumPersona($data, $link);
        return $curr;
    }
    
    public function getCompetencias($curr, $link){
        $st = $link -> prepare("SELECT * FROM curr_competencias WHERE curr_id=:id AND estado='A'");
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $info = new competencias();
            $info ->buildCompetencia($data,$link);
            $infos[$i]=$info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getConocimientos($curr, $link){
        $st = $link -> prepare("SELECT * FROM curr_conocimientos WHERE curr_id=:id AND estado='A'");
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $info = new conocimientos();
            $info ->buildConocimiento($data, $link);
            $infos[$i]=$info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getEducacion($curr, $link){
        $st = $link -> prepare("SELECT * FROM curr_educacion WHERE estado='A' AND curr_id=:id ");
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $info = new educacion();
            $info ->buildEducacion($data,$link);
            $infos[$i]=$info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getExperiencia($curr, $link){
        $st = $link -> prepare("SELECT * FROM curr_experiencia WHERE curr_id=:id AND estado='A'");
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $info = new experiencia();
            $info ->buildExperiencia($data,$link);
            $infos[$i]=$info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getFormacion($curr, $link){
        $st = $link -> prepare("SELECT * FROM curr_formacion WHERE curr_id=:id AND estado='A'");
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $info = new formacion();
            $info ->buildFormacion($data);
            $infos[$i]=$info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getIdiomas($curr, $link){
        $st = $link -> prepare("SELECT * FROM curr_idiomas WHERE curr_id=:id AND estado='A'");
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $info = new idioma();
            $info ->buildIdioma($data,$link);
            $infos[$i]=$info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getReferencias($curr, $link){
        $st = $link -> prepare("SELECT * FROM curr_referencias WHERE curr_id=:id AND estado='A'");
        $st -> bindParam(':id', $curr->getPersona()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=false){
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
        $curr ->buildCurriculumPersona($data, $link);
        echo serialize($data);
        return $curr;
    }
    
        
    public function getCompetenciaFromId($id, $link){
        $st = $link -> prepare("SELECT * FROM curr_competencias WHERE id=:id AND estado='A'");
        $st -> bindParam(':id', $id);
        $st -> execute();
        $data = $st -> fetch();
        $info = new competencias();
        $info ->buildCompetencia($data,$link);
        return $info;
    }
    
    public function getConocimientoFromId($id, $link){
        $st = $link -> prepare("SELECT * FROM curr_conocimientos WHERE id=:id AND estado='A'");
        $st -> bindParam(':id', $id);
        $st -> execute();
        $data = $st -> fetch();
        $info = new conocimientos();
        $info ->buildConocimiento($data, $link);
        return $info;
    }
    
    public function getEducacionFromId($id, $link){
        $st = $link -> prepare("SELECT * FROM curr_educacion WHERE id=:id AND estado='A'");
        $st -> bindParam(':id', $id);
        $st -> execute();
        $data = $st -> fetch();
        $info = new educacion();
        $info ->buildEducacion($data,$link);
        return $info;
    }
    
    public function getExperienciaFromId($id, $link){
        $st = $link -> prepare("SELECT * FROM curr_experiencia WHERE id=:id AND estado='A'");
        $st -> bindParam(':id', $id);
        $st -> execute();
        $data = $st -> fetch();
        $info = new experiencia();
        $info ->buildExperiencia($data,$link);
        return $info;
    }
    
    public function getFormacionFromId($id, $link){
        $st = $link -> prepare("SELECT * FROM curr_formacion WHERE id=:id AND estado='A'");
        $st -> bindParam(':id', $id);
        $st -> execute();
        $data = $st -> fetch();
        $info = new formacion();
        $info ->buildFormacion($data);
        return $info;
    }
    
    public function getIdiomaFromId($id, $link){
        $st = $link -> prepare("SELECT * FROM curr_idiomas WHERE id=:id AND estado='A'");
        $st -> bindParam(':id', $id);
        $st -> execute();
        $data = $st -> fetch();
        $info = new idioma();
        $info ->buildIdioma($data,$link);
        return $info;
    }
    
    public function getReferenciaFromId($id, $link){
        $st = $link -> prepare("SELECT * FROM curr_referencias WHERE id=:id AND estado='A'");
        $st -> bindParam(':id', $id);
        $st -> execute();
        $data = $st -> fetch();
        $info = new referencias();
        $info ->buildReferencia($data);
        return $info;
    }
}
