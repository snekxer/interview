<?php
include("../header.php");
//include $_SERVER['DOCUMENT_ROOT']."/h.php";
    if($tipo=='P'){
        $id = $_POST['ofer'];
        $oferl = new ofertas_persona();
        $oferta = $oferl->getOferta($id, $link);
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
				<h2 class="text-center"><?php echo $oferl->postOferta($oferta, $link); ?></h2>
			</div>
		</div>
	</section>
</div>


<?php include("../footer.html"); ?>