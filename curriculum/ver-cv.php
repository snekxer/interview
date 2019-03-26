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

<header>
    <div class="container">
        <div class="row bg-gallery padding">
            <?php if($mine){?>
            <h3>Mi Hoja de vida</h3>
            <?php }else{ ?>
            <h3>Hoja de vida de <?php echo $curr->getCurriculum()->getPersona()->getNombres() . ' ' . $curr->getCurriculum()->getPersona()->getApellidos(); ?></h3>
            <?php } ?>
        </div>
    </div>
</header>

<div class="wrap-content text-center">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="avatar-container">
                        <img src="..<?php echo $curr->getCurriculum()->getPersona()->getFoto(); ?>" alt="avatar" class="img-circle center-block avatar">
                    </div>

                    <div class="row text-center temp-text-white">
                        <h4 id="nombre"><?php echo $curr->getCurriculum()->getPersona()->getNombres() . ' ' . $curr->getCurriculum()->getPersona()->getApellidos(); ?></h4>
                        <h5 id="profesion"><?php echo $curr->getCurriculum()->getPersona()->getProfesion()->getNombre(); ?></h5>
                        <hr>
                    </div>
                    <!-- icons cv-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                        <ul class="li-access-direct">
                            <li>
                                <span  class="glyphicon glyphicon-calendar text-azure-radiant"></span>
                                Fecha de nacimiento: <?php echo $curr->getCurriculum()->getPersona()->getFechaNac(); ?>
                            </li>
                            <li>
                                <span  class="glyphicon glyphicon-globe text-azure-radiant"></span>
                                Nacionalidad: <?php echo $curr->getCurriculum()->getPersona()->getNacionalidad()->getNombre(); ?>
                            </li>
                            <li>
                                <span  class="glyphicon glyphicon-link text-azure-radiant"></span>
                                Estado civil: <?php echo $curr->getCurriculum()->getPersona()->getEstadoCivil()->getNombre(); ?>
                            </li>
                            <li>
                                <span  class="glyphicon glyphicon-briefcase text-azure-radiant"></span>
                                Área de Trabajo: <?php echo $curr->getCurriculum()->getPersona()->getArea()->getNombre(); ?>
                            </li>
                            <li>
                                <span  class="glyphicon glyphicon-usd text-azure-radiant"></span> 
                                Aspiración salarial: <?php echo $curr->getCurriculum()->getAspSalarial()->getNombre(); ?>
                            </li>
                            <li>
                                <span  class="glyphicon glyphicon-time text-azure-radiant"></span>
                                Disponibilidad de tiempo: <?php echo $curr->getCurriculum()->getDispTiempo()->getNombre(); ?>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-12 col-xs-12">
                        <h4>Acerca de</h4>
                        <p><?php echo $curr->getCurriculum()->getPersona()->getAcercaDe(); ?></p>
                    </div>
                    <div class="col-sm-12 col-xs-12">
                     <?php if ($mine) { ?>
                     <a class="btn el-border el-border-azure-radiant pull-right" href="cv-form.php">
                                                <span class="glyphicon glyphicon-pencil"></span></a>
                     <?php } ?>
                    </div>
                </div>
                <div class="col-sm-8 padding">
                    <div class="container-fluid text-left">
                        <!-- Experiencia -->               
                        <div class="row padding">
                                <div class="col-sm-12 col-xs-12">
                                    <h4 class="pull-left">Experiencia Laboral</h4>
                                    <?php if ($mine) { ?>
                                    <a class="btn el-border el-border-azure-radiant pull-right" href="experiencia.php">
                                        <span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                                    <?php } ?>
                                </div>
                                <?php if ($curr->getExperiencia() != false) { 
                                    foreach ($curr->getExperiencia() as $exp) { ?>
                                    <div class="col-sm-12 col-xs-12">
                                        <ul>
                                            <li><b><?php echo $exp->getCargo(); ?><span>en <?php echo $exp->getEmpresa(); ?></span></b></li>
                                            <li><?php echo $exp->getPais()->getNombre(). ' - ' . $exp->getProvincia()->getNombre() . '-' . $exp->getCiudad()->getNombre(); ?>  </li>
                                            <li><?php echo $exp->getFechaIni(); ?> - <?php echo $exp->getFechaFin(); ?></li>
                                            <li><?php echo $exp->getDescripcionCargo(); ?></li>
                                            <li><?php echo $exp->getDescripcionFunciones(); ?></li>
                                        </ul>
                                        <span>Referencia:</span>
                                        <ul>
                                            <li><?php echo $exp->getNombre(); ?></li>
                                            <li><?php echo $exp->getRelacion(); ?></li>
                                            <li><?php echo $exp->getTelefono() . " - " . $exp->getEmail(); ?></li>
                                        </ul>
                                        <?php if ($mine) { ?> 
                                        <div class="col-sm-12 col-xs-12 pull-right">
                                            <a class="btn el-border el-border-azure-radiant" href="experiencia.php?id=<?php echo $exp->getId();?>">
                                                <span class="glyphicon glyphicon-pencil"></span></a>
                                                <a class="btn el-border el-border-azure-radiant" href="del/exp.php?id=<?php echo $exp->getId();?>">
                                                    <span class="glyphicon glyphicon-trash"></span></a>
                                                </div>
                                                <?php } ?>
                                            </div>
                                    <?php }
                                }?>
                        </div>
                        <hr class="el-border-black">

                        <!-- Educacion -->
                        <div class="row padding">
                                <div class="col-sm-12 col-xs-12">
                                    <h4 class="pull-left">Estudios</h4>
                                    <?php if ($mine) { ?> 
                                    <a class="btn el-border el-border-azure-radiant pull-right" href="educacion.php">
                                        <span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                                    <?php } ?>
                                </div>
                                <?php if ($curr->getEducacion() != false) {
                                    foreach ($curr->getEducacion() as $edu) { ?>
                                    <div class="col-sm-12 col-xs-12">
                                        <ul>
                                            <li><b><?php echo $edu->getTitulo() . " en " . $edu->getInstitucion(); ?></b></li>
                                            <li><?php echo $edu->getFechaIni(); ?> - <?php echo $edu->getFechaFin(); ?></li>
                                            <li><?php echo $edu->getNivel()->getNombre(); ?></li>
                                            <li><?php echo $edu->getDescripcion(); ?></li>

                                        </ul>
                                                                            <?php if ($mine) { ?> 
                                    <div class="col-sm-12 col-xs-12 text-right">
                                        <a class="btn el-border el-border-azure-radiant" href="educacion.php?id=<?php echo $edu->getId();?>">
                                            <span class="glyphicon glyphicon-pencil"></span></a>
                                        <a class="btn el-border el-border-azure-radiant" href="del/edu.php?id=<?php echo $edu->getId();?>">
                                            <span class="glyphicon glyphicon-trash"></span></a>                                       
                                    </div>
                                    <?php } ?>
                                    </div>
                                    <?php }
                                }?>
                        </div>
                        <hr class="el-border-black">


                        <!-- Formacion -->
                        <div class="row padding">
                                <div class="col-sm-12 col-xs-12">
                                    <h4 class="pull-left">Formación</h4>
                                    <?php if ($mine) { ?>
                                    <a class="btn el-border el-border-azure-radiant pull-right" href="formacion.php">
                                        <span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>                                   
                                    <?php } ?>
                                </div>
                                <?php if ($curr->getFormacion() != false) {
                                    foreach ($curr->getFormacion() as $for) { ?>                                    
                                    <div class="col-sm-12 col-xs-12">
                                        <ul>
                                            <li><b><?php echo $for->getTitulo() . " " . $for->getTipo() . " en " . $for->getInstitucion(); ?></b></li>
                                            <li><?php echo $for->getFechaIni(); ?> - <?php echo $for->getFechaFin(); ?></li>
                                            <li><?php echo $for->getDuracion(); ?></li>
                                            <li><?php echo $for->getDescripcion(); ?></li>
                                        </ul>
                                        <?php if ($mine) { ?> 
                                        <div class="col-sm-12 col-xs-12 text-right">
                                           <a class="btn el-border el-border-azure-radiant" href="formacion.php?id=<?php echo $for->getId();?>">
                                            <span class="glyphicon glyphicon-pencil"></span></a>
                                            <a class="btn el-border el-border-azure-radiant" href="del/form.php?id=<?php echo $for->getId();?>">
                                                <span class="glyphicon glyphicon-trash"></span></a>                                 
                                            </div>
                                            <?php } ?>
                                    </div>
                                    <?php }
                                }?>
                        </div>
                        <hr class="el-border-black">

                        <!-- Idiomas -->                
                        <div class="row padding">
                                <div class="col-sm-12 col-xs-12">
                                    <h4 class="pull-left">Idiomas</h4>
                                    <?php if ($mine) { ?>
                                    <a class="btn el-border el-border-azure-radiant pull-right" href="idioma.php">
                                        <span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>
                                    <?php } ?>
                                </div>
                                <?php if ($curr->getIdioma() != false) { 
                                    foreach ($curr->getIdioma() as $idi) { ?>
                                    <div class="col-sm-12 col-xs-12">
                                        <ul>
                                            <li><b><?php echo $idi->getIdioma()->getNombre(); ?></b></li>
                                            <li>Escrito: <?php echo $idi->getEscrito()->getNombre(); ?> - Oral:<?php echo $idi->getOral()->getNombre(); ?></li>
                                        </ul>
                                        <?php if ($mine) { ?> 
                                        <div class="col-sm-12 col-xs-12 text-right">
                                            <a class="btn el-border el-border-azure-radiant" href="idioma.php?id=<?php echo $idi->getId();?>">
                                                <span class="glyphicon glyphicon-pencil"></span></a>
                                                <a class="btn el-border el-border-azure-radiant" href="del/idio.php?id=<?php echo $idi->getId();?>">
                                                   <span class="glyphicon glyphicon-trash"></span></a>  
                                               </div>
                                               <?php } ?>
                                    </div>
                                    <?php }
                                }?>
                        </div>
                        <hr class="el-border-black">
                        <!-- Conocimientos -->

                        <div class="row padding">
                                <div class="col-sm-12 col-xs-12">
                                    <h4 class="pull-left">Conocimientos</h4>
                                    <?php if ($mine) { ?>
                                    <a class="btn el-border el-border-azure-radiant pull-right" href="conocimiento.php">
                                        <span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>                                   
                                    <?php } ?>
                                </div>                        
                                <?php if ($curr->getConocimientos() != false) { 
                                    foreach ($curr->getConocimientos() as $cono) { ?>
                                    <div class="col-sm-12 col-xs-12">
                                        <ul>
                                            <li><b><?php echo $cono->getConocimiento(); ?></b></li>
                                            <li><?php echo $cono->getArea()->getNombre(); ?> - <?php echo $cono->getSubarea()->getNombre(); ?></li>
                                            <li><?php echo $cono->getNivel()->getNombre(); ?></li>
                                            <li></li>
                                        </ul>
                                        <?php if ($mine) { ?> 
                                        <div class="col-sm-12 col-xs-12 text-right">
                                            <a class="btn el-border el-border-azure-radiant" href="conocimiento.php?id=<?php echo $cono->getId();?>">
                                                <span class="glyphicon glyphicon-pencil"></span></a>
                                                <a class="btn el-border el-border-azure-radiant" href="del/cono.php?id=<?php echo $cono->getId();?>">
                                                   <span class="glyphicon glyphicon-trash"></span></a>
                                               </div>
                                               <?php } ?>
                                    </div>
                                    <?php }
                                }?>
                        </div>
                        <hr class="el-border-black">
                        <!-- Competencias -->
                        <div class="row padding">
                                <div class="col-sm-12 col-xs-12">
                                    <h4 class="pull-left">Competencias</h4>
                                    <?php if ($mine) { ?>
                                    <a class="btn el-border el-border-azure-radiant pull-right" href="competencia.php">
                                        <span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>                                   
                                  <?php } ?>
                                </div>
                                <?php if ($curr->getCompetencias() != false) { 
                                    foreach ($curr->getCompetencias() as $cono) { ?>
                                    <div class="col-sm-12 col-xs-12">
                                        <ul>
                                            <li><b><?php echo $cono->getCompetencia(); ?> - <?php echo $cono->getNivel()->getNombre(); ?></b></li>
                                        </ul>
                                        <?php if ($mine) { ?> 
                                        <div class="col-sm-12 col-xs-12 text-right">
                                            <a class="btn el-border el-border-azure-radiant" href="competencia.php?id=<?php echo $cono->getId();?>">
                                                <span class="glyphicon glyphicon-pencil"></span></a>
                                                <a class="btn el-border el-border-azure-radiant" href="del/comp.php?id=<?php echo $cono->getId();?>">
                                                   <span class="glyphicon glyphicon-trash"></span></a>                                
                                                   <?php } ?>
                                               </div>
                                           </div>
                                        <?php }
                                    }?>
                        </div>
                            <hr class="el-border-black">
                            <!-- Referencias -->
                            <div class="row padding">
                                    <div class="col-sm-12 col-xs-12">
                                        <h4 class="pull-left">Referencias personales</h4>
                                        <?php if ($mine) { ?> 
                                        <a class="btn el-border el-border-azure-radiant pull-right" href="referencias.php">
                                        <span class="glyphicon glyphicon-plus-sign"></span> Agregar</a>                                       
                                        <?php } ?>
                                    </div>
                                    <?php if ($curr->getReferencias() != false) { 
                                        foreach ($curr->getReferencias() as $ref) { ?>
                                        <div class="col-sm-12 col-xs-12">
                                            <ul  class="text-left">
                                                <li><b><?php echo $ref->getNombre(); ?></b></li>
                                                <li><?php echo $ref->getRelacion(); ?></li>
                                                <li><?php echo $ref->getTelefono(); ?> - <?php echo $ref->getEmail(); ?></li>
                                            </ul>
                                            <?php if ($mine) { ?> 
                                            <div class="col-sm-12 col-xs-12 text-right">
                                                <a class="btn el-border el-border-azure-radiant" href="referencias.php?id=<?php echo $ref->getId();?>">
                                                    <span class="glyphicon glyphicon-pencil"></span>Editar</a>
                                                <a class="btn el-border el-border-azure-radiant" href="del/ref.php?id=<?php echo $ref->getId();?>">
                                                     <span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php }
                                    }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>   
    </div>
    <?php include("../footer.html"); ?>