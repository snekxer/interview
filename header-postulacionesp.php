<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);          
$base = $_SERVER['SERVER_NAME'].'';
include $_SERVER['DOCUMENT_ROOT']."/core/Usuario.php";
include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Perfiles/Usuario_Global.php";
$impl = new usuario_global();
$logged=$impl->isLogged();    
if($logged){
    $tipo=unserialize($_SESSION['user'])->getTipo();
} else {
    $tipo = '';
}
    switch($tipo){
        case('P'):
              include $_SERVER['DOCUMENT_ROOT']."/includes/include_persona.php";
            break;
        case('E'):
              include $_SERVER['DOCUMENT_ROOT']."/includes/include_empresa.php";
            break;
        case('O'):
              include $_SERVER['DOCUMENT_ROOT']."/includes/include_emprendedor.php";
            break;
        default:
            include $_SERVER['DOCUMENT_ROOT']."/includes/include_global.php";
            break;
    }

    $meta = new meta_global();   
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <title>Interviewec</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/resources/plugins/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/resources/plugins/slick/slick-theme.css">
    <!--
    <link rel="stylesheet" type="text/css" href="/resources/plugins/wysihtml5/bootstrap-wysihtml5-master/lib/css/prettify.css"></link>
     <link rel="stylesheet" type="text/css" href="/resources/plugins/wysihtml5/bootstrap-wysihtml5-master/lib/css/wysiwyg-color.css"></link>
    <link rel="stylesheet" type="text/css" href="/resources/plugins/wysihtml5/bootstrap-wysihtml5-master/src/bootstrap-wysihtml5.css"></link>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/resources/styles/custom-style.css">
    <link rel="stylesheet" href="/resources/styles/interview-style.css">
    <link rel="shortcut icon" type="image/png" sizes="192x192" href="/resources/img/favicons/android-icon-192x192.png">
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="/resources/resources/img/favicons/favicon-32x32.png">
    <link rel="shortcut icon" type="image/png" sizes="96x96" href="/resources/img/favicons/favicon-96x96.png">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/resources/img/favicons/favicon-16x16.png">

    <style type="text/css">
        .panel{
            border-radius: 0px !important
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-fixed-top opaque-navbar mobile-navbar box-shadow-gray">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle button-no-border" data-toggle="collapse" data-target="#myNavbar"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
                    
                 <button type="button" class="navbar-toggle button-no-border"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>                          
                </button>
                <a class="navbar-brand" href="#"><img id="logo" src="/resources/img/logo.png" alt="logo Interview"></a>
            </div>

            <form class="navbar-form navbar-left hidden-xs" role="search" id="buscador">
              <div id="search-bar" class="input-group">
                <input type="text" class="form-control" placeholder="Buscar trabajo, productos, servicios">
                <input type="hidden" name="search_param" value="all" id="search_param">
                <input type="hidden" name="adv" value="S" />
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right hidden-sm">
                <li><a href="http://interview.ec/acerca-de.php">Quiénes somos</a></li>
                <li><a href="http://interview.ec/contacto.php">Contacto</a></li>
       <?php
            if(!$logged){ ?>
               <li><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/auth/login.php">Iniciar sesión</a></li>
        <?php    } else {          ?> 
               <li><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/auth/logout.php">Cerrar Sesión</a></li>
               <li><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/perfiles/<?php switch($tipo){
        case('P'):
              echo 'personas/perfil-personas.php';
            break;
        case('E'):
              echo 'empresas/perfil-empresas.php';
            break;
        case('O'):
              echo 'emprendedores/perfil-emprendedores.php';
            break;}?>"> Mi perfil</a></li>
       <?php    } ?> 
                <li class="active"><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/index.php">Home</a></li>

            </ul>
        </div>
    </div>

        <div id="sidebar" style="height:100%;width:400px;background-color:rgb(217, 217, 217);position:fixed!important;z-index:1;overflow:auto;right: 0;display: none">
            <button type="button" id="close">&times;</button>
            <form action="#" id="formFiltros" name="filtros">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                Información personal</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="edad">Edad:</label>
                                <select id="edad" class="form-control" required>
                                    <?php
                                    $edad = $meta->getAllEdades($link);
                                    foreach ($edad as $edad) {
                                        echo '<option value="'.$edad->getId().'">'.$edad->getNombre().'</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="disponibilidad">Disponibilidad:</label>
                                <select id="disponibilidad" class="form-control" required>
                                <?php
                                $tiempo = $meta->getAllDispTiempo($link);
                                foreach ($tiempo as $tiempo) {
                                    echo '<option value="'.$tiempo->getId().'">'.$tiempo->getNombre().'</option>';
                                }
                                ?>
                                </select>
                            </div>


                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label class="radio-inline">
                                    <input type="radio" id="genero" value="M">Masculino
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="genero" value="F">Femenino
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="genero" value="I">Indistinto
                                </label>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="licencia">Licencia:</label>
                                <select id="licencia" class="form-control" required>
                                <?php
                                $licencias = $meta->getAllLicencias($link);
                                foreach ($licencias as $licencias) {
                                    echo '<option value="'.$licencias->getId().'">'.$licencias->getNombre().'</option>';
                                }
                                ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                                <div class="checkbox" style="margin-top: 0px;">
                                    <label><input id="discapacidad" type="checkbox" name="discapacidad" class="form-control" value="1">  Trabajo apto para personas con capacidades especiales</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                Educación</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="nivel_educacion">Nivel:</label>
                                <select id="nivel_educacion" class="form-control" required>
                                <?php
                                $niveles_educacion = $meta->getAllNivelesEdu($link);
                                foreach ($niveles_educacion as $niveles_educacion) {
                                    echo '<option value="'.$niveles_educacion->getId().'">'.$niveles_educacion->getNombre().'</option>';
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                Experiencia</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="area_experiencia">Área de experiencia:</label>
                                <select id="area_experiencia" class="form-control" required>
                                <?php
                                $areas = $meta->getAllAreas($link);
                                foreach ($areas as $areas) {
                                    echo '<option value="'.$areas->getId().'">'.$areas->getNombre().'</option>';
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                Aspiración Salarial</a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="asp_salarial">Rangos:</label>
                                <select id="asp_salarial" class="form-control" required>
                                <?php
                                $salario = $meta->getAllRangoSal($link);
                                foreach ($salario as $salario) {
                                    echo '<option value="'.$salario->getId().'">'.$salario->getNombre().'</option>';
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
                <button  id="filtrar" onclick="filtrar();" class="btn el-border el-border-azure-radiant bg-white">Filtrar</button>
              
        </form>
        </div>
<script>
    
function filtrar(){
    
    /*var filtrosP = [document.getElementById('edad').value ,
                    document.getElementById('genero').value , 
                    document.getElementById('discapacidad').value 
    ];
    var filtrosC = [document.getElementById('asp_salarial').value,
                    document.getElementById('disponibilidad').value,
                    document.getElementById('licencia').value
    ];            
    var edu = document.getElementById('nivel_educacion').value;
    var area = document.getElementById('area_experiencia').value;*/
    
    $.post("postulaciones_ofertas.php", {
        
        filtrosP: [document.getElementById('edad').value ,
                    document.getElementById('genero').value , 
                    document.getElementById('discapacidad').value ],
                
        filtrosC: [document.getElementById('asp_salarial').value,
                    document.getElementById('disponibilidad').value,
                    document.getElementById('licencia').value],
                
        edu: document.getElementById('nivel_educacion').value,
        
        area: document.getElementById('area_experiencia').value
        
    },
    success: function(){
      $(this).addClass("done");
    }
            
);
    
    
}

</script>
   

</nav>