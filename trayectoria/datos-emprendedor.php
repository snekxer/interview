<?php
include("../header.php");
$meta = new meta_global();

$emp = $impl->getMyUsr($link);

if($tipo=='O'){
    $hisl = new trayectoria_emprendedor;
    $tra = $hisl->getMyTra($link);
    $create = false;
    if($tra==false){
        $tra = new trayectoria;
        $create = true;
    }
    $denied = false;
} else {
    $denied = true;
}

?>

<header>
  <div class="container text-left">
   <h1><b>Información básica</b></h1>
 </div>
</header> 

<div class="wrap-content text-center">
  <section>
    <div class="container">
      <div class="row">
        <form id="datos-empresa" method="post" action="save-datos.php">
          <div class="form-group col-md-12 col-sm-12 col-xs-12">
            <label for="rango_salarial">Acerca De:</label>
            <textarea id="acerca_de" name="acerca_de" class="form-control"><?php echo $tra->getAcercaDe(); ?></textarea>    
          </div>        
          <div class="form-group col-md-12 col-sm-12 col-xs-12">
            <label for="nombres">Desea compartir su información de contacto?</label>
            <input id="contacto" type="checkbox" name="contacto" class="form-control" value="<?php $tra->getContacto(); ?>"> 
            <input type="hidden" name="tipo" value="<?php if($create){ echo 'N';} else { echo 'E';}?>">
          </div>    
          <div class="col-xs-12 col-sm-12">
            <button type="submit" id="guardar" class="btn el-border el-border-azure-radiant bg-white pull-right">Guardar</button>
          </div>
        </form>        
      </div>
    </div>
  </section>
</div>

<?php include("../footer.html"); ?>