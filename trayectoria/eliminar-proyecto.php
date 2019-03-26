<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";

$impl_his = new trayectoria_emprendedor();
$proyecto = new tra_proyecto();


$proyecto->setId((int)$_GET['id']);

if($impl_his->delProyecto($proyecto, $link)){
    echo 'success';
}

//if($estado){
//  echo true;
//}

?>