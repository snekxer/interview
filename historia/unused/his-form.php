
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

    <form id="cv" method="post" action="crear_his.php">

    	<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="rango_salarial">Mision:</label>
            <textarea id="mision" name="mision" class="form-control"></textarea>
        </div>
        
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="rango_salarial">Vision:</label>
            <textarea id="vision" name="vision" class="form-control"></textarea>
        </div>
        
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="rango_salarial">Quienes Somos:</label>
            <textarea id="quienes_somos" name="quienes_somos" class="form-control"></textarea>
        </div>
        
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="rango_salarial">Valores Corporativos:</label>
            <textarea id="valores" name="valores" class="form-control"></textarea>
        </div>
        
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Slogan:</label>
            <input type="text"  class="form-control" id="slogan" name="slogan" > 
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <label for="nombres">Desea compartir su informacion de contacto?</label>
              <input id="contacto" type="checkbox" name="contacto" class="form-control" value="si"> 
            </div>

    	
    	<div>
    		<button type="submit">Guardar</button>
    	</div>


    </form>
</div>


    <?php include("../footer.html"); ?>