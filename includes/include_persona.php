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
    
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Curriculum/Curriculum_Persona.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Historia/Historia_Global.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Meta/Buscador.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Meta/Index.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Meta/Meta_Global.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Meta/Notificaciones.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Meta/Tags.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Mensajes/Mensajes_Persona.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Ofertas/Ofertas_Persona.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Perfiles/Persona/Persona_Persona.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Perfiles/Empresa/Empresa_Global.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Perfiles/Emprendedor/Emprendedor_Global.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Portafolio/Portafolio_Persona.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Productos/Productos_Global.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Servicios/Servicios_Persona.php";
    include $_SERVER['DOCUMENT_ROOT']."/data/Functions/Trayectoria/Trayectoria_Global.php";