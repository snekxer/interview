<?php

 include $_SERVER['DOCUMENT_ROOT']."/h.php";

  $impl_cv = new curriculum_persona();
  $persona = new curriculum();
  $persona->setAspSalarial($_POST['rango_salarial']);
  $persona->setDispTiempo($_POST['disponibilidad_tiempo']);
  $persona->setDiscapacidad($_POST['discapacidad']);
  $persona->setDiscapacidadDetalle($_POST['discapacidad_detalle']);
  $persona->setSituacionAct($_POST['situacion_actual']);
  $persona->setLicencia($_POST['licencia']);

  $tipo = (int)$_POST['tipo'];
  if(tipo=='N'){
    $estado = $impl_cv->newCurriculum($persona, $link);
  } else {
      
    $estado = $impl_cv->editCurriculum($persona, $link);  
  }

   if($estado){
   	echo true;
        header('Location: https://interview.ec/curriculum/cv.php');
   }

   ?>