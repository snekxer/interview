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
class emprendedor_emprendedor implements EmprendedorInt{
    public function newEmprendedor($emprendedor, $link){
        $user = unserialize($_SESSION['user']);
        $cfrm = $link -> prepare ("SELECT * FROM emprendedor WHERE usr_id=:myid");
        $cfrm -> bindParam(':myid',$user->getId());
        $cfrm -> execute();
        $count = $cfrm->rowCount();
        if ($count==0||$count==null){
            $st = $link->prepare("INSERT INTO emprendedor (usr_id, email_contacto, telefono, movil, sitio_web, nombre, industria, pais, provincia, ciudad)
                                 VALUES (:usr, :email, :telf, :movil, :sitW, :nom, :ind, :pais, :prov, :ciu)");
            $st->bindParam(':usr',$user->getId());
            $st->bindParam(':email',$emprendedor->getEmailContacto());
            $st->bindParam(':telf',$emprendedor->getTelefono());
            $st->bindParam(':movil',$emprendedor->getMovil());
            $st->bindParam(':sitW',$emprendedor->getSitioWeb());
            $st->bindParam(':nom',$emprendedor->getNombre());
            $st->bindParam(':ind',$emprendedor->getIndustria());
            $st->bindParam(':pais',$emprendedor->getPais());
            $st->bindParam(':prov',$emprendedor->getProvincia());
            $st->bindParam(':ciu',$emprendedor->getCiudad());
            $state = $st->execute();

            return $state;
        } else {
            return false;
        }    
    }
    
    public function editEmprendedor($emprendedor, $link){
        $user = unserialize($_SESSION['user']);
        $st = $link -> prepare("UPDATE emprendedor SET email_contacto=:email, telefono=:telf, movil=:movil, sitio_web=:sitW, nombre=:nom, industria=:ind,
            pais=:pais, provincia=:prov, ciudad=:ciu WHERE usr_id=:id");
        $st -> bindParam(':id', $user->getId());
        $st->bindParam(':email',$emprendedor->getEmailContacto());
        $st->bindParam(':telf',$emprendedor->getTelefono());
        $st->bindParam(':movil',$emprendedor->getMovil());
        $st->bindParam(':sitW',$emprendedor->getSitioWeb());
        $st->bindParam(':nom',$emprendedor->getNombre());
        $st->bindParam(':ind',$emprendedor->getIndustria());
        $st->bindParam(':pais',$emprendedor->getPais());
        $st->bindParam(':prov',$emprendedor->getProvincia());
        $st->bindParam(':ciu',$emprendedor->getCiudad());
        $state = $st -> execute();
        
        return $state;
    }
    
    public function editPerfil($link){}
    public function delEmprendedor($link){}
    
    public function getEmprendedor($omp_id,$link){
        $st=$link->prepare('SELECT * FROM emprendedor WHERE usr_id=:id');
        $st -> bindParam(':id',$omp_id);
        $st -> execute();
        $data = $st->fetch();
        $emprendedor = new emprendedor();
        $emprendedor -> buildEmprendedor($data,$link);
        return $emprendedor;
    }
    
    public function getEmprendedorUsr($usuario,$link){
        $usr = $usuario->getId();
        $st=$link->prepare('SELECT * FROM emprendedor WHERE usr_id=:id');
        $st -> bindParam(':id',$usr);
        $st -> execute();
        $data = $st->fetch();
        $emprendedor = new emprendedor();
        $emprendedor -> buildEmprendedor($data,$link);
        return $emprendedor;
    }
}
