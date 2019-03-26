<?php include("../header-buscador.php"); 
$buscador = new buscador();
$categoria = $_GET['categoria'];
$pid = $_GET['pid'];
$eid = $_GET['eid'];
$oid = $_GET['oid'];
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
            <h4>Tipo de $perfil <span class="badge pull-right">Todos</span></h4>
            <div class="row texto-justificado">
             <!-- incluir href en cada element -->
             <div class="col-sm-12 temp-gray margin-top opCategory"><p id="opEmpresa">Empresa</p></div>
             <div class="col-sm-12 temp-gray margin-top opCategory"><p id="opEmprendedores">Emprendedores</p></div>
             <div class="col-sm-12 temp-gray margin-top opCategory"><p id="opPersona">Personas</p></div>
           </div>  
         </div>
         <div class="col-sm-12">
           <h3>Filtrar por:</h3>
           <ul class="list-group">
            <li class="list-group-item hide" data-toggle="collapse" data-target="#profes <li class="list-group-item" data-toggle="collapse" data-target="#ciudad">Ciudad<span class="caret pull-right"></span></li>
            <div class="collapse padding-16" id="ciudad">
              <select class="form-control">
                <option value="a">a</option>
                <option value="b">b</option>
                <option value="c">c</option>
              </select>
            </div>
            <li class="list-group-item" data-toggle="collapse"  data-target="#tipo_industria">Tipo de Industria<span class="caret pull-right"></span></li>
            <div class="collapse padding-16" id="tipo_industria">
              <select class="form-control">
                <option value="1d">hace 1 dia</option>
                <option value="1s">hace 1 semana</option>
                <option value="3m">hace 3 meses</option>
              </select>
            </div>
            <li class="list-group-item hide" data-toggle="collapse" data-target="#sexo">Sexo<span class="caret pull-right"></span></li>
            <div class="collapse padding-16" id="sexo">
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
        <h1 class="txt-gray">Resultados de la búsqueda...</h1>
        <div id="results" class="margin-top">
          <?php
          $personas=$buscador->buscarPersonas($pid, $link);
          $empresas=$buscador->buscarEmpresas($eid, $link);
          $emprendedores=$buscador->buscarEmprendedores($oid, $link);
          if($personas!=null&&$categoria=="personas"){
            foreach ($personas as $p){ ?>


            <div class="item col-sm-4 col-xs-12 <?php echo $p->getProvincia()->getNombre(); ?>">
              <div class="thumbnail thumbnail_eqheight">
                <a href="<?php echo '../perfiles/personas/perfil-personas.php?pid='.$p->getId(); ?>">
                  <img class="grow img-circle " src="../<?php echo $p->getFoto(); ?>" alt="Postulante"
                  style="height:86px;width:86px">
                  <div class="caption text-center">
                    <h5><b><?php echo $p->getNombres(); ?></b></h5>
                    <p></p>
                    <div class="row" style="padding:0px 20px 0px 20px;">
                      <a href="<?php echo '../perfiles/personas/perfil-personas.php?pid='.$p->getId(); ?>"><button class="btn el-border el-border-dove-gray bg-white">Ver</button></a>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <?php } 
          } 

          if($empresas!=null&&$categoria=="empresas"){
            foreach ($empresas as $e){ ?>


            <div class="item col-sm-4 col-xs-12">
              <div class="thumbnail thumbnail_eqheight">
                <a href="<?php echo '../perfiles/empresas/perfil-empresas.php?eid='.$e->getId(); ?>">
                  <img class="grow img-circle" src="../<?php echo $e->getFoto(); ?>" alt="Postulante"
                  style="height:86px;width:86px">
                  <div class="caption text-center">
                    <h5><b><?php echo $e->getNombre(); ?></b></h5>
                    <div class="row" style="padding:0px 20px 0px 20px;">
                      <a href="<?php echo '../perfiles/empresas/perfil-empresas.php?eid='.$e->getId(); ?>"><button cclass="btn el-border el-border-dove-gray bg-white">Ver</button></a>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <?php } 
          } 

          if($emprendedores!=null&&$categoria=="emprendedores"){
            foreach ($emprendedores as $o){ ?>


            <div class="item col-sm-4 col-xs-12">
              <div class="thumbnail thumbnail_eqheight">
                <a href="">
                  <img class="grow img-circle" src="../<?php echo $o->getFoto(); ?>" alt="Postulante"
                  style="height:86px;width:86px">
                  <div class="caption text-center">
                    <h5><b><?php echo $o->getNombre(); ?></b></h5>
                    <div class="row" style="padding:0px 20px 0px 20px;">
                      <a href="<?php echo '../perfiles/emprendedores/perfil-emprendedores.php?oid='.$o->getId(); ?>"><button class="btn el-border el-border-dove-gray bg-white">Ver</button></a>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <?php } 
          } ?>
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