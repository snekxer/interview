<?php
  include $_SERVER['DOCUMENT_ROOT']."/h.php";

  $impl_his = new trayectoria_emprendedor();
  $proyecto = new tra_proyecto();
  $up = new uploader;
$proyecto->setDescripcion($_POST['descripcion']);
$proyecto->setNombre($_POST['nombre']);
$proyecto->setTitulo($_POST['proyecto']);
$proyecto->setDuracion($_POST['duracion']);
$path = $up->uploadOmpPro();
$proyecto->setFoto($path);

$estado=$impl_his->newProyecto($proyecto, $link);

//if($estado){
//  echo true;
//}

  ?>