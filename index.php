<?php 
include("header.php");
$index = new Index();
//error_reporting(0);
?>

<header class="banner banner-img hidden-xs">
  <div class="container">
    <div class="header-content"></div>
  </div>
</header>

<div class="wrap-content">    
  <!-- section ofertas laborales -->
  <section class="bg-gray">
    <div class="container text-center">
      <img class="icono-seccion" src="/resources/img/ofertas.png" alt="icono de ofertas">
      <h3>Ofertas Laborales</h3>
      <span>Encuentra las mejores oportunidades de trabajo</span><br><br>
      <a class="btn el-border el-border-azure-radiant" href="buscador/busqueda-anuncios-laborales.php?oid=&tipo=oferta">Ver más</a> 
      <div class="row center-block">
        <div class="loading">
            <img src="/resources/img/lazy-loading.gif">
          </div>
          <ul class="bxslider">
            <?php  
            $ofertas= $index->lastOfertas($tipo,$link);
            if($ofertas!==false){  
              foreach ($ofertas as $o){
                ?>               
                <li>
                  <div class="thumbnail">
                      <img class="img-responsive img-circle center-block bg-azure-radiant grow" src="<?php echo $o->getArea()->getImg($o); ?>" alt="icono ofertas">
                    <div class="caption" style="color:#000">
                      <h4><b><?php echo $o->getTitulo(); ?></b></h4>
                      <p><?php echo $o->getEmpresa()->getNombre();?></p>
                      <a class="btn el-border el-border-dove-gray" href="<?php echo 'ofertas/postular-oferta.php?oid='.$o->getId(); ?>">Ver</a> 
                    </div>
                  </div>
                </li>
                <?php }
              }?>
            </ul>
        </div>
      </div>
    </section>

    <!-- seccion servicios -->
    <section class="bg-gray">
      <div class="container text-center">
        <img class="icono-seccion" src="/resources/img/servicios.png" alt="icono de ofertas">
        <h3>Requerimientos de servicios</h3>
        <span>Servicios independientes que requieren las empresas y emprendedores</span><br><br>
        <a class="btn el-border el-border-azure-radiant" href="buscador/busqueda-anuncios-laborales.php?sid=&tipo=servicio">Ver más</a> 
        <div class="row center-block">
          <div class="loading">
            <img src="/resources/img/lazy-loading.gif">
          </div>
            <ul class="bxslider">
              <?php                
              $servicios= $index->lastServicios($link); 
              if($servicios!==false){ 
                foreach ($servicios as $s){?>
                <li>
                  <div class="thumbnail">                  
                      <img class="img-responsive img-circle center-block bg-azure-radiant grow" src="<?php echo $s->getArea()->getImgServ(); ?>" alt="icono servicios">
                    <div class="caption">
                      <h4><b><?php echo $s->getTitulo(); ?></b></h4>
                      <a class="btn el-border el-border-dove-gray" href="<?php echo 'servicios/postular-servicio.php?sid='.$s->getId(); ?>">Ver</a> 
                    </div>
                  </div>
                </li>
                <?php } 
              }
              ?>
            </ul>
        </div>
      </div>
    </section>

    <!-- seccion perfiles -->
    <section class="bg-gray">
      <div class="container text-center">
        <img class="icono-seccion" src="/resources/img/perfiles.png" alt="icono de ofertas">
        <h3>Perfiles Empresariales</h3>
        <span>Las mejores empresas de todo el país están con nosotros</span><br><br>
        <a class="btn el-border el-border-azure-radiant" href="buscador/busqueda-anuncios-laborales.php?sid=&tipo=servicio">Ver más</a> 
        <div class="row center-block">
          <div class="loading">
            <img src="/resources/img/lazy-loading.gif">
          </div>
            <ul class="bxslider">
              <?php
              $empresas=$index->lastEmpresas($link);
              if($empresas!==false){
                foreach ($empresas as $e){
                  $industria = $e->getIndustria();
                  ?>
                  <li>
                    <div class="thumbnail">                      
                        <img class="img-responsive img-circle center-block bg-azure-radiant grow" src="<?php echo $e->getFoto(); ?>" alt="icono perfiles empresas">                   
                      <div class="caption">
                        <h4><b><?php echo $e->getNombre(); ?></b></h4>
                        <p><?php echo $e->getIndustria()->getNombre(); ?></p>
                        <a class="btn el-border el-border-dove-gray" href="<?php echo 'perfiles/empresas/perfil-empresas.php?eid='.$e->getId(); ?>">Ver</a>
                      </div>
                    </div>
                  </li>
                  <?php } 
                }
                ?>
              </ul>
          </div>
        </div>
      </section>
    </div>

 
    <script data-main="resources/js/loader" src="resources/js/lib/require.js"></script>
    <!--<script type="text/javascript">
      (function(){

//adjust size of the wrap-content element	
$(window).resize(function(){
	var newHeight = $(window).height() - ($(".content").length * 350);
	$(".wrap-content").css("min-height", newHeight);

})


})();


</script>-->

<?php include("footer.html"); ?>
