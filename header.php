<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);          
$base = $_SERVER['SERVER_NAME'].'';
include $_SERVER['DOCUMENT_ROOT']."/core/Usuario.php";
include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Perfiles/Usuario_Global.php";
include 'metatags.php';
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
    
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <?php echo $metatag; ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/resources/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script async src="/resources/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/resources/plugins/bxslider/dist/jquery.bxslider.css">
    <link rel="stylesheet" href="/resources/styles/custom-style.css">
    <link rel="stylesheet" href="/resources/styles/interview-style.css">
    <link rel="shortcut icon" type="image/png" sizes="192x192" href="/resources/img/favicons/android-icon-192x192.png">
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="/resources/resources/img/favicons/favicon-32x32.png">
    <link rel="shortcut icon" type="image/png" sizes="96x96" href="/resources/img/favicons/favicon-96x96.png">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/resources/img/favicons/favicon-16x16.png">
</head>

<body>
    <!--Navigation bar-->
    <nav class="navbar navbar-fixed-top box-shadow-gray">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle button-no-border" data-toggle="collapse" data-target="#myNavbar"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span></button>
                    
                 <!--<button type="button" class="navbar-toggle button-no-border"><span class="glyphicon glyphicon-search text-white visible-xs-block" aria-hidden="true"></span>                          
                </button>-->                                  
                <a class="navbar-brand" href="/index.php"><img class="logo" src="/resources/img/logo.png" alt="logo Interview"></a>
            </div>

        <div class="collapse navbar-collapse" id="myNavbar">

            <div class="col-sm-3 col-md-3">
                <form class="navbar-form" role="search" action="/buscador/buscador-index.php">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search_term" placeholder="Buscar ofertas, servicios, perfiles">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            <ul class="nav navbar-nav navbar-right">
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
                    <li class="active"><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/index.php">Inicio</a></li>

                </ul>



        </div>

    </div>
</nav>