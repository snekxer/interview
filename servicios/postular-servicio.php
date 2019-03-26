<?php 
include("../header.php"); 
    if(isset($_SESSION['user'])){
        $tipo=unserialize($_SESSION['user'])->getTipo();
    } else {
        $tipo='';
    }
    $upl = new usuario_global();
    switch($tipo){
        case('E'):
            $oferl= new servicios_empresa();
            break;
        case('P'):
            $oferl= new servicios_persona();
            break;
        case('O'):
            $oferl= new servicios_emprendedor();
            break;
        default:
            $oferl= new servicios_global();
            break;
    }
    $serv = $oferl->getServicio($_GET['sid'], $link);

?>

<header>
  <div class="container">
  </div>
</header>

<div class=" wrap-content">
  <section>
    <div class="container">
      <form id="postularOferta" action="postServ.php" method="post">
       <input type="hidden" name="serv" value="<?php echo $serv->getId(); ?>"/>
       <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-xs-12 text-center form-container" >
        <img class="img-responsive img-circle bg-azure-radiant center-block" alt="logo-empresa" 
        src='../<?php echo $serv->getArea()->getImgServ();?>' style="width:160px;height:160px">
        <hr style="border:2px solid gray;border-top:10px">
        <h3 class="text-dove-gray"><b><?php echo $serv->getTitulo();?></b></h3>
        <ul class="col-sm-12 col-xs-12">
          <?php if ($serv->getArea()->getNombre()!=null){ ?>
          <li><b>Área:</b> <?php echo $serv->getArea()->getNombre();?></li>
          <?php } if ($serv->getPais()->getNombre()!=null && $serv->getProvincia()->getNombre()!=null && $serv->getCiudad()->getNombre()!=null){ ?>
          <li><b>Ubicación:</b> <?php echo $serv->getPais()->getNombre();?> - <?php echo $serv->getProvincia()->getNombre();?> - <?php echo $serv->getCiudad()->getNombre();?></li>
          <?php } if ($serv->getModalidad()->getNombre()!=null){ ?>
          <li><b>Modalidad:</b> <?php echo $serv->getModalidad()->getNombre();?></li>
          <?php } if ($serv->getModalidad()->getNombre()!=null){ ?>
          <li><b>Remuneración:</b> <?php echo $serv->getRangoDesde().' - '.$serv->getRangoHasta();?></li>
          <?php } ?>
        </ul>
         <div class="form-group text-left">
          <label for="descripcion">Descripción:</label>
          <p class="texto-justificado" id="descripcion"><?php echo $serv->getDescripcion();?></p>
        </div> 
        <div class="form-group">
          <label for="comentarios">Comentarios:</label>
          <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
        </div>       
        <div class="col-sm-12 col-xs-12 text-center padding">
          <div class="col-xs-4">
           <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
            <input id="salario" type="text" class="form-control" name="salario">
          </div>
        </div>
          <button type="submit" id="btn-postular" class="btn el-border el-border-azure-radiant bg-white">Postular</button>
      </div>
    </div>    
  </form>

</div>
</section>
</div>

<?php include("../footer.html"); ?>