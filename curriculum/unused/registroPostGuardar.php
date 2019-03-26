<?php
ob_start();
include "funcionesCurriculum.php";
include "conn.php";
include "functions.php";

$email=getUserEmail();
$id=getid($email,'P',$link);

$opc = $_POST["opc"];
$acerca="no tiene nada";
$acerca=$_POST['acercaDe'];



$nombre=$_POST["nombre"];
$docId=$_POST["docId"];
$idNum=$_POST["idNum"];
$estadoCi=$_POST["estadoCi"];
$fecNac=$_POST["fecNac"];
$lugRe=$_POST["lugRe"];
$provRe=$_POST["provRe"];
$ciuRe=$_POST["ciuRe"];
$telf=$_POST["telfFi"];
$movil=$_POST["movil"];
$area=$_POST["area"];
$salario=$_POST["aspSa"];
$tiempo=$_POST["disTiem"];
$situacion=$_POST["situa"];
$capacidad=$_POST["capacidad"];



if($opc=='A'){
    if(ingInfo ($link,$acerca)){
        alert("El registro se ha guardado");
        echo '<meta http-equiv="Refresh" content="0;URL=./miperfil.php">';
    }
    else{
        alert("Error no se pudo guardar el registro");
    }
}
else if($opc=='B'){
    if(ingPostulante($link,$nombre,$fecNac,$ciuRe,$movil,$area)) {
        alert("El registro se ha guardado ");
        echo '<meta http-equiv="Refresh" content="0;URL=./miperfil.php">';
    }
    else{
        alert("Error no se pudo guardar el registro");
        echo '<meta http-equiv="Refresh" content="0;URL=./miperfil.php">';
    }

}

else{

    $error="";
    if($acerca!=""){
        if(ingInfo ($link,$acerca)){

        }else{
            $error=$error."acerca de ti, ";
        }
    }

    if($nombre!="" || $idNum!=""){
        if(ingPostulante($link,$nombre,$fecNac,$ciuRe,$movil,$area)) {

        }
        else{
            $error=$error."ing curr, ";
        }
    }
	
    alert("El registro se ha guardado ".$error);
    echo '<meta http-equiv="Refresh" content="0;URL=./miperfil.php>';
}

ob_end_flush();
?>