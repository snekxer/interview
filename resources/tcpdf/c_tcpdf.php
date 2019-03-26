<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_tcpdf
 *
 * @author valdi
 */
require_once 'tcpdf.php';
class c_tcpdf extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = $_SERVER['DOCUMENT_ROOT'].'/resources/img/logo.png';
        $this->Image($image_file, 10, 10, 40, 11, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Ln(10);
        $this->Cell(0, 0, 'Interview.ec', 0, false, 'R', 0, '', 0, false, 'D', 'B');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, ''.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
