<?php include("../header.php"); 

$oferl = new ofertas_empresa;
$ofers = $oferl->getOfertas($impl->getMyUsr($link), $link);


?>

<header>
	<div class="container-fluid" style="margin-top: 100px;">
		<div class="col-sm-4">
			<a href="ofertas.php"><p class="btn btn-default">Crear oferta</p></a>
		</div>
	</div>
</header>

<div class="container-fluid wrap-content">
	<div class="table-responsive" style="padding-top: 5%">
            <?php if($ofers!=false) { ?>
		<table class="table table-bordered table-striped">
		    <thead>
		      <tr>
		      	<th><input type="checkbox" value=""></th>
		        <th>Titulo</th>
		        <th>Area</th>
		        <th>Salario</th>
		        <th>Modalidad</th>
		        <th>Postulaciones</th>       
		      </tr>
		    </thead>
                    
		    <tbody>
                    
                    <?php foreach($ofers as $ofer){ 
                        $posts = $oferl->getPostulantes($ofer, $link)
                        ?>    
		    <tr>
		      	<td>
                            <div class="dropup">
		      		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span></button>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="ofertas.php?id=<?php echo $ofer->getId();?>">Editar Oferta</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="postular-oferta.php?oid=<?php echo $ofer->getId();?>">Ver Oferta</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="delOfer.php?id=<?php echo $ofer->getId();?>">Eliminar Oferta</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="../postulaciones/postulaciones_ofertas.php?oid=<?php echo $ofer->getId();?>">Ver Postulaciones</a></li>
					</ul>
                            </div>
			</td>                       
                        <td><?php echo $ofer->getTitulo();?></td>
                        <td><?php echo $ofer->getArea()->getNombre();?></td>
                        <td><?php echo $ofer->getRangoDesde().' - '.$ofer->getRangoHasta();?></td>
                        <td><?php echo $ofer->getModalidad()->getNombre();?></td>
                        <td><?php if($posts!=false){ echo sizeof($posts);} else {echo '0';}?></td>
        	    </tr>
                    
                    <?php 
                    unset($posts);
                    } ?>
		      
		    </tbody>
	  </table>
            <?php } else {
                echo 'No tiene ofertas.';
            }?>
	</div>
</div>

<?php include("../footer.html"); ?>
  
