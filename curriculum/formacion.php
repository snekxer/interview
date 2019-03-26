<?php
include("../header.php");
$meta = new meta_global();

if (isset($_GET['id'])) {
    $id = (int) ($_GET['id']);
    $currl = new curriculum_persona;
    $form_temp = $currl->getFormacionFromId($id, $link);
    if ($form_temp->getCurriculum() === unserialize($_SESSION['user'])->getId()) {
        $form = $form_temp;
        $denied = false;
    } else {
        $denied = true;
    }
}
?>

<header>
    <div class="container text-left">
        <h1><b>Formacion</b></h1>
    </div>
</header>

<div class="wrap-content text-center">
    <section>
        <div class="container">
            <div id="formacion" class="row formacion">

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
                        <label for="nombres">Institución:</label>
                        <input type="text"  class="form-control" id="institucion_formacion" name="institucion_formacion" value="<?php if(isset($form)){echo $form->getInstitucion();}?>"> 
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="nombres">Titulo obtenido:</label>
                        <input type="text"  class="form-control" id="titulo_formacion" name="titulo_formacion" value="<?php if(isset($form)){echo $form->getTipo();}?>"> 
                    </div>


                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="nombres">Tipo</label>
                        <input type="text" class="form-control" id="tipo_formacion" name="tipo_formacion" value="<?php if(isset($form)){echo $form->getTipo();}?>"> 
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="descripcion">Descripción:</label>
                        <textarea id="descripcion_formacion" name="descripcion_formacion" class="form-control"><?php if(isset($form)){echo $form->getDescripcion();}?></textarea>        
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="nombres">Fecha de inicio:</label>
                        <input type="date"  class="form-control" id="fecha_inicio_formacion" name="fecha_inicio_formacion" value="<?php if(isset($form)){echo $form_temp->getFechaIni();}?>" max="<?php echo date("Y-m-d"); ?>" > 
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="nombres">Fecha de culminación:</label>
                        <input type="date"  class="form-control" id="fecha_culminacion_formacion" name="fecha_culminacion_formacion" value="<?php if(isset($form)){echo $form_temp->getFechaFin();}?>" max="<?php echo date("Y-m-d"); ?>" > 
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="nombres">Duración:</label>
                        <input type="text" class="form-control" id="duracion" name="duracion" value="<?php if(isset($form)){echo $form_temp->getDuracion();}?>"> 
                    </div>

                    <input type="hidden" name="id" value="<?php
                    if (isset($form)) {
                        echo $form->getId();
                    }
                    ?>">
                    <input type="hidden" name="tipo" value="<?php
                    if (isset($form)) {
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
            url: 'save/form.php',
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