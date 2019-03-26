<?php
include("../h.php"); 
$id = (int)$_GET['id']; 

$myuser = unserialize($_SESSION['user']);

$user = $impl->searchUsrById($id,$link);
$perf = $impl->searchUsrMsn($user,$link);

switch($tipo){
    case('E'):
        $mensl = new mensajes_empresa;
        $denied = false;
        break;
    case('O'):
        $mensl = new mensajes_emprendedor;
        $denied = false;
        break;
    case('P'):
        $mensl = new mensajes_persona;
        $denied = false;
        break;
    default:
        $denied = true;
        break;
}
$mens = $mensl->getMensajesFromUsr($user, $link);
?>


<div class="row heading">
    <div class="col-sm-2 col-md-1 col-xs-3 heading-avatar">
        <div class="heading-avatar-icon">
            <img src="..<?php echo $perf->getFoto();?>">
        </div>
    </div>
    <div class="col-sm-8 col-xs-7 heading-name">
        <a class="heading-name-meta"><?php if($tipo=='P'){ echo $perf->getNombres().' '.$perf->getApellidos();} else { echo $perf->getNombre();}?>
        </a>
    </div>
    <div class="col-sm-1 col-xs-1  heading-dot pull-right">
        <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
    </div>
</div>

<div class="row message" id="conversation">
    <?php foreach($mens as $msn){ 
       
        if ($msn->getEmisor()->getId()===$myuser->getId()){   
?>
    <div class="row message-body">
        <div class="col-sm-12 message-main-sender">
            <div class="sender">
                <div class="message-text">
                    <?php echo $msn->getContenido();?>
                </div>
                <span class="message-time pull-right">
                    <?php echo $msn->getIngreso();?>
                </span>
            </div>
        </div>
    </div>
        <?php } else { ?>
    <div class="row message-body">
        <div class="col-sm-12 message-main-receiver">
            <div class="receiver">
                <div class="message-text">
                    <?php echo $msn->getContenido();?>
                </div>
                <span class="message-time pull-right">
                    <?php echo $msn->getIngreso();?>
                </span>
            </div>
        </div>
    </div>
     <?php }
    }?>
</div>


<form id="contactForm" method="post" action="enviar-mensaje.php">
    <div class="row reply">
        <div class="col-sm-10 col-xs-10 reply-main">
            <textarea class="form-control" rows="1" id="contenido" name="contenido"></textarea>
            <input type="hidden" name="receptor" value="<?php echo $perf->getId(); ?>">
        </div>
        <!-- btn para enviar -->
        <div class="col-sm-2 col-xs-2 reply-send">
            
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span>Enviar</button>
        </div>
    </div>
</form>


