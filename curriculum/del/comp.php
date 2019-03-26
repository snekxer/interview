<?php
ob_start();
include $_SERVER['DOCUMENT_ROOT']."/h.php";
$currl = new curriculum_persona;
$comp = new formacion();

$comp->setId((int)$_GET['id']);

if($currl->delCompetencia($comp, $link)){
    header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unserialize($_SESSION['user'])->getId());
}
