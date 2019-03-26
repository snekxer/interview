<?php 
include("../header.php"); 
 //error_reporting(0);

$impl = new usuario_global();
$meta = new meta_global();
if($tipo=='P'){
  $portafolio_imp = new portafolio_persona();
  $empl = new persona_persona;
} else {
  $portafolio_imp = new portafolio_global();     
  $empl = new persona_global;
}
$pid=(int)$_GET['pid'];
$persona = $empl->getPersona($pid, $link)

?>

<header>
  <div class="container-fluid text-center">
   <h1><b>Portafolio</b></h1>
 </div>
</header>

<div class="wrap-content text-center">
  <section>
    <div class="container">
      <div class="row">
        <?php               
        $portafolio_persona = $portafolio_imp->getPortafolios($persona, $link);
        if($portafolio_persona!=false) { 
        foreach ($portafolio_persona as $portafolio){
         ?>
         <a href="#" class="zoom">
           <div id="<?php echo $portafolio->getId();?>" class="col-lg-3 col-sm-4 col-xs-12">
            <div class="thumbnail">
              <img src="..<?php echo $portafolio->getImagen();?>" class="img-thumb img-responsive" style="width:100%;height:200px">                     
              <div class="text-overlay">
                <h3><b><?php echo $portafolio->getTitulo();?></b></h3><br>
                <p><?php echo $portafolio->getDescripcion();?></p>
              </div>
              <div class="thumbnail-edit"><a href="../portafolio/portafolio.php?id=<?php echo $portafolio->getId(); ?>"><span class="glyphicon glyphicon-pencil grow"></span></a></div>          
            </div>
          </div>
        </a>
        <?php
        }
      } else { ?>
        <div class="col-sm-12 col-xs-12 text-center padding">
            <img src="../resources/img/icon-face-tho.jpg" alt="no tiene ofertas icon" height="120" width="120">
            <p>No tiene portafolios, crea uno ahora</p>
            <a href="../../portafolio/portafolio.php"><p class="btn btn-default">Ir</p></a>
         </div>
      <?php }
      ?>

    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="row">
      <!-- Modal zoom image -->
      <div id="zoomImage" class="modal">
        <span class="close">&times;</span>    
        <div>
          <img class="modal-content"></div>    
          <div id="caption"></div>
        </div>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  $(function() {
    $('.zoom').on('click', function() {
      $('.modal-content').attr({src: $(this).find('img').attr('src'), class: 'center-block padding-16'});
    });*/
    $('#zoomImage').modal('show');   
  });   
});

</script>


<?php include("../footer.html"); ?>


