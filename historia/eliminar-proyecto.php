<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";

$impl_his = new historia_empresa();
$proyecto = new his_proyecto();

$proyecto->setId((int)$_GET['id']);

if($impl_his->delProyecto($proyecto, $link)){
    echo 'success';
}

?>