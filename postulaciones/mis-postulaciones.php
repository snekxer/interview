<?php 
include("../header.php"); 

$oferl = new ofertas_persona;
$servl = new servicios_persona;

$ofers = $oferl->getPostulaciones($link);
$servs = $servl->getPostulaciones($link);


?>

<header>
 <div class="container">
 </div>
</header>

<div class="wrap-content text-center">
  <section>
    <div class="container">
      <div class="row bg-gallery">
       <div class="col-sm-4 col-xs-12">
        <ul class="nav nav-tabs nav-justified">
          <li class="active"><a data-toggle="tab" href="#laborales">Laborales</a></li>
          <li><a data-toggle="tab" href="#servicios">Servicios</a></li>
        </ul>

        <div class="tab-content">
          <div id="laborales" class="tab-pane fade in active"> 
            <?php if($ofers!=false){ ?>
            <ul class="list-group"> 
            <?php   foreach ($ofers as $ofer) { ?>   
             <li id="o<?php echo $ofer->getId();?>" class="list-group-item">
              <div class="media">        
                <div class="pull-left">
                  <img class="media-object" src="..<?php echo $ofer->getEmpresa()->getFoto();?>" alt="Image" style="width:36px;height:36px;">
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><?php echo $ofer->getTitulo();?></h4>
                  <p><?php echo $ofer->getEmpresa()->getNombre();?></p>
                </div>
              </div>          
            </li>
                <?php } ?>
          </ul>    
            <?php } ?>
        </div>

        <div id="servicios" class="tab-pane fade">
          <!-- servicios -->
          <?php if ($servs!=false){ ?>
          <ul class="list-group">
              <?php foreach($servs as $serv){ ?>
           <li id="s<?php echo $serv->getId();?>" class="list-group-item">
            <div class="media">        
              <div class="pull-left">
                <img class="media-object" src="..<?php echo $serv->getUsuario()->getFoto();?>" alt="Image" style="width:36px;height:36px;">
              </div>
              <div class="media-body">
                <h4 class="media-heading"><?php echo $serv->getTitulo();?></h4>
                <p><?php echo $serv->getUsuario()->getNombre();?></p>
              </div>
            </div>          
          </li>
          <?php } ?>
        </ul>   
          <?php } ?>
      </div>

    </div>
  </div>

          <div class="col-sm-8 col-xs-12 bg-azure-radiant padding" >
              <?php if($ofers!=false) {
                        foreach ($ofers as $ofer){ ?>
              <div id="contento<?php echo $ofer->getId();?>" class="panel panel-default items" style="display: none">
                 <div class="panel-heading text-left">
                      <a href="../perfiles/empresas/perfil-empresas.php?eid=<?php echo $ofer->getEmpresa()->getId();?>">
                        <button class="btn el-border el-border-azure-radiant bg-white">Ver perfil</button></a>
                  </div>
                  <div class="avatar-container">
                      <img src="..<?php echo $ofer->getEmpresa()->getFoto();?>" alt="avatar" class="img-circle center-block avatar">
                  </div>
                  <div class="row text-center text-white">
                      <h4 id="nombre"><?php echo $ofer->getEmpresa()->getNombre();?></h4>
                      <h4 id="profesion"><?php echo $ofer->getEmpresa()->getIndustria()->getNombre();?></h4>
                      <hr>
                  </div>
                  <div class="panel-body">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                      <ul class="li-access-direct">
                                          <?php if ($ofer->getArea() != null) { ?>
                                              <li>Área: <span><?php echo $ofer->getArea()->getNombre(); ?></span></li>
                                          <?php } if ($ofer->getGenero() != null && $ofer->getGenero() != 0) { ?>
                                              <li>Género: <span><?php echo $ofer->getGenero(); ?></span></li>
                                          <?php } if ($ofer->getExperiencia()->getNombre() != null) { ?>
                                              <li>Experiencia: <span><?php echo $ofer->getExperiencia()->getNombre(); ?></span></li>        
                                          <?php } if ($ofer->getEdad()->getNombre() != null) { ?>
                                              <li>Edad: <span><?php echo $ofer->getEdad()->getNombre(); ?></span></li>
                                          <?php } if ($ofer->getCiudad()->getNombre() != null) { ?>
                                              <li>Ciudad: <span><?php echo $ofer->getCiudad()->getNombre(); ?></span></li>        
                                          <?php } if ($ofer->getTipoContrato()->getNombre() != null) { ?>
                                              <li>Contrato: <span><?php echo $ofer->getTipoContrato()->getNombre(); ?></span></li>
                                          <?php } if ($ofer->getRenumeracion()->getNombre() != null) { ?>
                                              <li>Remuneración: <span><?php echo $ofer->getRenumeracion()->getNombre(); ?></span></li>
                                              <li><?php echo $ofer->getrangoDesde() . ' - ' . $ofer->getrangoHasta(); ?></li>
                                      <?php } ?>  
                                              <li>Descripción: <span><?php echo $ofer->getDescripcion();?></span></li>
                              </ul>
                  </div>
                </div>
              </div>
                 <?php }
              } 
              
              if($servs!=false){
                    foreach($servs as $serv){ ?>
              <div id="contents<?php echo $serv->getId();?>" class="panel panel-default items" style="display: none">
                  <div class="panel-heading text-left">
                      <a href="../perfiles/<?php if($serv->getUsuario()->name()=='empresa'){ echo 'empresas/perfil-empresas.php?eid='.$serv->getUsuario()->getId();}else{echo 'emprendedores/perfil-emprendedores.php?oid='.$serv->getUsuario()->getId();}?>">
                        <button class="btn el-border el-border-azure-radiant bg-white">Ver perfil</button></a>
                  </div>
                  <div class="avatar-container">
                      <img src="..<?php echo $serv->getUsuario()->getFoto();?>" alt="avatar" class="img-circle center-block avatar">
                  </div>
                  <div class="row text-center">
                      <h4 id="nombre"><?php echo $serv->getUsuario()->getNombre();?></h4>
                      <h4 id="profesion"><?php echo $serv->getUsuario()->getIndustria()->getNombre();?></h4>
                      <hr>
                  </div>
                  <div class="panel-body">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                      <ul class="li-access-direct">
                           <li>Área: <span><?php echo $serv->getArea()->getNombre();?></span></li>
                           <li>Ciudad: <span><?php echo $serv->getCiudad()->getNombre();?></span></li>
                           <li>Modalidad: <span><?php echo $serv->getModalidad()->getNombre();?></span></li>
                           <li>Remuneración: <span><?php echo $serv->getRangoDesde().' - '.$serv->getRangoHasta();?></span></li>
                           <li>Descripción: <span><?php echo $serv->getDescripcion();?></span></li>
                      </ul>
                  </div>
                </div>
              </div>
              <?php }
              } ?>

          </div>

</div>
</div>
</section> 
</div>

<script type="text/javascript">
  (function(){
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
