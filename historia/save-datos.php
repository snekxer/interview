<?php
ob_start();
include("../header.php");

$impl_his = new historia_empresa();
$his = new historia();
$tipo = $_POST['tipo'];
$his->setMision($_POST['mision']);
$his->setVision($_POST['vision']);
$his->setSlogan($_POST['slogan']);
$his->setValores($_POST['valores']);
$his->setContacto($_POST['contacto']);
$his->setQuienesSomos($_POST['quienes_somos']);
?>



            <?php 
            if($tipo=='N'){
                if($impl_his->newHistoria($his, $link)) {
                    header('Location: https://interview.ec/perfiles/empresas/perfil-empresas.php');
                } else {
                    echo '<p>No se pudo guardar</p>';
                }
            } else if ($tipo=='E'){
                $his->setId((int)$_POST['id']);
                if($impl_his->editHistoria($his, $link)) {
                    header('Location: https://interview.ec/perfiles/empresas/perfil-empresas.php');
                } else {
                    echo '<p>No se pudo guardar</p>';
                }
            }
            ?>
