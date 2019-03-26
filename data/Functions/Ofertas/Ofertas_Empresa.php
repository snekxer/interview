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
class ofertas_empresa implements OfertasInt{
    public function newOferta($oferta, $link){
        $emp = usuario_global::getMyUsr($link);
        $st = $link -> prepare("INSERT INTO ofertas (emp_id, titulo, descripcion, area, subarea, contrato, discapacidad, modalidad, pais, provincia, ciudad, renumeracion,"
                . "rango_des, rango_has, genero, edad, experiencia) VALUES (:emp, :tit, :des, :area, :suba, :cont, :disc, :mod, :pais, :prov, :ciu,"
                . ":ren, :ranD, :ranH, :gen, :ed, :exp)");
        $st->bindparam(':emp', $emp->getId());
        $st->bindparam(':tit', $oferta->getTitulo());
        $st->bindparam(':des', $oferta->getDescripcion());
        $st->bindparam(':area', $oferta->getArea());
        $st->bindparam(':suba', $oferta->getSubarea());
        $st->bindparam(':cont', $oferta->getTipoContrato());
        $st->bindparam(':disc', $oferta->getDiscapacidad());
        $st->bindparam(':mod', $oferta->getModalidad());
        $st->bindparam(':pais', $oferta->getPais());
        $st->bindparam(':prov', $oferta->getProvincia());
        $st->bindparam(':ciu', $oferta->getCiudad());
        $st->bindparam(':ren', $oferta->getRenumeracion());
        $st->bindparam(':ranD', $oferta->getRangoDesde());
        $st->bindparam(':ranH', $oferta->getRangoHasta());
        $st->bindparam(':gen', $oferta->getGenero());
        $st->bindparam(':ed', $oferta->getEdad());
        $st->bindparam(':exp', $oferta->getExperiencia());
        
        $state = $st -> execute();
        
        if($state){
            echo 'Oferta creada exitosamente.';
            return true;
        } else {
            echo 'Hubo un problema al crear la oferta. Intente nuevamente.';
            return false;
        }
    }
    
    public function delOferta($oferta, $link){
        $emp = usuario_global::getMyUsr($link);
        $st = $link -> prepare("UPDATE ofertas SET estado='I' WHERE emp_id=:emp AND id=:ofer");
        $st->bindparam(':emp', $emp->getId());
        $st->bindparam(':ofer', $oferta->getId());
        
        $state = $st -> execute();
        
        if($state){
            echo 'Oferta eliminada.';
            return true;
        } else {
            echo 'Hubo un problema al eliminar la oferta. Intente nuevamente.';
            return false;
        }
        
    }
    
    public function editOferta($oferta, $link){
        $emp = usuario_global::getMyUsr($link);
        $st = $link -> prepare("UPDATE ofertas SET titulo=:tit, descripcion=:des, area=:area, subarea=:suba, contrato=:cont, discapacidad=:disc,"
                . " modalidad=:mod, pais=:pais, provincia=:prov, ciudad=:ciu, renumeracion=:ren, rango_des=:ranD, rango_has=:ranH, genero=:gen,"
                . " edad=:ed, experiencia=:exp WHERE emp_id=:emp AND id=:id AND estado='A'");
        $st->bindparam(':emp', $emp->getId());
        $st->bindparam(':id', $oferta->getId());
        $st->bindparam(':tit', $oferta->getTitulo());
        $st->bindparam(':des', $oferta->getDescripcion());
        $st->bindparam(':area', $oferta->getArea());
        $st->bindparam(':suba', $oferta->getSubarea());
        $st->bindparam(':cont', $oferta->getTipoContrato());
        $st->bindparam(':disc', $oferta->getDiscapacidad());
        $st->bindparam(':mod', $oferta->getModalidad());
        $st->bindparam(':pais', $oferta->getPais());
        $st->bindparam(':prov', $oferta->getProvincia());
        $st->bindparam(':ciu', $oferta->getCiudad());
        $st->bindparam(':ren', $oferta->getRenumeracion());
        $st->bindparam(':ranD', $oferta->getRangoDesde());
        $st->bindparam(':ranH', $oferta->getRangoHasta());
        $st->bindparam(':gen', $oferta->getGenero());
        $st->bindparam(':ed', $oferta->getEdad());
        $st->bindparam(':exp', $oferta->getExperiencia());
        
        $state = $st -> execute();
        
        if($state){
            echo 'Oferta modificada exitosamente.';
            return true;
        } else {
            echo 'Hubo un problema al modificar la oferta. Intente nuevamente.';
            return false;
        }
        
    }
    
    public function getPostulantes($oferta, $link){
        $emp = usuario_global::getMyUsr($link);
        $st = $link -> prepare("SELECT * FROM persona WHERE usr_id IN (SELECT per_id FROM ofertas_pos WHERE  estado='A' AND emp_id=:emp AND ofer_id=:ofer)");
        $st->bindparam(':emp', $emp->getId());
        $st->bindparam(':ofer', $oferta->getId());
        $st -> execute();
        $data = $st-> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $per = new persona();
                $per->buildPersona($data,$link);
                $pers[$i] = $per;
                unset($per);
                $i++;
            }
            return $pers;
        } else {
            return false;
        }  
    }
    
    public function getAllPostulantes($link){
        $emp = usuario_global::getMyUsr($link);
        $st = $link -> prepare("SELECT * FROM persona WHERE usr_id IN (SELECT per_id FROM ofertas_pos WHERE estado='A' AND emp_id=:emp)");
        $st->bindparam(':emp', $emp->getId());
        $st -> execute();
        $data = $st-> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $per = new persona();
                $per->buildPersona($data,$link);
                $pers[$i] = $per;
                unset($per);
                $i++;
            }
            return $pers;
        } else {
            return false;
        }
    }
    
    public function getOferta($ofer_id, $link){
        $st = $link -> prepare("SELECT * FROM ofertas WHERE id=:id AND estado='A'");
        $st -> bindParam(':id', $ofer_id);
        $st -> execute();
        $data = $st->fetch();
        if($data!=null){
            $ofer = new oferta();
            $ofer -> buildOfertaEmpresa($data,$link);
            return $ofer;
        } else {
            return false;
        }
    }
    
    public function getOfertas($empresa, $link){
        $id = $empresa->getId();
        $st = $link -> prepare("SELECT * FROM ofertas WHERE emp_id=:id AND estado='A'");
        $st -> bindParam(':id', $id);
        $st -> execute();
        $data = $st->fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $ofer = new oferta();
                $ofer -> buildOfertaEmpresa($data,$link);
                $ofertas[$i] = $ofer;
                unset($ofer);
                $i++;
            }
            return $ofertas;
        } else {
            return false;
        }
    }
    
    public function filtrarPostulantes ($filtrosP, $filtrosC, $edu, $idiomas, $areas, $oferta, $link){
        $emp = usuario_global::getMyUsr($link);
        $perq = "SELECT id FROM persona WHERE id IN (SELECT per_id FROM ofertas_pos WHERE emp_id=:emp AND ofer_id=:ofer AND estado='A')";
        if($filtrosP[0]!=0){
            $ciu = " AND ciudad=:ciu";
        } 
        if($filtrosP[1]!=0){
            switch($filtrosP[1]){
                case(1):
                    $edad= " AND (YEAR(CURRENT_DATE()) - YEAR(fecha_nac)) < 20 ";
                    break;
                case(2):
                    $edad = " AND (YEAR(CURRENT_DATE()) - YEAR(fecha_nac)) BETWEEN 20 AND 25 ";
                    break;
                case(3):
                    $edad = " AND (YEAR(CURRENT_DATE()) - YEAR(fecha_nac)) BETWEEN 25 AND 30 ";
                    break;
                case(4):
                    $edad = " AND (YEAR(CURRENT_DATE()) - YEAR(fecha_nac)) BETWEEN 30 AND 40 ";
                    break;
                case(5):
                    $edad = " AND (YEAR(CURRENT_DATE()) - YEAR(fecha_nac)) BETWEEN 40 AND 50 ";
                    break;
                case(6):
                    $edad = " AND (YEAR(CURRENT_DATE()) - YEAR(fecha_nac)) > 50 ";
                    break;               
            }
        } 
        if($filtrosP[2]!=0){
            $genero = " AND genero=:gen";
        } 
        if($filtrosP[3]!=0){
            $disc = " AND discapacidad=:disc";
        }
        $perqf = $perq.$ciu.$edad.$genero.$disc;
        $mainq = "SELECT per_id FROM curriculum WHERE per_id IN(".$perqf.")";
        if($filtrosC[0]!=0){
            $aspsal = " AND asp_salarial=:asp";
        } 
        if($filtrosC[1]!=0){
            $disp = " AND disp_tiempo=:disp";
        } 
        if($filtrosC[2]!=0){
            $licencia = " AND tipo_licencia=:lic";
        }
        $currq = $mainq.$aspsal.$disp.$licencia;
        if($edu!=0){
            $eduq = "JOIN curr_educacion ON curriculum.per_id=curr_educacion.curr_id WHERE curr_educacion.nivel=:edu";
        }
        if($idiomas[0]!=0){
            $idioq = "JOIN curr_idiomas ON curriculum.per_id=curr_idiomas.curr_id WHERE curr_idiomas.idioma IN (:idio)";
        }
        if($areas[0]!=0){
            $expq = "JOIN curr_experiencia ON curriculum.per_id=curr_experiencia.curr_id WHERE area IN (:area)";
        }
        $fq = $currq.$eduq.$idioq.$expq;
        $st = $link->prepare($fq);
        $st->bindparam(':emp', $emp->getId());
        $st->bindparam(':ofer', $oferta->getId());
        if($filtrosP[0]!=0){
            $st->bindparam(':ciu', $filtrosP[0]);
        }
        if($filtrosP[2]!=0){
            $st->bindparam(':gen', $filtrosP[2]);
        } 
        if($filtrosP[3]!=0){
            $st->bindparam(':disc', $filtrosP[3]);
        }
        if($filtrosC[0]!=0){
            $st->bindparam(':asp', $filtrosC[0]);
        } 
        if($filtrosC[1]!=0){
            $st->bindparam(':disp', $filtrosC[1]);
        } 
        if($filtrosC[2]!=0){
            $st->bindparam(':lic', $filtrosC[2]);
        }
        if($edu!=0){
            $st->bindparam(':edu', $edu);
        }
        if($idiomas[0]!=0){
            $st->bindparam(':idio', $idiomas);
        }
        if($areas[0]!=0){
            $st->bindparam(':area', $areas);
        }
        $st -> execute();
        $data = $st-> fetchAll();
        $i = 0;
        foreach ($data as $per_id){
            $curr = curriculum_global::getFullCurriculumFromPerId($per_id,$link);
            $currs[$i] = $curr;
            unset($curr);
            $i++;
        }
        return $currs;        
        
    }
    
    public function postOferta($oferta,$link){}
    public function delPostOferta($oferta, $link){}
    
    
}
