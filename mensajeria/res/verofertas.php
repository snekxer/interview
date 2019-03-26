


<?php ob_start(); ?>

<?php
require_once('_header_.php');
include "conn.php";
include "functions.php";
include "functions2.php";
include "funcionesCurriculum.php";
include "functionsF.php";
getHeader(basename(__FILE__));



$eid=$_GET['eid'];
$oid=$_GET['oid'];
$email=getCookieToken();
$myid=getid($email[0],$email[1],$link);

?>	
	
	
<script>

   
   function asignarVal(oid, eid){
	   idcel = oid;
	   empid = eid;
   }
   
      
              function switchVisible() {
       
    var preview = document.getElementById("resm");   
         
       
       if ($(window).width() < 760) {
           if(preview.style.display == 'block'){
           document.getElementById('deta').classList.remove('hidden-xs' , 'col-sm-9');
           document.getElementById('deta').classList.add('col-sm-12');           
           document.getElementById('resm').style.display = 'none';
               }
           else{
          document.getElementById('resm').style.display = 'block';
           document.getElementById('deta').classList.add('hidden-xs');
           }
                }
    
       else{
           document.getElementById('deta').classList.remove('col-sm-12');
           document.getElementById('deta').classList.add('col-sm-9');           
           document.getElementById('resm').style.display = 'block';
       }
} 
         
</script>  

    
   <div class="container" style="padding:30px 0px 0px 0px;">
<div class="col-sm-12">
          <div class="text-center">
            <ul class="nav nav-tabs">
                    <li class="active"></li>
                   <!-- <li class="active"><a href="#">Seguidos</a></li>
                    <li class="temp-light-gray"><a href="#">General</a></li>-->
            </ul> 
                </div>
       <!--   <div class="temp-blue">
              <ul class="temp-ul">
              <li style="display:inline"></li>
            
              </ul>      
                </div>-->
         
          <div class="temp-dark-blue">
             
      <!--
              <div class="col-xs-12 col-sm-9 temp-padding">
       
        <div class="input-group add-on">
            <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
    </div>
              
              </div>
              
              <div class="col-xs-12 col-sm-3 temp-padding">
       
        <p class="temp-text-blue">Organizar por</p>
              </div>
              
         </div>-->
         
    
    <div class="temp-row">
        
          <div class="col-xs-12 col-sm-3 temp-padding temp-light-gray">
        
        <p>Mensajes</p>
              
        
              
              </div>
        
        
         <div class="col-xs-12 col-sm-9 temp-padding temp-light-gray">
       
           <div class="col-sm-3"><p>Notificaciones</p></div>
           <!--<div class="col-sm-3"><p>Favoritos</p></div>
           <div class="col-sm-3"><p>Eliminados</p></div>-->
           <div class="col-sm-3">
             <!--  <select id="soflow" style="width:100%;">
                   <option>Desde</option>
                    <option>Option 1</option>
                    <option>Option 2</option>
                    </select>     --> </div>
                  
              
              </div>
              
         </div>
    
    
    
         
     </div>
      
  </div>
  <div class="container temp-padding">
    <div class="col-sm-3" id="resm" style="overflow-y: scroll;height:800px;display:block;">
	
	<?php	   
   $ofertas=getAllInfoOfertas($eid,$link);
   $max=sizeof($ofertas);
   $i=0;
   $nombreEmp=getNombre($eid,'E',$link);
   if ($max==0){
	echo '<a><center> No hay ofertas disponibles</a>';
   } else{
	   while($i<$max){
	   $nombreArea=getNombreArea($ofertas[$i][10],$link);
	   
	   ?>
	
        <div class="row temp-round temp-light-gray temp-padding temp-border temp-border-gray">
            <a href="javascript:void(0)" onclick="switchVisible();changePage(<?php echo $ofertas[$i][30].",".$eid; ?>);" id="fTab">
       <div class="col-sm-12">
            <div class="media">
              <div class="media-left">
                <img src="<?php echo getEmpImg($eid,$link); ?>" class="temp-left temp-circle temp-margin-right" style="width:60px">
              </div>
              <div class="media-body">
                <h4 class="media-heading"><?php echo $nombreEmp; ?></h4>
                <span><?php echo $nombreArea[1]; ?></span>
                <p><?php echo $ofertas[$i][9]; ?></p>
              </div>
        </div> 
        </div></a>
      </div>
	  
	  <?php
	  $i++;
		}
   }
?>
        
        
       
       </div>
    
       <div id="deta" class="hidden-xs col-sm-9 temp-light-gray temp-border temp-border-white temp-animate-right" style="overflow-y: scroll;height:800px;">
       
      <div id="xuser1"  class="row temp-round userName" style="background-color:white;">
            
        
 
     
      </div>
           
           

           
           
       
        
            
           <div class="col-sm-12">
            <!--<button type="button" class="temp-button temp-padding temp-orange temp-round temp-left" >Publicar uno igual</button>
           <p class="temp-right" >texto x texto x texto x texto x texto xtexto x texto x texto x texto xtexto x texto x texto x</p>
               -->
            
             
            
           </div>
           
           
       
       </div>
    
    
    
    </div>  
</div>
    
	<script>	 	
function changePage(oid,eid){
	
	
	 $("#xuser1").load("verofertasi.php?eid="+eid+"&oid="+oid);
}	
</script>  	

<?php

if($oid!=""||$oid!=null){
	
	echo "<script>changePage(".$oid.",".$eid.");</script>";
}

?>	

<script type="text/javascript">
        $('select').select2({
             minimumResultsForSearch: Infinity
        });
    </script>      
<?php include("footer_.php"); ?>

<?php ob_end_flush(); ?>