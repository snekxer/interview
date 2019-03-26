<?php
include("../header.php");
$pid = (int) $_GET['pid'];

if ($logged&&($pid===unserialize($_SESSION['user'])->getId())) {
    $mine = true;
}
$curr = new CV();
if ($tipo == 'P') {
    $curr->buildCVPersona($pid, $link);
} else {
    $curr->buildCV($pid, $link);
}
?>

<div>
    <section>
        <div>
            <div>
                <div>
                    <div >
                        <img src="..<?php echo $curr->getCurriculum()->getPersona()->getFoto(); ?>" alt="avatar">
                    </div>

                    <div >
                        <h4 id="nombre"><?php echo $curr->getCurriculum()->getPersona()->getNombres() . ' ' . $curr->getCurriculum()->getPersona()->getApellidos(); ?></h4>
                        <h5 id="profesion"><?php echo $curr->getCurriculum()->getPersona()->getProfesion()->getNombre(); ?></h5>
                        <hr>
                    </div>
                    <!-- icons cv-->
                    <div>
                        <ul>
                            <li>
                                Fecha de nacimiento: <?php echo $curr->getCurriculum()->getPersona()->getFechaNac(); ?>
                            </li>
                            <li>
                                Nacionalidad: <?php echo $curr->getCurriculum()->getPersona()->getNacionalidad()->getNombre(); ?>
                            </li>
                            <li>
                                Estado civil: <?php echo $curr->getCurriculum()->getPersona()->getEstadoCivil()->getNombre(); ?>
                            </li>
                            <li>
                                Área de Trabajo: <?php echo $curr->getCurriculum()->getPersona()->getArea()->getNombre(); ?>
                            </li>
                            <li>
                                Aspiración salarial: <?php echo $curr->getCurriculum()->getAspSalarial()->getNombre(); ?>
                            </li>
                            <li>
                                Disponibilidad de tiempo: <?php echo $curr->getCurriculum()->getDispTiempo()->getNombre(); ?>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4>Acerca de</h4>
                        <p><?php echo $curr->getCurriculum()->getPersona()->getAcercaDe(); ?></p>
                    </div>
                </div>
                <div>
                    <div>
                        <!-- Experiencia -->          
                        
                    <?php if ($curr->getExperiencia() != false) { ?>
                        <div>
                                <div>
                                    <h4>Experiencia Laboral</h4>
                                </div>
                                <?php foreach ($curr->getExperiencia() as $exp) { ?>
                                    <div>
                                        <ul>
                                            <li><b><?php echo $exp->getCargo(); ?><span>en <?php echo $exp->getEmpresa(); ?></span></b></li>
                                            <li><?php echo $exp->getPais()->getNombre().' - '.$exp->getProvincia()->getNombre() . '-' . $exp->getCiudad()->getNombre(); ?>  </li>
                                            <li><?php echo $exp->getFechaIni().' - '.$exp->getFechaFin(); ?></li>
                                            <li><?php echo $exp->getDescripcionCargo(); ?></li>
                                            <li><?php echo $exp->getDescripcionFunciones(); ?></li>
                                        </ul>
                                        <span>Referencia:</span>
                                        <ul>
                                            <li><?php echo $exp->getNombre(); ?></li>
                                            <li><?php echo $exp->getRelacion(); ?></li>
                                            <li><?php echo $exp->getTelefono() . ' - ' . $exp->getEmail(); ?></li>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                
                        </div>
                    <?php } ?>
                        
                        <hr>

                        <!-- Educacion -->
                    <?php if ($curr->getEducacion() != false) { ?>
                        <div>
                                <div>
                                    <h4>Estudios</h4>
                                </div>
                                <?php foreach ($curr->getEducacion() as $edu) { ?>
                                    <div>
                                        <ul>
                                            <li><b><?php echo $edu->getTitulo() . " en " . $edu->getInstitucion(); ?></b></li>
                                            <li><?php echo $edu->getFechaIni(); ?> - <?php echo $edu->getFechaFin(); ?></li>
                                            <li><?php echo $edu->getNivel()->getNombre(); ?></li>
                                            <li><?php echo $edu->getDescripcion(); ?></li>
                                        </ul>
                                    </div>
                                    <?php } ?>
                        </div>
                    <?php } ?>    
                        
                        <hr>

                    <!-- Formacion -->
                    <?php if ($curr->getFormacion() != false) { ?>
                        <div>
                                <div>
                                    <h4>Formación</h4>
                                </div>
                                <?php foreach ($curr->getFormacion() as $for) { ?>                                    
                                    <div>
                                        <ul>
                                            <li><b><?php echo $for->getTitulo() . " " . $for->getTipo() . " en " . $for->getInstitucion(); ?></b></li>
                                            <li><?php echo $for->getFechaIni(); ?> - <?php echo $for->getFechaFin(); ?></li>
                                            <li><?php echo $for->getDuracion(); ?></li>
                                            <li><?php echo $for->getDescripcion(); ?></li>
                                        </ul>
                                    </div>
                                    <?php } ?>
                        </div>
                    <?php } ?>
                    
                        <hr>

                        <!-- Idiomas -->            
                    <?php if ($curr->getIdioma() != false) { ?>    
                        <div>
                                <div>
                                    <h4>Idiomas</h4>
                                </div>
                                <?php foreach ($curr->getIdioma() as $idi) { ?>
                                    <div>
                                        <ul>
                                            <li><b><?php echo $idi->getIdioma()->getNombre(); ?></b></li>
                                            <li>Escrito: <?php echo $idi->getEscrito()->getNombre(); ?> - Oral:<?php echo $idi->getOral()->getNombre(); ?></li>
                                        </ul>
                                    </div>
                                    <?php } ?>
                        </div>
                    <?php } ?>
                        
                        <hr>
                        
                        <!-- Conocimientos -->
                    <?php if ($curr->getConocimientos() != false) { ?>         
                        <div>
                                <div>
                                    <h4>Conocimientos</h4>
                                </div>                        
                                <?php foreach ($curr->getConocimientos() as $cono) { ?>
                                    <div>
                                        <ul>
                                            <li><b><?php echo $cono->getConocimiento(); ?></b></li>
                                            <li><?php echo $cono->getArea()->getNombre(); ?> - <?php echo $cono->getSubarea()->getNombre(); ?></li>
                                            <li><?php echo $cono->getNivel()->getNombre(); ?></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                     <?php } ?>
                        </div>
                     <?php } ?>
                        
                        <hr>
                        
                        <!-- Competencias -->
                    <?php if ($curr->getCompetencias() != false) { ?>
                        <div>
                                <div>
                                    <h4 >Competencias</h4>
                                </div>
                                <?php foreach ($curr->getCompetencias() as $cono) { ?>
                                    <div>
                                        <ul>
                                            <li><b><?php echo $cono->getCompetencia(); ?> - <?php echo $cono->getNivel()->getNombre(); ?></b></li>
                                        </ul>
                                    </div>
                                        <?php } ?>
                        </div>
                    <?php } ?>
                        
                            <hr>
                            <!-- Referencias -->
                    <?php if ($curr->getReferencias() != false) { ?>
                            <div>
                                    <div>
                                        <h4>Referencias personales</h4>
                                    </div>
                                    
                                    <?php foreach ($curr->getReferencias() as $ref) { ?>
                                        <div>
                                            <ul>
                                                <li><b><?php echo $ref->getNombre(); ?></b></li>
                                                <li><?php echo $ref->getRelacion(); ?></li>
                                                <li><?php echo $ref->getTelefono(); ?> - <?php echo $ref->getEmail(); ?></li>
                                            </ul>
                                        </div>
                                        <?php } ?>
                            </div>
                    <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>   
    </div>