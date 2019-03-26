<?php 
include("../header.php"); ?>
<?php
switch($tipo){
  case('E'):
  $oferl= new ofertas_empresa();
  $empl= new empresa_empresa();
  break;
  case('P'):
  $oferl= new ofertas_persona();
  $empl= new empresa_global();
  break;
  default:
  $oferl= new ofertas_global();
  $empl= new empresa_global();
  break;
}
?>

<header>
  <div class="container">
  </div>
</header>

<div class="wrap-content">
  <section>
    <div class="container">
      <div class="row">
        <form id="postularOferta" action="postOfer.php" method="post">
          <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-xs-12 text-center form-container">
            <?php   
            $ofer = $oferl->getOferta($_GET['oid'], $link);
            $post = serialize($ofer);

            if ($ofer!=null){ ?>      
            <input type="hidden" name="ofer" value="<?php echo $ofer->getId(); ?>"/>
            <a href="../perfiles/empresas/perfil-empresas.php?eid=<?php echo $ofer->getEmpresa()->getId(); ?>">
              <img class="img-responsive img-circle bg-azure-radiant center-block" alt="logo-empresa" src='../<?php echo $ofer->getArea()->getImg($ofer); ?>'>
            </a>
            <hr style="border:2px solid gray;border-top:10px">
            <h3 class="text-dove-gray"><b><?php echo $ofer->getTitulo();?></b></h3>
            <ul class="col-sm-12 col-xs-12">
              <?php if ($ofer->getArea()!=null){ ?>
              <li><b>Área:</b> <?php echo $ofer->getArea()->getNombre();?></li>
              <?php } if ($ofer->getPais()->getNombre()!=null && $ofer->getProvincia()->getNombre()!=null && $ofer->getCiudad()->getNombre()!=null){ ?>
              <li><b>Ubicación:</b> <?php echo $ofer->getPais()->getNombre();?> - <?php echo $ofer->getProvincia()->getNombre();?> - <?php echo $ofer->getCiudad()->getNombre();?></li>
              <?php } if ($ofer->getTipoContrato()->getNombre()!=null){ ?>
              <li><b>Modalidad:</b> <?php echo $ofer->getTipoContrato()->getNombre();?></li>
              <?php } if ($ofer->getRenumeracion()->getNombre()!=null){ ?>
              <li><b>Remuneración:</b> <?php echo $ofer->getRenumeracion()->getNombre();?></li>
              <?php } if ($ofer->getExperiencia()->getNombre()!=null){ ?>
              <li><b>Experiencia:</b> <?php echo $ofer->getExperiencia()->getNombre();?></li>
              <?php } if ($ofer->getGenero()!=null&&$ofer->getGenero()!=0){ ?>
              <li><b>Género:</b> <?php echo $ofer->getGenero();?></li>
              <?php } if ($ofer->getEdad()->getNombre()!=null){ ?>
              <li><b>Edad: <?php echo $ofer->getEdad()->getNombre();?></li>
              <?php } ?>
            </ul>
            <div class="form-group text-left">
              <label for="descripcion">Descripción: </label>
              <p class="texto-justificado"  id="descripcion"><?php echo $ofer->getDescripcion();?></p>
            </div>
            <div class="col-sm-12 col-xs-12 text-center padding">
                <?php if($tipo=='P'){ ?>
              <button  type="submit" id="btn-postular" class="btn el-border el-border-azure-radiant bg-white">Postular</button>
                <?php } ?>
              <a href="../perfiles/empresas/perfil-empresas.php?eid=<?php echo $ofer->getEmpresa()->getId(); ?>"
                class="btn el-border el-border-azure-radiant">
                Ver Empresa
              </a>
            </div>
            <?php } 
            ?>
          </div>    
        </form>
      </div>
    </div>
  </section>


</div>

<?php include("../footer.html"); ?>