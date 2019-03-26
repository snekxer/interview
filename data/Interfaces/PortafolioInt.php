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
interface PortafolioInt {
    
    public function newPortafolio($portafolio, $link);
    public function delPortafolio($portafolio, $link);
    public function editPortafolio($portafolio, $link);
    
    public function getPortafolio($port_id, $link);
    public function getPortafolios($persona, $link);
    
}
