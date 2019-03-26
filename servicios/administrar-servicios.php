<?php
include("../header.php");

if($tipo=='E'){
    $servl = new servicios_empresa;
} else if($tipo=='O'){
    $servl = new servicios_emprendedor;
} else {
    echo 'No tiene permiso para realizar esta acción.';
}
$servs = $servl->getServicios($impl->getMyUsr($link), $link);
?>

<header>
    <div class="container-fluid">
        <div class="col-sm-4">
            <a href="servicios.php"><p class="btn btn-default">Crear servicio</p></a>
        </div>

    </div>

</header>

<div class="container-fluid wrap-content">
    <div class="table-responsive" style="padding-top: 5%">
        <?php if($servs!=false) { ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Titulo</th>
                    <th>Area</th>
                    <th>Valor</th>
                    <th>Modalidad</th>
                    <th>Postulaciones</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                foreach($servs as $serv){
                    $posts = $servl->getPostulantes($serv, $link); ?>
                <tr>
                    <td>
                        <div class="dropup">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="servicios.php?id=<?php echo $serv->getId();?>">Editar Servicio</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="postular-servicio.php?sid=<?php echo $serv->getId();?>">Ver Servicio</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="delServ.php?id=<?php echo $serv->getId();?>">Eliminar Servicio</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="../postulaciones/postulaciones_servicios.php?sid=<?php echo $serv->getId();?>">Ver Postulantes</a></li>
                            </ul>
                        </div>
                    </td>
                    <td><?php echo $serv->getTitulo();?></td>
                    <td><?php echo $serv->getArea()->getNombre();?></td>
                    <td><?php echo $serv->getRangoDesde().' - '.$serv->getRangoHasta();?></td>
                    <td><?php echo $serv->getModalidad()->getNombre();?></td>
                    <td><?php if($posts!=false){ echo sizeof($posts);} else {echo '0';}?></td>

                </tr>
                <?php 
                unset($posts);
                }
                ?>
            </tbody>
        </table>
        <?php } else {
                echo 'No tiene servicios.';
            }?>
    </div>
</div>

<?php include("../footer.html"); ?>
  
