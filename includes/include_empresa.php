<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    include $_SERVER['DOCUMENT_ROOT']."/data/conn.php";
    
    include $_SERVER['DOCUMENT_ROOT']."/core/Oferta.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Servicio.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Mensaje.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Producto.php";
    
    include $_SERVER['DOCUMENT_ROOT']."/core/Emprendedor/Emprendedor.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Emprendedor/Trayectoria/Trayectoria.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Emprendedor/Trayectoria/Galeria.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Emprendedor/Trayectoria/Proyecto.php";
    
    include $_SERVER['DOCUMENT_ROOT']."/core/Empresa/Empresa.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Empresa/Promocion.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Empresa/Historia/Historia.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Empresa/Historia/Galeria.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Empresa/Historia/Proyecto.php";
    
    include $_SERVER['DOCUMENT_ROOT']."/core/Persona/Persona.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Persona/Portafolio.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Persona/Curriculum/CV.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Persona/Curriculum/Curriculum.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Persona/Curriculum/Competencias.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Persona/Curriculum/Conocimientos.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Persona/Curriculum/Educacion.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Persona/Curriculum/Experiencia.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Persona/Curriculum/Formacion.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Persona/Curriculum/Idioma.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Persona/Curriculum/Referencias.php";
    
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Area.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Ciudad.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Edad.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/EstadoCivil.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Experiencia.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/IdiomaM.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Industria.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Licencia.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/NivelEdu.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/NivelIdioma.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Pais.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Profesion.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Provincia.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Subarea.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Tag.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Tema.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/rangoSalarial.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Uploader.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/uploaderException.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/dispTiempo.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Modalidad.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Contrato.php";
    include $_SERVER['DOCUMENT_ROOT']."/core/Meta/Renumeracion.php";
    
    include $_SERVER['DOCUMENT_ROOT']."/data/Interfaces/CurriculumInt.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Interfaces/EmprendedorInt.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Interfaces/EmpresaInt.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Interfaces/HistoriaInt.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Interfaces/MensajesInt.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Interfaces/OfertasInt.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Interfaces/PersonaInt.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Interfaces/PortafolioInt.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Interfaces/ProductoInt.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Interfaces/ServiciosInt.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Interfaces/TrayectoriaInt.php";
    
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Curriculum/Curriculum_Global.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Historia/Historia_Empresa.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Meta/Buscador.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Meta/Index.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Meta/Meta_Global.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Meta/Notificaciones.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Meta/Tags.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Mensajes/Mensajes_Empresa.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Ofertas/Ofertas_Empresa.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Perfiles/Persona/Persona_Global.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Perfiles/Empresa/Empresa_Empresa.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Perfiles/Emprendedor/Emprendedor_Global.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Portafolio/Portafolio_Global.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Productos/Productos_Empresa.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Servicios/Servicios_Empresa.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Trayectoria/Trayectoria_Global.php";
    
    //include clases y configuracion del TCPDF
    
    $path = $_SERVER['DOCUMENT_ROOT'].'/resources/tcpdf/';
require_once($path.'config/tcpdf_config.php');
require_once($path.'c_tcpdf.php');
// Include the main TCPDF library (search the library on the following directories).
$tcpdf_include_dirs = array(
	realpath($path.'tcpdf.php'),
	'/usr/share/php/tcpdf/tcpdf.php',
	'/usr/share/tcpdf/tcpdf.php',
	'/usr/share/php-tcpdf/tcpdf.php',
	'/var/www/tcpdf/tcpdf.php',
	'/var/www/html/tcpdf/tcpdf.php',
	'/usr/local/apache2/htdocs/tcpdf/tcpdf.php'
);
foreach ($tcpdf_include_dirs as $tcpdf_include_path) {
	if (file_exists($tcpdf_include_path)) {
		require_once($tcpdf_include_path);
		break;
	}
}
    