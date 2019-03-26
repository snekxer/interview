<?php 
include("../../header.php"); 
 //error_reporting(0);
 
  $impl = new usuario_global();
  $persona = $impl->getMyUsr($link);
  $meta = new meta_global();


  if(isset($persona)){
                  
                     

                      $nombres = $persona->getNombres();
                    //  $apellidos = $persona->getApellidos();
                      $profesion = $persona->getProfesion()->getNombre();
                      $acerca_de = $persona->getAcercaDe();
   

            

                }else{
                    $error_message = false;
                     echo $error_message;
                    //header('Location: ../auth/iniciar-sesion.php');
                    //die('no registrado');
                }



?>

<header>
	<div class="container-fluid">
		<div class="col-md-3 col-sm-6 col-xs-12 profile-card" style="min-height: 494px">
			<!-- profile card / set position relative -->
			<div class="avatar-container">
				<a>
					<img src="/public_html/resources/img/user.ico" alt="avatar" class="img-circle center-block avatar">
          <div class="avatar-edit">
            <span id="upload-avatar" class="glyphicon glyphicon-pencil" data-toggle="modal" data-target=".modal-editar-avatar"></span>
                      </div>
				</div> 
				
			</p>
			<div class="row text-center temp-text-white">
				<h4 id="nombre"><?php echo $nombres; ?></h4>
				<h4 id="profesion"><?php echo $profesion; ?></h4>
				<hr>
			</div>


			<!-- icons for direct access-->
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
				<ul class="li-access-direct">
          <li><a><span  class="glyphicon glyphicon-envelope"></span> Mensajes</a></li>
          <li><a href="ver-portafolio.php"><span  class="glyphicon glyphicon-folder-open"></span> Portafolio</a></li>
          <li><a href="../views/notificaciones/notificaciones.php"><span  class="glyphicon glyphicon-bullhorn"></span> Notificaciones</a></li>
					<li><a href="../views/registro/registro-personas.php"><span  class="glyphicon glyphicon-user"></span> Información Personal</a></li>
					<li><a href="cv.php"><span  class="glyphicon glyphicon-education"></span> Hoja de vida</a></li>
					<li><a href="../views/configuracion-pefiles/configuracion.php"><span  class="glyphicon glyphicon-tasks"></span> Ajustes</a></li>
				</ul>



			</div>




			<!-- fin de profile card -->

		 </div>

		<div class="col-md-9 col-sm-6 col-xs-12"  style="margin:0 0 0 0;padding: 0 0 0 0;">
			<!-- video -->
			<video width="100%" height="auto" controls>
				<source src="../videos/demo.mp4" type="video/mp4">
					Your browser does not support HTML5 video.
			</video>
			<!-- fin de video -->

		 </div>


	</div>
	
</header>



<div class="container-fluid wrap-content text-center">    

	<!-- seccion portafolio -->

	<!-- fin de seccion portafolio -->


	<!-- seccion de acerca de-->
	<div class="row content" style="background-color: #0086ff; color: white;">
		<h3><img src="" alt="" class="img-responsive">Acerca de</h3>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <p id="acercade"><?php echo $acerca_de; ?></p>

    </div>
		
	</div>
	<!-- fin de seccion de acerca de-->


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

  <div class="tab-content">
    <div id="menu0" class="tab-pane fade in active">
   <div class="row padding-32">
       <div class="col-sm-6 col-xs-12">

        <p>Carga tu foto de perfil</p>

        <label for="upload_avatar">

             <input  type="file" name="upfile" id="upload_avatar" />
        </label>

       
        <button class="btn" id="guardar_avatar">Guardar</button>
    
     </div>
     <div class="col-sm-6 col-xs-12">
       <div id="preview" style="height:250px; width: 100%;"></div>
     </div>
   </div>

    </div>


    <div id="menu1" class="tab-pane fade">
     <div class="col-sm-6 col-xs-12">
       <h3 style="margin-top: 20%">Sube un video
       </h3><br>
       <p>El que más te guste</p>
     </div>  

     <form id="uploader_video">
        <div class="form-group col-sm-6 col-xs-12">
        <label for="videoUploader">
          <img class="uploader-img" src="../resources/img/upload.png" alt="imagen uploader video">
        </label>
        <input name="upfile" type="file" class="form-control-file" id="videoUploader" aria-describedby="fileHelp" style="display: none">
      </div>  
     </form>

   

     
   </div>

   <div id="menu2" class="tab-pane fade">
     <div class="col-sm-6 col-xs-12">
       <h3 style="margin-top: 20%">Sube un encabezado
       </h3><br>
       <p>El que más te guste</p>
     </div>    

     <form id="uploader_encabezado">
        <div class="form-group col-sm-6 col-xs-12">
        <label for="encabezadoUploader">
          <img class="uploader-img" src="../resources/img/upload.png" alt="imagen uploader encabezado">
        </label>
        <input name="upfile" type="file" class="form-control-file" id="encabezadoUploader" aria-describedby="fileHelp" style="display: none">
      </div>
     </form>

  
     

   </div>

   <div id="menu3" class="tab-pane fade">
    <div class="col-sm-6 col-xs-12">
     <h3 style="margin-top: 20%">Selecciona tu tema
     </h3><br>
     <p>El que más te guste</p>
   </div>    
   <div class='row'>
    <form id="upload-tema">
    <div class='col-sm-6 col-xs-12'>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">


        <!-- Wrapper for slides -->
        <div class="carousel-inner">

          <div class="item active">

            <input id="1" type="radio" name="tema" value="0">
            <label for="1" class="center-block tema" style="background-image:url(http://via.placeholder.com/140x100);"></label>
          </div>

          <div class="item">

            <input id="2" type="radio" name="tema" value="1">
            <label for="2" class="center-block tema" style="background-image:url(http://via.placeholder.com/140x100);"></label>
          </div>

          <div class="item">

            <input id="3" type="radio" name="tema" value="3">
            <label for="3" class="center-block tema" style="background-image:url(http://via.placeholder.com/140x100);"></label>
          </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

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

</div>
 <script type="text/javascript" src="/public_html/resources/plugins/slick.min.js"></script>
 <script type="text/javascript" src="/public_html/resources/scripts/custom-script.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.5.1/croppie.min.js"></script>
 <script type="text/javascript">
 	(function(){

 	//adjust size of the wrap-content element	
 	$(window).resize(function(){
 		var newHeight = $(window).height() - ($(".content").length * 350);
 		$(".wrap-content").css("min-height", newHeight);

 	})

  $('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', 'https://cdnjs.cloudflare.com/ajax/libs/croppie/2.5.1/croppie.min.css') );

  //var $uploadCrop;

    function readFile(input) {
      if (input.files && input.files[0]) {
              var reader = new FileReader();
              
              reader.onload = function (e) {
               $('#preview').croppie('bind', {
                  url: e.target.result
                }).then(function(){
                  console.log('jQuery bind complete');
                });
                
              }
              
              reader.readAsDataURL(input.files[0]);
          }
          else {
            swal("Sorry - you're browser doesn't support the FileReader API");
        }
    }

    $('#preview').croppie({
      viewport: {
        width: 190,
        height: 190,
        type: 'circle'
      },
      enableExif: true
    });

    $('#upload_avatar').on('change', function () { readFile(this); });




    $('#guardar_avatar').on('click', function (ev) {
            

     $('#preview').croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function (resp) {


      //  console.log(resp);
      var file_data = $('#upload_avatar').prop('files')[0]; 

      var form_data = new FormData();                  
      form_data.append('upfile', file_data);
      form_data.append('crop', resp);
  
      
           $.ajax({
            url: "cargar_imagen_persona.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: function (data) {
              console.log(data);
            },
               error: function(xhr, desc, err) {

          }
        }); 
      


      });
    });


  $('#guardar').on('click', function(e){
      e.preventDefault();
//      var formdata = $("#formPortafolio").serialize();
      //var myForm = document.getElementById('myForm');
      //formData = new FormData(myForm);

      var id = $('.tab-content .active').attr('id');
      var uploader_video = $('#uploader_video')[0];
      var uploader_encabezado = $('#uploader_encabezado')[0];


      if(id === 'menu1'){
         $.ajax({
        url: 'subir_video_persona.php',
        type: 'post',
        data:  new FormData(uploader_video),
        contentType: false,
        processData: false,
        success: function(data, status) {
         if(data) {
                  console.log(data);
             //  window.location.href = "../perfil-personas.php";

             } else{
              //add alert alert-danger class to #error-div 
            //         $('#error').html('el email o contrasena ingresado no existe, pofavor verifique los datos ingresados');
               }
          },

          error: function(xhr, desc, err) {

          }
            }); // end ajax call
       
      }

      else if(id === 'menu2'){

         $.ajax({
        url: 'subir_encabezado_persona.php',
        type: 'post',
        data:  new FormData(uploader_encabezado),
        contentType: false,
        processData: false,
        success: function(data, status) {
         if(data) {
                  console.log(data.imagen_encabezado);
             //  window.location.href = "../perfil-personas.php";

             } else{
              //add alert alert-danger class to #error-div 
            //         $('#error').html('el email o contrasena ingresado no existe, pofavor verifique los datos ingresados');
               }
          },

          error: function(xhr, desc, err) {

          }
            }); // end ajax call

      }
    });

     
 	

  
    
          })();
   


 </script>

<?php include("../../footer.html"); ?>
