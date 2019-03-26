<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";

$impl_his = new historia_empresa();
$proyecto = new his_proyecto();
$up = new uploader;

$proyecto->setNombre($_POST['nombre']);
$proyecto->setDescripcion($_POST['descripcion']);
$proyecto->setProyecto($_POST['proyecto']);
$path = $up->uploadEmpPro();
$proyecto->setFoto($path);

$estado=$impl_his->newProyecto($proyecto, $link);

if($estado){
	//echo true;
header('Location: https://interview.ec/perfiles/empresas/perfil-empresas.php');
}


?>