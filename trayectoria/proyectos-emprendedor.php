<?php 
include("../header.php");
    $meta = new meta_global();

if(isset($_GET['id'])){
    $id = (int)($_GET['id']);
    $tral = new trayectoria_emprendedor;
    $pro_temp = $tral->getProyectoFromId($id, $link);
    if($pro_temp->getTrayectoria()===unserialize($_SESSION['user'])->getId()){
        $pro = $pro_temp;
        $denied = false;
        $create = false;
    } else {
        $denied = true;
    }
}  else {
    $pro = new tra_proyecto;
    $create = true;
}

?>

<header>
  <div class="container text-left">
     <h1><b>Proyectos Emprendedores</b></h1>
  </div>
</header>

<div class="wrap-content text-center">
  <section>
    <div class="container">
      <div class="row">
        <form class="text-left" id="proyectos-emprendedor" method="post" action="" enctype="multipart/form-data">        
          <div class="row">
            <h3>Proyecto</h3>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <label for="nombres">Nombre del Cliente:</label>
              <input type="text" class="form-control" id="nombre" name="nombre"  value="<?php echo $pro->getNombre(); ?>"> 
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <label for="titulo_educacion">Nombre del Proyecto:</label>
              <input type="text" class="form-control" id="proyecto" name="proyecto" value="<?php echo  $pro->getTitulo(); ?>"> 
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <label for="imageInputFile">Imagen:</label>
              <input name="upfile" type="file" class="form-control-file" id="upfile"  aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Seleccione un archivo</small>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label for="descripcion">Descripción:</label>
              <textarea id="descripcion" name="descripcion" class="form-control"><?php echo $pro->getDescripcion(); ?></textarea>        
            </div>
            <input id="id_proyecto" type="hidden" name="id" value="<?php echo  $pro->getId(); ?>">
            <input type="hidden" name="tipo" value="<?php if($create){ echo 'N';} else { echo 'E';}?>">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
              <!--<button type="submit" class="btn btn-default">Agregar</button>-->
              <button type="button" id="guardar" class="btn el-border el-border-azure-radiant bg-white">Guardar</button>
              <?php if (!$create){ ?>
             <a href="eliminar-proyecto.php?id=<?php echo $pro->getId();?>" class="btn el-border el-border-azure-radiant bg-white">Eliminar</a>
                <?php } ?>
            </div>
          </div>
        </form>           
      </div>
    </div>
  </section>  
</div>

  <script>
  $("#guardar").on('click', function(e){
    var form_id = $("#proyectos-emprendedor");
    form_id.attr("action", "save-pro.php");
    form_id.submit();
    event.preventDefault();
  })
</script>

<?php include("../footer.html"); ?>


