<?php

include $_SERVER['DOCUMENT_ROOT'] . "/h.php";
//error_reporting(0);

$impl = new usuario_global();
$usuario = new usuario();

$usuario->setEmail($_POST['email']);
//$usuario->setUsername($_POST['username']);
$usuario->generateUsername($link);
$usuario->setTipo($_POST['tipo_usuario']);
$usuario->setContrasena($_POST['password_confirmation']);


if ($impl->registro($usuario, $link)) {
    switch (unserialize($_SESSION['user'])->getTipo()) {
        case('P'):
            include '../data/Functions/Perfiles/Persona/Persona_Persona.php';
            include '../data/Functions/Curriculum/Curriculum_Persona.php';
            $perl = new persona_persona;
            $per = new persona;
            $per->setNombres($_POST['nombres']);
            $per->setApellidos($_POST['apellidos']);
            $per->setArea($_POST['areas']);
            $per->setSubarea(0);
            $per->setPais(1);
            $per->setProvincia(0);
            $per->setCiudad(0);
            $per->setProfesion(0);
            if($perl->newPersona($per, $link)){
                $currl = new curriculum_persona;
                $curr = new curriculum;
                $curr->setAspSalarial(0);
                $curr->setDiscapacidad(0);
                $curr->setDiscapacidadDetalle(' ');
                $curr->setDispTiempo(0);
                $curr->setLicencia(0);
                $curr->setSituacionAct(0);
                $curr->setPersona($impl->getMyUsr($link));
                if($currl->newCurriculum($curr, $link)){
                    header('Location: https://interview.ec/perfiles/personas/perfil-personas.php');
                }
            }
            break;
        case('E'):
            include '../data/Functions/Perfiles/Empresa/Empresa_Empresa.php';
            $empl = new empresa_empresa;
            $emp = new empresa;
            $emp->setNombre($_POST['nombre']);
            $emp->setIndustria($_POST['industria']);
            $emp->setPais(1);
            $emp->setProvincia(0);
            $emp->setCiudad(0);
            if($empl->newEmpresa($emp, $link)){
               header('Location: https://interview.ec/perfiles/empresas/perfil-empresas.php');
                
            }
            break;
        case('O'):
            include '../data/Functions/Perfiles/Emprendedor/Emprendedor_Emprendedor.php';
            $ompl = new emprendedor_emprendedor;
            $omp = new emprendedor;
            $omp->setNombre($_POST['nombre']);
            $omp->setIndustria($_POST['industria']);
            $omp->setPais(1);
            $omp->setProvincia(0);
            $omp->setCiudad(0);
            if($ompl->newEmprendedor($omp, $link)){
                header('Location: https://interview.ec/perfiles/emprendedores/perfil-emprendedores.php');
            }
            break;
        default:
            header('Location: https://interview.ec/404.html');
            break;
    }
} else {
    header('Location: https://interview.ec/auth/registro.php');
}
?>