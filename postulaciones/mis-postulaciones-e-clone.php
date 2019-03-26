<?php 
include("../header.php"); 
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
							<ul class="list-group">
								<li id="o2" class="list-group-item">
									<div class="media">        
										<div class="pull-left">
											<img class="media-object" src="../" alt="Image" style="width:36px;height:36px;">
										</div>
										<div class="media-body">
											<h4 class="media-heading">Nombre empresa</h4>
											<p>Slogan</p>
										</div>
									</div>          
								</li>

								<li id="o3" class="list-group-item">
									<div class="media">
										<div class="pull-left">
											<img class="media-object" src="../" alt="Image" style="width:36px;height:36px;">
										</div>
										<div class="media-body">
											<h4 class="media-heading">Nombre empresa</h4>
											<p>Slogan</p>
										</div>
									</div>          
								</li>
							</ul>          
						</div>

				</div>

				<div class="col-sm-8 col-xs-12 bg-gallery padding text-azure-radiant">
					<div id="contento2" class="panel panel-default items"  style="display: none">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-user">Foto empresa</span>
							<a class="pull-right">Ver perfil</a>
						</div>
						<div class="panel-body">  			
							<div class="avatar-container">
								<img src="../" alt="avatar" class="img-circle center-block avatar">
							</div>							
								<h4 id="nombre">Field1</h4>
								<h4 id="profesion">Field2</h4>
								<hr>
	
							<!-- icons cv-->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
								<ul class="li-access-direct">
									<li><span  class="glyphicon glyphicon-calendar"></span> Valor 2:</li>
									<li><span  class="glyphicon glyphicon-globe"></span> Comentario: </li>
								</ul>
							</div>
						</div>
					</div>

					<div id="contento3" class="panel panel-default items"  style="display: none">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-user">Foto empresa</span>
							<a class="pull-right">Ver perfil</a>
						</div>
						<div class="panel-body">  			
							<div class="avatar-container">
								<img src="../" alt="avatar" class="img-circle center-block avatar">
							</div>
	
								<h4 id="nombre"></h4>
								<h4 id="profesion"></h4>
								<hr>

							<!-- icons cv-->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
								<ul class="li-access-direct">
									<li><span  class="glyphicon glyphicon-calendar"></span> Valor 3:</li>
									<li><span  class="glyphicon glyphicon-globe"></span> Comentario: </li>
								</ul>
							</div>
						</div>
					</div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
var jQuery_2_2_4 = $.noConflict(true);
jQuery_2_2_4(window).on("load", function(){
	alert("down");
})
</script>


<?php include("../footer.html"); ?>
