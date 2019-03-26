<?php 

include("../header.php"); 

if($logged){

  $impl = new usuario_global();

  $persona = $impl->getMyUsr($link);

  $meta = new meta_global();

if($persona===false){

    $create = true;

    $persona = new persona();

    $persona->setProfesion(new profesion);

    $persona->setArea(new area);

    $persona->setSubarea(new Subarea);

    $persona->setNacionalidad(new pais);

    $persona->setPais(new pais);

    $persona->setProvincia(new provincia);

    $persona->setCiudad(new ciudad);

    $persona->setEstadoCivil(new estadoCivil);

    

} else {

    $create = false;

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

      <div class="row">

        <form class="text-left registro-personas" id="registro-personas" method="post" action="">

          <div class="alert">

          </div>



          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <label for="nombres">Nombres:</label>

            <input type="text" name="nombres" class="form-control" id="nombres" value="<?php echo $persona->getNombres(); ?>" required> 

          </div>



          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <label for="apellidos">Apellidos:</label>

            <input type="text" name="apellidos" class="form-control" id="apellidos" value="<?php echo $persona->getApellidos(); ?>" required>       

          </div>



          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <label for="fecha-nacimiento">Fecha de nacimiento:</label>

            <div class="input-group">

             <input type="date" name="fecha-nacimiento" class="form-control" id="fecha-nacimiento" value="<?php echo $persona->getFechaNac(); ?>" width="100%" required>

             <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></div>    

             </div>     

           </div>



           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <label for="tipo_documento">Documento de identidad :</label>

            <select name="tipo-documento" class="form-control" required>

              <?php

              $tipoDocumento = array("R"=>"Ruc", "C"=>"Cédula", "P"=>"Pasaporte");

              $tipo_identificacion = $persona->getTipoIdentificacion();

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

          <label for="id-documento">No. de documento identificación:</label>

          <input type="number" name="identificacion" class="form-control" id="id-documento" value="<?php echo $persona->getIdentificacion(); ?>" required>

        </div>



        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <label for="profesion">Profesión:</label>

          <select id="profesiones" name="profesion" class="form-control" required>

            <?php 

            $profesiones = $meta->getAllProfesiones($link);

            $profesion = $persona->getProfesion()->getId();

            foreach ($profesiones as $prof) {

              if($profesion == $prof->getId()){ 

               echo '<option value="' . $persona->getProfesion()->getId() . '"  selected="selected" >' . $persona->getProfesion()->getNombre() . '</option>';

             } 

             else{

              echo '<option value="' . $prof->getId() . '">' . $prof->getNombre() . '</option>';

            }

          }

          ?>

        </select>

      </div>



      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <label for="area-trabajo">Área de trabajo:</label>

        <select id="areas" name="area" class="form-control" required>

          <?php 

          $areas = $meta->getAllAreas($link);

          $area = $persona->getArea();

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

        <label for="subarea_trabajo">Sub-area de trabajo:</label>

        <select id="subarea" name="sub-area" class="form-control" required>

          <?php 

          if($persona->getSubarea()->getId() != null){ 

            echo '<option value="' . $persona->getSubarea()->getId() . '" selected="selected"  >' . $persona->getSubarea()->getNombre() . '</option>';

          }

          ?>

        </select>

      </div>



      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <label for="nacionalidad">Nacionalidad:</label>

        <select id="nacionalidad" name="nacionalidad" class="form-control" required>

          <?php 

          if($persona->getNacionalidad()->getId() != null){ 

            echo '<option value="' . $persona->getNacionalidad()->getId() . '" selected="selected"  >' . $persona->getNacionalidad()->getNombre() . '</option>';

          }

          ?>

        </select>

      </div>



      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <label for="pais">Pais:</label>

        <select id="paises" name="pais" class="form-control" required>

          <option value=""></option>

          <?php 

          $paises = $meta->getAllPaises($link);

          foreach($paises as $paises){

            if($paises->getId() == $persona->getPais()->getId()){ 

              echo '<option value="' . $persona->getPais()->getId() . '" selected="selected"  >' . $persona->getPais()->getNombre() . '</option>';

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

         <?php 

         if($persona->getProvincia()->getId() != null){ 

          echo '<option value="' . $persona->getProvincia()->getId() . '" selected="selected"  >' . $persona->getProvincia()->getNombre() . '</option>';

        }

        ?>

      </select>

    </div>



    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

      <label for="ciudad">Ciudad:</label>

      <select  id="ciudad" name="ciudad" class="form-control" required>

        <?php 

        if($persona->getCiudad()->getId() != null){ 

          echo '<option value="' . $persona->getCiudad()->getId() . '" selected="selected"  >' . $persona->getCiudad()->getNombre() . '</option>';

        } 

        ?>

      </select>

    </div>



    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

      <label for="telf-movil">Teléfono fijo:</label>

      <input type="number" name="movil" class="form-control" id="telf-movil" value="<?php echo $persona->getTelefono(); ?>">

    </div>



    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

      <label for="telf-fijo">Teléfono móvil:</label>

      <input type="number" name="telf-fijo" class="form-control" id="telf-fijo" value="<?php echo $persona->getMovil(); ?>">

    </div>



    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

      <label for="estado-civil">Estado civil:</label>

      <select name="estado-civil" class="form-control" required>

        <option value="0" >Seleccione una</option>

        <?php

        $estadoCivil = $meta->getAllEstCivil($link);

        foreach ($estadoCivil as $estC){

          if($persona->getEstadoCivil()->getId() == $estC->getId()){ 

            echo '<option value="' . $persona->getEstadoCivil()->getId() . '" selected="selected"  >' . $persona->getEstadoCivil()->getNombre() . '</option>';

          } 

          else{

            echo '<option value="' . $estC->getId() . '"  >' . $estC->getNombre() . '</option>';

          }

        }

        ?>

      </select>

    </div>



    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

      <label for="genero">Género:</label>

      <select name="genero" class="form-control" required>

       <?php

       $genero = array("F"=>"Femenino", "M"=>"Maculino");

       foreach($genero as $g => $g_nombre) {

        if($persona->getGenero() == $g){ 

         echo '<option value="'. $g .'" selected="selected">' . $g_nombre . '</option>';

       } 

       else{

         echo '<option value="'. $g .'">' . $g_nombre . '</option>';

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





<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

  <label for="email">Email de contacto:</label>

  <input type="email" name="email" class="form-control" id="emai-contacto" value="<?php echo $persona->getEmailContacto(); ?>">

</div>



<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">

  <label for="sitio web">Sitio web:</label>

  <input type="text" name="sitio-web" class="form-control" id="sitio-web" value="<?php echo $persona->getSitioWeb(); ?>">

</div>



<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

  <label for="descripcion">Acerca de tí:</label>

  <textarea name="acerca-de" class="form-control"><?php echo $persona->getAcercaDe(); ?></textarea>        

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



 <!-- 

<script type="text/javascript" src="/scripts/jquery-validation/dist/jquery.validate.min.js"></script> -->

<script type="text/javascript" src="../../resources/plugins/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>

<script type="text/javascript" data-main="../../resources/js/formPersona" src="../../resources/scripts/require.js"></script>





<?php include("../footer.html"); 



} else {

    echo 'No tiene sesion iniciada';

}



?>







