<?php


/**
 *
 * @author snekxer
 */
class productos_emprendedor implements ProductoInt{
    
    public function newProducto($prod, $link){
        $omp = unserialize($_SESSION['user']);
         if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
            $up = new uploader();
            $path = $up->uploadImgProd();
            if(isset($path)){
                $st = $link -> prepare("INSERT INTO producto (usr_id, titulo, descripcion, imagen) VALUES (:id, :tit, :desc, :img)");
                $st -> bindParam(':id', $omp->getId());
                $st -> bindParam(':tit', $prod->getTitulo());
                $st -> bindParam(':desc', $prod->getDescripcion());
                $st -> bindParam(':img', $path);
                $state = $st -> execute();
                if($state){
                    echo 'Producto creado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al crear el producto. Intente nuevamente.';
                    return false;
                }
            } else {
                echo 'Hubo un problema al subir el archivo.';
                return false;
            }
         } else {
             $omp = usuario_global::getMyUsr($link);
                $st = $link -> prepare("INSERT INTO producto (usr_id, titulo, descripcion)  VALUES (:id, :tit, :desc)");
                $st -> bindParam(':id', $omp->getId());
                $st -> bindParam(':tit', $prod->getTitulo());
                $st -> bindParam(':desc', $prod->getDescripcion());
                $state = $st -> execute();
                if($state){
                    echo 'Producto creado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al crear el producto. Intente nuevamente.';
                    return false;
                }
         }
    }
    public function delProducto($prod, $link){
            $omp = unserialize($_SESSION['user']);
            $st = $link -> prepare("UPDATE producto SET estado='I' WHERE id=:id AND usr_id=:omp ");
            $st -> bindParam(':id', $prod->getId());
            $st -> bindParam(':omp', $omp->getId());
            $state = $st -> execute();
            if($state){
                    echo 'Producto eliminado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al eliminar el producto. Intente nuevamente.';
                    return false;
                }
    }
    public function editProducto($prod, $link){
        $omp = unserialize($_SESSION['user']);;
        if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
            $up = new uploader();
            $path = $up->uploadProd();
            if(isset($path)){
                $st = $link -> prepare("UPDATE producto SET titulo=:tit, descripcion=:desc, imagen=:img WHERE id=:id AND usr_id=:per AND estado='A'");
                $st -> bindParam(':id', $prod->getId());
                $st -> bindParam(':per', $omp->getId());
                $st -> bindParam(':tit', $prod->getTitulo());
                $st -> bindParam(':desc', $prod->getDescription());
                $st -> bindParam(':img', $path);
                $state = $st -> execute();
                if($state){
                    echo 'Producto modificado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al modificar el producto. Intente nuevamente.';
                    return false;
                }
            } else {
                echo 'Hubo un problema al subir el archivo.';
                return false;
            }
         } else {
             $st = $link -> prepare("UPDATE producto SET titulo=:tit, descripcion=:desc WHERE id=:id AND usr_id=:per AND estado='A'");
                $st -> bindParam(':id', $prod->getId());
                $st -> bindParam(':per', $omp->getId());
                $st -> bindParam(':tit', $prod->getTitulo());
                $st -> bindParam(':desc', $prod->getDescripcion());
                $state = $st -> execute();
                if($state){
                    echo 'Producto modificado exitosamente';
                    return true;
                } else {
                    echo 'Hubo un problema al modificar el producto. Intente nuevamente.';
                    return false;
                }
         }
    }
    
    public function getProducto($prod_id, $link){
        $st = $link -> prepare("SELECT * FROM producto WHERE id=:prod AND estado='A'");
        $st -> bindParam(':prod', $prod_id);
        $st -> execute();
        $data = $st -> fetch();
        if($data!=null){
            $port = new producto();
            $port->buildProducto($data, $link);
            return $port;
        } else {
            return false;
        }
    }
    public function getProductos($omp, $link){
        $st = $link -> prepare("SELECT * FROM producto WHERE usr_id=:id AND estado='A'");
        $st -> bindParam(':id', $omp->getId());
        $st -> execute();
        $data = $st -> fetchAll();
            if($data!=null){
            $i = 0;
            foreach ($data as $data){
                $prod = new producto();
                $prod->buildProducto($data, $link);
                $prods[$i] = $prod;
                unset($prod);
                $i++;
            }
            return $prods;
        } else {
            return false;
        }
    }
}
