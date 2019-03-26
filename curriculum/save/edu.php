<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";
$currl = new curriculum_persona;
$edu = new educacion();

$tipo = $_POST['tipo'];
$edu->setInstitucion($_POST['institucion'] ?? '');
$edu->setDescripcion($_POST['descripcion_educacion'] ?? '');
$edu->setFechaIni($_POST['fechaInicio'] ?? '');
$edu->setFechaFin($_POST['fechaCulminacion'] ?? '');
$edu->setTitulo($_POST['titulo'] ?? '');
$edu->setNivel($_POST['nivel_educacion'] ?? '');

if($tipo=='N'){
    if($currl->newEducacion($edu, $link)) {
        echo 'Guardado';
        //header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unserialize($_SESSION['user'])->getId());
    } else {
        echo 'No se pudo guardar';
    }
} else if ($tipo=='E'){
    $edu->setId((int)$_POST['idEducacion']);
    if($currl->editEducacion($edu, $link)) {
        echo 'Guardado';
        //header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unserialize($_SESSION['user'])->getId());
    } else {
        echo 'No se pudo guardar';
    }
}
