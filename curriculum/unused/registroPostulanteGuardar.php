<?php
ob_start();
include "funcionesCurriculum.php";
include "conn.php";
include "functions.php";

$email=getUserEmail();
$id=getid($email,'P',$link);
alert($email);
alert($id);
$opc = $_POST["opc"];
$acerca="no tiene nada";
$acerca=$_POST['acercaDe'];



$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$docId=$_POST["docId"];
$idNum=$_POST["idNum"];
$estadoCi=$_POST["estadoCi"];
$fecNac=$_POST["fecNac"];
$lugNac=$_POST["lugNac"];
$provNac=$_POST["provNac"];
$ciuNac=$_POST["ciuNac"];
$lugRe=$_POST["lugRe"];
$provRe=$_POST["provRe"];
$ciuRe=$_POST["ciuRe"];
$telf=$_POST["telfFi"];
$movil=$_POST["movil"];
$area=$_POST["area"];
$subarea=$_POST["subarea"];
$salario=$_POST["aspSa"];
$tiempo=$_POST["disTiem"];
$situacion=$_POST["situa"];
$capacidad=$_POST["capacidad"];



$institucion=$_POST["institucion"];
$fecIni=$_POST["fecIni"];
$titulo=$_POST["titulo"];
$fecFin=$_POST["fecFin"];
$idEducacion=$_POST["IdEducacion"]; //esto sirve para conocer si esta actulizando los datos se manda como parametro
$descripcionEdu=$_POST["descripcionEdu"];

$fecIniExp=$_POST["fecIniExp"];
$empresa=$_POST["nomEmpresa"];
$nivelExp=$_POST["nivelExp"];
$fecFinExp=$_POST["fecFinExp"];
$areaExp=$_POST["areaExp"];
$subareaExp=$_POST["subareaExp"];
$paisExp=$_POST["paisExp"];
$tipoExp=$_POST["tipoExp"];
$descripcionExp=$_POST["descripcionExp"];
$idExp=$_POST["IdExp"];

$idioma=$_POST["idioma"];
$escrito=$_POST["escrito"];
$oral=$_POST["oral"];
$idIdioma=$_POST["IdIdioma"];

$conocimiento=$_POST["conocimiento"];
$nivelCono=$_POST["nivelCono"];
$idCono=$_POST["IdCono"];

$areaInfo=$_POST["areaInfo"];
$conoInfo=$_POST["conoInfo"];
$nivelInfo=$_POST["nivelInfo"];
$idInfo=$_POST["IdInfo"];

$nombreRper=$_POST["nombreRper"];
$telfRper=$_POST["telfRper"];
$relacionRper=$_POST["relacionRper"];
$idRper=$_POST["IdRper"];

$nombreRpro=$_POST["nombreRpro"];
$telfRpro=$_POST["telfRpro"];
$relacionRpro=$_POST["relacionRpro"];
$idRpro=$_POST["IdRpro"];

if($opc=='A'){
    if(ingAcercaTi ($link,$acerca)){
        alert("El registro se ha guardado");
        echo '<meta http-equiv="Refresh" content="0;URL=./postulantes.php?uid="'.$id.'>';
    }
    else{
        alert("Error no se pudo guardar el registro");
    }
}
else if($opc=='B'){
    if(ingCurriculum($link,$nombre,$apellido, null,$fecNac,$lugNac,$provNac,$ciuNac,$lugRe,$provRe,$ciuRe,$telf,$movil,$area,$subarea, $salario,$tiempo,$situacion,$docId,$estadoCi,$capacidad,$idNum)) {
        alert("El registro se ha guardado");
        echo '<meta http-equiv="Refresh" content="0;URL=./postulantes.php?uid="'.$id.'>';
    }
    else{
        alert("Error no se pudo guardar el registro");
        echo '<meta http-equiv="Refresh" content="0;URL=./registroPostulante.php">';
    }

}

else{

    $error="";
    if($acerca!=""){
        if(ingAcercaTi ($link,$acerca)){

        }else{
            $error=$error."acerca de ti, ";
        }
    }

    if($nombre!="" || $idNum!=""){
        if(ingCurriculum($link,$nombre,$apellido, null,$fecNac,$lugNac,$ciuNac,$lugRe,$ciuRe,$telf,$movil,$area,
            $subarea, $salario,$tiempo,$situacion,$docId,$estadoCi,$capacidad,$idNum)) {

        }
        else{
            $error=$error."ing curr, ";
        }
    }

    for($i = 0; $i < count($idEducacion); ++$i){
        //$error=$error.$i;
        if(ingEducacion($link, $institucion[$i], $fecIni[$i], $fecFin[$i], $titulo[$i],$descripcionEdu[$i],$idEducacion[$i])){

        }
        else{
            $error=$error."educa, ";
        }
    }

    for($i = 0; $i < count($idExp); ++$i){

        if(ingExpLab ($link, $empresa[$i], $fecIniExp[$i], $nivelExp[$i], $fecFinExp[$i], $areaExp[$i], $subareaExp[$i], $paisExp[$i], $tipoExp[$i],$descripcionExp[$i], $idExp[$i])){

        }
        else{
            $error=$error."exp lab, ";
        }
    }

    for($i = 0; $i < count($idIdioma); ++$i){

        if(ingIdioma($link, $idioma[$i], $escrito[$i], $oral[$i], $idIdioma[$i])){

        }
        else{
            $error=$error."idioma, ";
        }
    }

    for($i = 0; $i < count($idCono); ++$i){
        if(ingConocimiento($link,$conocimiento[$i],$nivelCono[$i] ,$idCono[$i])){

        }
        else{
            $error=$error."cono, ";
        }
    }

    for($i = 0; $i < count($idInfo); ++$i){
        if(ingInformatica($link,$areaInfo[$i],$conoInfo[$i],$nivelInfo[$i],$idInfo[$i])){

        }
        else{
            $error=$error."info, ";
        }
    }

   for($i = 0; $i < count($idRper); ++$i){
        if(ingRefPer($link,$nombreRper[$i], $telfRper[$i], $relacionRper[$i],$idRper[$i])){

        }
        else{
            $error=$error."ref per, ";
        }
    }

    for($i = 0; $i < count($idRpro); ++$i){
        if(ingRefPro ($link,$nombreRpro[$i], $telfRpro[$i], $relacionRpro[$i], $idRpro[$i])){

        }
        else{
            $error=$error."ref pro, ";
        }
    }
	
    alert("El registro se ha guardado ".$error);
    echo '<meta http-equiv="Refresh" content="0;URL=./postulantes.php?uid="'.$id.'>';
}

ob_end_flush();
?>