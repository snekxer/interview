<?php include("../header.php"); 
  $meta = new meta_global(); 
?>

<header class="bg-gallery">
  <div class="container">
  </div>
</header>

<div class="wrap-content">
  <section class="bg-gallery">
    <div class="container text-center">
      <div class="row" >
        <form id="RegisterForm" action="register-form.php" method="post">



          <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 text-center bg-white form-container">
            <h4 class="txt-gray">REGISTRARSE</h4>
            <hr>


            <!-- Choose user type-->
            <div id="choose_type">
               <input id="empresa" type="radio" name="tipo_usuario" value="E">
              <label for="empresa" class="radio-inline tipo_usuario" style="background-image:url('/resources/img/icon-empresa.png');
              background-size: contain"></label>
               <input id="personas" type="radio" name="tipo_usuario" value="P">
              <label for="personas" class="radio-inline tipo_usuario" style="background-image:url('/resources/img/icon-persona.png');
              background-size: contain"></label>
              <input id="emprendedor" type="radio" name="tipo_usuario" value="O">
              <label for="emprendedor" class="radio-inline tipo_usuario" style="background-image:url('/resources/img/icon-emprendedor.png');
              background-size: contain;"></label>
              <div class="col-sm-12 col-xs-12 text-center padding">
               <p id="next" class="btn el-border el-border-azure-radiant">Siguiente</p>
             </div>
           </div>


            <div id="info_fields" class="hidden">
              <div id="nombresap" class="form-group row hidden">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <label for="ex1">Nombres</label>
                  <input class="form-control" id="nombres" name="nombres" type="text"
                  data-validation="length" data-validation-length="min5" placeholder="Nombres">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <label for="ex1">Apellidos </label>
                  <input class="form-control" id="apellidos" name="apellidos" type="text"
                  data-validation="length" data-validation-length="min5" placeholder="Apellidos">
                </div>
              </div>
              <div id="nombresn" class="form-group hidden">
                <label for="inputsm">Nombre</label>
                <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre" 
                data-validation="length" data-validation-length="min5" data-toggle="popover" data-content="Ingresa el nombre de tu negocio">
              </div>

              <div class="form-group">
                <label for="inputsm">Usuario</label>
                <input id="usuario" type="text" class="form-control" name="username" placeholder="Nombre" 
                data-validation="length" data-validation-length="min5" data-toggle="popover" data-content="Puedes usar letras">
              </div>
              <div class="form-group">
                <label for="inputsm">Email</label>
                <input id="email" type="text" class="form-control" name="email" placeholder="@interview.ec" 
                data-validation="email" data-toggle="popover" data-content="Ingrese su direccion de correo">
              </div>
              <div class="form-group">
                <label for="inputsm">Contrasena</label>
                <input id="password" type="password" class="form-control" name="password_confirmation" placeholder="Contrasena" 
                data-validation="strength" data-validation-strength="8" data-toggle="popover" data-content="Usa ocho caracteres como mínimo. No uses una contraseña de otro sitio ni un nombre demasiado común, como el nombre de tu mascota.">
              </div>
              <div class="form-group">
                <label for="inputsm">Repetir contrasena</label>
                <input id="repassword" type="password" class="form-control" name="password" placeholder="Repita contrasena" 
                data-validation="confirmation">
              </div>
              <div id="areas" class="form-group hidden">
                <label for="area">Area</label>
                <select  name="areas" class="form-control" data-toggle="popover" data-content="Selecciona tu area de trabajo">
                  <?php 
                  $areas = $meta->getAllAreas($link);
                  foreach($areas as $areas){
                      echo '<option value="' . $areas->getId() . '"   >' . $areas->getNombre() . '</option>'; 
                  }
                  ?>
                </select>
              </div>

              <div id="industrias" class="form-group hidden" data-toggle="popover" data-content="Selecciona la industria a la que perteneces">
                <label for="industria">Industria</label>
                <select name="industria" class="form-control">
                  <?php 
                  $industrias = $meta->getAllIndustrias($link);
                  foreach($industrias as $industrias){
                    echo '<option value="' . $industrias->getId() . '"   >' . $industrias->getNombre() . '</option>';
                  }
                  ?>
              </select>
              </div>
              <div class="col-sm-12 col-xs-12 text-center padding">
               <p id="previous" class="btn el-border el-border-azure-radiant">Regresar</p>
               <p id="register" class="btn el-border el-border-azure-radiant">Finalizar</p>
             </div>
            </div>


            <br>
            <p>&#191;Ya tienes cuenta?<span> <a href="../../auth/login.php">Inicia sesi&oacute;n</a></span></p>

           </div> 

         </form>
         <div class="col-sm-12 col-xs-12 text-center">
            <p>Al hacer click en el botón registrarme, acepto el registro de mis datos y los<a href="/acerca/terminos-y-condiciones.php">términos y condiciones</a></p>
         </div>
       </div>
     </div>
   </section>
 </div>


     <script data-main="../../resources/js/forms" src="../resources/js/lib/require.js"></script>
     <script>
        //$('[data-toggle="popover"]').popover({trigger: "focus", placement: "left", content:function(){return $($(this).data('content')).text();} });

        $("#next").on("click", function(){
            var profile_type = $("input:checked").val();
            if(profile_type == "E"){
                $("#choose_type").addClass("hidden");
                $("#info_fields, #industrias, #nombresn").removeClass("hidden");

            }else if(profile_type == "P"){
               $("#choose_type").addClass("hidden");
                $("#info_fields, #areas, #nombresap").removeClass("hidden");

            }else if(profile_type == "O"){
                                 $("#choose_type").addClass("hidden");
                $("#info_fields, #industrias, #nombresn").removeClass("hidden");

            }else{
              alert("seleccione un tipo de perfil");
            }
        })


        $("#previous").on("click", function(){
                $("#choose_type").removeClass("hidden");
                $("#info_fields, #industrias, #nombresn, #nombresap").addClass("hidden");

        })

        $("#register").on("click", function(){
                  $("#RegisterForm").submit();
        })
     </script>

  
   <?php include("../footer.html"); ?>
