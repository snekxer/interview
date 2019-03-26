<?php 
include("../header.php"); 

$id_producto=$_GET["id"];

if($id_producto!=""){
  $producto= new productos_empresa();
  $info=$producto->getProducto($id_producto, $link);
  
}
else{

  $info = new producto();

}



?>

<header>
  <div class="container text-center">
   <h1><b>Producto</b></h1>
 </div>
</header>

<div class="wrap-content text-center">
  <section>
    <div class="container">
      <div class="row">
        <form id="formProducto" class="text-left" method="post" enctype="multipart/form-data">
          <div class="alert"></div>
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" class="form-control" id="titulo_oferta" value="<?php echo $info->getTitulo();?>" required>       
          </div>
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="imageInputFile">Imagen:</label>
            <input name="upfile" type="file" class="form-control-file" id="imageInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Seleccione un archivo</small>
          </div>
          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" class="form-control"><?php echo  $info->getDescripcion(); ?></textarea>        
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <input id="idProducto" type="hidden" name="product_id" value="<?php echo $info->getId(); ?>">
            <button type="button" class="btn el-border el-border-azure-radiant bg-white">Cancelar</button>
            <?php 
            if($id_producto!=""){
              echo '<button type="button" id="editar" class="btn el-border el-border-azure-radiant bg-white">Editar</button>
              <button type="button" id="eliminar" class="btn el-border el-border-azure-radiant bg-white">Eliminar</button>';

            }else{
              echo '<button type="submit" id="submit" class="btn el-border el-border-azure-radiant bg-white">Guardar</button>';
            }
            ?>
          </div>
        </form>
      </div>      
    </div>
  </section>
</div>      

<script type="text/javascript" data-main="../../resources/js/formProducto" src="../../resources/scripts/require.js"></script>


<?php include("../footer.html"); ?>


