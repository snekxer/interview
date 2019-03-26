<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";

if($tipo=='E'){
    $oferl = new ofertas_empresa;
} else {
    echo 'No tiene permiso para realizar esta acción.';
}

$ofer = $oferl->getOferta((int)$_GET['id'], $link);

if($oferl->delOferta($ofer, $link)){
    echo 'success';
}
