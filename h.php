<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/core/Usuario.php";
include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Perfiles/Usuario_Global.php";
$impl = new usuario_global();
$logged= $impl->isLogged();    
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
