<?php 
include("../header.php"); 


  $impl = new usuario_global();
  $empresa = $impl->getMyUsr($link);
  $meta = new meta_global();


$id_oferta=$_GET["id"];

if($logged){

  $oferta = new ofertas_empresa(); 
  $info = $oferta->getOferta($id_oferta, $link);
  $meta = new meta_global();

if($info===false){
    $create = true;
    $info = new oferta();
    $info->setArea(new area);
    $info->setSubarea(new Subarea);
    $info->setModalidad(new modalidad);
    $info->setPais(new pais);
    $info->setProvincia(new provincia);
    $info->setCiudad(new ciudad);
    $info->setTipoContrato(new contrato);
    $info->setRenumeracion(new renumeracion);
    $info->setEdad(new edad);
    $info->setExperiencia(new experienciaM);
    
} else {
    $create = false;
}


?>

<header>
  <div class="container text-center">
     <h1><b>Oferta Laboral</b></h1>
  </div>
</header>

<div class="wrap-content text-center">
  <section>
    <div class="container">
          <div class="row">
      <form id="formOferta" class="text-left">
        <div class="alert"></div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="titulo">Titulo:</label>
          <input type="text" name="titulo" class="form-control" id="titulo_oferta" 
          data-validation="required" data-validation-error-msg="Por favor ingrese un titulo" value="<?php echo $info->getTitulo(); ?>">       
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="area">Area:</label>
         <select id="areas" name="area" class="form-control" data-validation="required" 
         data-validation-error-msg="Por favor seleccione un area">
            <option value="0"></option>
            <?php 
            $areas = $meta->getAllAreas($link);
            $area = $info->getArea(); 
            foreach($areas as $areas){
                if($areas->getId() == $area->getId()){ 
                    echo '<option value="' . $area->getId() . '" selected="selected"  >' . $area->getNombre() . '</option>';
                } 
                else{
                    echo '<option value="' . $areas->getId() . '"   >' . $areas->getNombre() . '</option>';
                }   
            }
            ?>
          </select>          
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="sub-area">Sub-area:</label>
          <select id="subarea" name="sub-area" class="form-control" data-validation="required" 
          data-validation-error-msg="Por favor seleccione un sub-area">
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
          <select id="paises" name="pais" class="form-control" data-validation="required" 
          data-validation-error-msg="Por favor seleccione un pais">
            <option value="0"></option>
            <?php 
            $paises = $meta->getAllPaises($link);
            foreach($paises as $paises){
                if($paises->getId() == $info->getPais()->getId()){ 
                   echo '<option value="' . $info->getPais()->getId() . '" selected="selected"  >' . $info->getPais()->getNombre() . '</option>';
                }else{
                    echo '<option value="' . $paises->getId() . '"   >' . $paises->getNombre() . '</option>';
                }   
            }
            ?>
          </select>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="provincia">Provincia:</label>
          <select id="provincias" name="provincia" class="form-control" data-validation="required" 
          data-validation-error-msg="Por favor seleccione un provincia">
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
          <select id="ciudad" name="ciudad" class="form-control" data-validation="required" 
          data-validation-error-msg="Por favor seleccione un ciudad">
           <option value="0"></option>
            <?php 
              if($info->getCiudad()->getId() != null){ 
                echo '<option value="' . $info->getCiudad()->getId() . '" selected="selected"  >' . $info->getCiudad()->getNombre() . '</option>';
              } 
            ?>
          </select>
        </div>
          
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="modalidad">Modalidad:</label>
          <select name="modalidad" class="form-control" data-validation="required" 
          data-validation-error-msg="Por favor seleccione un modalidad de trabajo">
            <option value="0"></option>
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
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="tipo de contrato">Tipo de contrato:</label>
          <select name="tipo-contrato" class="form-control" data-validation="required" 
          data-validation-error-msg="Por favor seleccione un tipo de contrato">
            <option value="0"></option>
          <?php
              //cargar industria
              $tipo_contrato = $meta->getAllContratos($link);
              $contrato = $info->getTipoContrato();

              foreach ($tipo_contrato as $tipo_contrato){
                if($tipo_contrato->getId() == $contrato->getId()){ 
                    echo '<option value="' . $contrato->getId() . '" selected="selected"  >' . $contrato->getNombre() . '</option>';
                } 
                else{
                    echo '<option value="' . $tipo_contrato->getId() . '"   >' . $tipo_contrato->getNombre() . '</option>';
                }   
              }

              ?>          </select>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="capacidades-especiales">Capacidades especiales:</label>
          <div class="checkbox">
            <label><input name="discapacidad" type="checkbox" value="<?php if($info->getEmail()!=null){ echo $info->getEmail(); }else{ echo '1'; } ?>"> Marque el trabjo esta disponible para personas capacidades especiales</label>
          </div>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="remuneracion">Remuneración:</label>
          <select name="remuneracion" class="form-control" data-validation="required" data-validation-error-msg="Por favor seleccione un tipo de remuneracion">
            <option value="0"></option>
             <?php
              //cargar industria
              $rango_sal = $meta->getAllRenumeraciones($link);
              $remuneracion = $info->getRenumeracion();
              foreach ($rango_sal as $rango_sal){

                if($rango_sal->getId() == $remuneracion->getId()){ 
                    echo '<option value="' . $remuneracion->getId() . '" selected="selected"  >' . $remuneracion->getNombre() . '</option>';
                } 
                else{
                    echo '<option value="' . $rango_sal->getId() . '"   >' . $rango_sal->getNombre() . '</option>';
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
              <input type="text" name="desde" class="form-control" id="rango_inicio" data-validation="required" data-validation-error-msg="Por favor ingrese un valor" value="<?php echo $info->getRangoDesde(); ?>">    
            </div>

          </div>
          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label for="hasta">Hasta:</label>
            <div class="input-group">
              <div class="input-group-addon">$</div>
              <input type="text" name="hasta" class="form-control" id="rango_inicio" data-validation="required" data-validation-error-msg="Por favor ingrese un valor" value="<?php echo $info->getRangoHasta(); ?>">    
            </div>     
          </div>
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <label for="descripcion">Descripcion:</label>
          <textarea name="descripcion" id="descripcion" class="form-control"><?php echo $info->getDescripcion(); ?></textarea>   
        </div>
        <div id="requisitos-oferta">
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="genero">Género:</label>
            <select name="genero" class="form-control" data-validation="required" data-validation-error-msg="Por favor seleccione un genero">
            <option value="0">Seleccione un valor</option>
            <?php
              $generos = array("M"=>"Masculino", "F"=>"Femenino");
              $genero = $info->getGenero();
              foreach($generos as $x => $x_nombre) {
                if($genero == $x){ 
                   echo '<option value="'. $x .'" selected="selected">' . $x_nombre . '</option>';
                } 
                else{
                   echo '<option value="'. $x .'">' . $x_nombre . '</option>';
                }               
              }
            ?>
          </select>
          </div>
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="rango-edad">Rango de edad - Desde:</label>
             <select name="rango-edad" class="form-control">
            <option value="0"></option>
            <?php
                $edades = $meta->getAllEdades($link);
                $edad = $info->getEdad();
                foreach ($edad as $edad){
                   if($edades->getId() == $edad->getId()){ 
                      echo '<option value="' . $edad->getId() . '" selected="selected"  >' . $edad->getNombre() . '</option>';
                  } 
                  else{
                      echo '<option value="' . $edades->getId() . '"   >' . $edades->getNombre() . '</option>';
                  }   
                }
              ?>
          </select>
          </div>
           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="rango-experiencia">Rango de experiencia:</label>
            <select name="rango-experiencia" class="form-control">
              <option value="0"></option>
             <?php
                $rango_experiencia = $meta->getAllExp($link);
                $experiencia = $info->getExperiencia();
                foreach ($rango_experiencia as $rango_experiencia){
                  if($rango_experiencia->getId() == $experiencia->getId()){ 
                        echo '<option value="' . $experiencia->getId() . '" selected="selected"  >' . $experiencia->getNombre() . '</option>';
                    } 
                    else{
                        echo '<option value="' . $rango_experiencia->getId() . '"   >' . $rango_experiencia->getNombre() . '</option>';
                    }   
                }
              ?>
            </select>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
          <input id="idOferta" type="hidden" name="id_oferta" value="<?php echo $info->getId(); ?>">
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

  <script type="text/javascript" data-main="../../resources/js/formOferta" src="../../resources/scripts/require.js"></script>

<?php include("../footer.html"); 

} else {
    echo 'No tiene sesion iniciada';
}

?>


