<?php 
include("../header.php");
            
                $meta = new meta_global();

?>

<header>
  <div class="container-fluid text-left">
     <h1><b>Información básica</b></h1>
     <p>*Los campos marcados (*) son obligatorios</p>
  </div>
</header>

<div class="container-fluid text-center wrap-content">
    
    <div class="container">
      <!-- <form class="text-left curriculVitae" id="curriculVitae" method="post" action="registro_cv.php"> -->
        
        <div id="educacion" class="row educacion">

           <div class="alert">
          </div>
          
          <form class="text-left curriculVitae" id="saveEdu" method="post" action="">  
          <h3>Educación</h3>
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Institución:</label>
            <input type="text" class="form-control" id="institucion"  name="institucion"  > 
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="titulo_educacion">Titulo obtenido:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" > 
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Fecha de inicio:</label>
            <input type="date"  class="form-control" id="fechaInicio" name="fechaInicio"> 
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Fecha de culminación:</label>
            <input type="date"  class="form-control" id="fechaCulminacion" name="fechaCulminacion"> 
          </div>
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="Nivel">Nivel:</label>
             <select id="nivel_educacion" name="nivel_educacion" class="form-control" >
              <option value="">Seleccione una opción</option>
              <?php
              //cargar niveles de educacion

              $niveles_educacion = $meta->getAllNivelesEdu($link);

              foreach ($niveles_educacion as $niveles_educacion){
                $id = $niveles_educacion->getId();
                $nombre = $niveles_educacion->getNombre();

                echo '<option value="' . $id . '">' . $nombre . '</option>';
              }
              ?>
              </select>

          </div>

          <input type="hidden" name="idEducacion" value="">

          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion_educacion" class="form-control"></textarea>        
          </div>


          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <button class="btn btn-default">Cancelar</button>
            <!--<button id="agregar_educacion" class="btn btn-default">Agregar</button>-->
            <button id="saveE" class="btn btn-default">Guardar</button>
          </div>
          
          </form>
            
        </div>


        <div id="formacion" class="row formacion">
          <h3>Formacion</h3>
          
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Institución:</label>
            <input type="text"  class="form-control" id="institucion_formacion" name="institucion_formacion[]" > 
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Titulo obtenido:</label>
            <input type="text"  class="form-control" id="titulo_formacion" name="titulo_formacion[]" > 
          </div>


          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Tipo</label>
            <input type="text" class="form-control" id="tipo_formacion" name="tipo_formacion[]" > 
          </div>

          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion_formacion" name="descripcion_formacion[]" class="form-control"></textarea>        
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Fecha de inicio:</label>
            <input type="date"  class="form-control" id="fecha_inicio_formacion" name="fecha_inicio_formacion[]" max="<?php echo date("Y-m-d"); ?>" > 
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Fecha de culminación:</label>
            <input type="date"  class="form-control" id="fecha_culminacion_formacion" name="fecha_culminacion_formacion[]" max="<?php echo date("Y-m-d"); ?>" > 
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Duración:</label>
            <input type="text" class="form-control" id="duracion" name="duracion[]" > 
          </div>

          <input type="hidden" name="idFormacion" value="">


          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <button class="btn btn-default">Cancelar</button>
            <button id="agregar_formacion" class="btn btn-default">Agregar</button>
          </div>

        </div>


        <div id="idioma" class="row  idiomas">
          <h3>Idiomas</h3>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="area_interes_1">Idioma:</label>
            <select id="idioma" name="idioma[]" class="form-control" >
              <option value="">Seleccione una opción</option>
              <?php
              //cargar idiomas

              $idiomas = $meta-> getAllIdiomas($link);

              foreach ($idiomas as $idiomas){
                $id = $idiomas->getId();
                $nombre = $idiomas->getNombre();

                echo '<option value="' . $id . '">' . $nombre . '</option>';


              }

              ?>


            </select>
          </div>


          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nivel_escrito">Nivel escrito:</label>
            <select id="nivel_escrito" name="nivel_escrito[]" class="form-control" >
              <option value="">Seleccione una opción</option>
                <?php
              //cargar niveles

              $niveles = $meta->getAllNiveles($link);

              foreach ($niveles as $niveles){
                $id = $niveles->getId();
                $nombre = $niveles->getNombre();

                echo '<option value="' . $id . '">' . $nombre . '</option>';


              }

              ?>

            </select>
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nivel_oral">Nivel oral:</label>
            <select id="nivel_oral" name="nivel_oral[]" class="form-control" >
              <option value="">Seleccione una opción</option>
                <?php
              //cargar niveles de educacion

              $niveles = $meta->getAllNiveles($link);

              foreach ($niveles as $niveles){
                $id = $niveles->getId();
                $nombre = $niveles->getNombre();

                echo '<option value="' . $id . '">' . $nombre . '</option>';


              }

              ?>
            </select>
          </div>

          <input type="hidden" name="idIdioma" value="">


          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <button class="btn btn-default">Cancelar</button>
            <button id="agregar_idioma" class="btn btn-default">Agregar</button>
          </div>

        </div>



        <div id="experiencia" class="row experiencia_laboral">
          <h3>Experiencia Laboral</h3>


          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Empresa:</label>
            <input type="text"  class="form-control" id="empresa" name="empresa[]" > 
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Cargo:</label>
            <input type="text"  class="form-control" id="cargo" name="cargo[]" > 
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Fecha de inicio:</label>
            <input type="date"  class="form-control" id="fecha_inicio_experiencia" name="fecha_inicio_experiencia[]" > 
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Fecha de culminación:</label>
            <input type="date"  class="form-control" id="fecha_culminacion_experiencia" name="fecha_culminacion_experiencia[]" > 
          </div>
          
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="industria">Tipo de industria:</label>
            <select id="industria" name="industria[]" class="form-control" >
              <option value="">Seleccione una opción</option>
               <?php
              //cargar industria

              $industria = $meta->getAllIndustrias($link);

              foreach ($industria as $industria){
                $id = $industria->getId();
                $nombre = $industria->getNombre();

                echo '<option value="' . $id . '">' . $nombre . '</option>';


              }

              ?>
            </select>
          </div>


          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="pais">País:</label>
            <select id="paises" name="pais[]" class="form-control" >
              <option value="">Seleccione una opción</option>
              <?php
              //cargar pais

              $paises = $meta->getAllPaises($link);

              foreach ($paises as $paises){
                $id = $paises->getId();
                $nombre = $paises->getNombre();

                echo '<option value="' . $id . '">' . $nombre . '</option>';


              }

              ?>
            </select>
          </div>


          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="area_interes_1">Provincia:</label>
            <select id="provincias" name="provincia[]" class="form-control" >
              <option value="">Seleccione una opción</option>
              <option value="one">One</option>
            </select>
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="area_interes_1">Ciudad:</label>
            <select id="ciudad" name="ciudad[]" class="form-control" >
              <option value="">Please select</option>
              <option value="one">One</option>
            </select>
          </div>

         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="area">Area:</label>
            <select id="areas_experiencia" name="area_experiencia[]" class="form-control" >
             <option value="">Seleccione una opción</option>
              <?php
              //cargar areas

              $areas = $meta->getAllAreas($link);

              foreach ($areas as $areas){
                $id = $areas->getId();
                $nombre = $areas->getNombre();

                echo '<option value="' . $id . '">' . $nombre . '</option>';


              }

              ?>
            </select>
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="subarea">Sub-area:</label>
            <select id="subareas_experiencia" name="subarea_experiencia[]" class="form-control" >
              <option value="">Please select</option>
              <option value="one">One</option>
            </select>
          </div>


          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="descripcion">Descripción del cargo:</label>
            <textarea id="descripcion_cargo" name="descripcion_cargo[]" class="form-control"></textarea>        
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="descripcion">Descripción de las funciones del cargo:</label>
            <textarea id="descripcion_funciones" name="descripcion_funciones[]" class="form-control"></textarea>        
          </div>

          <div class="padding col-xs-12 col-sm-12">
            <h5>Referencia profesional</h5>

            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <label for="nombres">Nombre:</label>
              <input id="nombre_referencia" type="text" name="nombre_referencia[]" class="form-control" > 
            </div>


             <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <label for="nombres">Relación:</label>
              <input id="relacion" type="text" name="relacion[]" class="form-control" > 
            </div>

             <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <label for="nombres">Teléfono:</label>
              <input id="telefono_referencia" type="text" name="telefono_referencia[]" class="form-control" > 
            </div>

             <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <label for="nombres">Email:</label>
              <input id="email_referencia" type="email" name="email_referencia[]" class="form-control" > 
            </div>


            <input type="hidden" name="idExperiencia" value="">

          </div>


          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <button class="btn btn-default">Cancelar</button>
            <button id="agregar_experiencia" class="btn btn-default">Agregar</button>
          </div>

        </div>




        <div id="conocimientos" class="row conocimientos-personales">
          <h3>Conocimientos</h3>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="conocimiento">Conocimiento:</label>
            <input type="text" id="conocimiento" name="conocimiento[]" class="form-control"  > 
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nivel_dominio">Nivel de dominio:</label>
            <select id="nivel_conocimiento" name="nivel_conocimiento[]" class="form-control" >
               <option value="">Seleccione una opción</option>
                <?php
              //cargar niveles de educacion

              $niveles = $meta->getAllNiveles($link);

              foreach ($niveles as $niveles){
                $id = $niveles->getId();
                $nombre = $niveles->getNombre();

                echo '<option value="' . $id . '">' . $nombre . '</option>';


              }

              ?>
            </select>
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="area">Area:</label>
            <select id="areas_conocimientos" name="area_conocimientos[]" class="form-control" >
             <option value="">Seleccione una opción</option>
              <?php
              //cargar areas

              $areas = $meta->getAllAreas($link);

              foreach ($areas as $areas){
                $id = $areas->getId();
                $nombre = $areas->getNombre();

                echo '<option value="' . $id . '">' . $nombre . '</option>';


              }

              ?>
            </select>
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="subarea">Sub-area:</label>
            <select id="subareas_conocimientos" name="subarea_conocimientos[]" class="form-control" >
              <option value="">Please select</option>
              <option value="one">One</option>
            </select>
          </div>


          <input type="hidden" name="idConocimiento" value="">



          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <button class="btn btn-default">Cancelar</button>
            <button id="agregar_conocimientos" class="btn btn-default">Agregar</button>
          </div>

        </div>

        <div id="competencias" class="row competencias_profesionales">
          <h3>Competencias</h3>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Competencia:</label>
            <input type="text" id="conocimiento_competencias" name="conocimiento_competencias[]" class="form-control"  > 
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nivel_conocimiento">Nivel de dominio:</label>
            <select id="nivel_conocimiento_competencias" name="nivel_conocimiento_competencias[]" class="form-control" >
              <option value="">Seleccione una opción</option>
                <?php
              //cargar niveles de educacion

              $niveles = $meta->getAllNiveles($link);

              foreach ($niveles as $niveles){
                $id = $niveles->getId();
                $nombre = $niveles->getNombre();

                echo '<option value="' . $id . '">' . $nombre . '</option>';


              }

              ?>
            </select>
          </div>


          <input type="hidden" name="idCompetencias" value="">

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <button class="btn btn-default">Cancelar</button>
            <button id="agregar_competencias" class="btn btn-default">Agregar</button>
          </div>

        </div>

         <div id="referencias" class="row referencias_personales">
          <h3>Referencias personales</h3>


          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Nombre:</label>
            <input type="date" id="nombre_referencia_p" name="nombre_referencia_p[]" class="form-control" > 
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono_referencia_p" name="telefono_referencia_p[]" class="form-control" > 
          </div>


          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="email">Email:</label>
            <input type="date" id="email_referencia_p" name="email_referencia_p[]" class="form-control"  > 
          </div>

         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="relacion">Relacion:</label>
            <input type="date" id="relacion_referencia_p" name="relacion_referencia_p[]" class="form-control"  > 

          </div>


        <input type="hidden" name="idReferencias" value="">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
          <button class="btn btn-default">Cancelar</button>
          <button id="agregar_referencias" class="btn btn-default">Agregar</button>
        </div>
     
        </div>

     

  
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
          <button class="btn btn-default">Cancelar</button>
          <button id="submit" class="btn btn-default">Guardar</button>
        </div>

      <!-- </form> -->

    </div>      

  </div>

<script type="text/javascript">

        function messageAlert(message_cont, message_type){
        var d_message = $('.alert');
        d_message.addClass(message_type)
             .append('<p>'+message_cont+'</p>'); 
        
      }

      function redir(){
         setTimeout(function(){  window.location.href = "../perfiles/personas/perfil-personas.php" }, 5000);
      }


 $("#saveE").on('click', function(e){
            e.preventDefault();
        
            var formdata = $("#saveEdu").serialize();
            
      
            $.ajax({
              url: 'save/edu.php',
              type: 'post',
              data: formdata,
              success: function(response) {      
                if(response) {
                    messageAlert(response, 'alert-success');                
                } else{
                    messageAlert(response, 'alert-danger');
                }             
              },         
              error: function(xhr, desc, err) {

                messageAlert("Ha ocurrido un error, vuelva a intentar", 'alert-danger');           
              }
            }); // end ajax call
            

          });

  

</script>


     
<?php include("../footer.html"); ?>


