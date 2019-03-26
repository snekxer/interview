<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 *
 * @author snekxer
 */
class portafolio_persona implements PortafolioInt{
    
    //per_id titulo descripcion imagen 
    public function newPortafolio($port, $link){
        $per = usuario_global::getMyUsr($link);
        if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
            $up = new uploader();
            $path = $up->uploadImgPort();
            if(isset($path)){
                $st = $link -> prepare("INSERT INTO portafolio (per_id, titulo, descripcion, imagen) VALUES (:id, :tit, :desc, :img)");
                $st -> bindParam(':id', $per->getId());
                $st -> bindParam(':tit', $port->getTitulo());
                $st -> bindParam(':desc', $port->getDescripcion());
                $st -> bindParam(':img', $path);
                $state = $st -> execute();
                if($state){
                    echo 'Portafolio creado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al crear el portafolio. Intente nuevamente.';
                    return false;
                }
            } else {
                echo 'Hubo un problema al subir el archivo.';
                return false;
            }
        } else {
            $st = $link -> prepare("INSERT INTO portafolio (per_id, titulo, descripcion) VALUES (:id, :tit, :desc)");
            $st -> bindParam(':id', $per->getId());
            $st -> bindParam(':tit', $port->getTitulo());
            $st -> bindParam(':desc', $port->getDescripcion());
            $state = $st -> execute();
            if($state){
                    echo 'Portafolio creado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al crear el portafolio. Intente nuevamente.';
                    return false;
                }
         }
        
    }
    public function delPortafolio($port, $link){
            $per = usuario_global::getMyUsr($link);
            $st = $link -> prepare("UPDATE portafolio SET estado='I' WHERE id=:id AND per_id=:per ");
            $st -> bindParam(':id', $port->getId());
            $st -> bindParam(':per', $per->getId());
            $state = $st -> execute();
            if($state){
                echo 'Portafolio eliminado exitosamente';
                return true;
            } else {
                echo 'Hubo un problema al eliminar el portafolio. Intente nuevamente.';
                return false;
            }
    }
    public function editPortafolio($port, $link){
        $per = usuario_global::getMyUsr($link);
        if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
            $up = new uploader();
            $path = $up->uploadImgPort();
            if(isset($path)){
                $st = $link -> prepare("UPDATE portafolio SET titulo=:tit, descripcion=:desc, imagen=:img WHERE id=:id AND per_id=:per AND estado='A'");
                $st -> bindParam(':id', $port->getId());
                $st -> bindParam(':per', $per->getId());
                $st -> bindParam(':tit', $port->getTitulo());
                $st -> bindParam(':desc', $port->getDescripcion());
                $st -> bindParam(':img', $path);
                $state = $st -> execute();
                if($state){
                    echo 'Portafolio modificado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al modificar el portafolio. Intente nuevamente.';
                    return false;
                }
            } else {
                echo 'Hubo un problema al subir el archivo.';
                return false;
            }
        } else {
            $st = $link -> prepare("UPDATE portafolio SET titulo=:tit, descripcion=:desc WHERE id=:id AND per_id=:per AND estado='A'");
            $st -> bindParam(':id', $port->getId());
            $st -> bindParam(':per', $per->getId());
            $st -> bindParam(':tit', $port->getTitulo());
            $st -> bindParam(':desc', $port->getDescripcion());
            $state = $st -> execute();
            if($state){
                    echo 'Portafolio modificado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al modificar el portafolio. Intente nuevamente.';
                    return false;
                }
        }    
    }
    
    public function getPortafolio($port_id, $link){
        $st = $link -> prepare("SELECT * FROM portafolio WHERE id=:port AND estado='A'");
        $st -> bindParam(':port', $port_id);
        $st -> execute();
        $data = $st -> fetch();
        if($data!=null){
            $port = new portafolio();
            $port->buildPortafolioPersona($data, $link);
            return $port;
        } else {
            return false;
        }
    }
    
    public function getPortafolios($persona, $link){
        $st = $link -> prepare("SELECT * FROM portafolio WHERE per_id=:id AND estado='A'");
        $st -> bindParam(':id', $persona->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        $i = 0;
        if($data!=null){
        foreach ($data as $data){
            $port = new portafolio();
            $port->buildPortafolioPersona($data, $link);
            $ports[$i] = $port;
            unset($port);
            $i++;
        }
        return $ports;
        } else {
            return false;
        }
    }
    
}
