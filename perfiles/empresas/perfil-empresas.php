<?php 
include("../../header.php"); 
$eid = (int)$_GET['eid'];
if(isset($_GET['eid'])){
  if(is_int($eid)){
    if($tipo=='E'){
      $empl = new empresa_empresa(); 
    } else {
      $empl = new empresa_global(); 
    }
    $empresa = $empl->getEmpresa($eid, $link);
    $mine = false;
  } else {
    $error = 0;
  }
} else {
  if($logged&&$tipo=='E'){
    $mine = true;
    $impl = new usuario_global();
    $empl = new empresa_empresa();
    $empresa = $impl->getMyUsr($link);
  } else {
    $error = 1;
  }
}
$meta = new meta_global();
if($empresa!=null){
  ?>

  <header style='background-image:linear-gradient(to bottom, rgba(255, 255, 255, 0) 0, #fff 80%),<?php echo 'url('.$empresa->getEncabezado().');'; ?>background-repeat: no-repeat;background-size: cover;' >
    <div class="container">
      <div class="col-md-3 col-sm-6 col-xs-12 profile-card" style="min-height: 494px;color: <?php echo $empresa->getTema()->getText(); ?>;
      background: -o-linear-gradient(bottom right, <?php echo $empresa->getTema()->getColorDeg();?>, <?php echo $empresa->getTema()->getColorDeg1(); ?>); /* For Opera 11.1 to 12.0 */
      background: -moz-linear-gradient(bottom right, <?php echo $empresa->getTema()->getColorDeg();?>, <?php echo $empresa->getTema()->getColorDeg1(); ?>); /* For Firefox 3.6 to 15 */
      background: linear-gradient(to bottom right, <?php echo $empresa->getTema()->getColorDeg();?>, <?php echo $empresa->getTema()->getColorDeg1(); ?>);">
      <!-- profile card / set position relative -->
      <div class="avatar-container">
        <a>
          <img src='<?php if($empresa->getFoto()!= false){ echo $empresa->getFoto(); }else{ echo '/resources/img/user.ico'; } ?>' alt="avatar" class="img-circle center-block avatar">
          <div class="avatar-edit">
            <span id="upload-avatar" class="glyphicon glyphicon-pencil" data-toggle="modal" data-target=".modal-editar-avatar"></span>
          </div>
        </a>
      </div> 

    </p>
    <div class="row text-center temp-text-white">
      <h4 id="nombre"><?php echo $empresa->getNombre(); ?></h4>
      <h4 id="industria"><?php echo $empresa->getIndustria()->getNombre(); ?></h4>
      <?php
      if(isset($_GET['eid'])){

        echo '<button type="button" class="btn btn-default" data-toggle="modal" data-target=".modal-enviar-mensaje">
        Enviar mensaje</button>';
      }else{
        echo '<button type="button" class="btn btn-default" data-toggle="modal" data-target=".modal-editar-avatar">
        Editar apariencia</button>';
      }
      ?>
      <hr>
    </div>
    <!-- icons for direct access-->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
      <ul class="li-access-direct">
        <?php
        if(isset($_GET['eid'])){
          echo '<li><a><span  class="glyphicon glyphicon-phone">
          </span> '.$empresa->getMovil().'</a>
          </li>
          <li><a><span  class="glyphicon glyphicon-map-marker">
          </span> '.$empresa->getCiudad()->getNombre().'</a>
          </li>';       
        } else { ?>
        <li><a><span  class="glyphicon glyphicon-envelope">
        </span> Mensajes</a>
      </li>
      <li><a href="../../notificaciones/notificaciones.php">
        <span  class="glyphicon glyphicon-bullhorn"></span> Notificaciones</a>
      </li>
      <li><a href="../../servicios/administrar-servicios.php"><span  class="glyphicon glyphicon-bullhorn">
      </span> Servicios</a>
    </li>
    <li><a href="../../ofertas/administrar-ofertas.php"><span  class="glyphicon glyphicon-briefcase"></span> Ofertas</a></li>
    <li><a href="../../registro/registro-empresas.php"><span  class="glyphicon glyphicon-user">
    </span> Información Personal</a></li>
    <li><a href="../../configuracion-pefiles/configuracion.php">
      <span  class="glyphicon glyphicon-tasks"></span> Ajustes</a>
    </li> 
    <?php }
    ?>
  </ul>
</div>
<!-- fin de profile card -->
</div>

<div class="col-md-9 col-sm-6 col-xs-12"  style="margin:0 0 0 0;padding: 0 0 0 0;min-height: 494px">
  <!-- video -->
  <video width="100%" height="494" controls>
    <source src="<?php if($empresa->getVideo()!= false){ echo $empresa->getVideo(); }else{ echo '../videos/demo.mp4'; } ?>" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>
    <!-- fin de video -->
  </div>
</div>
</header>
<div class="wrap-content text-center">
  <!-- seccion portafolio -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12">
          <div class="col-xs-12 col-sm-3">
            <h3>Productos</h3>
            <?php
            if($mine){ ?>
            <span>Sube fotos de productos y servicios que ofrezcas.</span><br>
            <a href="../../productos/productos.php">
              <button type="button" class="btn el-border el-border-azure-radiant bg-white">Agregar</button></a>
              <?php }else{ ?>
              <span>Cartera de productos y servicio que ofrece</span><br>
              <?php } ?>                
              <a href="../../productos/ver-productos.php?eid=<?php echo $empresa->getId();?>'">
                <button type="button" class="btn el-border el-border-azure-radiant bg-white">Ver todos</button></a>
              </div>
              <div class="slideShow col-xs-12 col-sm-9">
               <div class="loading">
                <img src="/resources/img/lazy-loading.gif">
              </div>
              <ul class="bxslider">
                <?php
                if($tipo=='E'){
                  $prol = new productos_empresa(); 
                } else {
                  $prol = new productos_global(); 
                }
                $productos_empresa = $prol->getProductos($empresa, $link);
                if($productos_empresa!==false){
                 foreach ($productos_empresa as $productos_empresa){
                  ?>
                  <li>
                    <div id='<?php echo $productos_empresa->getId();?>' class="thumbnail">
                      <a>
                        <img class="img-responsive img-thumb" src="../..<?php echo $productos_empresa->getImagen();?>" alt="..." style="width:126px;height:126px">
                      </a>
                      <div class="text-overlay">
                        <h3><b><?php echo $productos_empresa->getTitulo();?></b></h3>
                        <p><?php echo $productos_empresa->getDescripcion();?></p>
                      </div>
                      <div class="thumbnail-edit"><a href="../../productos/productos.php?id=<?php echo $productos_empresa->getId();?>"><span class="glyphicon glyphicon-pencil grow"></span></a></div>
                    </div>
                  </li>
                  <?php }
                } ?>   
              </ul>

            </div>
          </div>
        </div>
      </div>
    </section>

    <section  style="color: <?php echo $empresa->getTema()->getText(); ?>;
    background: -o-linear-gradient(bottom right, <?php echo $empresa->getTema()->getColorDeg();?>, <?php echo $empresa->getTema()->getColorDeg1(); ?>); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(bottom right, <?php echo $empresa->getTema()->getColorDeg();?>, <?php echo $empresa->getTema()->getColorDeg1(); ?>); /* For Firefox 3.6 to 15 */
    background: linear-gradient(to bottom right, <?php echo $empresa->getTema()->getColorDeg();?>, <?php echo $empresa->getTema()->getColorDeg1(); ?>);">
    <div class="container">
      <div class="row">
        <!-- seccion de anuncios laborales -->
        <div class="col-xs-12 col-sm-12">
         <div class="col-xs-12 col-sm-3">
          <h3>Anuncios laborales</h3>
          <?php
          if($mine){ ?>
          <span>Crea anuncios de vacantes laborales que tengas a disposición.</span><br>
          <a href="../../ofertas/ofertas.php"><button type="button" class="btn el-border el-border-azure-radiant bg-white">Agregar</button></a>
          <?php }else{ ?>
          <span>Ofertas de trabajo que requiere</span><br>
          <a href="../../ofertas/ver-ofertas.php"><button type="button" class="btn el-border el-border-azure-radiant bg-white">Ver todas</button></a>
          <?php } ?>   
        </div>

        <div class="col-xs-12 col-sm-9">
         <div class="loading">
          <img src="/resources/img/lazy-loading.gif">
        </div>
        <ul class="bxslider">
          <?php  
          if($tipo=='E'){
            $oferl = new ofertas_empresa(); 
          } elseif ($tipo=='P') {
            $oferl = new ofertas_persona(); 
          } else {
            $oferl = new ofertas_global(); 
          }

          $ofertas = $oferl->getOfertas($empresa, $link);
          if($ofertas!==false){
            foreach ($ofertas as $oferta){?>
            <li>
              <div id='<?php echo $oferta->getId();?>' class="thumbnail">
                <a class="test-popup-link" href="../../ofertas/ofertas.php?id=<?php echo $oferta->getId();?>">
                  <img class="img-responsive img-thumb img-circle" src="../../../<?php echo $oferta->getArea()->getImg($oferta);?>" alt="..." style="width:86px;height:86px;background: <?php echo $empresa->getTema()->getColorBg();?>">
                </a>                    
                <div class="caption temp-margin-top">
                  <h3><?php echo $oferta->getTitulo();?></h3><br>
                  <div class="dotT">
                    <p><?php echo $oferta->getCiudad()->getNombre();?></p>
                    <p><?php echo $oferta->getArea()->getNombre();?></p>
                  </div>
                </div>
                <div class="thumbnail-edit"><a href="../../ofertas/ofertas.php?id=<?php echo $oferta->getId();?>">
                  <span class="glyphicon glyphicon-pencil grow"></span>
                </a></div>               
              </div>
            </li>
            <?php
          }    
        }                       
        ?>
      </ul>            
    </div>
  </div>
</div>
</div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12">
       <div class="col-xs-12 col-sm-3">
        <h3>Servicios que necesita</h3>
        <?php
        if($mine){?>
        <span>Crea anuncios de servicios que estés requiriendo</span><br>
        <a href="../../servicios/servicios.php"><button type="button" class="btn el-border el-border-azure-radiant bg-white">Agregar</button></a>
        <?php }else{?>
        <span>Anuncios de servicio que necesita</span><br>
        <a href="../../servicios/ver-servicios.php"><button type="button" class="btn el-border el-border-azure-radiant bg-white">Ver todos</button></a>         
        <?php } ?>
      </div>
      <div class="col-xs-12 col-sm-9">
       <div class="loading">
        <img src="/resources/img/lazy-loading.gif">
      </div>
      <ul class="bxslider">
       <?php  
       if($tipo=='E'){
        $servl = new servicios_empresa(); 
      } elseif ($tipo=='P') {
        $servl = new servicios_persona(); 
      } elseif($tipo=='O') {
        $servl = new servicios_emprendedor(); 
      } else {
        $servl = new servicios_global();
      }
      $servicios = $servl->getServicios($empresa, $link);
      if($servicios!=false){
        foreach ($servicios as $servs){?>
        <li>
          <div id='<?php echo $servs->getId();?>' class="thumbnail">
            <a class="test-popup-link" href="../../servicios/servicios.php?id=<?echo $servs->getId();?>">
              <img class="img-responsive img-thumb img-circle" src="../../../<?php echo $servs->getArea()->getImgServ();?>" alt="..." 
              style="width:86px;height:86px;background: <?php echo $empresa->getTema()->getColorBg();?>">
            </a>
            <div class="caption temp-text-white temp-margin-top">
              <h3><?php echo $servs->getTitulo();?></h3><br>
              <div class="dotT">
                <p><?php echo $servs->getCiudad()->getNombre();?></p>
                <p><?php echo $servs->getArea()->getNombre();?></p>
              </div>
            </div>
            <div class="thumbnail-edit"><a href="../../servicios/servicios.php?id=<?echo $servs->getId();?>">
              <span class="glyphicon glyphicon-pencil grow"></span>
            </a></div> 
          </div>
        </li>
        <?php  }    
      }  ?>
    </ul>             
  </div>
</div>
</div>
</div>
</section>

<section style="color: <?php echo $empresa->getTema()->getText(); ?>;
background: -o-linear-gradient(bottom right, <?php echo $empresa->getTema()->getColorDeg();?>, <?php echo $empresa->getTema()->getColorDeg1(); ?>); /* For Opera 11.1 to 12.0 */
background: -moz-linear-gradient(bottom right, <?php echo $empresa->getTema()->getColorDeg();?>, <?php echo $empresa->getTema()->getColorDeg1(); ?>); /* For Firefox 3.6 to 15 */
background: linear-gradient(to bottom right, <?php echo $empresa->getTema()->getColorDeg();?>, <?php echo $empresa->getTema()->getColorDeg1(); ?>);">
<div class="container">
  <div class="row">
    <h3><img src="" alt="" class="img-responsive">Historia</h3>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="nav nav-pills nav-justified">
        <li class="active"><a data-toggle="tab" href="#acercade">Acerca de</a></li>
        <li><a data-toggle="tab" href="#clientes">Proyectos</a></li>
      </ul>
      <div class="tab-content">
        <div id="acercade" class="tab-pane fade in active text-left">
         <?php
         if($tipo=='E'){
          $historia = new historia_empresa(); 
        } else {
          $historia = new historia_global(); 
        }
        $info_historia = $historia->getHistoria($empresa, $link);
        if($info_historia!=false){
          echo '<p><b>Slogan</b>'.$info_historia->getSlogan().'</p>
          <p><b>Mision: </b>'.$info_historia->getMision().'</p>
          <p><b>Vision: </b>'.$info_historia->getVision().'</p>
          <p><b>Quiénes somos:</b>'.$info_historia->getQuienesSomos().'</p>
          <p><b>Valores: </b>'.$info_historia->getValores().'</p>
          <p><b>Contacto: </b>'.$info_historia->getContacto().'</p>';                
        }
        if($mine){
          echo '<a href="../../historia/datos-empresa.php"><button class="btn el-border el-border-azure-radiant bg-white pull-right">Editar datos de contacto</button></a>';
        }
        ?>
      </div>
      <div id="clientes" class="tab-pane fade">
        <div class="row padding">
          <?php if($mine){ ?> <a href="../../historia/proyectos-empresa.php"><button class="btn el-border el-border-azure-radiant bg-white">Agregar</button></a> <?php } ?>
          <div class="col-sm-12">           
            <?php  
            $info_proyecto = $historia->getProyectos($info_historia, $link);
            if($info_proyecto!=false){
              $i = 0;
              foreach ($info_proyecto as $proyecto){ ?>
              <div class="col-sm-4">     
                <div class="thumbnail">                           
                  <img class="img-responsive" src="../..<?php echo $proyecto->getFoto();?>" alt="..." style="width:auto;height:200px">
                  <div class="text-overlay">
                    <h3><?php echo $proyecto->getNombre();?></h3><br>
                    <p><?php echo $proyecto->getProyecto();?></p>
                    <p><?php echo $proyecto->getDescripcion();?></p>
                  </div>
                  <div class="thumbnail-edit"><a href="../../historia/proyectos-empresa.php?id=<?php echo $proyecto->getId();?>">
                    <span class="glyphicon glyphicon-pencil grow"></span></a></div>      
                  </div>
                </div>
                <?php }    }  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
}else{ ?>

<div class="container-fluid wrap-content text-center"> 
  <br>
  <br>
  <br>  
  <?php  switch($error){
    case(0):
    echo '<p>Parametro de perfil invalido</p>';
    break;
    case(1):
    echo '<p>Vista de perfil incorrecta</p>';
    break;
  }
  ?>
</div>
<?php
}
?>

<!--  modal editar imagen de perfil -->
<div class="modal fade modal-editar-avatar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3>  Apariencia </h3>
      </div>

      <div class="modal-body">
        <!-- inicio croppiejs -->


        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#menu0">Imagen de perfil</a></li>
          <li><a data-toggle="tab" href="#menu1">Video</a></li>
          <li><a data-toggle="tab" href="#menu2">Encabezado</a></li>
          <li><a data-toggle="tab" href="#menu3">Tema</a></li>
        </ul>

        <div class="tab-content text-center tab-op">
          <div id="menu0" class="tab-pane fade in active">
           <div class="col-sm-12 col-xs-12">

            <h3>Carga tu foto de perfil
            </h3><br>
            <p>Sube una foto de perfil, en la cual destaca su profesionalismo y dinamismo.</p>
          </div>
          <form id="uploader_avatar">
            <div class="form-group col-sm-12 col-xs-12">
              <label for="imagenUploader">
                <img class="uploader-img" src="../../../resources/img/upload.png" alt="imagen uploader avatar">
              </label>
              <input name="upfile" type="file" class="form-control-file" id="imagenUploader" aria-describedby="fileHelp" style="display: none">
            </div>
            <p><small>Formatos aceptados: .jpg, .jpeg, .png, .gif Tamaño limite: 5mb.</small></p>  
          </form>
        </div>
        <div id="menu1" class="tab-pane fade">
         <div class="col-sm-12 col-xs-12">
           <h3>Sube un video</h3><br>
           <p>Sube un video de presentación que describa quien eres; tu imagen, tu marca, tu empresa.</p>           
         </div>  
         <form id="uploader_video">
          <div class="form-group col-sm-12 col-xs-12">
            <label for="videoUploader">
              <img class="uploader-img" src="../../../resources/img/upload.png" alt="imagen uploader video">
            </label>
            <input name="upfile" type="file" class="form-control-file" id="videoUploader" aria-describedby="fileHelp" style="display: none">
          </div> 
          <p><small>Formatos aceptados: .mp4, .avi, .mpg, .3gp .mov Tamaño limite: 100mb.</small></p> 
        </form>
      </div>
      <div id="menu2" class="tab-pane fade">
       <div class="col-sm-12 col-xs-12">
         <h3>Sube un encabezado</h3><br>
         <p>Sube un encabezado para tu perfil.</p>         
       </div>    
       <form id="uploader_encabezado">
        <div class="form-group col-sm-12 col-xs-12">
          <label for="encabezadoUploader">
            <img class="uploader-img" src="../../../resources/img/upload.png" alt="imagen uploader encabezado">
          </label>
          <input name="upfile" type="file" class="form-control-file" id="encabezadoUploader" aria-describedby="fileHelp" style="display: none">
        </div>
        <p><small>Formatos aceptados: .jpg, .jpeg, .png, .gif Tamaño limite: 5mb.</small></p>
      </form>
    </div>
    <div id="menu3" class="tab-pane fade">
      <div class="col-sm-12 col-xs-12">
       <h3>Selecciona tu tema
       </h3><br>
       <p>Elige un tema que destaque el compromiso empresarial y profesional que deseas proyectar.</p>
     </div>    
     <div class='row'>
      <form id="upload-tema">
        <div class='col-sm-12 col-xs-12'>

          <?php
          $temas = $meta->getAllTemas($link);           
          foreach ($temas as $temas){
            if( $empresa->getTema()->getId() == $temas->getId()){
              echo '<div class="col-sm-2 col-xs-4">
              <input id="1" type="radio" name="tema" value="<?php echo $empresa->getTema()->getId(); ?>" checked>
              <label for="'. $temas->getId() .'" class="center-block tema" style="background-image:url(/'. $temas->getImg() .')"></label>
              </div>';
            }else{
              echo '<div class="col-sm-2 col-xs-4">
              <input id="'. $temas->getId() .'" type="radio" name="tema" value="'. $temas->getId() .'">
              <label for="'. $temas->getId() .'" class="center-block tema" style="background-image:url(/'. $temas->getImg() .')"></label>
              </div>';
            }
          }            
          ?>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- fin croppiejs -->
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
  <button id="guardar" type="button" class="btn btn-primary">Guardar</button>
</div>    
</div>
</div>
</div>

<!-- fin modal editar imagen de perfil -->

<!-- modal enviar mensaje -->
<!--  modal editar imagen de perfil -->
<div class="modal fade modal-enviar-mensaje" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3> Enviar mensaje </h3>
        <h4 id="nombre"><?php echo $empresa->getNombre(); ?></h4>
      </div>
      <div class="modal-body">
        <form id="contactForm" method="post" action="../../mensajeria/enviar-mensaje.php">
          <div class="form-group">
            <label for="contenido">Mensaje:</label>
            <textarea class="form-control" rows="5" id="contenido" name="contenido"></textarea>
          </div>
          <input type="hidden" name="receptor" value="<?php echo $empresa->getId(); ?>">
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>                             
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal enviar mensaje -->


</div> 

<script type="text/javascript" data-main="../../resources/js/perfiles" src="../../resources/scripts/require.js"></script>
<?php include("../../footer.html"); ?>
