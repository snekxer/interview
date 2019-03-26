<?php 
include("../header.php"); 


$id_servicio=$_GET["id"];

if($logged){

 if($tipo=='O'){
   $servicio = new servicios_emprendedor();
 }else{
   $servicio = new servicios_empresa();
 }
 
  $info = $servicio->getServicio($id_servicio, $link);
  $meta = new meta_global();

if($info===false){
    $create = true;
    $info = new servicio();
    $info->setArea(new area);
    $info->setSubarea(new Subarea);
    $info->setModalidad(new modalidad);
    $info->setPais(new pais);
    $info->setProvincia(new provincia);
    $info->setCiudad(new ciudad);
    
} else {
    $create = false;
}


?>

<header>
  <div class="container-fluid text-center">
     <h1><b>Oferta de Servicios</b></h1>
  </div>
</header>

<div class="wrap-content text-center">
  <section>
    <div class="container">
      <div class="row">
        <form id="formServicio" class="text-left" enctype="multipart/form-data">
      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" class="form-control" id="titulo_oferta" data-validation="required" data-validation-error-msg="Por favor ingrese un titulo" value="<?php echo $info->getTitulo(); ?>">       
      </div>
      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="area">Area:</label>
        <select id="areas" name="area" class="form-control" data-validation="required" data-validation-error-msg="Por favor seleccione un area">
          <?php 
          $areas = $meta->getAllAreas($link);
          $area = $info->getArea(); 
          foreach($areas as $areas){
            if($areas->getId() == $area->getId()){ 
              echo '<option value="' . $area->getId() . '" selected="selected"  >' . $area->getNombre() . '</option>';
            } 
         //   else{
         //     echo '<option value="' . $areas->getId() . '"   >' . $areas->getNombre() . '</option>';
         //   }   
          }
          ?>
        </select>
      </div>
      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="sub-area">Sub-area:</label>
        <select id="subarea" name="sub-area" class="form-control" data-validation="required" data-validation-error-msg="Por favor seleccione un sub-area">
          <option value="0"></option>
          <?php 
            if($info->getSubarea()->getId() != null){   //check
              echo '<option value="' . $info->getSubarea()->getId() . '" selected="selected"  >' . $info->getSubarea()->getNombre() . '</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="pais">Pais:</label>
          <select id="paises" name="pais" class="form-control" data-validation="required" data-validation-error-msg="Por favor seleccione un pais">
            <option value=""></option>
            <?php 
            $paises = $meta->getAllPaises($link);
            foreach($paises as $paises){
                if($paises->getId() == $info->getPais()->getId()){ 
                    echo '<option value="' . $info->getPais()->getId() . '" selected="selected"  >' . $info->getPais()->getNombre() . '</option>';
                } 
                else{
              echo '<option value="' . $paises->getId() . '"   >' . $paises->getNombre() . '</option>';
                }   
            }
            ?>          
          </select>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="provincia">Provincia:</label>
          <select id="provincias" name="provincia" class="form-control" data-validation="required" data-validation-error-msg="Por favor seleccione una provincia">
            <option value="0"></option>
            <?php 
            if($info->getProvincia()->getId() != null){ 
              echo '<option value="' . $info->getProvincia()->getId() . '" selected="selected"  >' . $info->getProvincia()->getNombre() . '</option>';
            }info
            ?>
          </select>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="ciudad">Ciudad:</label>
          <select id="ciudad" name="ciudad" class="form-control" data-validation="required" data-validation-error-msg="Por favor seleccione un ciudad">
            <option value="0"></option>
            <?php 
            if($info->getCiudad()->getId() != null){ 
              echo '<option value="' . $info->getCiudad()->getId() . '" selected="selected"  >' . $info->getCiudad()->getNombre() . '</option>';
            } 
            ?>
          </select>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="area">Modalidad:</label>
          <select id="modalidad" name="modalidad" class="form-control" data-validation="required" data-validation-error-msg="Por favor seleccione un area">
            <option value=""></option>
            <?php           
            $modalidades = $meta->getAllModalidades($link);
            $modalidad = $info->getModalidad();
            foreach($modalidades as $modalidades){
              if($modalidades->getId() == $modalidad->getId()){ 
                echo '<option value="' . $modalidad->getId() . '" selected="selected"  >' . $modalidad->getNombre() . '</option>';
              } 
              else{
                echo '<option value="' . $modalidades->getId() . '"   >' . $modalidades->getNombre() . '</option>';
              }   
            }
            ?>         
          </select>       
        </div>    
        <div>
          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label for="desde">Desde:</label>
            <div class="input-group">
              <div class="input-group-addon">$</div>
              <input type="text" name="rango-desde" class="form-control" id="rango_inicio" data-validation="required" data-validation-error-msg="Por favor ingrese un valor" value="<?php echo $info->getRangoDesde(); ?>">    
            </div>
          </div>
          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label for="hasta">Hasta:</label>
            <div class="input-group">
              <div class="input-group-addon">$</div>
              <input type="text" name="rango-hasta" class="form-control" id="rango_inicio" data-validation="required" data-validation-error-msg="Por favor ingrese un valor" value="<?php echo $info->getRangoHasta(); ?>">    
            </div>     
          </div>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="descripcion">Descripcion:</label>
          <textarea name="descripcion" id="descripcion" class="form-control"><?php echo $info->getDescripcion(); ?></textarea>   
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="imageInputFile">Adjunto:</label>
            <input name="upfile" type="file" class="form-control-file" id="imageInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Seleccione un archivo</small>
        </div>    
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
          <input id="tipo" type="hidden" value="<?php echo $tipo; ?>">
          <input id="idServicio" type="hidden" name="id_serv" value="<?php echo $info->getId(); ?>">
          <button type="button" class="btn el-border el-border-azure-radiant bg-white">Cancelar</button>
          <?php 
          if($create == true){
           echo '<button type="button" id="submit" class="btn el-border el-border-azure-radiant bg-white">Guardar</button>';
         } else {
           echo '<button type="button" id="editar" class="btn el-border el-border-azure-radiant bg-white">Editar</button>';
           echo '<button type="button" id="eliminar" class="btn el-border el-border-azure-radiant bg-white">Eliminar</button>';
         }
         ?>      
       </div>
     </form>
   </div>    
 </div>
</section> 
</div>

<script type="text/javascript" data-main="../../resources/js/formServicioEmpresa" src="../../resources/scripts/require.js"></script>

<?php include("../footer.html"); 

} else {
    echo 'No tiene sesion iniciada';
}

?>