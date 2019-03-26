<?php 
include("../header.php");        
$meta = new meta_global();
?>

<header>
  <div class="container-fluid text-left">
   <h1><b>Proyecto</b></h1>
   <p>*Los campos marcados (*) son obligatorios</p>
 </div>
</header>

<div class="container-fluid text-center wrap-content">

  <div class="container">
    <form class="text-left" id="proyectoForm" method="post" action="crear-proyecto.php" enctype="multipart/form-data">

      <div id="proyecto" class="row">
        <h3>Proyecto</h3>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="nombres">Nombre del Cliente:</label>
          <input type="text" class="form-control" id="nombre" name="nombre"  > 
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="titulo_educacion">Nombre del Proyecto:</label>
          <input type="text" class="form-control" id="proyecto" name="proyecto" > 
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="titulo_educacion">Duracion:</label>
          <input type="text" class="form-control" id="duracion" name="duracion" > 
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="imageInputFile">Imagen:</label>
          <input name="upfile" type="file" class="form-control-file" id="upfile"  aria-describedby="fileHelp">
          <small id="fileHelp" class="form-text text-muted">Seleccione un archivo</small>
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <label for="descripcion">Descripcion:</label>
          <textarea id="descripcion" name="descripcion" class="form-control"></textarea>        
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
          <button class="btn btn-default">Cancelar</button>
          <button id="agregar_educacion" class="btn btn-default">Agregar</button>
        </div>
      </div>         

    </form>      

  </div>      
</div>

<script type="text/javascript" data-main="/resources/scripts/cv" src="/resources/scripts/require.js"></script>

<?php include("../footer.html"); ?>


