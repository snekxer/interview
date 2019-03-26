<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class buscador {
    
    public function buscarOfertas ($str, $link){
        $st = $link -> prepare("SELECT * FROM ofertas WHERE estado='A' AND ( "
                . "titulo LIKE :str OR descripcion LIKE :str1 OR id IN("
                . "SELECT id FROM tags WHERE estado = 'A' AND tag LIKE :str2 AND tipo='O' ORDER BY tag))");
        $s= '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> bindParam(':str2', $s);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $ofer = new oferta();
                if(isset($_SESSION['user'])&& unserialize($_SESSION['user'])->getTipo()=='E'){
                    $ofer ->buildOfertaEmpresa($data, $link);
                } else {
                    $ofer ->buildOferta($data, $link);
                }
                $ofers[$i] = $ofer;
                unset($ofer);
                $i++;
            }
            return $ofers;
        } else {
            return false;
        }
    }
    
    public function buscarOfertasIndex ($str, $link){
        $st = $link -> prepare("SELECT * FROM ofertas WHERE estado='A' AND ( "
                . "titulo LIKE :str OR descripcion LIKE :str1 OR id IN("
                . "SELECT id FROM tags WHERE estado = 'A' AND tag LIKE :str2 AND tipo='O' ORDER BY tag) ORDER BY ingreso DESC LIMIT 10)");
        $s= '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> bindParam(':str2', $s);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $ofer = new oferta();
                $ofer ->buildOferta($data, $link);
                $ofers[$i] = $ofer;
                unset($ofer);
                $i++;
            }
            return $ofers;
        } else {
            return false;
        }
    }
    
    public function buscarServicios ($str, $link){
        $st = $link -> prepare("SELECT * FROM servicios WHERE estado='A' AND ( "
                . "titulo LIKE :str OR descripcion LIKE :str1 OR id IN("
                . "SELECT id FROM tags WHERE estado = 'A' AND tag LIKE :str2 AND tipo='S' ORDER BY tag))");
        $s= '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> bindParam(':str2', $s);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $serv = new servicio();
                $serv ->buildServicio($data, $link);
                $servs[$i] = $serv;
                unset($serv);
                $i++;
            }
            return $servs;
        } else {
            return false;
        }
        
    }
    public function buscarServiciosIndex ($str, $link){
        $st = $link -> prepare("SELECT * FROM servicios WHERE estado='A' AND ( "
                . "titulo LIKE :str OR descripcion LIKE :str1 OR id IN("
                . "SELECT id FROM tags WHERE estado = 'A' AND tag LIKE :str2 AND tipo='S' ORDER BY tag) ORDER BY ingreso DESC LIMIT 10)");
        $s= '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> bindParam(':str2', $s);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $serv = new servicio();
                $serv ->buildServicio($data, $link);
                $servs[$i] = $serv;
                unset($serv);
                $i++;
            }
            return $servs;
        } else {
            return false;
        }
        
    }

    public function buscarProductos ($str, $link){
        $st = $link -> prepare("SELECT * FROM producto WHERE estado='A' AND ( "
                . "titulo LIKE :str OR descripcion LIKE :str1 OR id IN("
                . "SELECT id FROM tags WHERE estado = 'A' AND tag LIKE :str2 AND tipo='PR' ORDER BY tag))");
        $s= '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> bindParam(':str2', $s);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $prod = new producto();
                $prod ->buildProducto($data, $link);
                $prods[$i] = $prod;
                unset($prod);
                $i++;
            }
            return $prods;
        } else {
            return false;
        }
        
    }    
    
    public function buscarProductosIndex ($str, $link){
        $st = $link -> prepare("SELECT * FROM producto WHERE estado='A' AND ( "
                . "titulo LIKE :str OR descripcion LIKE :str1 OR id IN("
                . "SELECT id FROM tags WHERE estado = 'A' AND tag LIKE :str2 AND tipo='PR' ORDER BY tag) ORDER BY ingreso DESC LIMIT 10 )");
        $s= '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> bindParam(':str2', $s);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $prod = new producto();
                $prod ->buildProducto($data, $link);
                $prods[$i] = $prod;
                unset($prod);
                $i++;
            }
            return $prods;
        } else {
            return false;
        }
        
    }
    
    public function buscarPortafolios ($str, $link){
        $st = $link -> prepare("SELECT * FROM portafolio WHERE estado='A' AND  ( "
                . "titulo LIKE :str OR descripcion LIKE :str1 OR id IN("
                . "SELECT id FROM tags WHERE estado = 'A' AND tag LIKE :str2 AND tipo='PT' ORDER BY tag))");
        $s= '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> bindParam(':str2', $s);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $port = new portafolio();
                $port ->buildPortafolio($data, $link);
                $ports[$i] = $port;
                unset($port);
                $i++;
            }
            return $ports;
        } else {
            return false;
        }
    }
    
    public function buscarPortafoliosIndex ($str, $link){
        $st = $link -> prepare("SELECT * FROM portafolio WHERE estado='A' AND ( "
                . "titulo LIKE :str OR descripcion LIKE :str1 OR id IN("
                . "SELECT id FROM tags WHERE estado = 'A' AND tag LIKE :str2 AND tipo='PT' ORDER BY tag) ORDER BY ingreso DESC LIMIT 10)");
        $s= '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> bindParam(':str2', $s);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $port = new portafolio();
                $port ->buildPortafolio($data, $link);
                $ports[$i] = $port;
                unset($port);
                $i++;
            }
            return $ports;
        } else {
            return false;
        }
    }
    
    public function buscarEmpresas ($str, $link){
        $st = $link -> prepare("SELECT * FROM empresa WHERE "
                . "nombre LIKE :str OR razon_social LIKE :str1 AND estado='A'");
        $s= '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $emp = new empresa();
                $emp ->buildEmpresa($data, $link);
                $emps[$i] = $emp;
                unset($emp);
                $i++;
            }
            return $emps;
        } else {
            return false;
        }
    }   
    
    public function buscarEmpresasIndex ($str, $link){
        $st = $link -> prepare("SELECT * FROM empresa WHERE "
                . "nombre LIKE :str OR razon_social LIKE :str1 AND estado='A' ORDER BY ingreso DESC LIMIT 10");
        $s= '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $emp = new empresa();
                $emp ->buildEmpresa($data, $link);
                $emps[$i] = $emp;
                unset($emp);
                $i++;
            }
            return $emps;
        } else {
            return false;
        }
    }
    
    public function buscarPersonas ($str, $link){
        $st = $link -> prepare("SELECT * FROM persona WHERE estado='A' AND ("
                . "nombres LIKE :str OR apellidos LIKE :str1 OR acerca_de LIKE :str2 "
                . "OR profesion LIKE :str3 )");
        $s = '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> bindParam(':str2', $s);
        $st -> bindParam(':str3', $s);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $per = new persona();
                $per ->buildPersona($data, $link);
                $pers[$i] = $per;
                unset($per);
                $i++;
            }
            return $pers;
        } else {
            return false;
        }
    }
    
    public function buscarPersonasIndex ($str, $link){
        $st = $link -> prepare("SELECT * FROM persona WHERE estado='A' AND ( "
                . "nombres LIKE :str OR apellidos LIKE :str1 OR acerca_de LIKE :str2 "
                . "OR profesion LIKE :str3 ORDER BY ingreso DESC LIMIT 10)");
        $s = '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> bindParam(':str2', $s);
        $st -> bindParam(':str3', $s);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $per = new persona();
                $per ->buildPersona($data, $link);
                $pers[$i] = $per;
                unset($per);
                $i++;
            }
            return $pers;
        } else {
            return false;
        }
    }
    
    public function buscarEmprendedores ($str, $link){
        $st = $link -> prepare("SELECT * FROM emprendedor WHERE estado='A' AND "
                . "nombre LIKE :str ");
        $s = '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $omp = new emprendedor();   
                $omp ->buildEmprendedor($data, $link);
                $omps[$i] = $omp;
                unset($omp);
                $i++;
            }
            return $omps;
        } else {
            return false;
        }
    }
    
    public function buscarEmprendedoresIndex ($str, $link){
        $st = $link -> prepare("SELECT * FROM emprendedor WHERE estado='A' AND "
                . "nombre LIKE :str ORDER BY ingreso DESC LIMIT 10");
        $s = '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $omp = new emprendedor();   
                $omp ->buildEmprendedor($data, $link);
                $omps[$i] = $omp;
                unset($omp);
                $i++;
            }
            return $omps;
        } else {
            return false;
        }
    }
    
    public function busquedaEspOfertas($array,$str,$link){
        $mainq = "SELECT * FROM ofertas WHERE estado='A'";
        $endq = " AND titulo LIKE :str OR descripcion LIKE :str1 OR id IN(" 
                . "SELECT id FROM tags WHERE estado = 'A' AND tag LIKE :str2 AND tipo='O' ORDER BY tag)";
        if ($array[0]!=0){
            $area = " AND area=:area ";
        }
        if ($array[1]!=0){
            $contrato = " AND contrato=:cont ";
        }
        if ($array[2]!=0){
            $modalidad = " AND modalidad=:mod ";
        }
        if ($array[3]!=0){
            $ciudad = " AND ciudad=:ciu ";
        }
        if ($array[4]!=0){
            $renum = " AND renumeracion=:renum ";
        }
        if ($array[5]!=0){
            $experiencia = " AND experiencia=:exp ";
        }
        if ($array[6]!=0){
            $edad = " AND edad=:edad ";
        }
        if ($array[7]!=0){
            $senority = " AND senority=:sen ";
        }
        if ($array[8]!=0){
            $disc = " AND discapacidad=:disc ";
        }
        $st = $link->prepare($mainq.$area.$contrato.$modalidad.$ciudad.$renum.$experiencia.$edad.$senority.$disc.$endq);
        $s = '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> bindParam(':str2', $s);
        $st->bindParam(':area', $array[0]);
        $st->bindParam(':cont', $array[1]);
        $st->bindParam(':mod', $array[2]);
        $st->bindParam(':ciu', $array[3]);
        $st->bindParam(':renum', $array[4]);
        $st->bindParam(':exp', $array[5]);
        $st->bindParam(':edad', $array[6]);
        $st->bindParam(':sen', $array[7]);
        $st->bindParam(':disc', $array[8]);
        $st->execute();
        $data = $st->fetchAll();
        $i=0;
        if($data!=null){
            foreach ($data as $data){
                $ofer = new oferta();
                $ofer -> buildOferta($data,$link);
                $ofertas[$i] = $ofer;
                unset($ofer);
                $i++;
            }
            return $ofertas;
        } else {
            echo 'No hay resultados';
            return false;
        }
    }   
    
    public function busquedaEspServicios($array,$str,$link){
        $mainq = "SELECT * FROM servicios WHERE estado='A'";
        $endq = " AND titulo LIKE :str OR descripcion LIKE :str OR id IN(" 
                . "SELECT id FROM tags WHERE estado = 'A' AND tag LIKE :str AND tipo='O' ORDER BY tag)";
        if ($array[0]!=0){
            $area = " AND area=:area ";
        }
        if ($array[1]!=0){
            $modalidad = " AND modalidad=:mod ";
        }
        if ($array[2]!=0){
            $ciudad = " AND ciudad=:ciu ";
        }
         $st = $link->prepare($mainq.$area.$modalidad.$ciudad.$endq);
         $s = '%'.$str.'%';
         $st -> bindParam(':str', $s);
         $st -> bindParam(':str1', $s);
         $st -> bindParam(':str2', $s);
         $st->bindParam(':area', $array[0]);
         $st->bindParam(':mod', $array[1]);
         $st->bindParam(':ciu', $array[2]);
         $st -> execute();
         $data = $st -> fetchAll();
         $i = 0;
         if($data!=null){
            foreach ($data as $data){
               $serv = new servicio();
               $serv ->buildServicio($data, $link);
               $servs[$i] = $serv;
               unset($serv);
               $i++;
            }
            return $servs;
         } else {
            return false;
        }
         
    }
    
    public function busquedaEspEmpresas($array,$str,$link){
        $mainq = "SELECT * FROM empresa WHERE estado='A'";
        $endq= "AND nombre LIKE :str OR razon_social LIKE :str1";
        if ($array[0]!=0){
            $industria = " AND industria=:ind ";
        }
        if ($array[1]!=0){
            $ciudad = " AND ciudad=:ciu ";
        }
        $st = $link -> prepare($mainq.$industria.$ciudad.$endq);
        $s = '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> bindParam(':ind', $array[0]);
        $st -> bindParam(':ciu', $array[1]);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $emp = new empresa();
                $emp ->buildEmpresa($data, $link);
                $emps[$i] = $emp;
                unset($emp);
                $i++;
            }
            return $emps;
        } else {
            return false;
        }
    }
    
    public function busquedaEspPersonas($array,$str,$link){
        $mainq = "SELECT * FROM persona WHERE estado='A'";
        $endq = "AND nombres LIKE :str OR apellidos LIKE :str1 OR acerca_de LIKE :str2 OR profesion LIKE :str3";
        if ($array[0]!=0){
            $area = " AND area=:area ";
        }
        if ($array[1]!=0){
            $ciudad = " AND ciudad=:ciu ";
        }
        if ($array[2]!=0){
            $profesion = " AND profesion=:prof ";
        }
        $st = $link -> prepare($mainq.$area.$ciudad.$profesion.$endq);
        $s = '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':str1', $s);
        $st -> bindParam(':str2', $s);
        $st -> bindParam(':str3', $s);
        $st -> bindParam(':area', $array[0]);
        $st -> bindParam(':ciu', $array[1]);
        $st -> bindParam(':prof', $array[2]);
        $st -> execute();
        $data = $st -> fetch();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $per = new persona();
                $per ->buildPersona($data, $link);
                $pers[$i] = $per;
                unset($per);
                $i++;
            }
            return $pers;   
        } else {
            return false;
        }
    }
    
    public function busquedaEspEmprendedores($array,$str,$link){
        $mainq = "SELECT * FROM emprendedor WHERE estado='A'";
        $endq = "AND nombre LIKE :str";
        if ($array[0]!=0){
            $industria = " AND industria=:ind ";
        }
        if ($array[1]!=0){
            $ciudad = " AND ciudad=:ciu ";
        }
        $st = $link -> prepare($mainq.$industria.$ciudad.$endq);
        $s = '%'.$str.'%';
        $st -> bindParam(':str', $s);
        $st -> bindParam(':ind', $array[0]);
        $st -> bindParam(':ciu', $array[1]);
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $omp = new emprendedor();   
                $omp ->buildEmprendedor($data, $link);
                $omps[$i] = $omp;
                unset($omp);
                $i++;
            }
            return $omps;
        } else {
            return false;
        }
    }
    
}