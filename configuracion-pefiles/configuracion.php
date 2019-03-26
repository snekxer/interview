<?php include("../header.php"); ?>

<header>
  <div class="container text-center">
  </div>
</header>

<div class="wrap-content text-center">
  <section>
    <div class="container">
      <div class="row">
        <form id="Configuracion" action="change-password.php" method="post">     
          <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-xs-12 text-center form-container" >        
            <h3 class="txt-gray">CONFIGURACIÓN</h3>
            <hr style="border:2px solid gray;border-top:10px">      
            <h4>Cambiar clave:</h4>
            <div class="form-group">
              <label>Constraseña</label>
              <div class="input-group padding">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <label>Repetir constraseña</label>
              <div class="input-group padding">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="repassword" type="password" class="form-control" name="repassword" placeholder="Password">
              </div>
            </div>
            <div class="col-sm-12 col-xs-12 text-center padding">
              <button type="submit" class="btn el-border el-border-azure-radiant bg-white">Guardar</button>
            </div>
          </div>    
        </form>        
      </div>
    </div>
  </section>
</div>

<?php include("../footer.html"); ?>