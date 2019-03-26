<?php
$url = $_SERVER['REQUEST_URI']; 

switch($url){
    case('/auth/login.php'):
        $metatag = '<title>Inicia sesión | Interview</title>
<meta name="description" content="Accede a Interview a través de correo electrónico y contraseña.">';
        break;
    case('/auth/registro.php'):
        $metatag = '<title>Registrate | Interview</title>
<meta name="description" content="Únete a Interview y forma parte de la mejor red empresarial del Ecuador. A traves de esta red podrás encontrar ofertas de trabajo, requerimientos de servicios y más oportunidades laborales.">';
        break;
    case('/index.php'||'/'):
        $metatag = '<title>Interview: Alguien necesita contratarte. Se parte de Interview la mejor red empresarial del Ecuador</title>
<meta name="description" content="Cada día somos más | Se parte de la red empresarial Interview. Crea perfiles de persona, emprendedor y empresa. Accede a las ofertas laborales y requerimientos de servicios y perfiles empresariales que Interview te ofrece.">';
        break;
    case('/buscador/buscador-index.php'):
        $metatag = '<title>Buscador | Interview</title>
<meta name="description" content="Encuentra perfiles, requerimientos de servicios y nuevas ofertas laborales en un solo lugar. ">';
        break;
    case('/buscador/busqueda_perfiles.php'):
        $metatag = '<title>Buscador de perfiles | Interview</title>
<meta name="description" content="Encuentra perfiles de empresas, emprendedores y personas ">';
        break;
    case('/buscador/busqueda-anuncios-laborales.php'):
        $metatag = '<title>Buscador de anuncios | Interview</title>
<meta name="description" content="Encuentra los mejores de anuncios de servicios y ofertas laborales en todo el Ecuador">';
        break;
    case('/perfiles/empresas/perfil-empresas.php'):
        $metatag = '<title>Pefil de empresas | Interview</title>
<meta name="description" content="Optimiza recursos con el sistema de selección de personal que provee el perfil.">';
        break;
    case('/perfiles/emprendedores/perfil-emprendedores.php'):
        $metatag = '<title>Perfil de emprendedores | Interview</title>
<meta name="description" content="Oferta tus servicios. Promociona tu marca. Posicionate en el mercado.">';
        break;
    case('/perfiles/personas/perfil-personas.php'):
        $metatag = '<title>Pefiles de Personas | Interview</title>
<meta name="description" content="Destaca como profesional y postula a ofertas de trabajo.">';
        break;
    case('/acerca/contacto.php'):
        $metatag = '<title>Contáctanos | Interview</title>
<meta name="description" content="Contacta con nosotros a traves del teléfono, dirección de correo y redes sociales, o escribenos.">';
        break;
    case('/acerca/terminos-y-condiciones.php'):
        $metatag = '<title>Términos y Condiciones| Interview</title>
<meta name="description" content="Conoce nuestros términos y condiciones con respecto al uso de información y contenidos visuales y audiovisuales.">';
        break;
    case('/acerca/politicas-y-privacidad.php'):
        $metatag = '<title>Políticas y privacidad | Interview</title>
<meta name="description" content="Esta Política de privacidad se aplica a Interview.ec, a las aplicaciones de la marca Interview, y a otros sitios relacionados.">';
        break;
    case('/acerca/faq.php'):
        $metatag = '<title>Preguntas frecuentes | Interview</title>
<meta name="description" content="Encuentra la respuesta a las preguntas frecuentes sobre ciertas secciones de Interview. Como postular a un servicio? Como crear una oferta? 
Como subir un video? Como crear mi CV? Como buscar ofertas y servicios?">'; 
        break;
        
}


