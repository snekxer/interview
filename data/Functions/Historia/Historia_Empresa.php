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
class historia_empresa implements HistoriaInt{
    
    public function getMyHis($link){
        $user = unserialize($_SESSION['user']);
        if ($user->getTipo()=='E'){
            $emp = usuario_global::getMyUsr($link);
            $st = $link -> prepare("SELECT * FROM historia WHERE emp_id=:emp AND estado='A'");
            $st -> bindParam(':emp', $emp->getId());
            $st -> execute();
            $data = $st -> fetch();
            if ($data!= null){
                $his = new historia($data);
                $his ->buildHistoriaEmpresa($data,$link);
                return $his;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    function newHistoria($his, $link){
        $user = unserialize($_SESSION['user']);
        if ($user->getTipo()=='E'){
            $emp = usuario_global::getMyUsr($link);
            $st = $link -> prepare("INSERT INTO historia (emp_id, quienes_somos, mision, vision, contacto, valores,"
                    . "slogan) VALUES (:emp, :qs, :mis, :vis, :con, :val, :slo)");
            $st -> bindParam(':emp',$emp->getId());
            $st -> bindParam(':qs',$his->getQuienesSomos());
            $st -> bindParam(':mis',$his->getMision());
            $st -> bindParam(':vis',$his->getVision());
            $st -> bindParam(':con',$his->getContacto());
            $st -> bindParam(':val',$his->getValores());
            $st -> bindParam(':slo',$his->getSlogan());
            $state = $st -> execute();
            return $state;
        } else {
            return false;
        }
    }
    
    function newGaleria($gal, $link){
        $st = $link -> prepare("INSERT INTO his_galeria (emp_id, titulo, descripcion, foto) "
                . "VALUES (:id, :tit, :desc, :foto)");
        $his = historia_empresa::getMyHis($link);
        $st -> bindParam(':id',$his->getEmpresa()->getId());
        $st -> bindParam(':tit',$gal->getTitulo());
        $st -> bindParam(':desc',$gal->getDescripcion());
        $st -> bindParam(':foto',$gal->getFoto());
        $state = $st -> execute();
        return $state;
    }
    
    function newProyecto($pro,$link){
        $his = historia_empresa::getMyHis($link);
        if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
            $up = new uploader();
            $path = $up->uploadOmpPro();
            if(isset($path)){
                $st = $link -> prepare('INSERT INTO his_proyecto (emp_id, emp_nombre, descripcion, foto) VALUES (:his, :nom, :desc, :foto)');
                $st -> bindParam(':his', $his->getEmpresa()->getId());
                $st -> bindParam(':nom', $pro->getNombre());
                //$st -> bindParam(':logo', $pro->getLogo());
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
            $st = $link -> prepare('INSERT INTO his_proyecto (emp_id, emp_nombre, descripcion) VALUES (:his, :nom, :desc)');
            $st -> bindParam(':his', $his->getEmpresa()->getId());
            $st -> bindParam(':nom', $pro->getNombre());
            //$st -> bindParam(':logo', $pro->getLogo());
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
        $st = $link -> prepare("UPDATE his_galeria SET estado='I' WHERE id=:ide AND emp_id=:his");
        $his = getMyHis($link);
        $st -> bindParam(':his', $his->getEmpresa()->getId());
        $st -> bindParam(':id', $gal->getId());
        $state = $st -> execute();
        return $state;
        
    }
    
    function delProyecto($pro,$link){
        $st = $link -> prepare("UPDATE his_proyecto SET estado='I' WHERE emp_id=:his AND id=:id ");
        $his = historia_empresa::getMyHis($link);
        $st -> bindParam(':his', $his->getEmpresa()->getId());
        $st -> bindParam(':id', $pro->getId());
        $state = $st -> execute();
        return $state;
    }
    
    function editHistoria($his, $link){
        $user = unserialize($_SESSION['user']);
        if ($user->getTipo()=='E'){
            $emp = usuario_global::getMyUsr($link);
            $st = $link -> prepare("UPDATE historia SET quienes_somos=:qs, mision=:mis, vision=:vis, contacto=:con, valores=:val,"
                    . "slogan=:slo WHERE emp_id=:emp AND estado='A'");
            $st -> bindParam(':emp',$emp->getId());
            $st -> bindParam(':qs',$his->getQuienesSomos());
            $st -> bindParam(':mis',$his->getMision());
            $st -> bindParam(':vis',$his->getVision());
            $st -> bindParam(':con',$his->getContacto());
            $st -> bindParam(':val',$his->getValores());
            $st -> bindParam(':slo',$his->getSlogan());
            $state = $st -> execute();
            return $state;
        } else {
            return false;
        }
    }
    
    function editGaleria($gal, $link){
        $st = $link -> prepare("UPDATE his_galeria SET titulo=:tit, descripcion=:desc, foto=:foto "
                . " WHERE id=:ide AND emp_id=:id AND estado='A'");
        $his = getMyHis($link);
        $st -> bindParam(':id', $his->getEmpresa()->getId());
        $st -> bindParam(':ide',$gal->getId());
        $st -> bindParam(':tit',$gal->getTitulo());
        $st -> bindParam(':desc',$gal->getDescripcion());
        $st -> bindParam(':foto',$gal->getFoto());
        $state = $st -> execute();
        return $state;
    }
    
    function editProyecto($pro,$link){
        $his = historia_empresa::getMyHis($link);
        if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
            $up = new uploader();
            $path = $up->uploadOmpPro();
            if(isset($path)){
                $st = $link -> prepare("UPDATE his_proyecto SET emp_nombre=:nom, descripcion=:desc, foto=:foto WHERE emp_id=:his AND id=:id AND estado='A'");
                $st -> bindParam(':his', $his->getEmpresa()->getId());
                $st -> bindParam(':id', $pro->getId());
                $st -> bindParam(':nom', $pro->getNombre());
                //$st -> bindParam(':logo', $pro->getLogo());
                //$st -> bindParam(':dur', $pro->getDuracion());
                //$st -> bindParam(':tit', $pro->getTitulo());
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
            $st = $link -> prepare("UPDATE his_proyecto SET emp_nombre=:nom, descripcion=:desc WHERE emp_id=:his AND id=:id AND estado='A'");
                $st -> bindParam(':his', $his->getEmpresa()->getId());
                $st -> bindParam(':id', $pro->getId());
                $st -> bindParam(':nom', $pro->getNombre());
                //$st -> bindParam(':logo', $pro->getLogo());
                //$st -> bindParam(':dur', $pro->getDuracion());
                //$st -> bindParam(':tit', $pro->getTitulo());
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
    
    function getHistoria($emp, $link){
        $st = $link -> prepare("SELECT * FROM historia WHERE emp_id=:emp AND estado='A'");
        $st -> bindParam(':emp', $emp->getId());
        $st -> execute();
        $data = $st -> fetch();
        $his = new historia($data);
        $his ->buildHistoriaEmpresa($data, $link);
        return $his;
    }
    
    function getGalerias($his, $link){
        $st = $link -> prepare("SELECT * FROM his_galeria WHERE emp_id=:his AND estado='A'");
        $st -> bindParam(':his', $his->getEmpresa()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $gal = new his_galeria();   
            $gal->buildHisGaleria($data);
            $gals[$i] = $gal;
            unset($gal);
            $i++;
        }
        return $gals;
    }
    
    function getProyectos($his,$link){
        $st = $link -> prepare("SELECT * FROM his_proyecto WHERE emp_id=:his AND estado='A'");
        $st -> bindParam(':his', $his->getEmpresa()->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        foreach ($data as $data){
            $pro = new his_proyecto();
            $pro->buildHisProyecto($data);
            $pros[$i] = $pro;
            unset($pro);
            $i++;
        }
        return $pros;
    }
    
    function getAllHistoria($emp, $link){
        $his = getHistoria($emp,$link);
        $gals = getGalerias($his, $link);
        $pros =  getProyectos($his,$link);
        $array = array(
            $his,
            $gals,
            $pros
        );
        return $array;
    }
    
    
    function getProyectoFromId($pro_id,$link){
        $st = $link -> prepare("SELECT * FROM his_proyecto WHERE id=:pro AND estado='A'");
        $st -> bindParam(':pro', $pro_id);
        $st -> execute();
        $data = $st -> fetch();
        $pro = new his_proyecto();
        $pro->buildHisProyecto($data);
        
        return $pro;
    }
}
