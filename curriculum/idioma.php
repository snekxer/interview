<?php
include("../header.php");
$meta = new meta_global();

if (isset($_GET['id'])) {
    $id = (int) ($_GET['id']);
    $currl = new curriculum_persona;
    $idio_temp = $currl->getIdiomaFromId($id, $link);
    if ($idio_temp->getCurriculum() === unserialize($_SESSION['user'])->getId()) {
        $idio = $idio_temp;
        $denied = false;
    } else {
        $denied = true;
    }
} else {
    $idio = new idioma;
    $idio->setEscrito(new nivel);
    $idio->setOral(new nivel);
    $idio->setIdioma(new idiomaM);
    
    
}
?>

<header>
    <div class="container text-left">
        <h1><b>Idioma</b></h1>
    </div>
</header>

<div class="wrap-content text-center">
  <section>
    <div class="container">
        <div id="educacion" class="row educacion">

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
                    <label>Idioma:</label>
                    <select id="idioma" name="idioma" class="form-control" >
                        <?php
                        $idiomas = $meta->getAllIdiomas($link);
                        if (isset($idio_temp)) {
                            echo '<option value="' . $idio->getIdioma()->getId() . '" selected>' . $idio->getIdioma()->getNombre() . '</option>';
                        }
                        foreach ($idiomas as $idiomas) {
                            echo '<option value="' . $idiomas->getId() . '">' . $idiomas->getNombre() . '</option>';
                        }
                        ?>
                    </select>
                </div>      

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Nivel Oral:</label>
                    <select id="nivel_oral" name="nivel_oral" class="form-control" >
                        <?php
                        $niv = $meta->getAllNiveles($link);
                        if (isset($idio_temp)) {
                            echo '<option value="' . $idio->getOral()->getId() . '" selected>' . $idio->getOral()->getNombre() . '</option>';
                        }
                        foreach ($niv as $niv) {
                            echo '<option value="' . $niv->getId() . '">' . $niv->getNombre() . '</option>';
                        }
                        ?> 
                    </select>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Nivel Escrito:</label>
                    <select id="nivel_escrito" name="nivel_escrito" class="form-control" >
                        <?php
                        $nivs = $meta->getAllNiveles($link);
                        if (isset($idio_temp)) {
                            echo '<option value="' . $idio->getEscrito()->getId() . '" selected>' . $idio->getEscrito()->getNombre() . '</option>';
                        }
                        foreach ($nivs as $niv) {
                            echo '<option value="' . $niv->getId() . '">' . $niv->getNombre() . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <input type="hidden" name="id" value="<?php if (isset($idio_temp)) {
                    echo $idio->getId();
                } ?>">
                <input type="hidden" name="tipo" value="<?php if (isset($idio_temp)) {
                    echo 'E';
                } else {
                    echo 'N';
                } ?>">



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
            url: 'save/idio.php',
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