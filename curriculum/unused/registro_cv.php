<?php




  include $_SERVER['DOCUMENT_ROOT']."/h.php";

  $impl_cv = new curriculum_persona();
  
  $educacion = new educacion();
  $idioma = new idioma();
  $formacion = new formacion();
  $experiencia = new experiencia();
  $conocimientos = new conocimientos();
  $competencias = new competencias();
  $referencias = new referencias();

                //set formacion
  


                //set experiencia
  $experiencia->setEmpresa($_POST['empresa']);
  $experiencia->setFechaIni($_POST['fecha_inicio_experiencia']);
  $experiencia->setFechaFin($_POST['fecha_culminacion_experiencia']);
  $experiencia->setCargo($_POST['cargo']);
  $experiencia->setArea($_POST['area_experiencia']);
  $experiencia->setSubarea($_POST['subarea_experiencia']);
  $experiencia->setPais($_POST['pais']);
  $experiencia->setProvincia($_POST['provincia']);
  $experiencia->setCiudad($_POST['ciudad']);
  $experiencia->setEmpresaIndustria($_POST['industria']);
  $experiencia->setDescripcionCargo($_POST['descripcion_cargo']);
  $experiencia->setDescripcionFunciones($_POST['descripcion_funciones']);
  $experiencia->setNombre($_POST['nombre_referencia']);
  $experiencia->setRelacion($_POST['relacion']);
  $experiencia->setTelefono($_POST['telefono_referencia']);
  $experiencia->setEmail($_POST['email_referencia']);


                //set Competencias

  
                //set referencias personales
  $referencias->setNombre($_POST['nombre_referencia_p']);
  $referencias->setTelefono($_POST['telefono_referencia_p']);
  $referencias->setEmail($_POST['email_referencia_p']);
  $referencias->setRelacion($_POST['relacion_referencia_p']);




$impl_cv::newCompetencia($competencias,$link);
$impl_cv::newConocimiento($conocimientos, $link);
$impl_cv::newEducacion($educacion, $link);
$impl_cv::newExperiencia($experiencia, $link);
$impl_cv::newFormacion($formacion, $link);
$impl_cv::newIdioma($idioma, $link);
$impl_cv::newReferencia($referencias, $link);


//if($estado){
//  echo true;
//}

  ?>