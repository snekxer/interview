<?php
include $_SERVER['DOCUMENT_ROOT']."/h.php";

$impl_his = new historia_empresa();
$proyecto = new his_proyecto();

$proyecto->setId($_POST['id']);

$estado=$impl_his->delProyecto($proyecto, $link);

?>