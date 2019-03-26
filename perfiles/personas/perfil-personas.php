<?php 
include("../../header.php"); 
$pid = (int)$_GET['pid'];
if(isset($_GET['pid'])){
    if(is_int($pid)){
        if($tipo=='P'){
            $empl = new persona_persona(); 
        } else {
            $empl = new persona_global(); 
        }
        $persona = $empl->getPersona($pid, $link);
        $mine = false;
    } else {
        $error = 0;
    }
} else {
    if($logged&&$tipo=='P'){
        $mine = true;
        $impl = new usuario_global();
        $empl = new persona_persona();
        $persona = $impl->getMyUsr($link);
    } else {
        $error = 1;
    }
}
  $meta = new meta_global();
  if($persona!=false){
       echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
  ?>


  <header  style='background-image:linear-gradient(to bottom, rgba(255, 255, 255, 0) 0, #fff 80%),<?php echo 'url('.$persona->getEncabezado().');'; ?>
  background-repeat: no-repeat;background-size: cover;'>
  <div class="container">
    <div class="col-md-3 col-sm-6 col-xs-12 profile-card" style="min-height: 494px;color: <?php echo $persona->getTema()->getText(); ?>;
    background: -o-linear-gradient(bottom right, <?php echo $persona->getTema()->getColorDeg();?>, <?php echo $persona->getTema()->getColorDeg1(); ?>); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(bottom right, <?php echo $persona->getTema()->getColorDeg();?>, <?php echo $persona->getTema()->getColorDeg1(); ?>); /* For Firefox 3.6 to 15 */
    background: linear-gradient(to bottom right, <?php echo $persona->getTema()->getColorDeg();?>, <?php echo $persona->getTema()->getColorDeg1(); ?>);">
    <!-- profile card / set position relative -->
    <div class="avatar-container">
      <a>
       <img src='<?php 
       if($persona->getFoto()!= false){ echo $persona->getFoto(); 
       }else{ echo '/resources/img/user.ico'; } 
       ?>' alt="avatar" class="img-circle center-block avatar">
     </a>

   </div> 
 </p>
 <div class="row text-center">
  <h4 id="nombre"><?php echo $persona->getNombres().' '.$persona->getApellidos(); ?></h4>
  <h5 id="profesion"><?php echo $persona->getProfesion()->getNombre(); ?></h5>
  <?php
  if(!$mine){

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
    if(isset($_GET['pid'])){ ?>
    <li><a><span  class="glyphicon glyphicon-phone">
    </span><?php echo $persona->getMovil(); ?></a>
  </li>
  <li><a><span  class="glyphicon glyphicon-map-marker">
  </span><?php $persona->getCiudad()->getNombre(); ?></a>
</li>
<li><a href="../../curriculum/ver-cv.php?pid=<?php echo $persona->getId();?>"><span  class="glyphicon glyphicon-education">
</span> Hoja de vida</a>
</li>
<?php } else { ?>
<li>
  <a><span  class="glyphicon glyphicon-envelope">
  </span> Mensajes
</a>
</li>
<li>
  <a href="../../portafolio/ver-portafolio.php?pid=<?php echo $persona->getId();?>">
    <span  class="glyphicon glyphicon-folder-open"></span> Portafolio
  </a>
</li>
<li>
  <a href="../../notificaciones/notificaciones.php"><span  class="glyphicon glyphicon-bullhorn">
  </span> Notificaciones
</a>
</li>
<li><a href="../../postulaciones/mis-postulaciones.php">
                    <span  class="glyphicon glyphicon-list-alt"></span> Mis postulaciones</a>
</li>
<li>
  <a href="../../registro/registro-personas.php">
    <span  class="glyphicon glyphicon-user"></span> Información Personal
  </a>
</li>
<li>
  <a href="../../curriculum/ver-cv.php?pid=<?php echo $persona->getId();?>">
    <span  class="glyphicon glyphicon-education">
    </span> Hoja de vida
  </a>
</li>
<li>
  <a href="../../configuracion-pefiles/configuracion.php">
    <span  class="glyphicon glyphicon-tasks"></span> Ajustes
  </a>
</li>            
<?php      }
?>   
</ul>
</div>
<!-- fin de profile card -->
</div>
<div class="col-md-9 col-sm-6 col-xs-12"  style="margin:0 0 0 0;padding: 0 0 0 0;min-height: 494px">
 <!-- video -->
 <video width="100%" height="494" controls>
  <source src='<?php if($persona->getVideo()!= false){ echo $persona->getVideo(); }else{ echo '../videos/demo.mp4'; } ?>' type="video/mp4">
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
        <div class="col-sm-3 col-xs-12">
        <span class="glyphicon glyphicon-briefcase text-azure-radiant"></span>
        <h3>Portafolio</h3>
        <div class="padding">
         <?php
         if($mine){ ?>
         <span>Añade fotos a tu portafolio</span><br>
         <a class="btn el-border el-border-azure-radiant" href="../../portafolio/portafolio.php">
          Agregar</a>
          <?php }else { ?>
          <span>Actividades realizadas por <?php echo $persona->getNombres().' '.$persona->getApellidos(); ?></span>
          <?php } ?>
          <a class="btn el-border el-border-azure-radiant" href="../../notificaciones/notificaciones.php">
            Ver todas
          </a>
        </div>
      </div>
        <?php
        if($tipo=='P'){
          $prol = new portafolio_persona(); 
        } else {
          $prol = new portafolio_global(); 
        }
        $ports = $prol->getPortafolios($persona, $link);
        if($ports!==false){ ?>
        <div class="col-sm-9 col-xs-12 padding">
        <div class="loading">
          <img src="/resources/img/lazy-loading.gif">
        </div>
        <ul class="bxslider">
          <?php               
        foreach ($ports as $ports){
          ?>
          <li>
            <div id='<?php echo $ports->getId();?>' class="thumbnail">
              <a>
                <img class="img-responsive img-thumb" src="../..<?php echo $ports->getImagen();?>" alt="..." style="width:100%;height:200px">
              </a>
              <div class="text-overlay">
                <h3><b><?php echo $ports->getTitulo();?></b></h3><br>
                <p><?php echo $ports->getDescripcion();?></p>
              </div>
              <div class="thumbnail-edit"><a href="../../portafolio/portafolio.php?id=<?php echo $ports->getId(); ?>"><span class="glyphicon glyphicon-pencil grow"></span></a></div>
            </div>
          </li>
          <?php   }  
        } ?>      
        </ul>
      </div>
      </div>
    </div>
  </section>
  <!-- fin de seccion portafolio -->    
  <section  style="color: <?php echo $persona->getTema()->getText(); ?>;
      background: -o-linear-gradient(bottom right, <?php echo $persona->getTema()->getColorDeg();?>, <?php echo $persona->getTema()->getColorDeg1(); ?>); /* For Opera 11.1 to 12.0 */
      background: -moz-linear-gradient(bottom right, <?php echo $persona->getTema()->getColorDeg();?>, <?php echo $persona->getTema()->getColorDeg1(); ?>); /* For Firefox 3.6 to 15 */
      background: linear-gradient(to bottom right, <?php echo $persona->getTema()->getColorDeg();?>, <?php echo $persona->getTema()->getColorDeg1(); ?>);">
    <div class="container">
      <!-- seccion de acerca de-->
      <div class="row">
      <h3>Acerca de</h3>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <p id="acercade" class="texto-justificado"><?php echo $persona->getAcercaDe(); ?></p>
      </div>
    </div>
    <!-- fin de seccion de acerca de-->
  </div>
</section>
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
        <ul class="nav nav-tabs nav-justified">
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
                if( $persona->getTema()->getId() == $temas->getId()){
                echo '<div class="col-sm-2 col-xs-4">
                <input id="1" type="radio" name="tema" value="<?php echo $persona->getTema()->getId(); ?>" checked>
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

</div>
<div class="modal-footer">
  <button type="button" class="btn el-border el-border-azure-radiant bg-white" data-dismiss="modal">Cancelar</button>
  <button id="guardar" type="button" class="btn el-border el-border-azure-radiant bg-white">Guardar</button>
</div>
</div>
</div>
</div>
<!-- fin modal editar imagen de perfil -->
<!-- modal enviar mensaje -->
<div class="modal fade modal-enviar-mensaje" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3>  Enviar mensaje </h3>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button id="enviar" type="button" class="btn btn-primary">Enviar</button>
        <h4 id="nombre"><?php echo $persona->getNombres().' '.$persona->getApellidos(); ?></h4>
      </div>
    </div>
  </div>
</div>
<!-- fin modal enviar mensaje -->
</div>
<?php } else { ?>
<div class="container-fluid wrap-content text-center"> 
  <br>
  <br>
  <br>
  <?php 
  switch($error){
    case(0):
    echo '<p>Parametro de perfil invalido</p>';
    break;
    case(1):
    echo '<p>Vista de perfil incorrecta</p>';
    break;
    default:
    echo '<p>Perfil no existente</p>';
    break;
  }
  ?>
</div>
<?php
}
?>

<script type="text/javascript" data-main="../../resources/js/perfiles" src="../../resources/scripts/require.js"></script>


<?php include("../../footer.html"); ?>
