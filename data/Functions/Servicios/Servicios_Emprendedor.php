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
class servicios_emprendedor implements ServiciosInt{
    
   public function postServicio($serv, $comment, $valor, $link){
        if(servicios_emprendedor::checkPost($serv,$link)){
            $user = unserialize($_SESSION['user']);
        $st = $link -> prepare("INSERT INTO servicios_pos (ser_id, pub_usr_id, pos_usr_id, comentario, valor) "
                . "VALUES (:serv, :pub, :pos, :com, :val)");
        $st -> bindParam(':serv', $serv->getId());
        $st -> bindParam(':pub', $serv->getUsuario()->getId());
        $st -> bindParam(':pos', $user->getId());
        $st -> bindParam(':com', $comment);
        $st -> bindParam(':val', $valor);
        if($st -> execute()){
                echo 'Postulado';
                return true;
            } else {
                echo 'Hubo un problema al postular. Intente nuevamente.';
                return false;
            }
        } else {
            echo 'Ya has postulado a este servicio';
            return false;
        }
    }
    
     public function checkPost($serv,$link){
        $per = usuario_global::getMyUsr($link);
        $st = $link -> prepare("SELECT pos_usr_id FROM servicios_pos WHERE ser_id=:ser AND pub_usr_id=:usr AND pos_usr_id=:id AND estado='A'");
        $st -> bindParam(':ser', $serv->getId());
        $st -> bindParam(':id', $per->getId());
        $st -> bindParam(':usr', $serv->getUsuario()->getId());
        $st -> execute();
        $data = $st -> fetch();
        if($data==null){
            return true;
        } else {
            return false;
        }
    }
    
    public function delPostServicio($serv, $link){
        $user = unserialize($_SESSION['user']);
        $st = $link -> prepare("UPDATE servicios_pos SET estado='I' WHERE serv_id=:serv AND pub_usr_id=:pub"
                . " AND pos_usr_id=:pos");
        $st -> bindParam(':serv', $serv->getId());
        $st -> bindParam(':pub', $serv->getUsuario()->getId());
        $st -> bindParam(':pos', $user->getId());
        $st -> execute();
        $state = $st -> fetch();
       if($state){
                echo 'Postulación eliminada';
                return true;
            } else {
                echo 'Hubo un problema al eliminar la postulación. Intente nuevamente.';
                return false;
            }
    }

   public function newServicio($serv, $link){
        $user = unserialize($_SESSION['user']);
        if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
            $up = new uploader();
            $path = $up->uploadServ();
            if(isset($path)){
                $st = $link -> prepare("INSERT INTO servicios (usr_id, titulo, descripcion, area, subarea, rango_des, rango_has, modalidad, pais,"
                        . " provincia, ciudad, adjunto) VALUES (:id, :tit, :des, :area, :suba, :ranD, :ranH, :mod, :pais, :prov, :ciu, :path )");
                $st -> bindParam(':id',$user->getId());
                $st -> bindParam(':tit', $serv->getTitulo());
                $st -> bindParam(':des', $serv->getDescripcion());
                $st -> bindParam(':area', $serv->getArea());
                $st -> bindParam(':suba', $serv->getSubarea());
                $st -> bindParam(':ranD', $serv->getRangoDesde());
                $st -> bindParam(':ranH', $serv->getRangoHasta());
                $st -> bindParam(':mod', $serv->getModalidad());
                $st -> bindParam(':pais', $serv->getPais());
                $st -> bindParam(':prov', $serv->getProvincia());
                $st -> bindParam(':ciu', $serv->getCiudad());
                $st -> bindParam(':path', $path);
                $state = $st -> execute();
                if($state){
                    echo 'Servicio creado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al crear el servicio. Intente nuevamente.';
                    return false;
                }
            } else {
                echo 'Hubo un problema al subir el archivo.';
                return false;
            }
        } else {
            $st = $link -> prepare("INSERT INTO servicios (usr_id, titulo, descripcion, area, subarea, rango_des, rango_has, modalidad, pais,"
                        . " provincia, ciudad) VALUES (:id, :tit, :des, :area, :suba, :ranD, :ranH, :mod, :pais, :prov, :ciu )");
                $st -> bindParam(':id',$user->getId());
                $st -> bindParam(':tit', $serv->getTitulo());
                $st -> bindParam(':des', $serv->getDescripcion());
                $st -> bindParam(':area', $serv->getArea());
                $st -> bindParam(':suba', $serv->getSubarea());
                $st -> bindParam(':ranD', $serv->getRangoDesde());
                $st -> bindParam(':ranH', $serv->getRangoHasta());
                $st -> bindParam(':mod', $serv->getModalidad());
                $st -> bindParam(':pais', $serv->getPais());
                $st -> bindParam(':prov', $serv->getProvincia());
                $st -> bindParam(':ciu', $serv->getCiudad());
                $state = $st -> execute();
                if($state){
                    echo 'Servicio creado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al crear el servicio. Intente nuevamente.';
                    return false;
                }
        }
    }
    
    public function delServicio($serv, $link){
        $user = unserialize($_SESSION['user']);
        $st = $link -> prepare("UPDATE servicios SET estado='I' WHERE usr_id=:usr AND id=:id");
        $st -> bindParam(':usr',$user->getId());
        $st -> bindParam(':id', $serv->getId());
        $state = $st -> execute();
        if($state){
                    echo 'Servicio eliminado.';
                    return true;
                } else {
                    echo 'Hubo un problema al eliminar el servicio. Intente nuevamente.';
                    return false;
                }
    }
    
    public function editServicio($serv, $link){
        $user = unserialize($_SESSION['user']);
        if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
            $up = new uploader();
            $path = $up->uploadServ();
            if(isset($path)){
                $st = $link -> prepare("UPDATE servicios SET titulo=:tit, descripcion=:des, area=:area, subarea=:suba, rango_des=:ranD,"
                        . " rango_has=:ranH, modalidad=:mod, pais=:pais, provincia=:prov, ciudad=:ciu, adjunto=:path WHERE usr_id=:id AND id=:serv AND estado='A'");
                $st -> bindParam(':id',$user->getId());
                $st -> bindParam(':serv', $serv->getId());
                $st -> bindParam(':tit', $serv->getTitulo());
                $st -> bindParam(':des', $serv->getDescripcion());
                $st -> bindParam(':area', $serv->getArea());
                $st -> bindParam(':suba', $serv->getSubarea());
                $st -> bindParam(':ranD', $serv->getRangoDesde());
                $st -> bindParam(':ranH', $serv->getRangoHasta());
                $st -> bindParam(':mod', $serv->getModalidad());
                $st -> bindParam(':pais', $serv->getPais());
                $st -> bindParam(':prov', $serv->getProvincia());
                $st -> bindParam(':ciu', $serv->getCiudad());
                $st -> bindParam(':path', $path);
                $state = $st -> execute();
                if($state){
                    echo 'Servicio modificado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al modificar el servicio. Intente nuevamente.';
                    return false;
                }
            } else {
                echo 'Hubo un problema al subir el archivo.';
                return false;
            }
        } else {
            $st = $link -> prepare("UPDATE servicios SET titulo=:tit, descripcion=:des, area=:area, subarea=:suba, rango_des=:ranD,"
                        . " rango_has=:ranH, modalidad=:mod, pais=:pais, provincia=:prov, ciudad=:ciu WHERE usr_id=:id AND id=:serv AND estado='A'");
                $st -> bindParam(':id',$user->getId());
                $st -> bindParam(':serv', $serv->getId());
                $st -> bindParam(':tit', $serv->getTitulo());
                $st -> bindParam(':des', $serv->getDescripcion());
                $st -> bindParam(':area', $serv->getArea());
                $st -> bindParam(':suba', $serv->getSubarea());
                $st -> bindParam(':ranD', $serv->getRangoDesde());
                $st -> bindParam(':ranH', $serv->getRangoHasta());
                $st -> bindParam(':mod', $serv->getModalidad());
                $st -> bindParam(':pais', $serv->getPais());
                $st -> bindParam(':prov', $serv->getProvincia());
                $st -> bindParam(':ciu', $serv->getCiudad());
                $state = $st -> execute();
                if($state){
                    echo 'Servicio modificado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al modificar el servicio. Intente nuevamente.';
                    return false;
                }
        }
    }
    
    public function getPostulantes($serv, $link){
        $user = unserialize($_SESSION['user']);
        $st = $link -> prepare("SELECT pos_usr_id FROM servicios_pos WHERE pub_usr_id=:usr AND serv_id=:serv AND estado='A'");
        $st->bindparam(':usr', $user->getId());
        $st->bindparam(':serv', $serv->getId());
        $st -> execute();
        $data = $st-> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $usr = usuario_global::searchUsr($data);
                $usrs[$i][0] = $usr;
                $usrs[$i][1] = $data['comentario'];
                $usrs[$i][2] = $data['valor'];
                unset($usr);
                $i++;
            }
            return $usrs;  
        } else {
            echo 'No hay postulantes';
            return false;
        }  
    }
    
    function getPostulaciones($link){
        $usr = unserialize($_SESSION['user']);
        $st = $link -> prepare("SELECT * FROM servicios WHERE estado='A' AND id IN (SELECT ser_id FROM servicios_pos WHERE estado='A' AND pos_usr_id=:per)");
        $st->bindparam(':per', $usr->getId());
        $st -> execute();
        $data = $st-> fetchAll();
        $i = 0;
        if($data!=null){
            foreach ($data as $data){
                $ofer = new servicio();
                $ofer->buildServicio($data,$link);
                $ofers[$i] = $ofer;
                unset($ofer);
                $i++;
            }
            return $ofers;
        } else {
            return false;
        }
    }
    
    public function getAllPostulantes($link){
        $user = unserialize($_SESSION['user']);
        $st = $link -> prepare("SELECT pos_usr_id FROM servicios_pos WHERE pub_usr_id=:usr AND estado='A'");
        $st->bindparam(':usr', $user->getId());
        $st -> execute();
        $data = $st-> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $usr = usuario_global::searchUsr($data);
            $usrs[$i][0] = $usr;
            $usrs[$i][1] = $data['comentario'];
            $usrs[$i][2] = $data['valor'];
            unset($usr);
            $i++;
        }
        return $usrs;  
        
    }
    
    public function getServicio($serv_id, $link){
        $st = $link -> prepare("SELECT * FROM servicios WHERE id=:id AND estado='A'");
        $st->bindParam(':id',$serv_id);
        $st->execute();
        $data = $st->fetch();
        if($data!=null){
            $serv = new servicio();
            $serv->buildServicio($data, $link);
            return $serv;
        } else {
            return false;
        }
    }
    
    public function getServicios($perfil, $link){
        $st = $link -> prepare("SELECT * FROM servicios WHERE usr_id=:id AND estado='A'");
        $st->bindParam(':id',$perfil->getId());
        $st->execute();
        $data = $st->fetchAll();
        $i = 0;
        if($data!=null){
            foreach($data as $data){
                $serv = new servicio();
                $serv->buildServicio($data, $link);
                $servs[$i] = $serv;
                unset($serv);
                $i++;
            }
            return $servs;
        } else {
            return false;
        }
    }
}
