<?php 
include("../header.php"); 
$servl = new servicios_empresa;

$id = (int)$_GET['sid'];
$serv = $servl->getServicio($id, $link);
if($serv->getUsuario()->getId()===unserialize($_SESSION['user'])->getId()){ ?>

<header>
 <div class="container">
 </div>
</header>

<div class="wrap-content text-center">
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
         <div class="panel panel-default">
          <div class="panel-body">
            <h4 class="text-azure-radiant text-center"><b>Servicio:</b> <?php echo $serv->getTitulo();?></h4>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-xs-12 bg-gallery">
        <ul class="list-group">
          <?php 
          $post = $servl->getPostulantes($serv, $link);
          if($post!=false){
            foreach($post as $usr){
            ?>

            <li id="<?php echo $usr[0]->getId(); ?>" class="list-group-item">
              <div class="media">
                <span class="glyphicon glyphicon-cog pull-right"></span>
                <div class="pull-left">
                  <img class="media-object" src="../<?php if($usr[0]->getFoto()!=null){echo $usr[0]->getFoto();} else {echo "resources/img/user.ico";} ?>" alt="Image" style="width:36px;height:36px;">
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><?php echo $usr[0]->getNombres().' '.$usr[0]->getApellidos(); ?></h4>
                  <p><?php echo $usr[0]->getProvincia()->getNombre().', '.$usr[0]->getCiudad()->getNombre();?></p>
                </div>

              </div>          
            </li>

            <?php
            } 
          }
          ?>
        </ul>
      </div>

      <?php 
      if($post!=false){
        foreach ($post as $usr){
        ?>
        <div id="<?php echo 'content'.$usr[0]->getId(); ?>" class="col-sm-8 col-xs-12 items bg-azure-radiant" style="display: none">
          <div class="col-sm-12">
            <div class="avatar-container">
              <img src="../<?php if($usr[0]->getFoto()!=null){echo $usr[0]->getFoto();} else {echo "resources/img/user.ico";} ?>" alt="avatar" class="img-circle center-block avatar">
            </div>
            <div class="row text-center text-white">
              <h4 id="nombre"><?php if($usr[0]->name()=='persona'){echo $usr[0]->getNombres().' '.$usr[0]->getApellidos();} else { echo $usr[0]->getNombre();} ?></h4>
              <h4 id="profesion"><?php if($usr[0]->name()=='persona'){echo $usr[0]->getArea()->getNombre();} else { echo $usr[0]->getIndustria()->getNombre();} ?></h4>
              <hr>
            </div>
            <!-- icons cv-->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
              <ul class="li-access-direct text-white">
                <li><span  class="glyphicon glyphicon-calendar"></span> Valor propuesto: <?php echo $usr[2]; ?></li>
                <li><span  class="glyphicon glyphicon-globe"></span> Comentario: <?php echo $usr[1]; ?></li>
              </ul>
            </div>
          </div>     
        </div>
        <?php 
        unset($curr);
        }
      } else {
          echo 'No hay postulantes.';
      }
?>
    </div>
  </div>
</section> 
</div>



<?php } else { ?>
<div class="container-fluid wrap-content text-center"> 
  <br>
  <br>
  <br>
  <?php 
  echo '<p>No tiene permiso para ver esta pantalla</p>';
  ?>
</div>
<?php
}
?>


<script type="text/javascript">
  (function(){

 	//adjust size of the wrap-content element	
 	$(window).resize(function(){
 		var newHeight = $(window).height() - ($(".content").length * 350);
 		$(".wrap-content").css("min-height", newHeight);

 	})


  $("#filtros-postulaciones").click(function(e) {
    e.preventDefault();
    $("#sidebar").show( "slow" );
  });

  $("#close").click(function(e) {
    e.preventDefault();
    $("#sidebar").hide( "slow" );
  });

  $('.items').first().css("display","block");


  $('.list-group-item').click(function(){
    var content_id = $(this).attr('id');


   // $('.detalle').removeClass('current');

   $('.items').css('display', 'none');

   // $(this).show();
   $("#content"+content_id).css("display","block");
 })

})();



</script>

<?php include("../footer.html"); ?>
