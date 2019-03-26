<?php

// Include the main TCPDF library (search for installation path).
include '../h.php';

// create new PDF document
$pdf = new c_tcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Interview.ec');
$pdf->SetTitle('Curriculum');
$pdf->SetSubject('Curriculum');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$pid = (int)$_GET['pid'];
$curr =  new CV;
$curr->buildCV($pid, $link);

// Set some content to print

$html = <<<EOD

<div>
    <section>
        <div>
            <div>
                <div>
                    <div align="center">
                        <img  src="..{$curr->getCurriculum()->getPersona()->getFoto()}" alt="avatar">
                    </div>

                    <div >
                        <h4 id="nombre">{$curr->getCurriculum()->getPersona()->getNombres()}  {$curr->getCurriculum()->getPersona()->getApellidos()}</h4>
                        <h5 id="profesion">{$curr->getCurriculum()->getPersona()->getProfesion()->getNombre()}</h5>
                        <hr>
                    </div>
                    <!-- icons cv-->
                    <div>
                        <ul>
                            <li>
                                Fecha de nacimiento: {$curr->getCurriculum()->getPersona()->getFechaNac()}
                            </li>
                            <li>
                                Nacionalidad: {$curr->getCurriculum()->getPersona()->getNacionalidad()->getNombre()}
                            </li>
                            <li>
                                Estado civil:  {$curr->getCurriculum()->getPersona()->getEstadoCivil()->getNombre()}
                            </li>
                            <li>
                                Área de Trabajo: {$curr->getCurriculum()->getPersona()->getArea()->getNombre()}
                            </li>
                            <li>
                                Aspiración salarial: {$curr->getCurriculum()->getAspSalarial()->getNombre()}
                            </li>
                            <li>
                                Disponibilidad de tiempo: {$curr->getCurriculum()->getDispTiempo()->getNombre()}
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4>Acerca de</h4>
                        <p>{$curr->getCurriculum()->getPersona()->getAcercaDe()}</p>
                    </div>
                </div>
                <div>
                    <div>
                        <!-- Experiencia -->          
EOD;
                        
                     if ($curr->getExperiencia()!=false) { 
                        $html=$html.'
                        <div>
                                <div>
                                    <h4>Experiencia Laboral</h4>
                                </div>';
                        
                                foreach ($curr->getExperiencia() as $exp) { 
                                    $html = $html.'
                                    <div>
                                        <ul>
                                            <li><b>'.$exp->getCargo().'<span> en '.$exp->getEmpresa().'</span></b></li>
                                            <li>'.$exp->getPais()->getNombre().' - '.$exp->getProvincia()->getNombre().' - '.$exp->getCiudad()->getNombre().'  </li>
                                            <li>'.$exp->getFechaIni().' - '.$exp->getFechaFin().'</li>
                                            <li>'.$exp->getDescripcionCargo().'</li>
                                            <li>'.$exp->getDescripcionFunciones().'</li>
                                        </ul>
                                        <span>Referencia:</span>
                                        <ul>
                                            <li>'.$exp->getNombre().'</li>
                                            <li>'.$exp->getRelacion().'</li>
                                            <li>'.$exp->getTelefono().' - '.$exp->getEmail().'</li>
                                        </ul>
                                    </div>';
                                }
                        $html=$html.'</div>';
                     }
                        
                    $html=$html.'
                            <hr>
                            <!-- Educacion -->';

                    
                     if ($curr->getEducacion() != false) { 
                      $html=$html.'    
                        <div>
                                <div>
                                    <h4>Estudios</h4>
                                </div>';
                                 foreach ($curr->getEducacion() as $edu) { 
                                     $html=$html.'
                                     <div>
                                        <ul>
                                            <li><b>'.$edu->getTitulo().' en '.$edu->getInstitucion().'</b></li>
                                            <li>'.$edu->getFechaIni().' - '.$edu->getFechaFin().'</li>
                                            <li>'.$edu->getNivel()->getNombre().'</li>
                                            <li>'.$edu->getDescripcion().'</li>
                                        </ul>
                                    </div>';
                                     } 
                      $html=$html.'</div>';
                     }     
                        
                     $html=$html.'<hr>

                    <!-- Formacion -->';
                     if ($curr->getFormacion() != false) {
                        $html=$html.'<div>
                                <div>
                                    <h4>Formación</h4>
                                </div>';
                                 foreach ($curr->getFormacion() as $for) { 
                                     $html=$html.'
                                    <div>
                                        <ul>
                                            <li><b>'.$for->getTitulo().' '.$for->getTipo().' en '.$for->getInstitucion().'</b></li>
                                            <li>'.$for->getFechaIni().' - '.$for->getFechaFin().'</li>
                                            <li>'.$for->getDuracion().'</li>
                                            <li>'.$for->getDescripcion().'</li>
                                        </ul>
                                    </div>';
                                     } 
                       $html=$html.'</div>';
                     } 
                    
                        $html=$html.'<hr>

                        <!-- Idiomas -->         ';   
                     if ($curr->getIdioma() != false) {
                        $html=$html.'<div>
                                <div>
                                    <h4>Idiomas</h4>
                                </div>';
                                 foreach ($curr->getIdioma() as $idi) {
                                    $html=$html.'<div>
                                        <ul>
                                            <li><b>'.$idi->getIdioma()->getNombre().'</b></li>
                                            <li>Escrito: '.$idi->getEscrito()->getNombre().' - Oral: '.$idi->getOral()->getNombre().'</li>
                                        </ul>
                                    </div>';
                                     } 
                        $html=$html.'</div>';
                     } 
                        
                        $html=$html.'<hr>
                        
                        <!-- Conocimientos -->';
                     if ($curr->getConocimientos() != false) {          
                       $html=$html.' <div>
                                <div>
                                    <h4>Conocimientos</h4>
                                </div>     ';                   
                                 foreach ($curr->getConocimientos() as $cono) {
                                   $html=$html.' <div>
                                        <ul>
                                            <li><b>'.$cono->getConocimiento().'</b></li>
                                            <li>'.$cono->getArea()->getNombre().' - '.$cono->getSubarea()->getNombre().'</li>
                                            <li>'.$cono->getNivel()->getNombre().'</li>
                                            <li></li>
                                        </ul>
                                    </div>';
                                     } 
                        $html=$html.'</div>';
                      } 
                        
                        $html=$html.'<hr>
                        
                        <!-- Competencias -->';
                     if ($curr->getCompetencias() != false) {
                        $html=$html.'<div>
                                <div>
                                    <h4 >Competencias</h4>
                                </div>';
                                 foreach ($curr->getCompetencias() as $cono) { 
                                    $html=$html.'<div>
                                        <ul>
                                            <li><b>'.$cono->getCompetencia().' - '.$cono->getNivel()->getNombre().'</b></li>
                                        </ul>
                                    </div>';
                                        }
                        $html=$html.'</div>';
                    } 
                        
                    $html=$html.'        <hr>
                            <!-- Referencias -->';
                     if ($curr->getReferencias() != false) { 
                         $html=$html.'   <div>
                                    <div>
                                        <h4>Referencias personales</h4>
                                    </div>';
                                    
                                     foreach ($curr->getReferencias() as $ref) { 
                                       $html=$html.' <div>
                                            <ul>
                                                <li><b>'.$ref->getNombre().'</b></li>
                                                <li>'.$ref->getRelacion().'</li>
                                                <li>'.$ref->getTelefono().' - '.$ref->getEmail().'</li>
                                            </ul>
                                        </div>';
                                         } 
                            $html=$html.'</div>';
                     } 
                        $html=$html.'</div>
                    </div>
                </div>
            </div>
        </section>   
    </div>';
        

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('curriculum.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
