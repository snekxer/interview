<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";
$currl = new curriculum_persona;
$idioma = new idioma();

$tipo = $_POST['tipo'];
$idioma->setIdioma($_POST['idioma'] ?? '');
$idioma->setEscrito($_POST['nivel_escrito'] ?? '');
$idioma->setOral($_POST['nivel_oral'] ?? '');


if($tipo=='N'){
    if($currl->newIdioma($idioma, $link)) {
        echo 'Guardado';
        //header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unseriliaze($_SESSION['user'])->getId());
    } else {
        echo 'No se pudo guardar';
    }
} else if ($tipo=='E'){
    $idioma->setId((int)$_POST['id']);
    if($currl->editIdioma($idioma, $link)) {
        echo 'Guardado';
        //header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unseriliaze($_SESSION['user'])->getId());
    } else {
        echo 'No se pudo guardar';
    }
}
