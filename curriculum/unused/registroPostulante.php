<?php ob_start(); ?>
<!DOCTYPE html>
    <html>

    <head>
        <title>Interview Demo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main_.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../js/buscador.js" type="text/javascript"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

        <style>
            @font-face {
                font-family: Century Gothic;
                src: url('../font/Century-Gothic.ttf');
            }            
            body,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: "Century Gothic", sans-serif
            }
            
            body,
            html {
                height: 100%;
                line-height: 1.8;
            }
            
            .temp-bar .temp-button {
                padding: 16px;
            }
        </style>
        
    </head>
<?php

include "conn.php";
include "functions.php";
include "funcionesCurriculum.php";
include "functionsF.php";

$email=getCookieEmail();

/*if(!islogu()){

    echo "Acceso a esta página prohibido. Inicie sesión.";
    echo '<meta http-equiv="Refresh" content="2;URL=http://interviewec.com">';

}else {*/

    ?>
    <body>

  <!-- Navbar -->
        <div class="temp-top bgNavbar " style="z-index:999;">
            <div class="temp-bar temp-text-white container" id="myNavbar">
                <a href="#home" class="temp-bar-item temp-button temp-wide"><img class="img-responsive center-block" src="../img/logo.png" style="width:190px"></a>
                <!-- Right-sided navbar links -->
                <div class="temp-right temp-hide-small temp-hide-medium" style="margin-top:10px;">
                    <a href="#quienes-somos" class="temp-bar-item temp-button">Quiénes Somos</a>
                    <a href="#contacto" class="temp-bar-item temp-button"> Contacto</a>
                    <a class="temp-bar-item temp-button" data-toggle="modal" data-target="#modal-login"> Iniciar Sesión</a>
                    <a id="login-nv" href="http://interviewec.com" class="temp-bar-item temp-button"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a>

                </div>
                <!-- extra -->

                <a href="javascript:void(0)" class="temp-bar-item temp-button temp-right temp-hide-large" onclick="temp_open()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>

        <!-- Sidebar-->
        <nav class="temp-sidebar temp-bar-block temp-black temp-card-2 temp-animate-left temp-hide-medium temp-hide-large" style="display:none;z-index:999;" id="mySidebar">
            <a href="javascript:void(0)" onclick="temp_close()" class="temp-bar-item temp-button temp-large temp-padding-16">Cerrar &times;</a>
            <a href="#q" onclick="temp_close()" class="temp-bar-item temp-button">Quiénes Somos</a>
            <a href="#c" onclick="temp_close()" class="temp-bar-item temp-button">Contacto</a>

            <a class="temp-bar-item temp-button" data-toggle="modal" data-target="#modal-login">Iniciar Sesión</a>
            <a href="#i" onclick="temp_close()" class="temp-bar-item temp-button">Inicio</a>
        </nav>
        

    <!-- Content Section -->
    <div class="container temp-dark-grey" style="padding: 128px 0px 0px 0px;" > 
         <h2 class="temp-left-align temp-text-blue">Completa tu perfil</h2>
 <div class="row">
     <div class="col-xs-12 col-sm-12">
    <a href="http://interviewec.com/empresasmod.php?eid=<?php echo $regresar; ?>"><div class="temp-col m20 tablink  temp-hover-blue temp-padding  temp-light-grey">Volver</div></a>

    <a href="javascript:void(0)">
        <div class="temp-col m20 tablink  temp-hover-blue temp-padding temp-dark-blue">Información básica</div>
    </a>

    <a href="javascript:void(0)" class="hidden-xs">
        <div class="temp-col m20 tablink   temp-padding "></div>
    </a>
    <a href="javascript:void(0)" class="hidden-xs">
        <div class="temp-col m20 tablink   temp-padding ="></div>
    </a>

    <div class="col-xs-12 col-sm-12" style="padding-top:10px">
        <div class="temp-dark-blue row" style="margin-top:-15px;">
            <p> *Los campos marcados (*) son obligatorios</p>
        </div>
    </div>
</div>
</div>   
    </div>
        
        
       
        
        <div class="container temp-padding">
    <form action="registroPostulanteGuardar.php" method="post">
        <div class="temp-margin-bottom">
            <p>
                <label>Acerca de tí <span class="temp-opacity "style="font-size:10px;">Máximo 600 carácteres*</span>*</label>
             <textarea rows="10" style="width:100%" maxlength="600" id="acercaD" name="acercaDe"><?php echo getAcercaTi($link); ?></textarea>
            </p>
            <input type="hidden" name="opc" value="A">

            <div>
                <button class="temp-button temp-dark-blue temp-round" type="submit">Guardar</button>
            </div>
        </div>
    </form>


    <div class="temp-light-blue temp-margin-top">
        <p class="temp-text-black " style="margin-left:40px;">Información básica:<span class="temp-text-grey temp-margin-left text-right">*Los
                        campos marcados (*) son obligatorios</span></p>
    </div>

    <form class="form-inline" action="registroPostulanteGuardar.php" method="post">
        
         
        <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
             <label>*Nombre:</label>
                    <input type="text" style="width:100%" class="temp-round" name="nombre" id="nombre" value="<?php echo pgetNombre($link); ?>">
            </div>
             
             <div class="form-group col-xs-12 col-sm-6">
                  <label>*Apellido:</label>
                    <input type="text" style="width:100%" class="temp-round" name="apellido" id="apellido"
                           value="<?php echo pgetApellido($link); ?>">
            </div>
        </div>   
        
        
         
             
        <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
                <label>*Documento de identidad:</label>
                    <select class="selectpicker" id="docId" name="docId" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $arregloDocId = ['pasaporte', 'cedula'];
                        $aux1 = pgetDocId($link);
                        if ($aux1 != null) {
                            echo '<option selected value="' . $aux1 . '">' . $aux1 . '</option>';
                            foreach ($arregloDocId as $i) {
                                if (strcmp($i, $aux1) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloDocId as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
            </div>
             
             <div class="form-group col-xs-12 col-sm-6">
                  <label>*No. de Documento de identificación:</label>
                    <input type="text" style="width:100%" class="temp-round" id="idNum" name="idNum"
                           value="<?php echo pgetIdNum($link); ?>">
            </div>
        </div>   
        
        
         <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
              <label>*Estado Civíl:</label>
                    <select class="selectpicker" id="estadoCi" name="estadoCi" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $arregloEstadoCi = ['soltero', 'casado', 'divorciado'];
                        $aux2 = pgetEstadoCivil($link);
                        if ($aux2 != null) {
                            echo '<option selected value="' . $aux2 . '">' . $aux2 . '</option>';
                            foreach ($arregloEstadoCi as $i) {
                                if (strcmp($i, $aux2) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloEstadoCi as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
            </div>
             
             <div class="form-group col-xs-12 col-sm-6">
                  <label>*Fecha de nacimiento:</label>
                    <input id="fecNac" name="fecNac" style="width:100%;marging-top:20px" type="date"
                           max="<?php echo date("Y-m-d"); ?>" value="<?php echo pgetFecNac($link); ?>">
            </div>
        </div>   
        
        
        
         
         <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
             <label>*Lugar de nacimiento (País):</label>
                    <select class="selectpicker" id="lugNac" name="lugNac" style="width:100%;marging-top:20px"
                            onchange="cargarProvN(this.value)">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $aux3 = array();
                        $aux3 = pgetLugNac($link);
                        if ($aux3[0] != null || $aux3[0] != "") {
                            echo '<option selected value="' . $aux3[0] . '">' . $aux3[1] . '</option>';
                        } else {

                        } ?>
                        <?php
                        $paises = array();
                        $paises = getTodasPaises($link);

                        foreach ($paises as $v1) {
                            if ($v1[0] == $aux3[0]) {

                            } else {
                                echo '<option value="' . $v1[0] . '">' . $v1[1] . '</option>';
                            }
                        } ?>
                    </select>
            </div>
             
             <div class="form-group col-xs-12 col-sm-6">
                  <label >*Provincia:</label><br>
                         <select id="provNac" name="provNac" style="width:100%" class="selectpicker" onchange="cargarCiuN(this.value)">
                     <option>-Seleccione un valor-</option>
                     <?php
                     if ($prinOfer[20] != null || $prinOfer[20] != "") {
                         echo '<option selected value="' . $prinOfer[20] . '">' . $prinOfer[21] . '</option>';
                     } else {

                     } ?>
                     <?php
                     $provinciaR = array();
                     $provinciaR = getTodasProvincias($link);

                     foreach ($provinciaR as $v1) {
                         if ($v1[0] == $prinOfer[20]) {

                         } else {
                             echo '<option value="' . $v1[0] . '">' . $v1[1] . '</option>';
                         }
                     } ?>
                    </select>
            </div>
        </div>   
        
        
           
         <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
            <label>*(Ciudad):</label>
                    <select class="selectpicker" id="ciuNac" name="ciuNac" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $aux4 = array();
                        $aux4 = pgetCiuNac($link);
                        if ($aux4[0] != null || $aux4[0] != "") {
                            echo '<option selected value="' . $aux4[0] . '">' . $aux4[1] . '</option>';
                        } else {

                        }
                        ?>
                    </select>
            </div>
             
        </div>   
        
        
        
        
           
         <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
              <label>*Lugar de Residencia:</label>
                    <select class="selectpicker" id="lugRe" name="lugRe" style="width:100%;marging-top:20px"
                            onchange="cargarProv(this.value)">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $aux5 = array();
                        $aux5 = pgetLugRes($link);
                        if ($aux5[0] != null || $aux5[0] != "") {
                            echo '<option selected value="' . $aux5[0] . '">' . $aux5[1] . '</option>';
                        } else {
                        } ?>
                        <?php
                        $paisesResi = array();
                        $paisesResi = getTodasPaises($link);

                        foreach ($paisesResi as $v1) {
                            if ($v1[0] == $aux5[0]) {

                            } else {
                                echo '<option value="' . $v1[0] . '">' . $v1[1] . '</option>';
                            }
                        } ?>
                    </select>
            </div>
             
             <div class="form-group col-xs-12 col-sm-6">
                  <label >*Provincia:</label><br>
                         <select id="provRe" name="provRe" style="width:100%" class="selectpicker" onchange="cargarCiuR(this.value)">
                     <option>-Seleccione un valor-</option>
                     <?php
                     if ($prinOfer[20] != null || $prinOfer[20] != "") {
                         echo '<option selected value="' . $prinOfer[20] . '">' . $prinOfer[21] . '</option>';
                     } else {

                     } ?>
                     <?php
                     $provinciaR = array();
                     $provinciaR = getTodasProvincias($link);

                     foreach ($provinciaR as $v1) {
                         if ($v1[0] == $prinOfer[20]) {

                         } else {
                             echo '<option value="' . $v1[0] . '">' . $v1[1] . '</option>';
                         }
                     } ?>
                    </select>
            </div>
        </div>   
        
        
        
        
        
        <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
            <label>*Ciudad:</label>
                    <select class="selectpicker" id="ciuRe" name="ciuRe" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $aux6 = array();
                        $aux6 = pgetCiuRes($link);
                        if ($aux6[0] != null || $aux6[0] != "") {
                            echo '<option selected value="' . $aux6[0] . '">' . $aux6[1] . '</option>';
                        } else {
                        }
                        ?>
                    </select>
            </div>
        
        </div>    
        
        
        
        
        
        <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
               <label>*Teléfono Fijo:</label>
                    <input type="text" style="width:100%" class="temp-round" id="telfFi" name="telfFi"
                           value="<?php echo pgetTelf($link); ?>">
            </div>
             
             <div class="form-group col-xs-12 col-sm-6">
                  <label>*Teléfono Móvil:</label>
                    <input type="text" style="width:100%" class="temp-round" id="movil" name="movil"
                           value="<?php echo pgetMovil($link); ?>">
            </div>
        </div>   
        
        
          
        <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
             <label>*Área de Trabajo:</label>
                    <select class="selectpicker" id="area" name="area" style="width:100%;marging-top:20px"
                            onchange="loadSubarea(this.value)">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $aux7 = array();
                        $aux7 = pgetAreaPos($link);
                        if ($aux7[0] != null || $aux7[0] != "") {
                            echo '<option selected value="' . $aux7[0] . '">' . $aux7[1] . '</option>';
                        } else {
                        } ?>
                        <?php
                        $areasList = array();
                        $areasList = getArea($link);

                        foreach ($areasList as $v1) {
                            if ($v1[0] == $aux7[0]) {

                            } else {
                                echo '<option value="' . $v1[0] . '">' . $v1[1] . '</option>';
                            }
                        } ?>
                    </select>
            </div>
             
        </div>   
        

          
        <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
            <label>*Aspiración Salarial:</label>
                    <select class="selectpicker" id="aspSa" name="aspSa" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $arregloAspSal = ['$400-$600', '$700-$900', '$1000-$1200'];
                        $aux9 = pgetAspSa($link);
                        if ($aux2 != null) {
                            echo '<option selected value="' . $aux9 . '">' . $aux9 . '</option>';
                            foreach ($arregloAspSal as $i) {
                                if (strcmp($i, $aux9) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloAspSal as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
            </div>
             
             <div class="form-group col-xs-12 col-sm-6">
                  <label>*Disponibilidad de Tiempo:</label>
                    <select class="selectpicker" id="disTiem" name="disTiem" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $arregloDisTiem = ['Completo', 'Parcial', 'Nocturno'];
                        $aux10 = pgetDisTiem($link);
                        if ($aux10 != null) {
                            echo '<option selected value="' . $aux10 . '">' . $aux10 . '</option>';
                            foreach ($arregloDisTiem as $i) {
                                if (strcmp($i, $aux10) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloDisTiem as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
            </div>
        </div>   
        
        
            
        <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
             <label>*Situación Actual:</label>
                    <select class="selectpicker" id="situa" name="situa" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $arregloSitua = ['Desempleado', 'Trabajando'];
                        $aux11 = pgetSituaLab($link);
                        if ($aux11 != null) {
                            echo '<option selected value="' . $aux11 . '">' . $aux11 . '</option>';
                            foreach ($arregloSitua as $i) {
                                if (strcmp($i, $aux11) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloSitua as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
            </div>
             
             <div class="form-group col-xs-12 col-sm-6">
                  <label>*Posee Alguna Capacidad Especial:</label>
                    <input type="text" style="width:100%" class="temp-round" id="capacidad" name="capacidad"
                           value="<?php echo pgetCapEsp($link); ?>">
             
                <input type="hidden" name="opc" value="B">
            </div>
        </div>   
        
             
        <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
              <button class="temp-button temp-dark-blue btn-sm"  type="submit">Guardar
                    </button>
            </div>
             
             <div class="form-group col-xs-12 col-sm-6">
                  <p class="temp-right" style="width:100%">*Recuerda que mientras
                    más campos completes, más oportunidades te llegarán.
                </p>
            </div>
        </div>   
        
    
    </form>
    
   
    <div class="temp-light-blue temp-margin-top">
        <p class="temp-text-black " style="margin-left:40px;">Información básica <span class="temp-text-grey temp-margin-left text-right">*Los
                        campos marcados (*) son obligatorios</span></p>
    </div>

    <form class="form-inline" action="registroPostulanteGuardar.php" method="post">
        <div class="temp-light-blue temp-margin-top">
            <p class="temp-text-black " style="margin-left:40px;">Educación:</p>
        </div>
        
         <div id="EduForm">
                <?php
                $prinEdu2 = array();
                $prinEdu2 = getEducacion($link);

                if($prinEdu2[0][0]=="" || $prinEdu2[0][0]==null){
                    $prinEdu2[0][0]=null;
                    $prinEdu2[0][1]=null;
                    $prinEdu2[0][2]=null;
                    $prinEdu2[0][3]=null;
                    $prinEdu2[0][4]=null;
                    $prinEdu2[0][5]=null;
                }

                foreach($prinEdu2 as $prinEdu){
                ?>
        
        
          <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
             <label>Institución:</label>
                    <select class="selectpicker" id="institucion" name="institucion[]" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $arregloInst = ['UEES', 'Catolica', 'Casa Grande', 'Estatal', 'ESPOL'];
                        if ($prinEdu[1] != null) {
                            echo '<option selected value="' . $prinEdu[1] . '">' . $prinEdu[1] . '</option>';
                            foreach ($arregloInst as $i) {
                                if (strcmp($i, $prinEdu[1]) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloInst as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
            </div>
             
             <div class="form-group col-xs-12 col-sm-6">
                  <label>Fecha de inicio:</label>
                    <input type="date" id="fecIni" name="fecIni[]" style="width:100%;marging-top:20px"
                           max="<?php echo date("Y-m-d"); ?>" value="<?php echo $prinEdu[3]; ?>">
            </div>
        </div>   
        
        
         <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
            <label>Título obtenido:</label>
                    <select class="selectpicker" id="titulo" name="titulo[]" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $arregloTitulo = ['Ing. sistemas', 'Ing. telecomunicacion', 'Ing. electronica', 'Ing. mecanico'];
                        if ($prinEdu[2] != null) {
                            echo '<option selected value="' . $prinEdu[2] . '">' . $prinEdu[2] . '</option>';
                            foreach ($arregloTitulo as $i) {
                                if (strcmp($i, $prinEdu[2]) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloTitulo as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
            </div>
             
             <div class="form-group col-xs-12 col-sm-6">
                  <label>Fecha de Culminación:</label>
                    <input type="date" id="fecFin" name="fecFin[]" style="width:100%;marging-top:20px"max="<?php echo date("Y-m-d"); ?>" value="<?php echo $prinEdu[4]; ?>">
            </div>
        </div>   
        
            <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
            <label>Descripción:</label>
                    <input type="text" style="width:100%" class="temp-round" placeholder="Hasta 150 caracteres"
                           id="descripcionEdu" name="descripcionEdu[]" value="<?php echo $prinEdu[5]; ?>">
            
                <input type="hidden" name="IdEducacion[]" value="<?php echo $prinEdu[0]; ?>">
                
            </div>
             
        </div>  
             
             <?php }?>
                </div>
        
     <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
            <button id="addEdu" type="button" class="temp-button temp-dark-blue btn-sm" style="margin-top:20px">Agregar
                    Educación
                </button>

            </div>
             

        </div>   
        

        <div class="temp-light-blue temp-margin-top">
            <p class="temp-text-black " style="margin-left:40px;">Experiencia laboral:</p>
        </div>
        
   
            <div id="ExpForm">

                <?php
                $prinExp2 = array();
                $prinExp2 = getExpLab($link);
                if($prinExp2[0][0]=="" || $prinExp2[0][0]==null){
                    $prinExp2[0][0]=null;
                    $prinExp2[0][1]=null;
                    $prinExp2[0][2]=null;
                    $prinExp2[0][3]=null;
                    $prinExp2[0][4]=null;
                    $prinExp2[0][5]=null;
                    $prinExp2[0][6]=null;
                    $prinExp2[0][7]=null;
                    $prinExp2[0][8]=null;
                    $prinExp2[0][9]=null;
                    $prinExp2[0][10]=null;
                    $prinExp2[0][11]=null;
                    $prinExp2[0][12]=null;
                }
                foreach($prinExp2 as $prinExp){
                ?>
                
                
                
               <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
             <label>Empresa:</label>
                    <input id="nomEmpresa" name="nomEmpresa[]" type="text" style="width:100%" class="temp-round"
                           placeholder="Empresa" value="<?php echo $prinExp[1]; ?>">

            </div>
            
                   <div class="form-group col-xs-12 col-sm-6">
          <label>Fecha de inicio:</label>
                    <input type="date" id="fecIniExp" name="fecIniExp[]" style="width:100%;marging-top:20px"
                           max="<?php echo date("Y-m-d"); ?>" value="<?php echo $prinExp[2]; ?>">
            </div>
             

        </div>   
                
                
                   <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
               <label>Nivel:</label>
                    <select class="selectpicker" id="nivelExp" name="nivelExp[]" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $arregloNivel = ['Operador', 'Administrador', 'Jefe de proyectos'];
                        if ($prinExp[3] != null) {
                            echo '<option selected value="' . $prinExp[3] . '">' . $prinExp[3] . '</option>';
                            foreach ($arregloNivel as $i) {
                                if (strcmp($i, $prinExp[3]) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloNivel as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
            </div>
            
                   <div class="form-group col-xs-12 col-sm-6">
         <label>Fecha de Culminación:</label>
                    <input type="date" id="fecFinExp" name="fecFinExp[]" style="width:100%;marging-top:20px"
                           max="<?php echo date("Y-m-d"); ?>" value="<?php echo $prinExp[4]; ?>">
            </div>
             

        </div>   
          
         <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
                 <label>Área:</label>
                    <select class="selectpicker" id="areaExp" name="areaExp[]" style="width:100%;marging-top:20px"
                            onchange="loadSubarea2(this.value,0)">
                        <option>-Seleccione un valor-</option>
                        <?php
                        if ($prinExp[5] != null || $prinExp[5] != "") {
                            echo '<option selected value="' . $prinExp[5] . '">' . $prinExp[10] . '</option>';
                        } else {

                        } ?>
                        <?php
                        $areasList2 = array();
                        $areasList2 = getArea($link);

                        foreach ($areasList2 as $v1) {
                            if ($v1[0] == $prinExp[5]) {

                            } else {
                                echo '<option value="' . $v1[0] . '">' . $v1[1] . '</option>';
                            }
                        } ?>
                    </select>

            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
       <label>Sub-área:</label>
                    <select class="selectpicker" id="subareaExp0" name="subareaExp[]" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        if ($prinExp[6] != null || $prinExp[6] != "") {
                            echo '<option selected value="' . $prinExp[6] . '">' . $prinExp[11] . '</option>';
                        } else {

                        }
                        ?>
                    </select>
            </div>
             

        </div>   
                
                
           <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
               <label>País:</label>
                    <select class="selectpicker" id="paisExp" name="paisExp[]" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        if ($prinExp[7] != null || $prinExp[7] != "") {
                            echo '<option selected value="' . $prinExp[7] . '">' . $prinExp[12] . '</option>';
                        } else {

                        } ?>
                        <?php
                        $paisesList = array();
                        $paisesList = getTodasPaises($link);

                        foreach ($paisesList as $v1) {
                            if ($v1[0] == $prinExp[7]) {

                            } else {
                                echo '<option value="' . $v1[0] . '">' . $v1[1] . '</option>';
                            }
                        } ?>
                    </select>
            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
       <label>Tipo de Empresa:</label>
                    <select class="selectpicker" id="tipoExp" name="tipoExp[]" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $arregloTipo = ['Agenia de viajes', 'tipo2', 'tipo3'];
                        if ($prinExp[8] != null) {
                            echo '<option selected value="' . $prinExp[8] . '">' . $prinExp[8] . '</option>';
                            foreach ($arregloTipo as $i) {
                                if (strcmp($i, $prinExp[8]) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloTipo as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
            </div>
             

        </div>   
                  
                
               <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
               <label>Descripción del Cargo:</label>
                    <input id="descripcionExp" name="descripcionExp[]" type="text" placeholder="Hasta 150 caracteres" style="width:100%;marging-top:20px"
                           value="<?php echo $prinExp[9]; ?>">
                  <input type="hidden" name="IdExp[]" value="<?php echo $prinExp[0]; ?>">
            </div>

        </div>   
                       <?php } ?>
            </div>
                
   <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
                <button id="addExp" type="button" class="temp-button temp-dark-blue btn-sm" style="margin-top:20px">Agregar
                    Experiencia
                </button>
            </div>
        
        </div>   
                  
                
        
     

        <div class="temp-light-blue temp-margin-top">
            <p class="temp-text-black " style="margin-left:40px;">Idiomas:</p>
        </div>

            <div id="IdioForm">
                <?php
                $prinIdio2 = array();
                $prinIdio2 = getIdioma($link);

                if($prinIdio2[0][0]=="" || $prinIdio2[0][0]==null){
                    $prinIdio2[0][0]=null;
                    $prinIdio2[0][1]=null;
                    $prinIdio2[0][2]=null;
                    $prinIdio2[0][3]=null;
                    $prinIdio2[0][4]=null;
                }

                foreach($prinIdio2 as $prinIdio){

                ?>
                
          <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
                  <label>Idioma:</label>
                    <select class="selectpicker" id="idioma" name="idioma[]" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $arregloIdio = ['Ingles', 'Frances', 'Aleman', 'Japones'];
                        if ($prinIdio[1] != null) {
                            echo '<option selected value="' . $prinIdio[1] . '">' . $prinIdio[1] . '</option>';
                            foreach ($arregloIdio as $i) {
                                if (strcmp($i, $prinIdio[1]) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloIdio as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>

            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
       <label>Escrito:</label>
                    <select class="selectpicker" id="escrito" name="escrito[]" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        $arregloNivelIdio = ['Alto', 'Medio', 'Bajo'];
                        if ($prinIdio[2] != null) {
                            echo '<option selected value="' . $prinIdio[2] . '">' . $prinIdio[2] . '</option>';
                            foreach ($arregloNivelIdio as $i) {
                                if (strcmp($i, $prinIdio[2]) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloNivelIdio as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
            </div>
             

        </div>   
                  
                
            <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
               <label>Oral:</label>
                    <select class="selectpicker" id="oral" name="oral[]" style="width:100%;marging-top:20px">
                        <option>-Seleccione un valor-</option>
                        <?php
                        if ($prinIdio[3] != null) {
                            echo '<option selected value="' . $prinIdio[0][3] . '">' . $prinIdio[3] . '</option>';
                            foreach ($arregloNivelIdio as $i) {
                                if (strcmp($i, $prinIdio[3]) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloNivelIdio as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
                
                <input type="hidden" name="IdIdioma[]" value="<?php echo $prinIdio[0]; ?>">
            </div>

        </div>   
                  <?php } ?>

            </div>

                  
 
     <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
               <button id="addIdio" type="button" class="temp-button temp-dark-blue btn-sm" style="margin-top:20px">Agregar
                    Idioma
                </button>
            </div>
 
        </div>   
                  
                
                

        <div class="temp-light-blue temp-margin-top">
            <p class="temp-text-black " style="margin-left:40px;">Conocimientos Adicionales:</p>
        </div>
            

            <div id="ConoForm">
                <?php
                $prinCono2 = array();
                $prinCono2 = getConocimiento($link);

                if($prinCono2[0][0]=="" || $prinCono2[0][0]==null){
                    $prinCono2[0][0]=null;
                    $prinCono2[0][1]=null;
                    $prinCono2[0][2]=null;
                }

                foreach($prinCono2 as $prinCono){
                ?>
                
                 
                <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
             <label>Conocimiento:</label>
                    <input name="conocimiento[]" id="conocimiento" type="text" style="width:100%" class="temp-round"
                           placeholder="Animación 3D" value="<?php echo $prinCono[1]; ?>">
            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
             <label>Nivel:</label>
                    <select class="selectpicker" name="nivelCono[]" id="nivelCono" style="width:100%" class="temp-round">
                        <?php
                        $arregloNivelCono = ['-Seleccione un valor-','Avanzado', 'Intermedio', 'Principiante'];
                        if ($prinCono[2] != null) {
                            echo '<option selected value="' . $prinCono[2] . '">' . $prinCono[2] . '</option>';
                            foreach ($arregloNivelCono as $i) {
                                if (strcmp($i, $prinCono[2]) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloNivelCono as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
               
                <input type="hidden" name="IdCono[]" value="<?php echo $prinCono[0]; ?>">

            </div>
             

        </div>   
                  <?php } ?>
            </div>
                
                
                
                    
                <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
                 <button id="addCono" type="button" class="temp-button temp-dark-blue btn-sm" style="margin-top:20px">Agregar
                    Conocimiento
                </button>
            </div>

        </div>   
                
                

        <div class="temp-light-blue temp-margin-top">
            <p class="temp-text-black " style="margin-left:40px;">Informática:</p>
        </div>
            <div id="InfoForm">
                <?php
                $prinInfo2 = array();
                $prinInfo2 = getInformatica($link);

                if($prinInfo2[0][0]==null || $prinInfo2[0][0]==""){
                    $prinInfo2[0][0]=null;
                    $prinInfo2[0][1]=null;
                    $prinInfo2[0][2]=null;
                    $prinInfo2[0][3]=null;
                }

                foreach($prinInfo2 as $prinInfo){
                ?>
                
                 <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
             <label>Área:</label>
                    <select class="selectpicker" id="areaInfo" name="areaInfo[]" style="width:100%;marging-top:20px">
                        <?php
                        $arregloAreaInfo = ['-Seleccione un valor-','Area1', 'Area2', 'Area3'];
                        if ($prinInfo[1] != null) {
                            echo '<option selected value="' . $prinInfo[1] . '">' . $prinInfo[1] . '</option>';
                            foreach ($arregloAreaInfo as $i) {
                                if (strcmp($i, $prinInfo[1]) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloAreaInfo as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
             <label>Conocimiento:</label>
                    <select class="selectpicker" id="conoInfo" name="conoInfo[]" style="width:100%;marging-top:20px">
                        <?php
                        $arregloConoInfo = ['-Seleccione un valor-','Conocimiento1', 'Conocimiento2', 'Conocimiento3'];
                        if ($prinInfo[2] != null) {
                            echo '<option selected value="' . $prinInfo[2] . '">' . $prinInfo[2] . '</option>';
                            foreach ($arregloConoInfo as $i) {
                                if (strcmp($i, $prinInfo[2]) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloConoInfo as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
            </div>
             

        </div>   
                
                     <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
             <label>Nivel:</label>
                    <select class="selectpicker" id="nivelInfo" name="nivelInfo[]" style="width:100%;marging-top:20px">
                        <?php

                        if ($prinInfo[3] != null) {
                            echo '<option selected value="' . $prinInfo[3] . '">' . $prinInfo[3] . '</option>';
                            foreach ($arregloNivelCono as $i) {
                                if (strcmp($i, $prinInfo[3]) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloNivelCono as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
              
                <input type="hidden" name="IdInfo[]" value="<?php echo $prinInfo[0]; ?>">
            </div>      

        </div>   
                  <?php } ?>
            </div>
            
            
            
                
                     <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
              <button id="addInfo" type="button" class="temp-button temp-dark-blue btn-sm" style="margin-top:20px">Agregar
                    Informatica
                </button>
            </div>
        

        </div>   
            
              

        <div class="temp-light-blue temp-margin-top">
            <p class="temp-text-black " style="margin-left:40px;">Referencias Personales:</p>
        </div>

        
            <div id="RefPerForm">
                <?php

                //dentro del fieldset
                $prinRper2 = array();
                $prinRper2 = getRefPer($link);

                if($prinRper2[0][0]==null || $prinRper2[0][0]==""){
                    $prinRper2[0][0]=null;
                    $prinRper2[0][1]=null;
                    $prinRper2[0][2]=null;
                    $prinRper2[0][3]=null;
                }

                foreach($prinRper2 as $prinRper){
                ?>
                
               <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
               <label>Nombre Completo:</label>
                    <input id="nombreRper" name="nombreRper[]" type="text" style="width:100%" class="temp-round" value="<?php echo $prinRper[1]; ?>">

            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
             <label>Teléfono:</label>
                    <input type="number" id="telfRper" name="telfRper[]" style="width:100%" class="temp-round" value="<?php echo $prinRper[2]; ?>">
            </div>
             

        </div>   
                <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
             <label>Relación:</label>
                    <select class="selectpicker" id="relacionRper" name="relacionRper[]" style="width:100%;marging-top:20px">
                        <?php
                        $arregloRelaPer = ['-Seleccione un valor-','Relacion1', 'Relacion2', 'Relacion3'];
                        if ($prinRper[3] != null) {
                            echo '<option selected value="' . $prinRper[3] . '">' . $prinRper[3] . '</option>';
                            foreach ($arregloRelaPer as $i) {
                                if (strcmp($i, $prinRper[3]) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloRelaPer as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
           
                <input type="hidden" name="IdRper[]" value="<?php echo $prinRper[0]; ?>">
            </div>
            
         
             

        </div>   
                
                <?php } ?>
            </div>

         <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
             <button id="addRefPer" type="button" class="temp-button temp-dark-blue btn-sm" style="margin-top:20px">Agregar
                    Referencia
                </button>
            </div>
            
     
        </div>   
                 
                

        <div class="temp-light-blue temp-margin-top">
            <p class="temp-text-black " style="margin-left:40px;">Referencias Profesionales:</p>
        </div>

            <div id="RefProForm">
            <?php

            //dentro del fieldset
            $prinRpro2 = array();
            $prinRpro2 = getRefPro($link);

            if($prinRpro2[0][0]==null || $prinRpro2[0][0]==""){
                $prinRpro2[0][0]=null;
                $prinRpro2[0][1]=null;
                $prinRpro2[0][2]=null;
                $prinRpro2[0][3]=null;
            }

            foreach($prinRpro2 as $prinRpro){
            ?>
                
                
                 <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
            
               <label>*Nombre Completo:</label>
                    <input name="nombreRpro[]" id="nombreRpro" type="text" style="width:100%" class="temp-round" value="<?php echo $prinRpro[1]; ?>">

            </div>
                     
          <div class="form-group col-xs-12 col-sm-6">
            
            <label>Teléfono:</label>
                    <input type="number" name="telfRpro[]" id="telfRpro" style="width:100%" class="temp-round" value="<?php echo $prinRpro[2]; ?>">
            </div>
            
     
        </div>   
                
                   <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
            
            <label>Relación:</label>
                    <select class="selectpicker" id="relacionRpro" name="relacionRpro[]" style="width:100%;marging-top:20px">
                        <?php
                        $arregloRelaPro = ['-Seleccione un valor-','Relacion1', 'Relacion2', 'Relacion3'];
                        if ($prinRpro[3] != null) {
                            echo '<option selected value="' . $prinRpro[3] . '">' . $prinRpro[3] . '</option>';
                            foreach ($arregloRelaPro as $i) {
                                if (strcmp($i, $prinRpro[3]) == 0) {

                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                        } else {
                            foreach ($arregloRelaPro as $i) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
            
                <input type="hidden" name="IdRpro[]" value="<?php echo $prinRpro[0]; ?>">
            </div>
                    
            
     
        </div>   
                 <?php } ?>
            </div>
                 
                
        <div class="row text-left temp-margin-top">
            <div class="form-group col-xs-12 col-sm-6">
            <button id="addRefPro" type="button" class="temp-button temp-dark-blue btn-sm" style="margin-top:25px">Agregar
                        Referencia
                    </button>
            
            </div>
                    
        </div>   
                
  <div class="row text-center temp-margin-top">
            <div class="form-group col-xs-12 col-sm-12">
            <button class="temp-button temp-light-grey btn-sm">Cancelar</button>
                <button class="temp-button temp-dark-blue btn-sm" type="submit" id="Aceptar">Aceptar</button>
            
            </div>
                    
        </div>

    </form>


    <!-- Modal for full size images on click-->
    <div id="modal01" class="temp-modal temp-black" onclick="this.style.display='none'">
        <span class="temp-button temp-xxlarge temp-black temp-padding-large temp-display-topright"
              title="Close Modal Image">&times;</span>

        <div class="temp-modal-content temp-animate-zoom temp-center temp-transparent temp-padding-64">
            <img id="img01" class="temp-image">

            <p id="caption" class="temp-opacity temp-large"></p>
        </div>


    </div>
        </div>


    
     <!-- Footer -->
        <footer class="container-fluid hidden-xs temp-margin-top  bgFooter temp-padding" >
            <div class="container">
                <nav class="text-justify">
                    <ul class="temp-col m20 list-unstyled colorFooter">
                        <li><strong>Postulantes</strong></li>
                        <li><a href="">Registrate gratis</a></li>
                        <li><a href="">Buscar empleo</a></li>
                        <li><a href="">Subir mi cv</a></li>
                        <li><a href="">Crear mi cv</a></li>
                        <li><a href="">Sugerencias</a></li>
                    </ul>
                    <ul class="temp-col m20 list-unstyled colorFooter">
                        <li><strong>Emprendedor</strong></li>
                        <li><a href="">Registrate gratis</a></li>
            <li><a href="">Ofertar servicios</a></li>
                        <li><a href="">Solicita servicios</a></li>
                        <li><a href="">Sugerencias</a></li>
                    </ul>
                    <ul class="temp-col m20 list-unstyled colorFooter">
                        <li><strong>Empresa</strong></li>
                        <li><a href="">Registrate gratis</a></li>
                        <li><a href="">Publicar empleo</a></li>
                        <li><a href="">Buscar servicios</a></li>
                        <li><a href="">Buscar candidatos</a></li>
                        <li><a href="">Sugerencias</a></li>
                    </ul>
                    <ul class="temp-col m20 list-unstyled colorFooter">
                        <li><strong>Ayuda</strong></li>
                        <li><a href="">Acerca de</a></li>
                        <li><a href="">Denunciar</a></li>
                        <li><a href="">Preguntas frecuentes</a></li>
                        <li><a href="">Políticas y privacidad</a></li>
                        <li><a href="">Sugerencias</a></li>
                    </ul>
                    <ul class="temp-col m20 list-unstyled colorFooter">
                        <li><strong>Social</strong></li>
                             <li><img class="imgFacebook " src="../img/facebook.png"><a href="" style="vertical-align: middle;">Facebook</a></li>
                    <li><img class="imgTwitter" src="../img/twitter.png"><a href="" style="vertical-align: middle;">Twitter</a></li>
                    <li><img class="imgInstagram" src="../img/instagram.png"><a href="" style="vertical-align: middle;">Instagram</a></li>
                    <li><img class="imgYoutube" src="../img/youtube.png"><a href="" style="vertical-align: middle;">Youtube</a></li>
                    </ul>
                </nav>
            </div>
        </footer>

        <div class="container-fluid text-center hidden-xs colorRights bgRights">
            © Interviewec, Inc. Todos los derechos reservados 2017
        </div>

        <!-- footer para moviles -->
        <div class="temp-hide-large" id="footer-rmobile" style="display:none">
            <button class="accordion">Postulantes</button>
            <div class="panel">
                <ul class="temp-ul colorFooter">
                    <li><a href="">Registrate gratis</a></li>
                    <li><a href="">Buscar empleo</a></li>
                    <li><a href="">Subir mi cv</a></li>
                    <li><a href="">Crear mi cv</a></li>
                    <li><a href="">Sugerencias</a></li>
                </ul>
            </div>

            <button class="accordion">Emprendedor</button>
            <div class="panel">
                <ul class="temp-ul colorFooter">
                    <li><a href="">Registrate gratis </a></li>
                    <li><a href="">Ofertar servicios</a></li>
                    <li><a href="">Solicita servicios</a></li>
                    <li><a href="">Sugerencias</a></li>
                </ul>
            </div>

            <button class="accordion">Empresa</button>
            <div class="panel">
                <ul class="temp-ul colorFooter">
                    <li><a href="">Registrate gratis</a></li>
                    <li><a href="">Publicar empleo</a></li>
                    <li><a href="">Buscar servicios</a></li>
                    <li><a href="">Buscar candidatos</a></li>
                    <li><a href="">Sugerencias</a></li>
                </ul>
            </div>

            <button class="accordion">Ayuda</button>
            <div class="panel">
                <ul class="temp-ul colorFooter">
                    <li><a href="">Acerca de</a></li>
                    <li><a href="">Denunciar</a></li>
                    <li><a href="">Preguntas frecuentes</a></li>
                    <li><a href="">Políticas y privacidad</a></li>
                    <li><a href="">Sugerencias</a></li>
                </ul>
            </div>

            <button class="accordion">Social</button>
            <div class="panel">
                <ul class="temp-ul colorFooter">
                    <li><img class="imgFacebook " src="../img/facebook.png"><a href="" style="vertical-align: middle;">Facebook</a></li>
                    <li><img class="imgTwitter" src="../img/twitter.png"><a href="" style="vertical-align: middle;">Twitter</a></li>
                    <li><img class="imgInstagram" src="../img/instagram.png"><a href="" style="vertical-align: middle;">Instagram</a></li>
                    <li><img class="imgYoutube" src="../img/youtube.png"><a href="" style="vertical-align: middle;">Youtube</a></li>
                </ul>
            </div>
        </div>
        <script src="../js/sidebar-menu.js" type="text/javascript"></script>
        <script src="../js/footer-accordion.js" type="text/javascript"></script>
        <script type="text/javascript">
            
        $('select').select2({
             minimumResultsForSearch: Infinity
        });
            
    </script>   

    <script>

        $('#addEdu').on('click', function (){
            $('#EduForm').append(
            '<div class="row text-left temp-margin-top">'+ 
                '<div class="form-group col-xs-12 col-sm-6">'+
                '<label>Institución:</label>'+
            '<select class="selectpicker" id="institucion" name="institucion[]" style="width:100%;marging-top:20px">'+
                '<option>-Seleccione un valor-</option>'+
            '<?php
            $arregloInst = ['UEES', 'Catolica', 'Casa Grande', 'Estatal', 'ESPOL'];
                foreach ($arregloInst as $i) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }
            ?>'+
            '</select></div><div class="form-group col-xs-12 col-sm-6"><label>Fecha de inicio:</label>'+
            '<input type="date" id="fecIni" name="fecIni[]" style="width:100%;marging-top:20px" max="" value="">'+
                '</div></div><div class="row text-left temp-margin-top">'+
                '<div class="form-group col-xs-12 col-sm-6">'+
                '<label>Título obtenido:</label>'+
            '<select class="selectpicker" id="titulo" name="titulo[]" style="width:100%;marging-top:20px">'+
                '<option>-Seleccione un valor-</option>'+
            '<?php
            $arregloTitulo = ['Ing. sistemas', 'Ing. telecomunicacion', 'Ing. electronica', 'Ing. mecanico'];
            foreach ($arregloTitulo as $i) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>'+
            '</select></div><div class="form-group col-xs-12 col-sm-6"><label>Fecha de Culminación:</label>'+
            '<input type="date" id="fecFin" name="fecFin[]" style="width:100%;marging-top:20px" max="" value="">'+
                '</div></div><div class="row text-left temp-margin-top">'+
                '<div class="form-group col-xs-12 col-sm-6"><label>Descripción:</label>'+
            '<input type="text" style="width:100%" class="temp-round" placeholder="Hasta 150 carácteres"id="descripcionEdu" name="descripcionEdu[]" value="">'+
                '</div><input type="hidden" name="IdEducacion[]" value=""> </div>'
            );
             $('select').select2({
             minimumResultsForSearch: Infinity
            
                  });
            
            return false;
        });

        var contsub=1;
        $('#addExp').on('click', function(){
            $('#ExpForm').append(
            '<div class="row text-left temp-margin-top">'+
                '<div class="form-group col-xs-12 col-sm-6">'+
                '<label>Empresa:</label>'+
            '<input id="nomEmpresa" name="nomEmpresa[]" type="text" style="width:100%" class="temp-round" placeholder="Empresa" value="">'+
                '</div><div class="form-group col-xs-12 col-sm-6"><label>Fecha de inicio:</label>'+
            '<input type="date" id="fecIniExp" name="fecIniExp[]" style="width:100%;marging-top:20px"max="<?php echo date("Y-m-d"); ?>" value="">'+
                '</div></div><div class="row text-left temp-margin-top">'+
                '<div class="form-group col-xs-12 col-sm-6">'+
                '<label>Nivel:</label>'+
            '<select class="selectpicker" id="nivelExp" name="nivelExp[]" style="width:100%;marging-top:20px">'+
                '<option>-Seleccione un valor-</option>'+
            '<?php
            $arregloNivel = ['Operador', 'Administrador', 'Jefe de proyectos'];
            foreach ($arregloNivel as $i) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>'+
            '</select></div><div class="form-group col-xs-12 col-sm-6"><label>Fecha de Culminación:</label>'+
            '<input type="date" id="fecFinExp" name="fecFinExp[]" style="width:100%;marging-top:20px"max="<?php echo date("Y-m-d"); ?>" value="">'+
                '</div></div><div class="row text-left temp-margin-top">'+
                '<div class="form-group col-xs-12 col-sm-6"><label>Área:</label>'+
            '<select class="selectpicker" id="areaExp" name="areaExp[]" style="width:100%;marging-top:20px" onchange="loadSubarea2(this.value,'+contsub+')">'+
                '<option>-Seleccione un valor-</option>'+
                '<?php
                $areasList2 = array();
                $areasList2 = getArea($link);
                foreach ($areasList2 as $v1) {
                        echo '<option value="' . $v1[0] . '">' . $v1[1] . '</option>';     } ?>'+
                '</select></div><div class="form-group col-xs-12 col-sm-6"><label>Sub-área:</label>'+
            '<select class="selectpicker" id="subareaExp'+contsub+'" name="subareaExp[]" style="width:100%;marging-top:20px">'+
                '<option>-Seleccione un valor-</option>'+
                '</select></div></div><div class="row text-left temp-margin-top">'+
                '<div class="form-group col-xs-12 col-sm-6">'+
                '<label>País:</label><select class="selectpicker" id="paisExp" name="paisExp[]" style="width:100%;marging-top:20px">'+
                '<option>-Seleccione un valor-</option>'+
                '<?php
                $paisesList = array();
                $paisesList = getTodasPaises($link);

                foreach ($paisesList as $v1) {
                        echo '<option value="' . $v1[0] . '">' . $v1[1] . '</option>'; } ?>'+
                '</select></div><div class="form-group col-xs-12 col-sm-6"><label>Tipo de Empresa:</label>'+
            '<select class="selectpicker" id="tipoExp" name="tipoExp[]" style="width:100%;marging-top:20px">'+
                '<option>-Seleccione un valor-</option>'+
            '<?php
            $arregloTipo = ['Agenia de viajes', 'tipo2', 'tipo3'];
            foreach ($arregloTipo as $i) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>'+
            '</select></div></div><div class="row text-left temp-margin-top">'+
                '<div class="form-group col-xs-12 col-sm-6"><label>Descripción del Cargo:</label>'+
            '<input id="descripcionExp" name="descripcionExp[]" placeholder="Hasta 150 caracteres" type="text" style="width:100%;marging-top:20px" value="">'+
                '</div><input type="hidden" name="IdExp[]" value=""></div>');
            contsub++;
             $('select').select2({
             minimumResultsForSearch: Infinity
            
                  });
            
            return false;
        });

        $('#addIdio').on('click', function(){
            $('#IdioForm').append(
            '<div class="row text-left temp-margin-top">'+
                '<div class="form-group col-xs-12 col-sm-6"><label>Idioma:</label>'+
            '<select class="selectpicker" id="idioma" name="idioma[]" style="width:100%;marging-top:20px"><option>-Seleccione un valor-</option>'+
            '<?php
            $arregloIdio = ['Ingles', 'Frances', 'Aleman', 'Japones'];
                foreach ($arregloIdio as $i) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }
            ?>'+
            '</select></div><div class="form-group col-xs-12 col-sm-6"><label>Escrito:</label>'+
            '<select class="selectpicker" id="escrito" name="escrito[]" style="width:100%;marging-top:20px"><option>-Seleccione un valor-</option>'+
            '<?php
            $arregloNivelIdio = ['Alto', 'Medio', 'Bajo'];
            foreach ($arregloNivelIdio as $i) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>'+
            '</select></div></div><div class="row text-left temp-margin-top">'+
                '<div class="form-group col-xs-12 col-sm-6"><label>Oral:</label>'+
            '<select class="selectpicker" id="oral" name="oral[]" style="width:100%;marging-top:20px">'+
                '<option>-Seleccione un valor-</option>'+
            '<?php
            foreach ($arregloNivelIdio as $i) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>'+
            '</select></div><input type="hidden" name="IdIdioma[]" value=""></div>'
            );
             $('select').select2({
             minimumResultsForSearch: Infinity
            
                  });
            
            return false;
        });

        $('#addCono').on('click', function (){
            $('#ConoForm').append(
            '<div class="row text-left temp-margin-top">'+
                '<div class="form-group col-xs-12 col-sm-6"><label>Conocimiento:</label>'+
            '<input name="conocimiento[]" id="conocimiento" type="text" style="width:100%" class="temp-round" placeholder="Animación 3D" value=""></div>'+
                '<div class="form-group col-xs-12 col-sm-6"><label>Nivel:</label>'+
            '<select class="selectpicker" name="nivelCono[]" id="nivelCono" style="width:100%" class="temp-round"><option>-Seleccione un valor-</option>'+
            '<?php
            $arregloNivelCono = ['Avanzado', 'Intermedio', 'Principiante'];
            foreach ($arregloNivelCono as $i) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>'+
            '</select></div><input type="hidden" name="IdCono[]" value=""></div>'
            );
             $('select').select2({
             minimumResultsForSearch: Infinity
            
                  });
            
            return false;
        });

        $('#addInfo').on('click',function(){
            $('#InfoForm').append(
            '<div class="row text-left temp-margin-top">'+
                '<div class="form-group col-xs-12 col-sm-6"><label>Área:</label>'+
            '<select class="selectpicker" id="areaInfo" name="areaInfo[]" style="width:100%;marging-top:20px"><option>-Seleccione un valor-</option>'+
            '<?php
            $arregloAreaInfo = ['Area1', 'Area2', 'Area3'];
            foreach ($arregloAreaInfo as $i) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>'+
            '</select></div>'+
            '<div class="form-group col-xs-12 col-sm-6"><label>Conocimiento:</label>'+
            '<select class="selectpicker" id="conoInfo" name="conoInfo[]" style="width:100%;marging-top:20px"><option>-Seleccione un valor-</option>'+
            '<?php
            $arregloConoInfo = ['Conocimiento1', 'Conocimiento2', 'Conocimiento3'];
            foreach ($arregloConoInfo as $i) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>'+
            '</select></div></div>'+
            '<div class="row text-left temp-margin-top">'+
                '<div class="form-group col-xs-12 col-sm-6"><label>Nivel:</label>'+
            '<select class="selectpicker" id="nivelInfo" name="nivelInfo[]" style="width:100%;marging-top:20px"><option>-Seleccione un valor-</option>'+
            '<?php
            foreach ($arregloNivelCono as $i) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>'+
            '</select></p><input type="hidden" name="IdInfo[]" value=""></div></div>'
            );
            
             $('select').select2({
             minimumResultsForSearch: Infinity
            
                  });
            
            return false;
        });

        $('#addRefPro').on('click', function() {
            $('#RefProForm').append(
               '<div class="row text-left temp-margin-top">'+ '<div class="form-group col-xs-12 col-sm-6">'+
                '<label>*Nombre Completo:</label>'+
                '<input name="nombreRpro[]" id="nombreRpro" type="text" style="width:100%" class="temp-round"></div>'+
                '<div class="form-group col-xs-12 col-sm-6">'+ '<label>*Teléfono:</label>'+
                '<input type="text" name="telfRpro[]" id="telfRpro" style="width:100%" class="temp-round"></div></div>'+
                '<div class="row text-left temp-margin-top">'+
                '<div class="form-group col-xs-12 col-sm-6">'+'<label>Relación:</label>'+
                '<select class="selectpicker" id="relacionRpro" name="relacionRpro[]" style="width:100%;marging-top:20px">'+
                '<option>-Seleccione un valor-</option>'+
            '<?php
            $arregloRelaPro = ['Relacion1', 'Relacion2', 'Relacion3'];
            foreach ($arregloRelaPro as $i) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>'+
            '</select></p><input type="hidden" name="IdRpro[]" value=""></div>'
            );
            
            
             $('select').select2({
             minimumResultsForSearch: Infinity
            
                  });
            
            
            
            
            
            return false;
        });

        function addRefProF(){
            $('#RefProForm').append(
                '<div class="row text-left temp-margin-top">'+ '<div class="form-group col-xs-12 col-sm-6">'+
                '<label>*Nombre Completo:</label>'+
                '<input name="nombreRpro[]" id="nombreRpro" type="text" style="width:100%" class="temp-round"></div>'+
                '<div class="form-group col-xs-12 col-sm-6">'+
                '<input type="text" name="telfRpro[]" id="telfRpro" style="width:100%" class="temp-round"></div></div>'+
                '<div class="row text-left temp-margin-top">'+
                '<div class="form-group col-xs-12 col-sm-6">'+'<label>Relación:</label>'+
                '<select class="selectpicker" id="relacionRpro" name="relacionRpro[]" style="width:100%;marging-top:20px">'+
                '<option>-Seleccione un valor-</option>'+
                '<?php
            $arregloRelaPro = ['Relacion1', 'Relacion2', 'Relacion3'];
            foreach ($arregloRelaPro as $i) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>'+
                '</select></div><input type="hidden" name="IdRpro[]" value=""></div>'
            );
            
             $('select').select2({
             minimumResultsForSearch: Infinity
            
                  });
            
            return false;
        }

        $('#addRefPer').on('click', function(){
           $('#RefPerForm').append('<div class="row text-left temp-margin-top">'+ '<div class="form-group col-xs-12 col-sm-6">'
               +
                '<label>Nombre Completo:</label>'+
            '<input id="nombreRper" name="nombreRper[]" type="text" style="width:100%" class="temp-round" value="">'+
                '</div><div class="form-group col-xs-12 col-sm-6">'+  '<label>Teléfono:</label>'+
            '<input type="number" id="telfRper" name="telfRper[]" style="width:100%" class="temp-round" value=""></div>'+
                '</div><div class="row text-left temp-margin-top"><div class="form-group col-xs-12 col-sm-6">'+
                '<label>Relación:</label>'+
            '<select class="selectpicker" id="relacionRper" name="relacionRper[]" style="width:100%;marging-top:20px"> '+
                '<option>-Seleccione un valor-</option>'+
            '<?php
            $arregloRelaPer = ['Relacion1', 'Relacion2', 'Relacion3'];
            foreach ($arregloRelaPer as $i) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>'+
            '</select></div><input type="hidden" name="IdRper[]" value=""></div>');
            
             $('select').select2({
             minimumResultsForSearch: Infinity
            
                  });
            
            
            return false;
        });


        /*function eliminarRPro(el){
            var d = document.getElementById("ResProForm");
            var d_nested = document.getElementById(el);
            d.removeChild(d_nested);
            //ajax para eliminar la seleccion
        }*/

        function load(str) {
            var xmlhttp;

            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("ciuNac").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("POST", "ciudadesAjax3.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("codPais=" + str);
        }
		
		
        function loadR(str) {
            var xmlhttp;

            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("ciuNac").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("POST", "ciudadesAjax3.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("codPais=" + str);
        }

        /*function loadRes(str) {
            var xmlhttp;

            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("ciuRe").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("POST", "ciudadesAjax3.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("codPais=" + str);
        }*/


        function loadSubarea(str) {
            var xmlhttp;

            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("subarea").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("POST", "SubareasAjax.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("codArea=" + str);
        }


        function loadSubarea2(str,num) {
            var xmlhttp;

            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("subareaExp"+num+"").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("POST", "SubareasAjax.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("codArea=" + str);
        }
        // galeria
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
            var captionText = document.getElementById("caption");
            captionText.innerHTML = element.alt;
        }


        // Toggle button
        var mySidebar = document.getElementById("mySidebar");

        function temp_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
            } else {
                mySidebar.style.display = 'block';
            }
        }

        // Close the sidebar with the close button
        function temp_close() {
            mySidebar.style.display = "none";
        }

        //funcion boton
        $(document).ready(function (ev) {
            var toggle = $('#btn_expand');
            var menu = $('#btn_menu');
            var rot;

            $('#btn_expand').on('click', function (ev) {
                rot = parseInt($(this).data('rot')) - 180;
                menu.css('transform', 'rotate(' + rot + 'deg)');
                menu.css('webkitTransform', 'rotate(' + rot + 'deg)');
                if ((rot / 180) % 2 == 0) {
                    //Moving in
                    toggle.parent().addClass('ss_active');
                    toggle.addClass('close');
                } else {
                    //Moving Out
                    toggle.parent().removeClass('ss_active');
                    toggle.removeClass('close');
                }
                $(this).data('rot', rot);
            });

            menu.on('transitionend webkitTransitionEnd oTransitionEnd', function () {
                if ((rot / 180) % 2 == 0) {
                    $('#btn_menu div i').addClass('ss_animate');
                } else {
                    $('#btn_menu div i').removeClass('ss_animate');
                }
            });

        });
		
		
    function cargarCiuR(str){
        var xmlhttp;

        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("ciuRe").innerHTML=xmlhttp.responseText;
            }
        }

        xmlhttp.open("POST","ciudadesAjax2.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("codProv="+str);
    }
	
	function cargarCiuN(str){
        var xmlhttp;

        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("ciuNac").innerHTML=xmlhttp.responseText;
            }
        }

        xmlhttp.open("POST","ciudadesAjax2.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("codProv="+str);
    }
		
    function cargarProv(str){
        var xmlhttp;

        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("provRes").innerHTML=xmlhttp.responseText;
            }
        }

        xmlhttp.open("POST","provinciasAjax.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("codPais="+str);

    }
	
	 function cargarProvN(str){
        var xmlhttp;

        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("provNac").innerHTML=xmlhttp.responseText;
            }
        }

        xmlhttp.open("POST","provinciasAjax.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("codPais="+str);

    }


        //funcion ocultar campos

        $("#hideonclick").hide();
        $("#hideonclick2").hide();

        $(".hidebtn").click(function () {
            $("#hideonclick").show();
            $("#hideonclick2").show();

        });


    </script>

    </body>
    </html>
    <?php
//}
    ob_end_flush(); ?>