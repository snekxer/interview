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
class persona_persona implements PersonaInt{
    
    function getPersona($per_id,$link) {
        $st=$link->prepare('SELECT * FROM persona WHERE usr_id=:id');
        $st -> bindParam(':id',$per_id);
        $st -> execute();
        $data = $st->fetch();
        if($data!=null){
            $persona = new persona();
            $persona -> buildPersona($data, $link);
            return $persona;
        } else {
            return false;
        }
	}
        
    function getPersonaUsr($usuario,$link){
        $usr = $usuario->getId();
        $st=$link->prepare('SELECT * FROM persona WHERE usr_id=:id');
        $st -> bindParam(':id',$usr);
        $st -> execute();
        $data = $st->fetch();
        $persona = new persona();
        $persona -> buildPersona($data, $link);
        return $persona;
        
    }
    
    function newPersona($persona, $link){
        $usuario = unserialize($_SESSION['user']);
            $st = $link -> prepare("INSERT INTO persona (usr_id, email_contacto, telefono, movil, sitio_web, nombres, apellidos, fecha_nac,
                genero, nacionalidad, profesion, estado_civil, tipo_identificacion, identificacion, area, subarea, pais, provincia, ciudad, acerca_de) VALUES (:id,
                :emailC, :telf, :movil, :sitW, :nom, :ape, :fecN, :gen, :nacio, :prof, :estC, :tipoI, :iden, :area, :suba, :pais, :prov, :ciu, :aceD)");
            $st -> bindParam(':id', $usuario->getId());
            $st -> bindParam(':emailC', $persona->getEmailContacto());
            $st -> bindParam(':telf', $persona->getTelefono());
            $st -> bindParam(':movil', $persona->getMovil());
            $st -> bindParam(':sitW', $persona->getSitioWeb());
            $st -> bindParam(':nom', $persona->getNombres());
            $st -> bindParam(':ape', $persona->getApellidos());
            $st -> bindParam(':fecN', $persona->getFechaNac());
            $st -> bindParam(':gen', $persona->getGenero());
            $st -> bindParam(':nacio', $persona->getNacionalidad());
            $st -> bindParam(':prof', $persona->getProfesion());
            $st -> bindParam(':estC', $persona->getEstadoCivil());
            $st -> bindParam(':tipoI', $persona->getTipoIdentificacion());
            $st -> bindParam(':iden', $persona->getIdentificacion());
            $st -> bindParam(':area', $persona->getArea());
            $st -> bindParam(':suba', $persona->getSubarea());
            $st -> bindParam(':pais', $persona->getPais());
            $st -> bindParam(':prov', $persona->getProvincia());
            $st -> bindParam(':ciu', $persona->getCiudad());
            $st -> bindParam(':aceD', $persona->getAcercaDe());
            $state = $st -> execute();

            return $state;
        
    }
    
    function editPersona($persona, $link){
        $user = unserialize($_SESSION['user']);
        $st = $link -> prepare("UPDATE persona SET email_contacto=:emailC, telefono=:telf, movil=:movil, sitio_web=:sitW, nombres=:nom, apellidos=:ape, fecha_nac=:fecN,
            genero=:gen, nacionalidad=:nacio, profesion=:prof, estado_civil=:estC, tipo_identificacion=:tipoI, identificacion=:iden, area=:area, 
            subarea=:suba, pais=:pais, provincia=:prov, ciudad=:ciu, acerca_de=:aceD WHERE usr_id=:id");
        $st -> bindParam(':id', $user->getId());
        $st -> bindParam(':emailC', $persona->getEmailContacto());
        $st -> bindParam(':telf', $persona->getTelefono());
        $st -> bindParam(':movil', $persona->getMovil());
        $st -> bindParam(':sitW', $persona->getSitioWeb());
        $st -> bindParam(':nom', $persona->getNombres());
        $st -> bindParam(':ape', $persona->getApellidos());
        $st -> bindParam(':fecN', $persona->getFechaNac());
        $st -> bindParam(':gen', $persona->getGenero());
        $st -> bindParam(':nacio', $persona->getNacionalidad());
        $st -> bindParam(':prof', $persona->getProfesion());
        $st -> bindParam(':estC', $persona->getEstadoCivil());
        $st -> bindParam(':tipoI', $persona->getTipoIdentificacion());
        $st -> bindParam(':iden', $persona->getIdentificacion());
        $st -> bindParam(':area', $persona->getArea());
        $st -> bindParam(':suba', $persona->getSubarea());
        $st -> bindParam(':pais', $persona->getPais());
        $st -> bindParam(':prov', $persona->getProvincia());
        $st -> bindParam(':ciu', $persona->getCiudad());
        $st -> bindParam(':aceD', $persona->getAcercaDe());
        $state = $st -> execute();
        
        return $state;
    }
    
    function editPerfil($link) {}
    
    function delPersona($link){}
}
