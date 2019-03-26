<?php
include("../header.php");
$meta = new meta_global();

if (isset($_GET['id'])) {
    $id = (int) ($_GET['id']);
    $currl = new curriculum_persona;
    $ref_temp = $currl->getReferenciaFromId($id, $link);
    if ($ref_temp->getCurriculum() === unserialize($_SESSION['user'])->getId()) {
        $ref = $ref_temp;
        $denied = false;
    } else {
        $denied = true;
    }
}
?>

<header>
    <div class="container text-left">
        <h1><b>Experiencia Laboral</b></h1>
    </div>
</header>

<div class="wrap-content text-center">
  <section>
    <div class="container">
        <div id="referencias" class="row referencias">
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
                    <label for="nombres">Nombre:</label>
                    <input type="text" id="nombre_referencia_p" name="nombre_referencia_p" class="form-control" value="<?php if(isset($ref)){echo $ref->getNombre();}?>"> 
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono_referencia_p" name="telefono_referencia_p" class="form-control" value="<?php if(isset($ref)){echo $ref->getTelefono();}?>"> 
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="email">Email:</label>
                    <input type="text" id="email_referencia_p" name="email_referencia_p" class="form-control" value="<?php if(isset($ref)){echo $ref->getEmail();}?>"> 
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="relacion">Relacion:</label>
                    <input type="text" id="relacion_referencia_p" name="relacion_referencia_p" class="form-control" value="<?php if(isset($ref)){echo $ref->getRelacion();}?>"> 
                </div>       

                <input type="hidden" name="id" value="<?php
                if (isset($ref)) {
                    echo $ref->getId();
                }
                ?>">
                <input type="hidden" name="tipo" value="<?php
                if (isset($ref)) {
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
            url: 'save/ref.php',
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