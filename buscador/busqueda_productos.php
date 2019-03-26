
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Buscar productos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link async rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link async rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link async rel="stylesheet" href="../styles/custom-style.css">
    <link async rel="stylesheet" type="text/css" href="../slick/slick.css">
    <link async rel="stylesheet" type="text/css" href="../slick/slick-theme.css">
    <link async rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/png" sizes="192x192" href="../img/favicons/android-icon-192x192.png">
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="../img/favicons/favicon-32x32.png">
    <link rel="shortcut icon" type="image/png" sizes="96x96" href="../img/favicons/favicon-96x96.png">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="../img/favicons/favicon-16x16.png">

</head>

<body>
<div class="container-fluid text-center">    
  <div class="row content">
   
      <div class="col-sm-12">
             <div class="input-group" style="margin:50px 0px 20px 0px">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search">
			</span></button>
                    </span>
                </div>

      
      <div class="col-sm-3 sidenav padding-16">
       
       <div class="col-sm-12 txt-gray">
        <h3><b>Búsqueda</b></h3>
        <span>$resultados</span>
        <h4>Tipo de $anuncio<span class="badge pull-right">Todos</span></h4>  
           
          <div class="row texto-justificado">
               <!-- incluir href en cada element -->
               <div class="col-sm-12 temp-gray margin-top opCategory"><p>Cartera de Productos</p></div>
               <div class="col-sm-12 temp-gray margin-top opCategory"><p>Promociones</p></div>
        
          
          </div>
          
          
       <div class="col-sm-12">
          
      

<button type="button" class="btn btn-info margin-top" data-toggle="collapse" data-target="#fecha_post" >Fecha de publicación<span class="caret pull-right"></span></button>
  <div class="collapse padding-16" id="fecha_post">
<select class="form-control">
		<option value="1d">hace 1 dia</option>
		<option value="1s">hace 1 semana</option>
		<option value="3m">hace 3 meses</option>
	</select>
</div>

   

 <button type="button" class="btn btn-info margin-top" data-toggle="collapse" data-target="#ciudad">Ciudad<span class="caret pull-right"></span></button>         
<div class="collapse padding-16" id="ciudad">
<select class="form-control">
		<option value="a">a</option>
		<option value="b">b</option>
		<option value="c">c</option>
	</select>
</div>
 

<button type="button" class="btn btn-info margin-top" data-toggle="collapse" data-target="#costo" >Fecha de publicación<span class="caret pull-right"></span></button>
  <div class="collapse padding-16" id="costo">
<select class="form-control">
		<option value="1">1</option>
		<option value="2">2s</option>
		<option value="3">3s</option>
	</select>
</div>

<button type="button" class="btn btn-info margin-top" data-toggle="collapse" data-target="#tipo_producto">Tipo de Producto<span class="caret pull-right"></span></button>
  <div class="collapse padding-16" id="tipo_producto">
<select class="form-control">
		<option value="1d">example1</option>
		<option value="1s">example2</option>
	</select>
</div>        
          
          </div>          
    </div>
</div>
    
      
      <div class="col-sm-9 text-left"> 
      <!-- poner grid de thumnails con detalle -->
          
          <h1 class="txt-gray">Resultados de la búsqueda</h1>
      
           <div class="row equal-height margin-top">



                        <div class="col-sm-4 col-xs-12">
                            <div class="thumbnail thumbnail_eqheight">
                                <a href="">
                                    <img class="grow" src="../img/user.ico" alt="Postulante">
                                    <div class="caption text-center">
                                        <h5><b>sds</b></h5>
                                       <p>Detail info </p>
                                        <div class="row" style="padding:0px 20px 0px 20px;">
                                            <button class="btn btn-block" style="background-color: #0086ff;color:white">Ver</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="thumbnail thumbnail_eqheight">
                                <a href="">
                                    <img class="grow" src="https://interview.ec/imgcloudzard//uploads/cloudzardlogo.png" alt="Postulante">
                                    <div class="caption text-center">
                                        <h5><b>Administración de BD</b></h5>
                                        <p>Detail info </p>
                                        <div class="row" style="padding:0px 20px 0px 20px;">
                                            <button class="btn btn-block" style="background-color: #0086ff;color:white">Ver</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="thumbnail thumbnail_eqheight">
                                <a href="">
                                    <img class="grow" src="https://interview.ec/imgcloudzard//uploads/logo_duplos__2_.jpg" alt="Postulante">
                                    <div class="caption text-center">
                                        <h5><b>Limpieza de interiores</b></h5>
                                        <p>Detail info </p>
                                        <div class="row" style="padding:0px 20px 0px 20px;">
                                            <button class="btn btn-block" style="background-color: #0086ff;color:white">Ver</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="thumbnail thumbnail_eqheight">
                                <a href="">
                                    <img class="grow" src="https://interview.ec/imgcloudzard//uploads/sport power.jpg" alt="Postulante">
                                    <div class="caption text-center">
                                        <h5><b>Alumbrado público</b></h5>
                                        <p>Detail info </p>
                                         <div class="row" style="padding:0px 20px 0px 20px;">
                                            <button class="btn btn-block" style="background-color: #0086ff;color:white">Ver</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="thumbnail thumbnail_eqheight">
                                <a href="">
                                    <img class="grow" src="https://interview.ec/imgcloudzard//uploads/sport power.jpg" alt="Postulante">
                                    <div class="caption text-center">
                                        <h5><b>Alumbrado público</b></h5>
                                        <p>Detail info </p>
                                        <div class="row" style="padding:0px 20px 0px 20px;">
                                            <button class="btn btn-block" style="background-color: #0086ff;color:white">Ver</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="thumbnail thumbnail_eqheight">
                                <a href="">
                                    <img class="grow" src="https://interview.ec/imgcloudzard//uploads/fb_img_1500877444762.jpg" alt="Postulante">
                                    <div class="caption text-center">
                                        <h5><b>Monica Arechua </b></h5>
                                        <p>Detail info </p>
                                         <div class="row" style="padding:0px 20px 0px 20px;">
                                            <button class="btn btn-block" style="background-color: #0086ff;color:white">Ver</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="thumbnail thumbnail_eqheight">
                                <a href="">
                                    <img class="grow" src="https://interview.ec/imgcloudzard//uploads/interview.png" alt="Postulante">
                                    <div class="caption text-center">
                                        <h5><b>Asesores Comerciales</b></h5>
                                        <p>Detail info </p>
                                         <div class="row" style="padding:0px 20px 0px 20px;">
                                            <button class="btn btn-block" style="background-color: #0086ff;color:white">Ver</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="thumbnail thumbnail_eqheight">
                                <a href="">
                                    <img class="grow" src="https://interview.ec/imgcloudzard//uploads/interview.png" alt="Postulante">
                                    <div class="caption text-center">
                                        <h5><b>ATENCIÓN AL CLIENTE</b></h5>
                                        <p>Detail info </p>
                                         <div class="row" style="padding:0px 20px 0px 20px;">
                                            <button class="btn btn-block" style="background-color: #0086ff;color:white">Ver</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
          
    </div>
 
  </div>
</div>
    </div>

 
        <!--  JS code -->
         <script>
            // Toggle tranparent navbar when the user scrolls the page

            $(window).scroll(function() {
                if ($(this).scrollTop() > 250) /*height in pixels when the navbar becomes non opaque*/ {
                    $('.opaque-navbar').addClass('opaque');
                } else {
                    $('.opaque-navbar').removeClass('opaque');
                }
            });

        </script>

  


</body>

</html>
