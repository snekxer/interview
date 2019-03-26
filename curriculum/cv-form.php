<?php
  //ob_start();
  include("../header.php");
  $meta = new meta_global();
  $currl = new curriculum_persona;
  $curr = $currl->getMyCurr($link);
  $create = false;
  if($curr==false){
    $curr = new curriculum;
    $curr->setAspSalarial(new rangoSalarial);
    $curr->setLicencia(new licencia);
    $curr->setDispTiempo(new dispTiempo);
    $create = true;
  }
  ?>

  <header>
    <div class="container text-left">
     <h1><b>Información básica</b></h1>
     <p>*Los campos marcados (*) son obligatorios</p>
   </div>
 </header>

 <div class="wrap-content text-center">
  <section>
    <div class="container">
      <form id="cv" method="post" action="crear_cv.php">
       <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="rango_salarial">Rango Salarial:</label>
        <select id="rango_salarial" name="rango_salarial" class="form-control" >
         <option value="">Seleccione una opción</option>
         <?php
         $salario = $meta->getAllRangoSal($link);
         echo '<option value="' . $curr->getAspSalarial()->getId() . '" selected>' . $curr->getAspSalarial()->getNombre() . '</option>';
         foreach ($salario as $salario){
          echo '<option value="' . $salario->getId() . '">' . $salario->getNombre() . '</option>';
        }
        ?>
      </select>
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <label for="disponibilidad_tiempo">Disponibilidad de tiempo:</label>
      <select id="disponibilidad_tiempo" name="disponibilidad_tiempo" class="form-control" >
       <option value="">Seleccione una opción</option>
       <?php
       $tiempo = $meta->getAllDispTiempo($link);
       echo '<option value="' . $curr->getDispTiempo()->getId() . '" selected>' . $curr->getDispTiempo()->getNombre() . '</option>';
       foreach ($tiempo as $tiempo){
        echo '<option value="' . $tiempo->getId() . '">' . $tiempo->getNombre() . '</option>';
      }
      ?>
    </select>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label for="nombres">Situacion actual:</label>
    <input id="situacion_actual" type="text" name="situacion_actual" class="form-control" value="<?php echo $curr->getSituacionAct();?>"> 
  </div>

  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label for="area">Licencia:</label>
    <select id="licencia" name="licencia" class="form-control" >
     <option value="">Seleccione una opción</option>
     <?php
     $licencias = $meta->getAllLicencias($link);
     echo '<option value="' . $curr->getLicencia()->getId() . '">' . $curr->getLicencia()->getNombre() . '</option>';
     foreach ($licencias as $licencias){
      echo '<option value="' . $licencias->getId() . '">' . $licencias->getNombre() . '</option>';
    }

    ?>
  </select>
</div>  
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
  <label for="nombres">Discapacidad:</label>
  <input id="discapacidad" type="checkbox" name="discapacidad" class="form-control" value="<?php echo $curr->getDiscapacidad();?>"> 
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
  <label for="nombres">Detalle discapacidad:</label>
  <input id="discapacidad_detalle" type="text" name="discapacidad_detalle" class="form-control" value="<?php echo $curr->getDiscapacidadDetalle();?>" > 
</div>
<input type="hidden" name="id" value="<?php if (!$create) { echo $curr->getPersona()->getId(); }?>">
<input type="hidden" name="tipo" value="<?php if ($create) { echo 'N';} else { echo 'E';} ?>">
<div class="col-sm-12 col-xs-12">
  <a class="btn el-border el-border-azure-radiant pull-right" type="submit">guardar</a>
</div>
</form> 
</div>
</section>

</div> 


<?php include("../footer.html"); ?>