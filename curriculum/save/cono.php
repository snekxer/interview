<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";
$currl = new curriculum_persona;
$conocimientos = new conocimientos();

$tipo = $_POST['tipo'];
$conocimientos->setConocimiento($_POST['conocimiento']);
$conocimientos->setNivel($_POST['nivel_conocimiento']);
$conocimientos->setArea($_POST['area_conocimientos']);
$conocimientos->setSubarea($_POST['subarea_conocimientos']);


if($tipo=='N'){
    if($currl->newConocimiento($conocimientos, $link)) {
        echo 'Guardado';
        //header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unserialize($_SESSION['user'])->getId());
    } else {
        echo 'No se pudo guardar';
    }
} else if ($tipo=='E'){
    $conocimientos->setId((int)$_POST['id']);
    if($currl->editConocimiento($conocimientos, $link)) {
        echo 'Guardado';
        //header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unserialize($_SESSION['user'])->getId());
    } else {
        echo 'No se pudo guardar';
    }
}
