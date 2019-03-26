<?php 
include("../header.php"); 
?>
<header>
    <div class="container text-center">
        <h1><b>Notificaciones</b></h1>
    </div>
</header>

<div class="wrap-content text-center">
    <section>
        <div class="container">
            <div class="row">
      
                        <?php     
                        $nots = new notificacion($link);
                        $ofertas = $nots->getOfertas();
                        $servicios = $nots->getServicios();
                        if($ofertas!=null){
                            foreach ($ofertas as $ofer){
                                ?>
                                <div class="item  col-xs-12 col-sm-4 col-lg-4">
                                    <a href="<?php echo '../ofertas/postular-oferta.php?oid='.$ofer->getId(); ?>">
                                        <div class="thumbnail">
                                            <img class="group list-group-image img-circle bg-azure-radiant" src="../<?php echo $ofer->getArea()->getImg($ofer);?>" alt="" />
                                            <div class="caption">
                                                <h4 class="group inner list-group-item-heading">
                                                    <?php echo $ofer->getTitulo(); ?></h4>
                                                    <p class="group inner list-group-item-text">
                                                        <?php echo $ofer->getArea()->getNombre(); ?></p>
                                                        <div class="row">                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                }
                                if($servicios!=null){
                                    foreach ($servicios as $serv){        ?>
                                    <div class="item  col-xs-12 col-sm-4 col-lg-4">
                                        <a href="<?php echo '../servicios/postular-servicio.php?sid='.$serv->getId(); ?>">
                                            <div class="thumbnail">
                                                <img class="group list-group-image img-circle bg-azure-radiant" src="../<?php echo $serv->getArea()->getImgServ();?>" alt="" />
                                                <div class="caption">
                                                    <h4 class="group inner list-group-item-heading">
                                                        <?php echo $serv->getTitulo(); ?></h4>
                                                        <p class="group inner list-group-item-text">
                                                            <?php echo $serv->getArea()->getNombre(); ?></p>
                                                            <div class="row">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php
                                        }
                                    }
                                    if($nots->getAreas()==null){
                                        echo 'No tiene areas de interes';
                                    } else if ($ofertas==null&&$servicios==null){
                                        echo 'No tiene notificaciones nuevas';
                                    }
                                    ?>        
           
                            </div>
                        </div>
                    </section>
                </div>
<?php include("../footer.html"); ?>


