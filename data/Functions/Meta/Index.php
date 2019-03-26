<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index
 *
 * @author pauli
 */
class Index {
    function lastOfertas($tipo,$link){
        $st = $link ->prepare("SELECT * FROM ofertas WHERE estado='A' ORDER BY ingreso DESC LIMIT 10");
        $st -> execute();
        $data = $st -> fetchAll();
        $i=0;
        if ($data!=NULL){
            foreach ($data as $data){
                $info = new oferta();
                if($tipo=='E'){
                    $info->buildOfertaEmpresa($data, $link);
                } else {
                    $info->buildOferta($data, $link);
                }
                $infos[$i] = $info;
                unset($info);
                $i++;
            }
            return $infos;
        } else {
            return false;
        }
            
    }
    
    function lastServicios($link){
        $st = $link ->prepare("SELECT * FROM servicios WHERE estado='A' ORDER BY ingreso DESC LIMIT 10");
        $st -> execute();
        $data = $st -> fetchAll();
        $i=0;
        if ($data!=NULL){
            foreach ($data as $data){
                $info = new servicio();
                $info->buildServicio($data, $link);
                $infos[$i] = $info;
                unset($info);
                $i++;
            }
            return $infos;
        } else {
            return false;
        }
    }
    
    function lastProductos($tipo,$link){
        $st = $link ->prepare("SELECT * FROM producto WHERE estado='A' ORDER BY ingreso DESC LIMIT 10");
        $st -> execute();
        $data = $st -> fetchAll();
        $i=0;
        if ($data!=NULL){
            foreach ($data as $data){
                $info = new producto();
                if($tipo=='E'){
                    $info->buildProductoEmpresa($data, $link);
                } else {
                    $info->buildProducto($data, $link);
                }
                $infos[$i] = $info;
                unset($info);
                $i++;
            }
            return $infos;
        } else {
            return false;
        }
    }
    
    function lastPortafolios($tipo,$link){
        $st = $link ->prepare("SELECT * FROM portafolio WHERE estado='A' ORDER BY ingreso DESC LIMIT 10");
        $st -> execute();
        $data = $st -> fetchAll();
        $i=0;
        if ($data!=NULL){
            foreach ($data as $data){
                $info = new portafolio();
                if($tipo=='P'){
                    $info->buildPortafolioPersona($data, $link);
                } else {
                    $info->buildPortafolio($data, $link);
                }
                $infos[$i] = $info;
                unset($info);
                $i++;
            }
            return $infos;
        } else {
            return false;
        }
    }
    
    function lastPersonas($link){
        $st = $link ->prepare("SELECT * FROM persona ORDER BY ingreso DESC LIMIT 10");
        $st -> execute();
        $data = $st -> fetchAll();
        $i=0;
        if ($data!=NULL){
            foreach ($data as $data){
                $info = new persona();
                $info->buildPersona($data, $link);
                $infos[$i] = $info;
                unset($info);
                $i++;
            }
            return $infos;
        } else {
            return false;
        }
    }
    
    function lastEmprendedores($link){
        $st = $link ->prepare("SELECT * FROM emprendedor ORDER BY ingreso DESC LIMIT 10");
        $st -> execute();
        $data = $st -> fetchAll();
        $i=0;
        if ($data!=NULL){
            foreach ($data as $data){
                $info = new emprendedor();
                $info->buildEmprendedor($data, $link);
                $infos[$i] = $info;
                unset($info);
                $i++;
            }
        return $infos;
        } else {
            return false;
        }
        
    }
    
    function lastEmpresas($link){
        $st = $link ->prepare("SELECT * FROM empresa ORDER BY ingreso DESC LIMIT 10");
        $st -> execute();
        $data = $st -> fetchAll();
        $i=0;
        if ($data!=NULL){
            foreach ($data as $data){
                $info = new empresa();
                $info->buildEmpresa($data, $link);
                $infos[$i] = $info;
                unset($info);
                $i++;
            }
            return $infos;
        } else {
            return false;
        }
    }
}
