<?php 
include("../header.php"); 

if($logged){
  $impl = new usuario_global();
  $emprendedor = $impl->getMyUsr($link);
  $meta = new meta_global();

if($emprendedor===false){
    $create = true;
    $emprendedor = new emprendedor();
    $emprendedor->setPais(new pais);
    $emprendedor->setProvincia(new provincia);
    $emprendedor->setCiudad(new ciudad);
    $emprendedor->setIndustria(new industria);

    
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
            <form class="text-left registro-emprendedores" id="registro-emprendedores" method="post" action="">
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="nombre_completo">Nombre:</label>
          <input type="text" name="nombre" class="form-control" id="nombre_completo" value="<?php echo $emprendedor->getNombre(); ?>" required>       
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="tipo-documento">Documento de identidad :</label>
          <select name="tipo-documento" class="form-control" required>
                       <?php
            $tipoDocumento = array("R"=>"Ruc", "C"=>"Cédula", "P"=>"Pasaporte");
            
            foreach($tipoDocumento as $x => $x_nombre) {
                 echo '<option value="'. $x .'">' . $x_nombre . '</option>';            
            }
            ?>  
          </select>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="id-documento">No. de documento identificación:</label>
          <input type="number" name="identificacion" class="form-control" id="id-documento" required>
        </div>
         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="pais">Pais:</label>
          <select id="paises" name="pais" class="form-control" required>
            <option value="0">seleccione un valor</option>
           <?php
            $paises = $meta->getAllPaises($link);
            foreach($paises as $paises){             
              if($emprendedor->getPais()->getId() != null){ 
                echo '<option value="' . $emprendedor->getPais()->getId() . '" selected="selected"  >' . $emprendedor->getPais()->getNombre() . '</option>';
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
            if($emprendedor->getProvincia()->getId() != null){ 
              echo '<option value="' . $emprendedor->getProvincia()->getId() . '" selected="selected"  >' . $emprendedor->getProvincia()->getNombre() . '</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="ciudad">Ciudad:</label>
         <select id="ciudad" name="ciudad" class="form-control" required>
          <option value="0">seleccione un valor</option>
             <?php 
            if($emprendedor->getCiudad()->getId() != null){ 
              echo '<option value="' . $emprendedor->getCiudad()->getId() . '" selected="selected"  >' . $emprendedor->getCiudad()->getNombre() . '</option>';
            } 
            ?>
          </select>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="telf_movil">Teléfono móvil:</label>
          <input type="number" name="movil" class="form-control" id="telf_movil" value="<?php echo $emprendedor->getMovil(); ?>">
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="telf_fijo">Teléfono fijo:</label>
          <input type="number" name="telf-fijo" class="form-control" id="telf_fijo" value="<?php echo $emprendedor->getTelefono(); ?>">
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="sitio-web">Sitio web:</label>
          <input type="text" name="sitio-web" class="form-control" id="sitio-web" value="<?php echo $emprendedor->getSitioWeb(); ?>">
        </div>
         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="email-contacto">Email de contacto:</label>
          <input type="email" name="email" class="form-control" id="email-contacto" value="<?php echo $emprendedor->getEmailContacto(); ?>">
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="industria">Industria:</label>
          <select id="industrias" name="industria" class="form-control" required>
            <option value="">seleccione un valor</option>
             <?php 
            $industrias = $meta->getAllIndustrias($link);
            $industria = $emprendedor->getIndustria();
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
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <label for="area_interes">Área de interés:</label>
          <br>
          <div class="multiselect">              
              <?php
              $areas = $meta->getAllAreas($link);
              $areasInt = $impl->getAreasInt($link);
              foreach ($areas as $areas){
                if($areasInt!=NULL){
                  foreach($areasInt as $areasInt){
                    //  if($areasInt->getId() == $areas->getId()){ 
                    echo '<label><input type="checkbox" name="option[]" value="' . $areasInt->getId() . '" checked="checked" />' . $areasInt->getNombre() . '</label>';
                     //  echo '<option value="' . $areasInt->getId() . '" selected="selected"  >' . $areasInt->getNombre() . '</option>';
                          //  } else {

                        //    }
                     }
                  if($areasInt->getId() != $areas->getId())
                    { 
                      echo '<label>
                      <input type="checkbox" name="option[]" value="' . $areas->getId() . '"  />' . $areas->getNombre() . '</label>' ;
                }

                }else{
                  echo '<label>
                      <input type="checkbox" name="option[]" value="' . $areas->getId() . '"  />' . $areas->getNombre() . '</label>';
                }   
              }
           ?>
          </div>
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
 <script type="text/javascript" data-main="../../resources/js/formEmprendedor" src="../../resources/scripts/require.js"></script>


<?php include("../footer.html");
} else {
    echo 'No tiene sesion iniciada';
}

 ?>


