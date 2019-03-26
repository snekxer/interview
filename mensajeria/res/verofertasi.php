<?php

include "conn.php";
include "functions.php";
include "functions2.php";

$vid=$_GET["oid"];
$eid=$_GET["eid"];

$oferta=getOferta($eid,$vid,$link);

$titulo=$oferta[0];
$edad=$oferta[2];
$salario=$oferta[5];
$comentarios=$oferta[8];
$nombre=$oferta[9];
$area=$oferta[10];
$nombreEmp=getNombre($eid,'E',$link);

$email=getCookieToken();
$myid=getid($email[0],$email[1],$link);
$gen=$oferta[3];

?>

 <div class="temp-left">
        <!--<a class="mybtn btn btn-link btn-xs" onclick="switchVisible();" ><i class="fa fa-arrow-circle-o-left temp-text-white" style="font-size:2.5rem;"></i></a>-->
       </div>
          
          
      <a href="miperfil.php?eid=<?php echo $eid; ?>"><img src="<?php echo getEmpImg($eid,$link); ?>" alt="Avatar" class="temp-left temp-circle temp-margin-right" style="width:60px"></a>
        <span class="temp-right temp-opacity"></span>
        <h4><?php echo $nombre ." - ".$nombreEmp; ?></h4><br>
        <hr class="temp-clear">
          <div class="temp-row-padding" style="margin:0 -16px">
            <div class="temp-col m6">
			<p class="temp-padding"><b>Área: </b><?php echo $oferta[31];?></p>
			
			<p class="temp-padding"><b>Género:</b> <?php switch($gen){case "i":echo "Indiferente"; break; case "f":echo "Femenino"; break; default:echo "Masculino"; break;}?></p>
			<p class="temp-padding"><b>Edad: </b><?php if ($oferta[2]==0) {echo 'Indiferente';} else {echo $oferta[2];} ?></p>
			<p class="temp-padding"><b>Ciudad:</b> <?php echo $oferta[4];?></p>
			
			
            </div>
			 <div class="temp-col m6">
			<p class="temp-padding"><b>Subarea: </b><?php echo $oferta[32];?></p>
			
			<p class="temp-padding"><b>Experiencia:</b> <?php if ($oferta[13]==0) {echo 'Indiferente';} else {echo $oferta[13];} ?></p>
			<p class="temp-padding"><b>Contrato:</b> <?php if ($oferta[6]==0) {echo 'Indiferente';} else {echo $oferta[6];} ?></p>
                 <!-- Agregar el salario aqui -->
			<p class="temp-padding"><b>Salario:</b> <?php echo $oferta[25];?></p>
			
              <!--<img class="temp-image"  src="../img/mujer.png" style="width:100%" alt="imgen 1" class="temp-margin-bottom">-->
            </div>
            
        </div>
		
		<div class="temp-padding temp-border temp-border-gray"><p class="temp-padding"><b>Descripción</b></p>
        <p class="temp-padding"><?php echo $comentarios; ?></p></div>
      
          <div class="btn-toolbar temp-padding" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group" role="group" aria-label="First group">
                	<button type="button" onclick="window.location.href='/empresasmod.php?eid=<?php echo $eid;?>'" class="btn btn-primary btn-sm">Ver Empresa</button>
                
                	<?php $posid=relacion_existente($myid,$oferta[30],$eid,$link);
				
			if($email[1]!='E'){
				if ($posid==0){ ?>
				<button type="button" onclick="savemaster(<?php echo $oferta[30].",".$eid; ?>);" class="btn btn-primary btn-sm">Postular</button>
                
                <?php } else { ?>
                
                <button type="button" onclick="deletemaster(<?php echo $oferta[30]; ?>);" class="btn btn-primary btn-sm">Eliminar</button>
                 <?php } 
			} ?>
            </div>
            
            
              
              <!--<div class="btn-group" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-primary btn-sm">Agregar Favorito</button>
            </div>
              
              <div class="btn-group" role="group" aria-label="Third group">
                    <button type="button" class="btn btn-default btn-sm">Eliminar</button>
            </div>-->
              
          </div>
          
          <script>
					function savemaster(vido,veid){
					      //Guardar tags
						//alert(vido);
						//alert(veid);
	             $.get("postular.php", {
                            
                            ido:vido,
                            idcel:vido,
							eid:veid,
							empid:veid
                        },
                        function(data, status) {
							alert(data);
                           location.href='/verofertas.php?eid=<?php echo $eid;?>&oid=<?php echo $vid;?>';
                            
					});}
					
					
					</script>   
					
						<script>
					function deletemaster(vido){
					      //Guardar tags
						//alert(vido);
						//alert(veid);
	             $.get("elimpost.php", {
                            
                            ido:vido,
                            idcel:vido,
							
                        },
                        function(data, status) {
                            alert(data);
                            
					});}
					
					
					</script>   
       
          
            <!--<a href="#"><p class="temp-right temp-text-black">Denunciar pubblicación</p></a> -->