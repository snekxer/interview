<?php include("../header-buscador.php"); 
$buscador = new buscador();
$sid = $_GET['sid'];
$oid = $_GET['oid'];
$tipo = $_GET['tipo'];
?>

<header>
    <div class="container hidden-sm hidden-lg">
     <div class="panel panel-default">
        <div class="panel-body">
          <button id="filtros" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-tasks"></span> Filtros</button>
      </div>
  </div>
</div>
</header>



<div class="wrap-content text-center">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-3 sidenav padding-16 hidden-xs">
                        <div class="col-sm-12 txt-gray">
                            <h3><b>Búsqueda</b></h3>
                            <span>100 resultados</span>
                            <h4>Tipo de anuncio <span class="badge pull-right">Todos</span></h4>
                            <div class="row texto-justificado">
                              <!-- incluir href en cada element -->
                              <div class="col-sm-12 temp-gray margin-top opCategory"><p>Ofertas Laborales</p></div>
                              <div class="col-sm-12 temp-gray margin-top opCategory"><p>Servicios que necesitan</p></div>
                          </div>  
                      </div>
                      <div class="col-sm-12">
                        <h3>Filtrar por:</h3>
                        <ul class="list-group">
                          <li class="list-group-item" data-toggle="collapse" data-target="#fecha_post">Fecha de publicación<span class="caret"></span></li>
                          <div class="collapse padding-16" id="fecha_post">
                            <select class="form-control">
                                <option value="1d">hace 1 dia</option>
                                <option value="1s">hace 1 semana</option>
                                <option value="3m">hace 3 meses</option>
                            </select>
                        </div>
                        <li class="list-group-item" data-toggle="collapse" data-target="#ciudad">Ciudad<span class="caret"></span></li>
                        <div class="collapse padding-16" id="ciudad">
                            <select class="form-control">
                                <option value="a">a</option>
                                <option value="b">b</option>
                                <option value="c">c</option>
                            </select>
                        </div>
                        <li class="list-group-item" data-toggle="collapse" data-target="#educacion"><span class="caret"></span>Educación</li>
                        <div class="collapse padding-16" id="educacion">
                            <select class="form-control">
                                <option value="secundaria">secundaria</option>
                                <option value="bachillerato">bachillerato</option>
                                <option value="profesional">profesional</option>
                            </select>
                        </div>
                        <li class="list-group-item" data-toggle="collapse" data-target="#profesion"><span class="caret"></span>Profesión</li>
                        <div class="collapse padding-16" id="profesion">
                            <select class="form-control">
                                <option value="a">a</option>
                                <option value="b">b</option>
                                <option value="c">c</option>
                            </select>
                        </div>
                        <li class="list-group-item" data-toggle="collapse" data-target="#experiencia"><span class="caret"></span>Experiencia</li>
                        <div class="collapse padding-16" id="experiencia">
                            <select class="form-control">
                                <option value="1">1 - 3anio</option>
                                <option value="2">3 - 5 anios</option>
                                <option value="3">mas de 5 anios</option>
                            </select>
                        </div>
                        <li class="list-group-item" data-toggle="collapse" data-target="#salario"><span class="caret"></span>Salario</li>
                        <div class="collapse padding-16" id="salario">
                            <select class="form-control">
                                <option value="a">a</option>
                                <option value="b">b</option>
                                <option value="c">c</option>
                            </select>            
                        </div>
                        <li class="list-group-item" data-toggle="collapse" data-target="#tipo_jornada"><span class="caret"></span>Tipo de Jornada</li>
                        <div class="collapse padding-16" id="tipo_jornada">
                            <select class="form-control">
                                <option value="a">a</option>
                                <option value="b">b</option>
                                <option value="c">c</option>
                            </select>
                        </div>
                    </ul> 
                </div>
            </div>
            <div class="col-sm-9 text-left bg-whitesmoke">
                <h3 class="txt-gray">Resultados de la búsqueda...</h3>
                <div class="margin-top">
                    <?php
                    $servicios=$buscador->buscarServicios($sid, $link);
                    $ofertas= $buscador->buscarOfertas($oid, $link);
                    if($servicios!=null&&$tipo=="servicio"){ 
                        foreach ($servicios as $s){ ?>
                        <div class="item col-sm-4 col-xs-12">
                            <div class="thumbnail thumbnail_eqheight">
                                <a href="../<?php echo 'servicios/postular-servicio.php?sid='.$s->getId(); ?>">
                                    <img class="grow img-circle bg-azure-radiant" src="../<?php echo $s->getArea()->getImgServ(); ?>" alt="Postulante"
                                    style="height:86px;width:86px">
                                    <div class="caption text-center">
                                        <h5><?php echo $s->getTitulo(); ?></h5>
                                        <div class="row" style="padding:0px 20px 0px 20px;">
                                            <a href="../<?php echo 'servicios/postular-servicio.php?sid='.$s->getId(); ?>"><button class="btn el-border el-border-dove-gray bg-white">Ver</button></a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <?php } 
                    } 
                    if($ofertas!=null&&$tipo=="oferta"){ 
                        foreach ($ofertas as $o){ ?>
                        <div class="item col-sm-4 col-xs-12">
                            <div class="thumbnail thumbnail_eqheight">
                                <a href="<?php echo '../ofertas/postular-oferta.php?oid='.$o->getId(); ?>">
                                    <img class="grow img-circle bg-azure-radiant" src="../<?php echo $o->getArea()->getImg($o); ?>" alt="Postulante" 
                                    style="height:86px;width:86px">
                                    <div class="caption text-center">
                                        <h5><?php echo $o->getTitulo(); ?></h5>
                                        <div class="row" style="padding:0px 20px 0px 20px;">
                                            <a href="<?php echo '../ofertas/postular-oferta.php?oid='.$o->getId(); ?>"><button class="btn el-border el-border-dove-gray bg-white">Ver</button></a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php } 
                    }?>
                </div>
            </div>
        </div>

    </div>
</div>
</section>
</div>



<script>
  $("#filtros").click(function(e) {
    e.preventDefault();
    $("#sidebar").show( "slow" );
});

  $("#close").click(function(e) {
    e.preventDefault();
    $("#sidebar").hide( "slow" );
});

</script>
<?php include("../footer.html"); ?>