<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";
$currl = new curriculum_persona;
$form = new formacion();

$tipo = $_POST['tipo'];
$form->setTitulo($_POST['titulo_formacion']);
$form->setDescripcion($_POST['descripcion_formacion']);
$form->setInstitucion($_POST['institucion_formacion']);
$form->setTipo($_POST['tipo_formacion']);
$form->setFechaIni($_POST['fecha_inicio_formacion']);
$form->setFechaFin($_POST['fecha_culminacion_formacion']);
$form->setDuracion($_POST['duracion']);

if($tipo=='N'){
    if($currl->newFormacion($form, $link)) {
        echo 'Guardado';
        //header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unserialize($_SESSION['user'])->getId());
    } else {
        echo 'No se pudo guardar';
    }
} else if ($tipo=='E'){
    $form->setId((int)$_POST['id']);
    if($currl->editFormacion($form, $link)) {
        echo 'Guardado';
        //header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unserialize($_SESSION['user'])->getId());
    } else {
        echo 'No se pudo guardar';
    }
}
