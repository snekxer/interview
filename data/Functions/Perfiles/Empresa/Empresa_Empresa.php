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
class empresa_empresa implements EmpresaInt{
    public function newEmpresa($empresa, $link){
        $user = unserialize($_SESSION['user']);
        $cfrm = $link -> prepare ("SELECT * FROM empresa WHERE usr_id=:myid");
        $cfrm -> bindParam(':myid',$user->getId());
        $cfrm -> execute();
        $count = $cfrm->rowCount();
        if ($count==0||$count==null){
            $st = $link->prepare("INSERT INTO empresa (usr_id, email_contacto, telefono, movil, sitio_web, nombre, industria, razon_social, tipo_identificacion, identificacion, pais, provincia, ciudad)
                                 VALUES (:usr, :email, :telf, :movil, :sitW, :nom, :ind, :razS, :tipI, :iden, :pais, :prov, :ciu)");
            $st->bindParam(':usr',$user->getId());
            $st->bindParam(':email',$empresa->getEmailContacto());
            $st->bindParam(':telf',$empresa->getTelefono());
            $st->bindParam(':movil',$empresa->getMovil());
            $st->bindParam(':sitW',$empresa->getSitioWeb());
            $st->bindParam(':nom',$empresa->getNombre());
            $st->bindParam(':ind',$empresa->getIndustria());
            $st->bindParam(':razS',$empresa->getRazonSocial());
            $st->bindParam(':tipI',$empresa->getTipoIdentificacion());
            $st->bindParam(':iden',$empresa->getIdentificacion());
            $st->bindParam(':pais',$empresa->getPais());
            $st->bindParam(':prov',$empresa->getProvincia());
            $st->bindParam(':ciu',$empresa->getCiudad());
           
            $state = $st->execute();
            
            return $state;
        } else {
            return false;
        }
    }
    
    public function editEmpresa($empresa, $link){
        $user = unserialize($_SESSION['user']);
        $st = $link -> prepare("UPDATE empresa SET email_contacto=:emailC, telefono=:telf, movil=:movil, sitio_web=:sitW, nombre=:nom, industria=:ind,
            razon_social=:razS, tipo_identificacion=:tipoI, identificacion=:iden, pais=:pais, provincia=:prov, ciudad=:ciu WHERE usr_id=:id");
        $st -> bindParam(':id', $user->getId());
        $st->bindParam(':emailC',$empresa->getEmailContacto());
        $st->bindParam(':telf',$empresa->getTelefono());
        $st->bindParam(':movil',$empresa->getMovil());
        $st->bindParam(':sitW',$empresa->getSitioWeb());
        $st->bindParam(':nom',$empresa->getNombre());
        $st->bindParam(':ind',$empresa->getIndustria());
        $st->bindParam(':razS',$empresa->getRazonSocial());
        $st->bindParam(':tipoI',$empresa->getTipoIdentificacion());
        $st->bindParam(':iden',$empresa->getIdentificacion());
        $st->bindParam(':pais',$empresa->getPais());
        $st->bindParam(':prov',$empresa->getProvincia());
        $st->bindParam(':ciu',$empresa->getCiudad());
        $state = $st -> execute();
        
        return $state;
    }
    
    public function delEmpresa($link){}
    public function editPerfil($empresa, $link) {}
    
    public function getEmpresa($emp_id, $link){
        $st=$link->prepare('SELECT * FROM empresa WHERE usr_id=:id');
        $st -> bindParam(':id',$emp_id);
        $st -> execute();
        $data = $st->fetch();
        $empresa = new empresa();
        $empresa -> buildEmpresa($data, $link);
        return $empresa;
    }
    
    public function getEmpresaUsr($usuario, $link){
        $usr = $usuario->getId();
        $st=$link->prepapre('SELECT * FROM empresa WHERE usr_id=:id');
        $st -> bindParam(':id',$usr);
        $st -> execute();
        $data = $st->fetch();
        $empresa = new empresa();
        $empresa -> buildEmpresa($data, $link);
        return $empresa;
    }
}
