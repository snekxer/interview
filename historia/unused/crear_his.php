<?php

 include $_SERVER['DOCUMENT_ROOT']."/h.php";

  $impl_his = new historia_empresa();
  $emp = new historia();
  
  $emp->setMision($_POST['mision']);
	$emp->setVision($_POST['vision']);
	$emp->setSlogan($_POST['slogan']);
	$emp->setValores($_POST['valores']);
	$emp->setContacto($_POST['contacto']);
	$emp->setQuienesSomos($_POST['quienes_somos']);

   $estado = $impl_his->newHistoria($emp, $link);


   if($estado){
   	echo true;
   }

   ?>