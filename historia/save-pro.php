<?php
include("../header.php");

$impl_his = new historia_empresa();
$proyecto = new his_proyecto();
  
$tipo = $_POST['tipo'];

$proyecto->setNombre($_POST['nombre']);
$proyecto->setDescripcion($_POST['descripcion']);
$proyecto->setProyecto($_POST['proyecto']);
?>
<header>
    <div class="container">
        <h3 class="text-center">Historia</h3>
    </div>
</header>

<div class="wrap-content text-center">
    <section>
    <div class="container">
        <div class="row">
            <?php  
            if($tipo=='N'){
                if($impl_his->newProyecto($proyecto, $link)) {
                    echo '<p>Guardado</p>';
                } else {
                    echo '<p>No se pudo guardar</p>';
                }
            } else if ($tipo=='E'){
                $proyecto->setId((int)$_POST['id']);
                if($impl_his->editProyecto($proyecto, $link)) {
                    echo '<p>Guardado</p>';
                } else {
                    echo '<p>No se pudo guardar</p>';
                }
            }
            ?>
        </div>
    </div>
</section>
</div>

<?php
include("../footer.html");
?>