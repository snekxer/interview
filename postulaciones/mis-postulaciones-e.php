<?php
include("../header.php");

$servl = new servicios_emprendedor;

$servs = $servl->getPostulaciones($link);
?>

<header>
    <div class="container">
    </div>
</header>

<div class="wrap-content text-center">
    <section>
        <div class="container">
            <div class="row bg-azure-radiant">
                <div class="col-sm-4 col-xs-12">

                    <div id="laborales">
                        <?php if ($servs!=false){ ?>
                        <ul class="list-group">
                            <?php foreach($servs as $serv){ ?>
                         <li id="o<?php echo $serv->getId();?>" class="list-group-item">
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

                <div class="col-sm-8 col-xs-12 bg-gallery padding text-azure-radiant">
                    
                    <?php if($servs!=false){
                    foreach($servs as $serv){ ?>
              <div id="contento<?php echo $serv->getId();?>" class="panel panel-default items " style="display: none">
                  <div class="panel-heading text-left">
                    <a href="../perfiles/<?php if($serv->getUsuario()->name()=='empresa'){ echo 'empresas/perfil-empresas.php?eid='.$serv->getUsuario()->getId();}else{echo 'emprendedores/perfil-emprendedores.php?oid='.$serv->getUsuario()->getId();}?>" class="btn el-border el-border-azure-radiant bg-white"><span>Ver perfil</span></a>
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
                    <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                      <ul>
                        <li>Área: <span  class="glyphicon glyphicon-calendar"></span> <?php echo $serv->getArea()->getNombre();?></li>
                        <li>Ciudad: <span  class="glyphicon glyphicon-globe"></span> <?php echo $serv->getCiudad()->getNombre();?></li>
                        <li>Modalidad: <span  class="glyphicon glyphicon-globe"></span> <?php echo $serv->getModalidad()->getNombre();?></li>
                        <li>Remuneración: <span  class="glyphicon glyphicon-globe"></span> <?php echo $serv->getRangoDesde().' - '.$serv->getRangoHasta();?></li>
                        <li>Descripción: <span  class="glyphicon glyphicon-globe"></span> <?php echo $serv->getDescripcion();?></li>
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
    (function () {
        $('.items').first().css("display", "block");
        $('.list-group-item').click(function () {
            var content_id = $(this).attr('id');
            // $('.detalle').removeClass('current');
            $('.items').css('display', 'none');
            // $(this).show();
            $("#content" + content_id).css("display", "block");
        })
    })();
</script>

<?php include("../footer.html"); ?>
