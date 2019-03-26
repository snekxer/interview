<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Meta_Global
 *
 * @author pauli
 */
class meta_global {
    
    public function getArea($area_id,$link){
        $st = $link -> prepare("SELECT * FROM area WHERE id = :area " );
        $st -> bindParam(':area',$area_id);
        $st -> execute();
        $data = $st->fetch();
        $area = new area();
        $area -> buildArea($data);
        return $area;
    }
    
    public function getSubarea($subarea_id, $link){
        $st = $link -> prepare("SELECT * FROM subarea WHERE id = :subarea ");
        $st -> bindParam(':subarea',$subarea_id);
        $st -> execute();
        $data = $st->fetch();
        $subarea = new subarea();
        $subarea -> buildSubarea($data, $link);
        return $subarea;
    } 
     
    public function getAllAreas($link){
        $st = $link -> prepare("SELECT * FROM area ORDER BY nombre");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $area = new area();
            $area -> buildArea($data);
            $areas[$i] = $area;
            unset($area);
            $i++;
        }
        return $areas;
    }
    
    public function getAllSubareas($area_id, $link){
        $st = $link -> prepare("SELECT * FROM subarea WHERE area_id=:area ORDER BY nombre");
        $st -> bindParam(':area',$area_id);
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $subarea = new subarea();
            $subarea -> buildSubarea($data, $link);
            $subareas[$i] = $subarea;
            unset($subarea);
            $i++;
        }
        return $subareas;
    }
    
    public function getPais($pais_id, $link){
        $st = $link -> prepare("SELECT * FROM pais WHERE id=:pais");
        $st -> bindParam(':pais',$pais_id);
        $st -> execute();
        $data = $st->fetch();
        $pais = new pais();
        $pais -> buildPais($data);
        return $pais;
    }
    
    public function getProvincia($prov_id, $link){
        $st = $link -> prepare("SELECT * FROM provincia WHERE id=:prov");
        $st -> bindParam(':prov',$prov_id);
        $st -> execute();
        $data = $st->fetch();
        $prov = new provincia();
        $prov -> buildProvincia($data, $link);
        return $prov;
    }
    
    public function getCiudad($ciu_id, $link){
        $st = $link -> prepare("SELECT * FROM ciudad WHERE id=:ciu");
        $st -> bindParam(':ciu',$ciu_id);
        $st -> execute();
        $data = $st->fetch();
        $ciu = new ciudad();
        $ciu -> buildCiudad($data, $link);
        return $ciu;
    }
    
    public function getAllPaises($link){
        $st = $link -> prepare("SELECT * FROM pais  ORDER BY id");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $pais = new pais();
            $pais -> buildPais($data);
            $paises[$i] = $pais;
            unset($pais);
            $i++;
        }
        return $paises;
    }
    
    public function getAllProvincias($pais_id, $link){
        $st = $link -> prepare("SELECT * FROM provincia WHERE pais_id=:pais  ORDER BY nombre");
        $st -> bindParam(':pais',$pais_id);
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $prov = new provincia();
            $prov -> buildProvincia($data, $link);
            $provs[$i] = $prov;
            unset($prov);
            $i++;
        }
        return $provs;
    }
    
    public function getAllCiudades($prov_id, $link){
        $st = $link -> prepare("SELECT * FROM ciudad WHERE prov_id=:prov  ORDER BY nombre");
        $st -> bindParam(':prov',$prov_id);
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $ciu = new ciudad();
            $ciu -> buildCiudad($data, $link);
            $cius[$i] = $ciu;
            unset($ciu);
            $i++;
        }
        return $cius;
    }
    
    public function getIndustria($ind_id, $link){
        $st = $link -> prepare("SELECT * FROM industria WHERE id=:ind ");
        $st -> bindParam(':ind',$ind_id);
        $st -> execute();
        $data = $st->fetch();
        $ind = new industria();
        $ind -> buildIndustria($data);
        return $ind;
    }
    
    public function getAllIndustrias($link){
        $st = $link -> prepare("SELECT * FROM industria ORDER BY nombre");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $ind = new industria();
            $ind -> buildIndustria($data);
            $inds[$i] = $ind;
            unset($ind);
            $i++;
        }
        return $inds;
    }
    
    public function getTema($tema_id, $link){
        $st = $link -> prepare("SELECT * FROM temas WHERE id=:tema");
        $st -> bindParam(':tema',$tema_id);
        $st -> execute();
        $data = $st->fetch();
        $tema = new tema();
        $tema -> buildTema($data);
        return $tema;
    }
    
    public function getAllTemas($link){
        $st = $link -> prepare("SELECT * FROM temas");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $tema = new tema();
            $tema -> buildTema($data);
            $temas[$i] = $tema;
            unset($tema);
            $i++;
        }
        return $temas;
    }
    
    public function getProfesion($prof_id, $link){
        $st = $link -> prepare("SELECT * FROM profesion WHERE id=:prof");
        $st -> bindParam(':prof',$prof_id);
        $st -> execute();
        $data = $st->fetch();
        $prof = new profesion();
        $prof -> buildProfesion($data);
        return $prof;
    }
    
    public function getAllProfesiones($link){
        $st = $link -> prepare("SELECT * FROM profesion  ORDER BY nombre");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $prof = new profesion();
            $prof -> buildProfesion($data);
            $profs[$i] = $prof;
            unset($prof);
            $i++;
        }
        return $profs;
    }    
    
    public function newProfesion($profesion, $link){
        $user = unserialize($_SESSION['user']);
        $st = $link -> prepare("INSERT INTO profesion (nombre, usr_id) VALUES (:prof,:usr)");
        $st -> bindParam(':prof',$profesion->getNombre());
        $st -> bindParam(':usr',$user->getId());
        $state = $st -> execute();
        return $state;
    }
    
    public function getLicencia($lic_id,$link){
        $st = $link -> prepare("SELECT * FROM licencia_m WHERE id = :lic");
        $st -> bindParam(':lic',$lic_id);
        $st -> execute();
        $data = $st->fetch();
        $info = new licencia();
        $info -> buildLicencia($data);
        return $info;
    }
    
    public function getAllLicencias($link){
        $st = $link -> prepare("SELECT * FROM licencia_m");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $info = new licencia();
            $info ->buildLicencia($data);
            $infos[$i] = $info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getEdad($ed, $link){
        $st = $link -> prepare("SELECT * FROM edad_m WHERE id = :id");
        $st -> bindParam(':id',$ed);
        $st -> execute();
        $data = $st->fetch();
        $info = new edad();
        $info -> buildEdad($data);
        return $info;
    }
    
    public function getAllEdades($link){
        $st = $link -> prepare("SELECT * FROM edad_m");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $info = new edad();
            $info ->buildEdad($data);
            $infos[$i] = $info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getIdioma($id,$link){
        $st = $link -> prepare("SELECT * FROM idiomas_m WHERE id = :id  ORDER BY nombre");
        $st -> bindParam(':id',$id);
        $st -> execute();
        $data = $st->fetch();
        $info = new idiomaM();
        $info -> buildIdiomaM($data);
        return $info;
    }
    
    public function getAllIdiomas($link){
        $st = $link -> prepare("SELECT * FROM idiomas_m");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $info = new idiomaM();
            $info ->buildIdiomaM($data);
            $infos[$i] = $info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getEstCivil($id,$link){
        $st = $link -> prepare("SELECT * FROM estado_civil_m WHERE id = :id");
        $st -> bindParam(':id',$id);
        $st -> execute();
        $data = $st->fetch();
        $info = new estadoCivil();
        $info ->buildEstCivil($data);
        return $info;
    }
    
    public function getAllEstCivil($link){
        $st = $link -> prepare("SELECT * FROM estado_civil_m  ORDER BY nombre");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $info = new estadoCivil();
            $info ->buildEstCivil($data);
            $infos[$i] = $info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getExp($id,$link){
        $st = $link -> prepare("SELECT * FROM experiencia_m WHERE id = :id");
        $st -> bindParam(':id',$id);
        $st -> execute();
        $data = $st->fetch();
        $info = new experienciaM();
        $info ->buildExpM($data);
        return $info;
    }
    
    public function getAllExp($link){
        $st = $link -> prepare("SELECT * FROM experiencia_m  ORDER BY nombre");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $info = new experienciaM();
            $info ->buildExpM($data);
            $infos[$i] = $info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getNivel($id,$link){
        $st = $link -> prepare("SELECT * FROM niveles_m WHERE id = :id");
        $st -> bindParam(':id',$id);
        $st -> execute();
        $data = $st->fetch();
        $info = new nivel();
        $info ->buildNivel($data);
        return $info;
    }
    
    public function getAllNiveles($link){
        $st = $link -> prepare("SELECT * FROM niveles_m ORDER BY id");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $info = new nivel();
            $info ->buildNivel($data);
            $infos[$i] = $info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getNivelEdu($id,$link){
        $st = $link -> prepare("SELECT * FROM nivel_edu_m WHERE id = :id");
        $st -> bindParam(':id',$id);
        $st -> execute();
        $data = $st->fetch();
        $info = new nivelEdu();
        $info ->buildNivelEdu($data);
        return $info;
    }
    
    public function getAllNivelesEdu($link){
        $st = $link -> prepare("SELECT * FROM nivel_edu_m ORDER BY nombre");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $info = new nivelEdu();
            $info ->buildNivelEdu($data);
            $infos[$i] = $info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getRangoSal($id,$link){
        $st = $link -> prepare("SELECT * FROM rango_salarial_m WHERE id = :id");
        $st -> bindParam(':id',$id);
        $st -> execute();
        $data = $st->fetch();
        $info = new rangoSalarial();
        $info ->buildRangoSal($data);
        return $info;
    }
    
    public function getAllRangoSal($link){
        $st = $link -> prepare("SELECT * FROM rango_salarial_m  ");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $info = new rangoSalarial();
            $info ->buildRangoSal($data);
            $infos[$i] = $info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getDispTiempo($id,$link){
        $st = $link -> prepare("SELECT * FROM disp_tiempo_m WHERE id = :id");
        $st -> bindParam(':id',$id);
        $st -> execute();
        $data = $st->fetch();
        $info = new dispTiempo();
        $info ->buildDispTiempo($data);
        return $info;
    }
    
    public function getAllDispTiempo($link){
        $st = $link -> prepare("SELECT * FROM disp_tiempo_m  ORDER BY nombre");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $info = new dispTiempo();
            $info ->buildDispTiempo($data);
            $infos[$i] = $info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getModalidad($id,$link){
        $st = $link -> prepare("SELECT * FROM modalidad_m WHERE id = :id");
        $st -> bindParam(':id',$id);
        $st -> execute();
        $data = $st->fetch();
        $info = new modalidad();
        $info ->buildModalidad($data);
        return $info;
    }
    
    public function getAllModalidades($link){
        $st = $link -> prepare("SELECT * FROM modalidad_m  ORDER BY nombre");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $info = new modalidad();
            $info ->buildModalidad($data);
            $infos[$i] = $info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getContrato($id,$link){
        $st = $link -> prepare("SELECT * FROM contratos_m WHERE id = :id");
        $st -> bindParam(':id',$id);
        $st -> execute();
        $data = $st->fetch();
        $info = new contrato();
        $info ->buildContrato($data);
        return $info;
    }
    
    public function getAllContratos($link){
        $st = $link -> prepare("SELECT * FROM contratos_m  ORDER BY nombre");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $info = new contrato();
            $info ->buildContrato($data);
            $infos[$i] = $info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
    public function getRenumeracion($id,$link){
        $st = $link -> prepare("SELECT * FROM renumeracion_m WHERE id = :id");
        $st -> bindParam(':id',$id);
        $st -> execute();
        $data = $st->fetch();
        $info = new renumeracion();
        $info ->buildRenumeracion($data);
        return $info;
    }
    
    public function getAllRenumeraciones($link){
        $st = $link -> prepare("SELECT * FROM renumeracion_m  ORDER BY nombre");
        $st -> execute();
        $data = $st->fetchAll();
        $i=0;
        foreach ($data as $data){
            $info = new renumeracion();
            $info ->buildRenumeracion($data);
            $infos[$i] = $info;
            unset($info);
            $i++;
        }
        return $infos;
    }
    
}
