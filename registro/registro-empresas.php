<?php 
include("../header.php"); 
if($logged){
  $impl = new usuario_global();
  $empresa = $impl->getMyUsr($link);
  $meta = new meta_global();
if($empresa===false){
    $create = true;
    $empresa = new empresa();
  
    $empresa->setPais(new pais);
    $empresa->setProvincia(new provincia);
    $empresa->setCiudad(new ciudad);
    $empresa->setIndustria(new industria);

    
} else {
    $create = false;
}

  
?>

<header>
  <div class="container-fluid text-left">
     <h1><b>Información básica</b></h1>
     <p>*Los campos marcados (*) son obligatorios</p>
  </div>
</header>

<div class="wrap-content text-center">
  <section>
    <div class="container">
      <div class="row">
        <form class="text-left registro-empresas" id="registro-empresas" method="post" action="">
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $empresa->getNombre(); ?>" required>       
          </div>
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="razon social">Razón Social:</label>
            <input type="razon-social" name="razon-social" class="form-control" value="<?php echo $empresa->getRazonSocial(); ?>" id="razon-social"> 
          </div>
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="tipo_documento">Documento de identidad :</label>
            <select name="tipo-documento" class="form-control" required>
             <?php
             $tipoDocumento = array("R"=>"Ruc", "C"=>"Cédula", "P"=>"Pasaporte");
             $tipo_identificacion = $empresa->getTipoIdentificacion();
             foreach($tipoDocumento as $x => $x_nombre) {
              if($tipo_identificacion == $x){ 
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
        <label for="id_documento">No. de documento identificación:</label>
        <input type="number" name="identificacion" class="form-control" id="id_documento"  value="<?php echo $empresa->getIdentificacion(); ?>"  required>
      </div>
      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="pais">Pais:</label>
        <select id="paises" name="pais" class="form-control" required>
          <option value="0">seleccione un valor</option>
          <?php 
          $paises = $meta->getAllPaises($link);
          foreach($paises as $paises){
            if($paises->getId() == $empresa->getPais()->getId()){ 
              echo '<option value="' . $empresa->getPais()->getId() . '" selected="selected"  >' . $empresa->getPais()->getNombre() . '</option>';
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
        <select id="provincias" name="provincia" class="form-control" required>
          <option value="0">seleccione un valor</option>
          <?php 
          if($empresa->getProvincia()->getId() != null){ 
            echo '<option value="' . $empresa->getProvincia()->getId() . '" selected="selected"  >' . $empresa->getProvincia()->getNombre() . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="ciudad">Ciudad:</label>
        <select id="ciudad" name="ciudad" class="form-control" required>
          <option value="0">seleccione un valor</option>
          <?php 
          if($empresa->getCiudad()->getId() != null){ 
            echo '<option value="' . $empresa->getCiudad()->getId() . '" selected="selected"  >' . $empresa->getCiudad()->getNombre() . '</option>';
          } 
          ?>
        </select>
      </div>
      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="telf_movil">Teléfono móvil:</label>
        <input type="text" name="movil" class="form-control" id="telf_movil" value="<?php echo $empresa->getMovil(); ?>">
      </div>
      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="telf-fijo">Teléfono fijo:</label>
        <input type="text" name="telf-fijo" class="form-control" id="telf_fijo" value="<?php echo $empresa->getMovil(); ?>">
      </div>
      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="sitio-web">Sitio web:</label>
        <input type="web" name="sitio-web" class="form-control" id="sitio-web" value="<?php echo $empresa->getSitioWeb(); ?>" required>
      </div>
      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="email-contacto">Email de contacto:</label>
        <input type="email" name="email" class="form-control" id="email-contacto" value="<?php echo $empresa->getEmailContacto(); ?>" required>
      </div>    
      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="tipo_empresa">Industria:</label>
        <select id="industrias" name="industria" class="form-control" required>
          <option value="0">seleccione un valor</option>
          <?php 
          $industrias = $meta->getAllIndustrias($link);
          $industria = $empresa-> getIndustria();
          foreach($industrias as $industrias){
            if($industrias->getId() == $industria->getId()){ 
              echo '<option value="' . $industria->getId() . '" selected="selected"  >' . $industria->getNombre() . '</option>';
            } 
            else{
              echo '<option value="' . $industrias->getId() . '"   >' . $industrias->getNombre() . '</option>';
            }   
          }
          ?>
        </select>
      </div>

      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="area-interes">Área de interés:</label>
        <br>
        <select id="area-interes" name="area-interes[]" class="form-control" multiple="multiple" required>
          <option value="0">seleccione un valor</option>
          <?php
          $areas = $meta->getAllAreas($link);
          $areasInt = $impl->getAreasInt($link);
          foreach ($areas as $areas){
            if($areasInt!=NULL){

              foreach($areasInt as $areasInt){

                    //  if($areasInt->getId() == $areas->getId()){ 
               echo '<option value="' . $areasInt->getId() . '" selected="selected"  >' . $areasInt->getNombre() . '</option>';
                          //  } else {

                        //    }
             }

             if($areasInt->getId() != $areas->getId()){ echo '<option value="' . $areas->getId() . '">' . $areas->getNombre() . '</option>'; }

           }else{
            echo '<option value="' . $areas->getId() . '">' . $areas->getNombre() . '</option>';
          }
          
        }
        ?>
      </select>
    </div>  
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
     <button class="btn btn-default">Cancelar</button>
     <?php 
     if($create == true){
       echo '<button id="submit" class="btn btn-default">Guardar</button>';
     } else {
       echo '<button id="editar" class="btn btn-default">Editar</button>';
     }
     ?>        
   </div>
 </form>
</div>
</div>
</section>
</div>

  <script type="text/javascript" src="../../resources/plugins/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
  <script type="text/javascript" data-main="../../resources/js/formEmpresa" src="../../resources/scripts/require.js"></script>


<?php include("../footer.html");
} else {
    echo 'No tiene sesion iniciada';
}

 ?>


