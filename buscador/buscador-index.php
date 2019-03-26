<?php 
include("../header.php");
$buscador = new buscador();

//get search term
$str = $_GET['search_term'];
?>

<header>
  <div class="container">
  </div>
</header>


<div class="wrap-content">
<?php 
$ofertas= $buscador->buscarOfertas($str,$link);
if($ofertas!==false){   ?>
  <section class="bg-gray">
    <div class="container text-center">
      <!-- seccion portafolio -->
      <img class="icono-seccion" src="/resources/img/ofertas.png" alt="icono de ofertas">  
      <h3>Ofertas Laborales</h3><br><br>
      <span>Encuentra las mejores oportunidades de trabajo</span>
      <a class="btn el-border el-border-azure-radiant" href="busqueda-anuncios-laborales.php?oid=<?php echo $str; ?>&tipo=oferta">Ver más</a>
      <div class="row center-block">
        <div class="loading">
            <img src="/resources/img/lazy-loading.gif">
          </div>
        <ul class="bxslider">
         <?php  
         foreach ($ofertas as $o){?>                                    
         <li>
          <div class="thumbnail">
            <a class="test-popup-link" href="<?php echo '../ofertas/postular-oferta.php?oid='.$o->getId(); ?>">
              <img class="img-responsive img-circle center-block bg-azure-radiant grow" src="../<?php echo $o->getArea()->getImg($o); ?>" alt="icono ofertas" style="width:160px;height:160px"></a>

              <div class="caption">
                <h4><?php echo $o->getTitulo(); ?></h4>
              </div>
            </div>
          </li>
          <?php } ?>
      </ul>        
    </div>
    <!-- fin de seccion portafolio -->
  </div>
</section>
<?php } ?>
<!--  seccion servicios -->
<?php                
$servicios= $buscador->buscarServicios($str, $link); 
if($servicios!==false){ ?>
<section class="bg-gray">
  <div class="container text-center">
    <img class="icono-seccion" src="/resources/img/servicios.png" alt="icono de servicios">
    <h3>Requerimientos de servicios</h3><br><br>
    <span>Servicios independientes que requieren las empresas y emprendedores</span>
    <a class="btn el-border el-border-azure-radiant" href="busqueda-anuncios-laborales.php?sid=<?php echo $str; ?>&tipo=servicio">Ver más</a>
    <div class="row center-block">
      <div class="loading">
            <img src="/resources/img/lazy-loading.gif">
          </div>
      <ul class="bxslider">
        <?php    
        foreach ($servicios as $s){?>             
        <li>
          <div class="thumbnail">
            <a class="test-popup-link" href="<?php echo '../servicios/postular-servicio.php?sid='.$s->getId(); ?>">
              <img class="img-responsive img-circle center-block bg-azure-radiant grow" src="../<?php echo $s->getArea()->getImgServ(); ?>" alt="icono ofertas" style="width:160px;height:160px"></a>
            <div class="caption temp-text-white temp-margin-top" style="color:#000">
              <h4><?php echo $s->getTitulo(); ?></h4>
            </div>
          </div>
        </li>
        <?php }?> 
    </ul>
  </div>
</div>
</section>
<?php } ?>
<!-- fin seccion servicios -->
<!-- seccion perfiles -->
<?php  
$empresas=$buscador->buscarEmpresas($str, $link);
if($empresas!==false){ ?>
<section class="bg-gray">
  <div class="container text-center">
    <img class="icono-seccion" src="/resources/img/perfiles.png" alt="icono de ofertas">
    <h3>Perfiles Empresariales</h3><br><br>
    <span>Las mejores empresas de todo el país están con nosotros</span>
    <a class="btn el-border el-border-azure-radiant" href="busqueda-perfiles.php?eid=<?php echo $str; ?>&categoria=empresas">Ver más</a>
    <div class="row center-block">
      <div class="loading">
            <img src="/resources/img/lazy-loading.gif">
          </div>
      <ul class="bxslider">
       <?php     
       foreach ($empresas as $e){?>          
       <li>
        <div class="thumbnail">
          <a class="test-popup-link" href="<?php echo '../perfiles/empresas/perfil-empresas.php?eid='.$e->getId(); ?>">
            <img class="img-responsive img-circle center-block bg-azure-radiant grow" src="../<?php echo $e->getFoto(); ?>" alt="icono ofertas" style="width:160px;height:160px"></a>
          <div class="caption">
            <h4><?php echo $e->getNombre(); ?></h4>
          </div>
        </div>
      </li>
      <?php } ?>
  </ul>            
</div>
</div>
</section>
<?php } ?>
<!-- fin seccion perfiles-->
<!-- seccion perfiles personas -->
<?php  
$personas=$buscador->buscarPersonas($str, $link);
if($personas!==false){ ?>
<section class="bg-gray">
  <div class="container text-center">
    <img class="icono-seccion" src="/resources/img/perfiles.png" alt="icono de ofertas">
    <h3>Perfiles Personas</h3><br><br>
    <span>Los mejores postulantes de todo el país están con nosotros</span>
    <a class="btn el-border el-border-azure-radiant" href="busqueda-perfiles.php?pid=<?php echo $str; ?>&categoria=personas">Ver más</a>
    <div class="row">
      <div class="loading">
            <img src="/resources/img/lazy-loading.gif">
          </div>
      <ul class="bxslider">
        <?php    
        foreach ($personas as $p){?>                 
        <li>
          <div class="thumbnail">
            <a class="test-popup-link" href="<?php echo '../perfiles/personas/perfil-personas.php?pid='.$p->getId(); ?>">
              <img class="img-responsive img-circle center-block bg-azure-radiant grow" src="../<?php echo $p->getFoto(); ?>" alt="icono ofertas" style="width:160px;height:160px"></a>
            <div class="caption">
              <h4><?php echo $p->getNombres(); ?></h4>
            </div>
          </div>
        </li>
        <?php } ?>
    </ul> 
  </div>
</div>
</section>
<?php } ?> 
<!-- seccion perfiles emprendedores -->
<?php  
$emprendedores=$buscador->buscarEmprendedores($str, $link);
if($emprendedores!==false){ ?>
<section class="bg-gray">
  <div class="container text-center">
    <img class="icono-seccion" src="/resources/img/perfiles.png" alt="icono de ofertas">
    <h3>Perfiles de Emprendedores</h3><br><br>
    <span>Los mejores emprendedores de todo el país están con nosotros</span>
    <a class="btn el-border el-border-azure-radiant" href="busqueda-perfiles.php?pid=<?php echo $str; ?>&categoria=emprendedores">Ver más</a>
    <div class="row">
      <div class="loading">
            <img src="/resources/img/lazy-loading.gif">
          </div>
      <ul class="bxslider">
       <?php    foreach ($emprendedores as $o){?>         
       <li>
        <div class="thumbnail">
          <img class="img-responsive img-circle center-block bg-azure-radiant grow" src="../<?php echo $o->getFoto(); ?>" alt="icono ofertas" style="width:160px;height:160px">
          <div class="caption">
            <h4><?php echo $o->getNombre(); ?></h4>
            <a class="btn el-border el-border-dove-gray" href="<?php echo '../perfiles/emprendedores/perfil-emprendedores.php?oid='.$o->getId(); ?>">Ver</a> 
          </div>
        </div>
      </li>
      <?php } ?>
  </ul>  
</div>
</div>
</section>
<?php } ?> 
<section id="no_results">
  <div class="container">
    <div class="row">
      <h2 class="text-center">Lo sentimos, no pudimos encontrar ningún resultado</h2>
      <img src="../resources/img/no-results.gif" alt="imagen de no resultados">
    </div>
  </div>
</section>
</div>


<script type="text/javascript" src="/resources/plugins/bxslider/dist/jquery.bxslider.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    var slider = $('.bxslider').bxSlider({ 
    maxSlides: 4,
    moveSlides:1,
    responsive:true,
    slideWidth: 280,
    slideMargin: 5,
    pager:false,
    onSliderLoad: function(){
        $(".loading").fadeOut("slow");
        setTimeout(function(){$(".bxslider").fadeIn("slow")
                      .css("visibility", "visible");}, 1000);
        
      }
  });

    var cont = $(".wrap-content"), no_results = $("#no_results");
    if(cont.children().length <= 1){
     no_results.css("display", "block").fadeIn("slow");
    }
   
});

 	(function(){
 	//adjust size of the wrap-content element	
 	$(window).resize(function(){
 		var newHeight = $(window).height() - ($(".content").length * 350);
 		$(".wrap-content").css("min-height", newHeight);
 	})
 	
 	})();
 </script>

<?php include("../footer.html"); ?>
