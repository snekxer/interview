<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";

if($tipo=='E'){
    $oferl = new servicios_empresa;
} elseif ($tipo=='O') {
	$oferl = new servicios_emprendedor;
} else {
    echo 'No tiene permiso para realizar esta acción.';
}

$ofer = $oferl->getServicio((int)$_GET['id'], $link);

if($oferl->delServicio($ofer, $link)){
    echo 'success';
}
