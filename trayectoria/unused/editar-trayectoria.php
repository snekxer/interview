<?php

include $_SERVER['DOCUMENT_ROOT']."/h.php";

$impl_his = new trayectoria_emprendedor();
$emp = new trayectoria();

$emp->setEmprendedor($_POST['id_trayectoria']);
$emp->setAcercaDe($_POST['acerca_de']);
$emp->setContacto($_POST['contacto']);

$estado = $impl_his->editTrayectoria($emp, $link);


if($estado){
	echo true;
	//header('Location: https://interview.ec/perfiles/personas/perfil-personas.php');
}

?>