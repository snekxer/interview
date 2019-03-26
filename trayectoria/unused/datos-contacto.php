<?php
	include("../header.php");

    $meta = new meta_global();

    $emprendedor = $impl->getMyUsr($link);

    if($emprendedor != ""&&$tipo=='O'){
      $trayectoria= new trayectoria_emprendedor();

      $info = $trayectoria->getTrayectoria($emprendedor, $link);

      $id = $info->getEmprendedor()->getId();
      $contacto = $info->getContacto();
      $acerca_de = $info->getAcercaDe();
      $create = false;
      
    }
    else{

      $id = null;
      $contacto = null;
      $acerca_de = null;
    }

    ?>

    <header>
  <div class="container-fluid text-left">
     <h1><b>Información básica</b></h1>
     <p>*Los campos marcados (*) son obligatorios</p>
  </div>
</header>

<div class="container-fluid text-center wrap-content">

    <form id="datosContacto" method="post" action="">

    	<div class="form-group">
            <label for="acerca_de">Acerca de:</label>
            <textarea id="acerca_de" name="acerca_de" class="form-control"><?php echo  $acerca_de; ?></textarea>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="contacto"
                value="<?php if($contacto!=""){ echo $contacto;}else{ echo "si";} ?>">Desea compartir su informacion de contacto? 
              </label>
            </div>
             <input id="id" type="hidden" name="id_trayectoria" value="<?php echo  $id; ?>">
        </div>

        <?php 
        if($create!=true)
         { 
          echo '<button id="btnEditar" class="btn btn-default">Editar</button>'; 
         } else{
          echo '<button id="guardar" class="btn btn-default">Guardar</button>';
         }
        ?>

    </form>
</div>

<script>
  $("button").on('click', function(e){
    //
    var btn_id = event.target.id;
    var form_id = $("#datosContacto");
    if(btn_id == "btnEditar"){
      //alert('e');
      form_id.attr("action", "editar-trayectoria.php");
      form_id.submit();
    }
    else if(btn_id == "guardar"){
      //alert('s');
      form_id.attr("action", "crear-datos-contacto.php");
      form_id.submit();
    }
    event.preventDefault();

  })
</script>

    <?php include("../footer.html"); ?>