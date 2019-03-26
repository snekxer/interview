<?php 
include("../header.php"); 
 //error_reporting(0);
 
  $impl = new usuario_global();
  $meta = new meta_global();
  if($tipo=='E'){
    $productos_imp = new productos_empresa();
    $empl = new empresa_empresa;
  } else {
    $productos_imp = new productos_global();     
    $empl = new empresa_global;
  }
  $eid=(int)$_GET['eid'];
  $empresa = $empl->getEmpresa($eid, $link)
          
?>

<header>
  <div class="container-fluid text-center">
     <h1><b>Productos Publicados</b></h1>
  </div>
</header>

<div class="container-fluid text-center wrap-content">
  <div class="row">

    <?php               
            $productos_empresa = $productos_imp->getProductos($empresa, $link);
            if($productos_empresa!=false){
                foreach ($productos_empresa as $producto){
?>
                    <a href="#" class="zoom" title="Image 1">
                        <div id="<?php echo $producto->getId(); ?>" class="col-lg-3 col-sm-4 col-xs-12">                     
                            <img src="..<?php echo$producto->getImagen(); ?>" class="thumbnail img-responsive">                    
                            <div class="text-overlay">
                            <h3><b><?php echo$producto->getTitulo(); ?></b></h3><br>
                            <p><?php echo$producto->getDescripcion(); ?></p>
                            </div>
                        </div>
                    </a>
<?php
                }
            } else {
                echo 'No hay productos';
            }
?>

      </div>
    </div>


    <!-- Modal zoom image -->
  <div id="zoomImage" class="modal">
    <span class="close">&times;</span>
    
    <div>
      <img class="modal-content">
    </div>
    
    <div id="caption"></div>
  </div>
    
</div>

<script type="text/javascript">
  $(function() {
    $('.zoom').on('click', function() {
      $('.modal-content').attr({src: $(this).find('img').attr('src'), class: 'center-block padding-16'});

    /*  $( "#greatphoto" ).attr({
  alt: "Beijing Brush Seller",
  title: "photo by Kelly Clark"
});*/
      $('#zoomImage').modal('show');   
    });   
});

</script>


<?php include("../footer.html"); ?>


