<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";

$impl_tra = new trayectoria_emprendedor();
$his = new trayectoria();
  
$tipo = $_POST['tipo'];

$his->setAcercaDe($_POST['acerca_de']);
$his->setContacto($_POST['contacto']);

if($tipo=='N'){
    if($impl_tra->newTrayectoria($his, $link)) {
        header('Location: https://interview.ec/perfiles/emprendedores/perfil-emprendedores.php');
    } else {
        echo 'No se pudo guardar';
    }
} else if ($tipo=='E'){
    $his->setEmprendedor(emprendedor_emprendedor::getEmprendedor(((int)$_POST['id']),$link));
    if($impl_tra->editTrayectoria($his, $link)) {
        header('Location: https://interview.ec/perfiles/emprendedores/perfil-emprendedores.php');
    } else {
        echo 'No se pudo guardar';
    }
}
