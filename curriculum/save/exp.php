<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";
$currl = new curriculum_persona;
$exp = new experiencia();

$tipo = $_POST['tipo'];
$exp->setEmpresa($_POST['empresa']);
$exp->setFechaIni($_POST['fecha_inicio_experiencia']);
$exp->setFechaFin($_POST['fecha_culminacion_experiencia']);
$exp->setCargo($_POST['cargo']);
$exp->setArea($_POST['area_experiencia']);
$exp->setSubarea($_POST['subarea_experiencia']);
$exp->setPais($_POST['pais']);
$exp->setProvincia($_POST['provincia']);
$exp->setCiudad($_POST['ciudad']);
$exp->setEmpresaIndustria($_POST['industria']);
$exp->setDescripcionCargo($_POST['descripcion_cargo']);
$exp->setDescripcionFunciones($_POST['descripcion_funciones']);
$exp->setNombre($_POST['nombre_referencia']);
$exp->setRelacion($_POST['relacion']);
$exp->setTelefono($_POST['telefono_referencia']);
$exp->setEmail($_POST['email_referencia']);


if($tipo=='N'){
    if($currl->newExperiencia($exp, $link)) {
        echo 'Guardado';
        //header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unserialize($_SESSION['user'])->getId());
    } else {
        echo 'No se pudo guardar';
    }
} else if ($tipo=='E'){
    $exp->setId((int)$_POST['id']);
    if($currl->editExperiencia($exp, $link)) {
        echo 'Guardado';
        //header('Location: http://www.interview.ec/curriculum/ver-cv.php?pid='.unserialize($_SESSION['user'])->getId());
    } else {
        echo 'No se pudo guardar';
    }
}
