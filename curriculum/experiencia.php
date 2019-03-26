<?php
include("../header.php");
$meta = new meta_global();

if (isset($_GET['id'])) {
    $id = (int) ($_GET['id']);
    $currl = new curriculum_persona;
    $exp_temp = $currl->getExperienciaFromId($id, $link);
    if ($exp_temp->getCurriculum() === unserialize($_SESSION['user'])->getId()) {
        $exp = $exp_temp;
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
        <div id="experiencia" class="row experiencia">
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
                    <label for="nombres">Empresa:</label>
                    <input type="text"  class="form-control" id="empresa" name="empresa" value="<?php if(isset($exp)){echo $exp->getEmpresa();}?>"> 
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="nombres">Cargo:</label>
                    <input type="text"  class="form-control" id="cargo" name="cargo" value="<?php if(isset($exp)){echo $exp->getCargo();}?>"> 
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="nombres">Fecha de inicio:</label>
                    <input type="date"  class="form-control" id="fecha_inicio_experiencia" name="fecha_inicio_experiencia" value="<?php if(isset($exp)){echo $exp->getFechaIni();}?>"> 
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="nombres">Fecha de culminación:</label>
                    <input type="date"  class="form-control" id="fecha_culminacion_experiencia" name="fecha_culminacion_experiencia" value="<?php if(isset($exp)){echo $exp->getFechaFin();}?>"> 
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="industria">Tipo de industria:</label>
                    <select id="industria" name="industria" class="form-control" >
                        <?php
                        $industria = $meta->getAllIndustrias($link);
                        if(isset($exp)){
                            echo '<option value="'.$exp->getEmpresaIndustria()->getId().'" selected>'.$exp->getEmpresaIndustria()->getNombre().'</option>';
                        }
                        foreach ($industria as $industria) {
                            echo '<option value="'.$industria->getId().'">'.$industria->getNombre().'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="pais">País:</label>
                    <select id="paises" name="pais" class="form-control" >
                        <option value="0"></option>
                        <?php
                        $paises = $meta->getAllPaises($link);
                        if(isset($exp)){
                            echo '<option value="'.$exp->getPais()->getId().'" selected>'.$exp->getPais()->getNombre().'</option>';
                        }
                        foreach ($paises as $paises) {
                            echo '<option value="'.$paises->getId().'">'.$paises->getNombre().'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="area_interes_1">Provincia:</label>
                    <select id="provincias" name="provincia" class="form-control" >
                        <?php if(isset($exp)){
                            echo '<option value="'.$exp->getProvincia()->getId().'" selected>'.$exp->getProvincia()->getNombre().'</option>';
                        } ?>
                    </select>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="area_interes_1">Ciudad:</label>
                    <select id="ciudad" name="ciudad" class="form-control" >
                        <?php if(isset($exp)){
                            echo '<option value="'.$exp->getCiudad()->getId().'" selected>'.$exp->getCiudad()->getNombre().'</option>';
                        } ?>
                    </select>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="area">Area:</label>
                    <select id="areas" name="area_experiencia" class="form-control" >
                        <?php
                        $areas = $meta->getAllAreas($link);
                        if(isset($exp)){
                            echo '<option value="'.$exp->getArea()->getId().'" selected>'.$exp->getArea()->getNombre().'</option>';
                        }
                        foreach ($areas as $areas) {
                            echo '<option value="'.$areas->getId().'">'.$areas->getNombre().'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="subarea">Sub-area:</label>
                    <select id="subarea" name="subarea_experiencia" class="form-control" >
                     <?php if(isset($exp)){
                        echo '<option value="'.$exp->getSubarea()->getId().'" selected>'.$exp->getSubarea()->getNombre().'</option>';
                    } ?> 
                </select>
            </div>

            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="descripcion">Descripción del cargo:</label>
                <textarea id="descripcion_cargo" name="descripcion_cargo" class="form-control"><?php if(isset($exp)){echo $exp->getDescripcionCargo();}?></textarea>        
            </div>

            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="descripcion">Descripción de las funciones del cargo:</label>
                <textarea id="descripcion_funciones" name="descripcion_funciones" class="form-control"><?php if(isset($exp)){echo $exp->getDescripcionFunciones();}?></textarea>        
            </div>

            <div class="padding col-xs-12 col-sm-12">
                <h3>Referencia</h3>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="nombres">Nombre:</label>
                    <input id="nombre_referencia" type="text" name="nombre_referencia" class="form-control" value="<?php if(isset($exp)){echo $exp->getNombre();}?>"> 
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="nombres">Relación:</label>
                    <input id="relacion" type="text" name="relacion" class="form-control" value="<?php if(isset($exp)){echo $exp->getRelacion();}?>"> 
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="nombres">Teléfono:</label>
                    <input id="telefono_referencia" type="text" name="telefono_referencia" class="form-control" value="<?php if(isset($exp)){echo $exp->getTelefono();}?>"> 
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="nombres">Email:</label>
                    <input id="email_referencia" type="email" name="email_referencia" class="form-control" value="<?php if(isset($exp)){echo $exp->getEmail();}?>"> 
                </div>
                
                <input type="hidden" name="id" value="<?php
                if (isset($exp)) {
                    echo $exp->getId();
                }
                ?>">
                <input type="hidden" name="tipo" value="<?php
                if (isset($exp)) {
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


<script type="text/javascript" data-main="../../resources/js/formExperienciaLaboral" src="../../resources/scripts/require.js"></script>
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
            url: 'save/exp.php',
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