<?php
include("../header.php");
$meta = new meta_global();

if (isset($_GET['id'])) {
    $id = (int) ($_GET['id']);
    $currl = new curriculum_persona;
    $cono_temp = $currl->getConocimientoFromId($id, $link);
    if ($cono_temp->getCurriculum() === unserialize($_SESSION['user'])->getId()) {
        $cono = $cono_temp;
        $denied = false;
    } else {
        $denied = true;
    }
}
?>

<header>
    <div class="container text-left">
        <h1><b>Conocimientos</b></h1>
    </div>
</header>

<div class="wrap-content text-center">
  <section>
    <div class="container">
        <div id="conocimiento" class="row conocimiento">
            <div class="alert">
                <?php
                if ($denied) {
                    echo '<p>No tiene permiso para ver este elemento</p>';
                }
                ?>
            </div>
            <?php if (!$denied) { ?>
            <form class="text-left curriculVitae" id="saveForm" method="post" action="">          

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="conocimiento">Conocimiento:</label>
                    <input type="text" id="conocimiento" name="conocimiento" class="form-control"  value="<?php if (isset($cono)) {echo $cono_temp->getConocimiento();}?>"> 
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="nivel_dominio">Nivel de dominio:</label>
                    <select id="nivel_conocimiento" name="nivel_conocimiento" class="form-control" value="<?php if (isset($cono)) {echo $cono_temp->getNivel()->getNombre();} ?>">
                        <?php
                        $niveles = $meta->getAllNiveles($link);
                        if (isset($cono)) {
                            echo '<option value="' . $cono->getNivel()->getId() . '" selected>' . $cono->getNivel()->getNombre() . '</option>';
                        }
                        foreach ($niveles as $niveles) {
                            echo '<option value="' . $niveles->getId() . '">' . $niveles->getNombre() . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="area">Area:</label>
                    <select id="areas" name="area_conocimientos" class="form-control" >
                        <?php
                        $areas = $meta->getAllAreas($link);
                        if (isset($cono)) {
                            echo '<option value="' . $cono->getArea()->getId() . '" selected>' . $cono->getArea()->getNombre() . '</option>';
                        }
                        foreach ($areas as $areas) {
                            echo '<option value="' . $areas->getId() . '">' . $areas->getNombre() . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="subarea">Sub-area:</label>
                    <select id="subarea" name="subarea_conocimientos" class="form-control" >
                        <?php
                        if (isset($cono)) {
                            echo '<option value="' . $cono->getSubarea()->getId() . '" selected>' . $cono->getSubarea()->getNombre() . '</option>';
                        }
                        ?>
                    </select>
                </div>



                <input type="hidden" name="id" value="<?php
                if (isset($cono)) {
                    echo $cono->getId();
                }
                ?>">
                <input type="hidden" name="tipo" value="<?php
                if (isset($cono)) {
                    echo 'E';
                } else {
                    echo 'N';
                }
                ?>">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                    <button href="ver-cv.php?pid=<?php echo unserialize($_SESSION['user'])->getId(); ?>" class="btn btn-default">Cancelar</button>
                    <button id="save" class="btn btn-default">Guardar</button>
                </div>

            </form>
            <?php } ?>            
        </div>
    </div>
</section>
</div>  

<script type="text/javascript" data-main="../../resources/js/formConocimientos" src="../../resources/scripts/require.js"></script>
<script>

    function messageAlert(message_cont, message_type) {
        var d_message = $('.alert');
        d_message.addClass(message_type)
        .append('<p>' + message_cont + '</p>');

    }

    $("#save").on('click', function (e) {
        e.preventDefault();

        var formdata = $("#saveForm").serialize();


        $.ajax({
            url: 'save/cono.php',
            type: 'post',
            data: formdata,
            success: function (response) {
                if (response) {
                    messageAlert(response, 'alert-success');
                } else {
                    messageAlert(response, 'alert-danger');
                }
            },
            error: function (xhr, desc, err) {

                messageAlert("Ha ocurrido un error, vuelva a intentar", 'alert-danger');
            }
        }); // end ajax call


    });



</script>



<?php include("../footer.html"); ?>