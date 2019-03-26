<?php 
include("../header.php"); 
switch($tipo){
    case('E'):
        $mensl = new mensajes_empresa;
        $denied = false;
        break;
    case('O'):
        $mensl = new mensajes_emprendedor;
        $denied = false;
        break;
    case('P'):
        $mensl = new mensajes_persona;
        $denied = false;
        break;
    default:
        $denied = true;
        break;
}
?>

<header>
</header>

<div class="container-fluid text-center wrap-content">
  <div class="row">
    <div class="container app">
        <?php if(!$denied){
            $users = $mensl->getUsrs($link);
            if($users!=false){
        ?>
        <div class="row app-chat">
        <div class="col-sm-4 side">

          <div class="side-one">
            <div class="row heading">
              <div class="col-sm-1 col-xs-1  heading-dot  pull-right">
                <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
              </div>
            </div>
            <div class="row searchBox-chat">
              <div class="col-sm-12 searchBox-inner">
                <div class="form-group has-feedback">
                  <input id="searchText" type="text" class="form-control" name="searchText" placeholder="Search">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
            </div>
            <div class="row sideBar">
            <?php foreach($users as $user){ 
                    $perf = $impl->searchUsrMsn($user,$link);
                ?>                
                <div id="uMessage" onClick="load(<?php echo $perf->getId();?>)" class="row sideBar-body">
                <div class="col-sm-3 col-xs-3 sideBar-avatar">
                  <div class="avatar-icon">
                    <img src="<?php echo $perf->getFoto();?>">
                  </div>
                </div>
                <div class="col-sm-9 col-xs-9 sideBar-main">
                  <div class="row">
                    <div class="col-sm-8 col-xs-8 sideBar-name">
                        <span class="name-meta"><?php if($user->getTipo()=='P'){ echo $perf->getNombres().' '.$perf->getApellidos(); } else { echo $perf->getNombre();}?>
                      </span>
                    </div>
                    <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                      <!--<span class="time-meta pull-right">18:18
                      </span>-->
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            </div>
          </div>
        </div>
        <!-- end of side one -->
        <!-- conversation *content*-->        
        <div class="col-sm-8 conversation" id="conversationT" >
          <div class="row heading">
            <div class="col-sm-2 col-md-1 col-xs-3 heading-avatar">
              <div class="heading-avatar-icon">
                
              </div>
            </div>
            <div class="col-sm-8 col-xs-7 heading-name">
              <a class="heading-name-meta">
              </a>
              <span class="heading-online"></span>
            </div>
            <div class="col-sm-1 col-xs-1  heading-dot pull-right">
              <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>        
    </div>
                <?php } else { ?>
                    <div class="col-sm-12 col-xs-12 text-center padding">
                      <img src="../resources/img/icon-face-tho.jpg" alt="no tiene ofertas icon" height="120" width="120">
                      <p>No tiene mensajes</p>
                    </div>
                 <?php   }            
            } else{ ?>
                    <div class="col-sm-12 col-xs-12 text-center padding">
                      <img src="../resources/img/denied.jpg" alt="no tiene ofertas icon" height="120" width="120">
                      <p>No tiene permiso para ver esta pantalla</p>
                    </div>
            <?php }?>
        
    </div>
  <!-- end of conversation *content*-->
</div>      

<script>
  $(document).ready(function(){
    $("head").append('<link rel="stylesheet" type="text/css" href="../resources/styles/mensajeria.css">');
  });
</script>
<!--- Old jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
var jQuery_2_2_4 = $.noConflict(true);

/*jQuery_2_2_4("#uMessage").on("click", function(){
  jQuery_2_2_4("#conversationT").load("chat-style.css");
})*/

function load(id){
    jQuery_2_2_4("#conversationT").load("conv.php?id="+id);
}

</script>

<?php include("../footer.html"); ?>


