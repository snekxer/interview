<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";

$impl_tra = new trayectoria_emprendedor();
$proyecto = new tra_proyecto();
  
$tipo = $_POST['tipo'];

$proyecto->setNombre($_POST['nombre']);
$proyecto->setDescripcion($_POST['descripcion']);
$proyecto->setTitulo($_POST['proyecto']);

if($tipo=='N'){
    if($impl_tra->newProyecto($proyecto, $link)) {
        header('Location: https://interview.ec/perfiles/emprendedores/perfil-emprendedores.php');
    } else {
        echo 'No se pudo guardar';
    }
} else if ($tipo=='E'){
    $proyecto->setId((int)$_POST['id']);
    if($impl_tra->editProyecto($proyecto, $link)) {
        header('Location: https://interview.ec/perfiles/emprendedores/perfil-emprendedores.php');
    } else {
        echo 'No se pudo guardar';
    }
}
