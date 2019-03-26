<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";
$currl = new curriculum_persona;
$ref = new referencias();

$tipo = $_POST['tipo'];
$ref->setNombre($_POST['nombre_referencia_p']);
$ref->setTelefono($_POST['telefono_referencia_p']);
$ref->setEmail($_POST['email_referencia_p']);
$ref->setRelacion($_POST['relacion_referencia_p']);


if($tipo=='N'){
    if($currl->newReferencia($ref, $link)) {
        echo 'Guardado';
        //header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unserialize($_SESSION['user'])->getId());
    } else {
        echo 'No se pudo guardar';
    }
} else if ($tipo=='E'){
    $ref->setId((int)$_POST['id']);
    if($currl->editReferencia($ref, $link)) {
        echo 'Guardado';
        //header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unserialize($_SESSION['user'])->getId());
    } else {
        echo 'No se pudo guardar';
    }
}
