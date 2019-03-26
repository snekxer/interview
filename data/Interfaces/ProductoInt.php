<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author pauli
 */
interface ProductoInt {
    public function getProducto($prod_id, $link);
    public function getProductos($empresa, $link);
    
    public function newProducto($producto, $link);
    public function delProducto($producto, $link);
    public function editProducto($producto, $link);
    
}
