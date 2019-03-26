<?php
include("../header.php");
//include $_SERVER['DOCUMENT_ROOT']."/h.php";
$id = $_POST['serv'];
$salario = $_POST['salario'];
$comment = $_POST['comment'];
switch ($tipo){
    case('E'):
        $serl = new servicios_empresa;
        break;
    case('P'):
        $serl = new servicios_persona;
        break;
    case('O'):
        $serl = new servicios_emprendedor;
        break;
}
$servicio = $serl->getServicio($id, $link);
?>
<header>
  <div class="container">
  </div>
</header>

<div class="wrap-content">
	<section>
		<div class="container">
			<div class="row">
				<h2 class="text-center"><?php echo $serl->postServicio($servicio, $comment, $salario, $link); ?></h2>
			</div>
		</div>
	</section>
</div>


<?php include("../footer.html"); ?>



