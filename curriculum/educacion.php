<?php 
include("../header.php");
$meta = new meta_global();

if(isset($_GET['id'])){
  $id = (int)($_GET['id']);
  $currl = new curriculum_persona;
  $edu_temp = $currl->getEducacionFromId($id, $link);
  if($edu_temp->getCurriculum()===unserialize($_SESSION['user'])->getId()){
    $edu = $edu_temp;
    $denied = false;
  } else {
    $denied = true;
  }
}

?>

<header>
  <div class="container text-left">
   <h1><b>Educacion</b></h1>
 </div>
</header>

<div class="wrap-content text-center">
  <section>
    <div class="container">
      <div id="educacion" class="row educacion">

       <div class="alert">
         <?php if ($denied){
           echo '<p>No tiene permiso para ver este elemento</p>';
         }
         ?>
       </div>
       <?php if(!$denied) { ?>
       <form class="text-left curriculVitae" id="saveEdu" method="post" action="">          

        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="nombres">Institución:</label>
          <input type="text" class="form-control" id="institucion"  name="institucion" value="<?php if(isset($edu)){ echo $edu->getInstitucion();}?>"> 
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="titulo_educacion">Titulo obtenido:</label>
          <input type="text" class="form-control" id="titulo" name="titulo" value="<?php if(isset($edu)){ echo $edu->getTitulo();}?>"> 
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="nombres">Fecha de inicio:</label>
          <input type="date"  class="form-control" id="fechaInicio" name="fechaInicio" value="<?php if(isset($edu)){ echo $edu->getFechaIni();}?>"> 
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="nombres">Fecha de culminación:</label>
          <input type="date"  class="form-control" id="fechaCulminacion" name="fechaCulminacion" value="<?php if(isset($edu)){ echo $edu->getFechaFin();}?>"> 
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label for="Nivel">Nivel:</label>
          <select id="nivel_educacion" name="nivel_educacion" class="form-control" >
            <?php
              //cargar niveles de educacion
            $niv = $meta->getAllNivelesEdu($link);
            if(isset($edu)){ 
              echo '<option value="'.$edu->getNivel()->getId().'" selected>'.$edu->getNivel()->getNombre().'</option>';
            } 
            foreach ($niv as $niv){
              echo '<option value="' . $niv->getId() . '">' . $niv->getNombre() . '</option>';
            }
            ?>
          </select>
        </div>

        <input type="hidden" name="idEducacion" value="<?php if(isset($edu)){ echo $edu->getId();}?>">
        <input type="hidden" name="tipo" value="<?php if(isset($edu)){ echo 'E';} else { echo 'N';}?>">

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <label for="descripcion">Descripción:</label>
          <textarea id="descripcion" name="descripcion_educacion" class="form-control" ><?php if(isset($edu)){ echo $edu->getDescripcion();}?></textarea>        
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
          <a href="ver-cv.php?pid=<?php echo unserialize($_SESSION['user'])->getId();?>"><button class="btn btn-default">Cancelar</button></a>
          <button id="saveE" class="btn btn-default">Guardar</button>
        </div>

      </form>
      <?php } ?>            
    </div>
  </div>
</section>      
</div>     



<script>

  function messageAlert(message_cont, message_type){
    var d_message = $('.alert');
    d_message.addClass(message_type)
    .append('<p>'+message_cont+'</p>'); 

  }

  $("#saveE").on('click', function(e){
    e.preventDefault();

    var formdata = $("#saveEdu").serialize();


    $.ajax({
      url: 'save/edu.php',
      type: 'post',
      data: formdata,
      success: function(response) {      
        if(response) {
          messageAlert(response, 'alert-success');                
        } else{
          messageAlert(response, 'alert-danger');
        }             
      },         
      error: function(xhr, desc, err) {

        messageAlert("Ha ocurrido un error, vuelva a intentar", 'alert-danger');           
      }
            }); // end ajax call


  });

  

</script>



<?php include("../footer.html"); ?>