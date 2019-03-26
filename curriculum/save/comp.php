<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";
$currl = new curriculum_persona;
$competencias = new competencias();

$tipo = $_POST['tipo'];
$competencias->setCompetencia($_POST['conocimiento_competencias']);
$competencias->setNivel($_POST['nivel_conocimiento_competencias']);

if($tipo=='N'){
    if($currl->newCompetencia($competencias, $link)) {
        echo 'Guardado';
        //header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unserialize($_SESSION['user'])->getId());
    } else {
        echo 'No se pudo guardar';
    }
} else if ($tipo=='E'){
    $competencias->setId((int)$_POST['id']);
    if($currl->editCompetencia($competencias, $link)) {
        echo 'Guardado';
        //header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unserialize($_SESSION['user'])->getId());
    } else {
        echo 'No se pudo guardar';
    }
}
