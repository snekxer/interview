<?php 
include("../header.php"); 
$oferl = new ofertas_empresa;
$persl = new persona_global;

$id = (int)$_GET['oid'];
$ofer = $oferl->getOferta($id, $link);
if($ofer->getEmpresa()->getId()===unserialize($_SESSION['user'])->getId()){
    
  ?>

  <header>
   <div class="container-fluid">
     <div class="panel panel-default">
      <div class="panel-body">
        <h4 class="pull-left">Oferta: <?php echo $ofer->getTitulo();?></h4>
        <!--<button id="filtros-postulaciones" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-tasks"></span> Filtrar Postulaciones</button>-->
      </div>
    </div>

  </div>

</header>

<div class="container-fluid wrap-content text-center">    

  <div class="row">

    <div class="col-sm-4 col-xs-12">
      <ul class="list-group">
        <?php 
        if(isset($_POST['filtrosP'])||isset($_POST['filtrosC'])||isset($_POST['edu'])||isset($_POST['idiomas'])||isset($_POST['areas'])){
            //$post = $oferl->filtrarPostulantes ($filtrosP, $filtrosC, $edu, $idiomas, $areas, $ofer, $link);
            echo 'Si';
        } else {     
            $post = $oferl->getPostulantes($ofer, $link);
        }
        if($post!=false){
        foreach($post as $per){
          ?>

          <li id="<?php echo $per->getId(); ?>" class="list-group-item">
            <div class="media">
              <span class="glyphicon glyphicon-cog pull-right"></span>
              <div class="checkbox pull-left">
                <label>
                  <input type="checkbox" value="">        
                </label>
              </div>
              <div class="pull-left">
                <img class="media-object" src="../<?php if($per->getFoto()!=null){echo $per->getFoto();} else {echo "resources/img/user.ico";} ?>" alt="Image" style="width:36px;height:36px;">
              </div>
              <div class="media-body">
                <h4 class="media-heading"><?php echo $per->getNombres().' '.$per->getApellidos(); ?></h4>
                <p><?php echo $per->getProvincia()->getNombre().', '.$per->getCiudad()->getNombre();?></p>
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
    foreach ($post as $per){
        $curr = new CV();
        $curr->buildCV($per->getId(), $link);
      ?>

      <div id="<?php echo 'content'.$per->getId(); ?>" class="col-sm-8 col-xs-12 items" style="display: none">

        <div class="col-sm-4" style="background: #0086ff;">

          <div class="avatar-container">
            <img src="../<?php if($per->getFoto()!=null){echo $per->getFoto();} else {echo "resources/img/user.ico";} ?>" alt="avatar" class="img-circle center-block avatar">
          </div>

          <div class="row text-center temp-text-white">
            <h4 id="nombre"><?php echo $per->getNombres().' '.$per->getApellidos(); ?></h4>
            <h4 id="profesion"><?php echo $per->getArea()->getNombre(); ?></h4>
            <h4 id="profesion"><?php echo $per->getProfesion()->getNombre(); ?></h4>
            <hr>
          </div>

          <!-- icons cv-->
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
            <ul class="li-access-direct">
              <li><span  class="glyphicon glyphicon-calendar"></span> Fecha de nacimiento: <?php echo $per->getFechaNac(); ?></li>
              <li><span  class="glyphicon glyphicon-globe"></span> Nacionalidad: <?php echo $per->getNacionalidad()->getNombre(); ?></li>
              <li><span  class="glyphicon glyphicon-link"></span> Estado civil: <?php echo $per->getEstadoCivil()->getNombre(); ?></li>
              <li><span  class="glyphicon glyphicon-briefcase"></span> Área de Trabajo: <?php echo $per->getArea()->getNombre(); ?></li>
              <li><span  class="glyphicon glyphicon-usd"></span> Aspiración salarial: <?php echo $curr->getCurriculum()->getAspSalarial()->getNombre(); ?></li>
              <li><span  class="glyphicon glyphicon-time"></span> Disponibilidad de tiempo: <?php echo $curr->getCurriculum()->getDispTiempo()->getNombre(); ?></li>
            </ul>
          </div>
        </div>

        <div class="col-sm-8" style="overflow-y: scroll;height: 500px;">
          <div class="container-fluid text-left">

                <div class="row" style="-webkit-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                     -moz-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                     box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);">

                    <div class="col-sm-12 col-xs-12">
                        <h4>Acerca de</h4>
                        <p><?php echo $curr->getCurriculum()->getPersona()->getAcercaDe(); ?></p>
                    </div>
                </div>
                <!-- Experiencia -->
               <?php if ($curr->getExperiencia() != false) { ?>
                    <div class="row" style="-webkit-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                         -moz-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                         box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);">

                            <div class="col-sm-12 col-xs-12">
                                <h4>Experiencia Laboral</h4>
                            </div>
                            
                                 <?php   foreach ($curr->getExperiencia() as $exp) { ?>
                                <div class="col-sm-12 col-xs-12">
                                    <p><?php echo $exp->getEmpresa(); ?></p>
                                    <p><?php echo $exp->getCargo(); ?></p>
                                </div>

                                <div class="col-sm-12 col-xs-12">
                                    <p class="pull-left"><?php echo $exp->getFechaIni(); ?></p>
                                    <p class="pull-right"><?php echo $exp->getFechaFin(); ?></p>
                                </div>

                                <div class="col-sm-12 col-xs-12">
                                    <p><?php echo $exp->getEmpresaIndustria()->getNombre(); ?></p>
                                    <p><?php echo $exp->getPais()->getNombre(); ?></p>
                                    <p><?php echo $exp->getProvincia()->getNombre(); ?></p>
                                    <p><?php echo $exp->getCiudad()->getNombre(); ?></p>
                                </div>

                                <div class="col-sm-12 col-xs-12">
                                    <p><?php echo $exp->getDescripcionCargo(); ?></p>
                                    <p><?php echo $exp->getDescripcionFunciones(); ?></p>
                                </div>

                                <div class="col-sm-12 col-xs-12">
                                    <h5>Referencia:</h5>
                                    <p><?php echo $exp->getNombre(); ?></p>
                                    <p><?php echo $exp->getRelacion(); ?></p>
                                    <p><?php echo $exp->getTelefono(); ?></p>
                                    <p><?php echo $exp->getEmail(); ?></p>

                                </div>
                                
                            <?php } ?>
                        <hr>
                    </div>
                <?php } ?>

                <!-- Educacion -->
                    <?php if ($curr->getEducacion() != false) { ?>
                    <div class="row" style="-webkit-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                         -moz-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                         box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);padding: 10px 10px 10px 10px;">
                        
                            <div class="col-sm-12 col-xs-12">
                                <h4>Estudios</h4>
                            </div>

                                <?php    foreach ($curr->getEducacion() as $edu) { ?>
                                <div class="col-sm-12 col-xs-12">
                                    <p><?php echo $edu->getTitulo(); ?></p>
                                    <p><?php echo $edu->getInstitucion(); ?></p>
                                    <p><?php echo $edu->getFechaIni(); ?></p>
                                    <p><?php echo $edu->getFechaFin(); ?></p>
                                    <p><?php echo $edu->getNivel()->getNombre(); ?></p>
                                    <p><?php echo $edu->getDescripcion(); ?></p>
                                </div>

                            <?php } ?>
                        <hr>
                    </div>
                <?php } ?>

                <!-- Formacion -->
                <?php if ($curr->getFormacion() != false) { ?>
                    <div class="row" style="-webkit-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                         -moz-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                         box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);padding: 10px 10px 10px 10px;">
                        
                            <div class="col-sm-12 col-xs-12">
                                <h4>Formación</h4>
                            </div>

                                 <?php   foreach ($curr->getFormacion() as $for) { ?>                                    
                                <div class="col-sm-12 col-xs-12">
                                    <p><?php echo $for->getTitulo(); ?></p>
                                    <p><?php echo $for->getInstitucion(); ?></p>
                                    <p><?php echo $for->getTipo(); ?></p>
                                    <p><?php echo $for->getFechaIni(); ?></p>
                                    <p><?php echo $for->getFechaFin(); ?></p>
                                    <p><?php echo $for->getDuracion(); ?></p>
                                    <p><?php echo $for->getDescripcion(); ?></p>

                                </div>
                            <?php } ?>
                        <hr>
                    </div>
                <?php } ?>
               
                <!-- Idiomas -->             
                <?php if ($curr->getIdioma() != false) { ?>
                    <div class="row" style="-webkit-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                         -moz-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                         box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);padding: 10px 10px 10px 10px;">
                            		
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Idiomas</h4>
                                </div>
                            <?php foreach ($curr->getIdioma() as $idi) { ?>
                                <div class="col-sm-12 col-xs-12">
                                    <p><?php echo $idi->getIdioma()->getNombre(); ?></p>
                                    <p><b>Nivel Escrito:</b><?php echo $idi->getEscrito()->getNombre(); ?></p>
                                    <p><b>Nivel Oral:</b><?php echo $idi->getOral()->getNombre(); ?></p>
                                </div>
                                <?php } ?>
                    </div>
                <?php } ?>

                <!-- Conocimientos -->
                <?php if ($curr->getConocimientos() != false) { ?>`
                <div class="row" style="-webkit-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                     -moz-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                     box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);padding: 10px 10px 10px 10px;">
                    
                        <div class="col-sm-12 col-xs-12">
                            <h4>Conocimientos</h4>
                        </div>
                        
                        <?php foreach ($curr->getConocimientos() as $cono) { ?>
                        <div class="col-sm-12 col-xs-12">
                            <p><?php echo $cono->getConocimiento(); ?></p>
                            <p><?php echo $cono->getNivel()->getNombre(); ?></p>
                            <p><?php echo $cono->getArea()->getNombre(); ?></p>
                            <p><?php echo $cono->getSubarea()->getNombre(); ?></p>

                        </div>
                        <?php } ?>
                    <hr>
                </div>
                <?php } ?>
                
                <!-- Competencias -->
                <?php if ($curr->getCompetencias() != false) { ?>
                <div class="row" style="-webkit-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                     -moz-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                     box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);padding: 10px 10px 10px 10px;">
                    
                        <div class="col-sm-12 col-xs-12">
                            <h4>Competencias</h4>
                        </div>
                         <?php foreach ($curr->getCompetencias() as $cono) { ?>
                        <div class="col-sm-12 col-xs-12">
                            
                            <p><?php echo $cono->getCompetencia(); ?></p>
                            <p><?php echo $cono->getNivel()->getNombre(); ?></p>

                        </div>
                        <?php } ?>
                    <hr>
                </div>
                <?php } ?>

                <!-- Referencias -->
                <?php if ($curr->getReferencias() != false) { ?>
                <div class="row" style="-webkit-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                     -moz-box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);
                     box-shadow: -2px 6px 14px -6px rgba(112,112,112,1);padding: 10px 10px 10px 10px;">
                    
                        <div class="col-sm-12 col-xs-12">
                            <h4>Referencias personales</h4>  
                        </div>                       
                        <?php    foreach ($curr->getReferencias() as $ref) { ?>
                        <div class="col-sm-12 col-xs-12">
                            
                            <p><?php echo $ref->getNombre(); ?></p>
                            <p><?php echo $ref->getRelacion(); ?></p>
                            <p><?php echo $ref->getTelefono(); ?></p>
                            <p><?php echo $ref->getEmail(); ?></p>
                            
                        </div>
                        <?php } ?>
                    <hr>
                </div>
               <?php } ?>


            </div>


</div>


</div>
<?php 
unset($curr);
}
    } else {
        echo 'No tiene postulantes.';
    }
?>

</div>

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


  $("#filtrar").on("click", function(){
                    e.preventDefault();

    var formdata =   $("#formFiltros").serialize();
    var formUrl = $("#formFiltros").attr("action");

            $.ajax({
              url: formUrl,
              type: 'post',
              data: formdata,
            //  dataType: 'json',
              success: function(response) {
           //     console.log(response);
           
               if(response) {
             //    console.log(response);
              console.log("done");
                 
                } else{

              //add alert alert-danger class to #error-div 
              //         $('#error').html('el email o contrasena ingresado no existe, pofavor verifique los datos ingresados');

                }

              
              },
     
           
              error: function(xhr, desc, err) {
                console.log(xhr, desc, err);
             
              }
            }); // end ajax call


  })





})();



</script>

<?php include("../footer.html"); ?>
