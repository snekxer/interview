<?php include("../header.php"); ?>

<header class="bg-gallery">
  <div class="container">
  </div>
</header>

<div class="wrap-content">
  <section class="bg-gallery">
    <div class="container text-center">
      <div class="row">
        <form id="LoginForm" action="login-form.php" method="post">
          <div id="error">
            <!-- error will be shown here ! -->
          </div>
          <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-xs-12 text-center bg-white form-container" >
            <h4 class="txt-gray">INICIA SESIÓN</h4>
            <hr>
            <p>¿No tienes una cuenta aún?<span> <a href="../../auth/registro.php">Registrate</a></span><p>
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
           </div>
              <br>
              <div class="input-group padding">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input id="email" type="text" class="form-control" name="email" placeholder="Email"
                data-validation="email">
              </div>
              <div class="input-group padding">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password"
                data-validation="length" data-validation-length="min8">
              </div>
              <div class="col-sm-12 col-xs-12 text-center padding">
               <button id="submit" class="btn el-border el-border-azure-radiant">Ingresar</button>
               <br>
               <p class="txt-left">Recuperar clave para <br><a class="temp-text-blue" href="">empresas/emprendedores</a> o <a class="temp-text-blue" href="">personas</a>.</p>
             </div>
           </div>    
         </form>
       </div>  
     </div>
   </section>
 </div>

 <!-- <script data-main="../../resources/js/login" src="../resources/js/lib/require.js"></script>-->


 <?php include("../footer.html"); ?>