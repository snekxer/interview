<?php
ob_start();
include $_SERVER['DOCUMENT_ROOT']."/h.php";
$currl = new curriculum_persona;
$ref = new referencias();

$ref->setId((int)$_GET['id']);

if($currl->delReferencia($ref, $link)){
    header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unserialize($_SESSION['user'])->getId());
}
