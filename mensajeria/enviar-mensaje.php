<?php 

include $_SERVER['DOCUMENT_ROOT']."/h.php";

if($logged===true){
	if($tipo=="P"){
		$mensajeria = new mensajes_persona();
	}elseif($tipo=="E"){
		$mensajeria = new mensajes_empresa();
	}elseif($tipo=="O"){
		$mensajeria = new mensajes_emprendedor();
	}else{
		echo  "parámetro inválido";
	}
}
$msn = new mensaje();
$msn->setContenido($_POST['contenido']);
$msn->setReceptor($_POST['receptor']);

$estado = $mensajeria->sendMensaje($msn, $link);


if($estado){
	header('Location: http://www.interview.ec/mensajeria/mensajeria-clone.php');
    
}


?>