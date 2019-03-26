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
class productos_global implements ProductoInt{
    
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
    public function getProductos($empresa, $link){
        $st = $link -> prepare("SELECT * FROM producto WHERE emp_id=:id AND estado='A'");
        $st -> bindParam(':id', $empresa->getId());
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
    
    public function newProducto($producto, $link){}
    public function delProducto($producto, $link){}
    public function editProducto($producto, $link){}
}
