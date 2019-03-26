<?php
include("../header.php");
$meta = new meta_global();

$emp = $impl->getMyUsr($link);

if($tipo=='E'){
    $hisl = new historia_empresa;
    $his = $hisl->getMyHis($link);
    $create = false;
    if($his==false){
        $his = new historia;
        $create = true;
    }
    $denied = false;
} else {
    $denied = true;
}

?>

<header>
  <div class="container text-left">
   <h1><b>Datos de la empresa</b></h1>
 </div>
</header>

<div class="wrap-content text-center">
  <section>
    <div class="container">
      <div class="row">
        <form id="datos-empresa" method="post" action="save-datos.php">
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="rango_salarial">Misión:</label>
            <textarea id="mision" name="mision" class="form-control"><?php echo $his->getMision(); ?></textarea>
          </div>        
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="rango_salarial">Visión:</label>
            <textarea id="vision" name="vision" class="form-control"><?php echo $his->getVision(); ?></textarea>
          </div>        
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="rango_salarial">Quiénes Somos:</label>
            <textarea id="quienes_somos" name="quienes_somos" class="form-control"><?php echo $his->getQuienesSomos(); ?></textarea>
          </div>        
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="rango_salarial">Valores Corporativos:</label>
            <textarea id="valores" name="valores" class="form-control"><?php echo $his->getValores(); ?></textarea>
          </div>        
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Slogan:</label>
            <input type="text"  class="form-control" id="slogan" name="slogan" value="<?php echo $his->getSlogan(); ?>">
            <input id="id" type="hidden" name="id" value="<?php echo  $his->getId(); ?>"> 
          </div>
          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nombres">Desea compartir su información de contacto?</label>
            <input id="contacto" type="checkbox" name="contacto" class="form-control" value="<?php if($his->getContacto()!=""){ echo $his->getContacto();}else{ echo "si";} ?>"> 
            <input type="hidden" name="tipo" value="<?php if($create){ echo 'N';} else { echo 'E';}?>">
          </div>      
          <div class="col-sm-12 col-xs-12 pull-right"> 
            <button type="submit" class="btn el-border el-border-azure-radiant bg-white">Guardar</button>
          </div>
        </form>        
      </div>
    </div>
  </section>
</div>


<?php include("../footer.html"); ?>