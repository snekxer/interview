<?php
include("../header.php");
$meta = new meta_global();

if (isset($_GET['id'])) {
    $id = (int) ($_GET['id']);
    $currl = new curriculum_persona;
    $comp_temp = $currl->getCompetenciaFromId($id, $link);
    if ($comp_temp->getCurriculum() === unserialize($_SESSION['user'])->getId()) {
        $comp = $comp_temp;
        $denied = false;
    } else {
        $denied = true;
    }
}
?>

<header>
    <div class="container text-left">
        <h1><b>Competencias</b></h1>
    </div>
</header>

<div class="wrap-content text-center">
    <section>
        <div class="container">
            <div id="competencia" class="row competencia">
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
            <label for="nombres">Competencia:</label>
            <input type="text" id="conocimiento_competencias" name="conocimiento_competencias" class="form-control"  value="<?php if(isset($comp)){echo $comp->getCompetencia();}?>"> 
          </div>

          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="nivel_conocimiento">Nivel de dominio:</label>
            <select id="nivel_conocimiento_competencias" name="nivel_conocimiento_competencias" class="form-control" >
                <?php
                $niveles = $meta->getAllNiveles($link);
                    if (isset($comp)) {
                        echo '<option value="' . $comp->getNivel()->getId() . '" selected>' . $comp->getNivel()->getNombre() . '</option>';
                    }
                    foreach ($niveles as $niveles) {
                        echo '<option value="' . $niveles->getId() . '">' . $niveles->getNombre() . '</option>';
                    }
                    ?>
            </select>
          </div>

                    <input type="hidden" name="id" value="<?php
                            if (isset($comp)) {
                                echo $comp->getId();
                            }
                            ?>">
                    <input type="hidden" name="tipo" value="<?php
                    if (isset($comp)) {
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
            url: 'save/comp.php',
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