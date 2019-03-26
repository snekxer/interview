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
class trayectoria_emprendedor implements TrayectoriaInt{
    
    function getMyTra($link){
        $usr = unserialize($_SESSION['user']);
        if ($usr->getTipo()=='O'){
            $st = $link->prepare("SELECT * FROM trayectoria WHERE omp_id=:id");
            $st -> bindParam(':id', $usr->getId());
            $st -> execute();
            $data = $st -> fetch();
            if($data!=null){
                $tra = new trayectoria();
                $tra ->buildTrayectoriaEmprendedor($data,$link);
                return $tra;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }        
    
    function newTrayectoria($tra, $link){
        $usr = unserialize($_SESSION['user']);
        if ($usr->getTipo()=='O'){
            $omp = usuario_global::getMyUsr($link);
            $st = $link->prepare("INSERT INTO trayectoria (omp_id, acerca_de, contacto) VALUES (:id, :acd, :con)");
            $st -> bindParam(':id', $omp->getId());
            $st -> bindParam(':acd', $tra->getAcercaDe());
            $st -> bindParam(':con', $tra->getContacto());
            $state = $st -> execute();
            return $state;
        } else {
            return false;
        }
    }
    
    function newGaleria($gal, $link){
       $st = $link -> prepare("INSERT INTO tra_galeria (his_id, titulo, descripcion, foto) "
                . "VALUES (:id, :tit, :desc, :foto)");
        $tra = trayectoria_emprendedor::getMyTra($link);
        $st -> bindParam(':tra', $tra->getEmprendedor()->getId());
        $st -> bindParam(':tit',$gal->getTitulo());
        $st -> bindParam(':desc',$gal->getDescripcion());
        $st -> bindParam(':foto',$gal->getFoto());
        $state = $st -> execute();
        return $state;
    }
    
    function newProyecto($pro,$link){
        $tra = trayectoria_emprendedor::getMyTra($link);
        if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
            $up = new uploader();
            $path = $up->uploadOmpPro();
            if(isset($path)){
                $st = $link -> prepare("INSERT INTO tra_proyecto (tra_id, emp_nombre, titulo, descripcion, foto) VALUES (:tra, :nom, :tit, :desc, :foto)");
                $st -> bindParam(':tra', $tra->getEmprendedor()->getId());
                $st -> bindParam(':nom', $pro->getNombre());
                //$st -> bindParam(':logo', $pro->getLogo());
                //$st -> bindParam(':dur', $pro->getDuracion());
                $st -> bindParam(':tit', $pro->getTitulo());
                $st -> bindParam(':desc', $pro->getDescripcion());
                $st -> bindParam(':foto', $path);
                if($st -> execute()){
                    echo 'Proyecto creado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al crear el proyecto. Intente nuevamente.';
                    return false;
                }
            } else {
                echo 'Hubo un problema al subir el archivo.';
                return false;
            }
        } else {
             $st = $link -> prepare("INSERT INTO tra_proyecto (tra_id, emp_nombre, titulo, descripcion) VALUES (:tra, :nom, :tit, :desc)");
                $st -> bindParam(':tra', $tra->getEmprendedor()->getId());
                $st -> bindParam(':nom', $pro->getNombre());
                //$st -> bindParam(':logo', $pro->getLogo());
                //$st -> bindParam(':dur', $pro->getDuracion());
                $st -> bindParam(':tit', $pro->getTitulo());
                $st -> bindParam(':desc', $pro->getDescripcion());
                if($st -> execute()){
                    echo 'Proyecto creado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al crear el proyecto. Intente nuevamente.';
                    return false;
                }
        }
    }
    
    function delGaleria($gal, $link){
        $st = $link -> prepare("UPDATE tra_galeria SET estado='I' WHERE id=:ide AND tra_id=:his");
        $tra = getMyTra($link);
        $st -> bindParam(':tra', $tra->getEmprendedor()->getId());
        $st -> bindParam(':id', $gal->getId());
        $state = $st -> execute();
        return $state;
    }
    
    function delProyecto($pro,$link){
        $st = $link -> prepare("UPDATE tra_proyecto SET estado='I' WHERE tra_id=:tra AND id=:id ");
        $tra = trayectoria_emprendedor::getMyTra($link);
        $st -> bindParam(':tra', $tra->getEmprendedor()->getId());
        $st -> bindParam(':id', $pro->getId());
        $state = $st -> execute();
        return $state;
    }
    
    function editTrayectoria($tra, $link){
        $usr = unserialize($_SESSION['user']);
        if ($usr->getTipo()=='O'){
            $omp = usuario_global::getMyUsr($link);
            $st = $link->prepare("UPDATE trayectoria SET acerca_de=:acd, contacto=:con WHERE omp_id=:omp AND estado='A'");
            $st -> bindParam(':omp', $omp->getId());
            $st -> bindParam(':acd', $tra->getAcercaDe());
            $st -> bindParam(':con', $tra->getContacto());
            $state = $st -> execute();
            return $state;
        } else {
            return false;
        }
    }
    
    function editGaleria($gal, $link){
        $st = $link -> prepare("UPDATE tra_galeria SET titulo=:tit, descripcion=:desc, foto=:foto "
                . " WHERE id=:ide AND tra_id=:id AND estado='A'");
        $tra = trayectoria_emprendedor::getMyTra($link);
        $st -> bindParam(':id', $tra->getEmprendedor()->getId());
        $st -> bindParam(':ide',$gal->getId());
        $st -> bindParam(':tit',$gal->getTitulo());
        $st -> bindParam(':desc',$gal->getDescripcion());
        $st -> bindParam(':foto',$gal->getFoto());
        $state = $st -> execute();
        return $state;
    }
    
    function editProyecto($pro,$link){
        $tra = trayectoria_emprendedor::getMyTra($link);
        if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
            $up = new uploader();
            $path = $up->uploadOmpPro();
            if(isset($path)){
                $st = $link -> prepare("UPDATE tra_proyecto SET emp_nombre=:nom, duracion=:dur, titulo=:tit, descripcion=:desc, foto=:foto WHERE tra_id=:tra AND id=:id AND estado='A'");
                $st -> bindParam(':tra', $tra->getEmprendedor()->getId());
                $st -> bindParam(':id', $pro->getId());
                $st -> bindParam(':nom', $pro->getNombre());
                //$st -> bindParam(':logo', $pro->getLogo());
                $st -> bindParam(':dur', $pro->getDuracion());
                $st -> bindParam(':tit', $pro->getTitulo());
                $st -> bindParam(':desc', $pro->getDescripcion());
                $st -> bindParam(':foto', $pro->getFoto());
                if($st -> execute()){
                    echo 'Proyecto modificado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al modificar el proyecto. Intente nuevamente.';
                    return false;
                }
            } else {
                echo 'Hubo un problema al subir el archivo.';
                return false;
            }
        } else {
            $st = $link -> prepare("UPDATE tra_proyecto SET emp_nombre=:nom, duracion=:dur, titulo=:tit, descripcion=:desc WHERE tra_id=:tra AND id=:id AND estado='A'");
                $st -> bindParam(':tra', $tra->getEmprendedor()->getId());
                $st -> bindParam(':id', $pro->getId());
                $st -> bindParam(':nom', $pro->getNombre());
                //$st -> bindParam(':logo', $pro->getLogo());
                $st -> bindParam(':dur', $pro->getDuracion());
                $st -> bindParam(':tit', $pro->getTitulo());
                $st -> bindParam(':desc', $pro->getDescripcion());
                if($st -> execute()){
                    echo 'Proyecto modificado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al modificar el proyecto. Intente nuevamente.';
                    return false;
                }
        }
    }
    
    function getTrayectoria($omp, $link){
        $st = $link -> prepare("SELECT * FROM trayectoria WHERE omp_id=:id AND estado='A'");
        $st -> bindParam(':id', $omp->getId());
        $st -> execute();
        $data = $st -> fetch();
        $tra = new trayectoria();
        $tra ->buildTrayectoriaEmprendedor($data,$link);
        return $tra;
    }
    
   function getGalerias($tra, $link){
        $st = $link -> prepare("SELECT * FROM tra_galeria WHERE tra_id=:id AND estado='A'");
        $st -> bindParam(':id', $tra->getEmprendedor()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $gal = new tra_galeria();
            $gal ->buildTraGaleria($data);
            $gals[$i] = $gal;
            unset($gal);
            $i++;
        }
        return $gals;
    }
    
    function getProyectos($tra,$link){
        $st = $link -> prepare("SELECT * FROM tra_proyecto WHERE tra_id=:id AND estado='A'");
        $st -> bindParam(':id', $tra->getEmprendedor()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $pro = new tra_proyecto();
            $pro ->buildTraProyecto($data);
            $pros[$i] = $pro;
            unset($pro);
            $i++;
        }
        return $pros;
    }
    
    function getAllTrayectoria($omp,$link){
        $tra = getTrayectoria($omp, $link);
        $gals = getGalerias($tra, $link);
        $pros = getProyectos($tra, $link);
        $array = array(
            $tra,
            $gals,
            $pros
        );
        return $array;
    }
    
    function getProyectoFromId($pro_id,$link){
        $st = $link -> prepare("SELECT * FROM tra_proyecto WHERE id=:pro AND estado='A'");
        $st -> bindParam(':pro', $pro_id);
        $st -> execute();
        $data = $st -> fetch();
        $pro = new tra_proyecto;
        $pro->buildTraProyecto($data);
        
        return $pro;
    }

    
}
