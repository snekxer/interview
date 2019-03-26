<?php

 include $_SERVER['DOCUMENT_ROOT']."/h.php";

  $impl_his = new trayectoria_emprendedor();
  $emp = new trayectoria();
  
	$emp->setAcercaDe($_POST['acerca_de']);
	$emp->setContacto($_POST['contacto']);

   $estado = $impl_his->newTrayectoria($emp, $link);


   if($estado){
   	echo true;
   }

   ?>