<?php include("../header.php"); ?>

<header>
  <div class="container text-center">
      <h1 class="text-dove-gray"><b>Contacto</b></h1>
      <p class="text-azure-radiant">Apreciamos que te pongas en contacto con nosotros.<br>
      Envianos un email, llámanos, escribenos o usa nuestras redes
      sociales para aclarar cualquier duda que tengas</p>
  </div>
</header>


<div class="wrap-content">
  <section class="custom-bg">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center text-white">
          <p><span class="glyphicon glyphicon-phone-alt"></span> (+593) 506 8631</p>
          <br>
          <p><span class="glyphicon glyphicon-phone"></span> (+593) 099 411 9579</p>
          <br>
          <p><span class="glyphicon glyphicon-envelope"></span> info@interview.ec</p>
          <br>
          <p><span class="glyphicon glyphicon-globe"></span> www.interview.ec</p>
        </div>
        <!-- datos de contacto -->
        <!-- Contact form -->
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <form>
            <div class="form-group">
              <input type="text" class="form-control" id="nombres" placeholder="Tú nombre">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="email"
              placeholder="Correo electrónico">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="teléfono"
              placeholder="Número telefónico">
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="5" id="mensaje"
              placeholder="Tú mensaje"></textarea>
            </div>
            <div class="col-xs-12 col-sm-12 text-right">
              <!-- colocar color al btn {azul}-->
              <button type="button" class="btn el-border el-border-azure-radiant">Enviar</button>    
            </div>
          </form>
        </div>
        <!-- /Contact form -->  
      </div>
      <div class="row padding">
       <!-- Location  -->
         <div id="mapa" class="col-sm-12" style="min-height:400px">
         </div>
       <!-- /Location  -->
     </div>
   </div>
  </section>  
</div>

<!-- Google maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYOlNZ0zztxuzbyUCySKyLPVDJsLqTanM&amp"></script>
<script>

    $(function () {

    function initMap() {

        var location = new google.maps.LatLng(-2.169052, -79.894650);

        var mapCanvas = document.getElementById('mapa');
        var mapOptions = {
            center: location,
            zoom: 16,
            panControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);

       // var markerImage = 'logo.png';

        var marker = new google.maps.Marker({
            position: location,
            map: map,
      //      icon: markerImage
        });

        var contentString = '<div class="info-window">' +
                '<p>¡Visítanos! te esperamos <span class="temp-border-left temp-xlarge">3</span></p>' +
                '<div class="info-content">' +
                '<p>Kennedy Norte MZ 201 V S1. <br>Av. Miguel H. Alcivar y Alejandro Andrade(esq)</p>' +
                '<p>Edif. Interview</p>' +
                '<p>Guayaquil - Ecuador</p>' +
                '</div>' +
                '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 400
        });

        marker.addListener('click', function () {
            infowindow.open(map, marker);
        });
        infowindow.open(map, marker);
        map.setCenter(marker.getPosition());


    }

    google.maps.event.addDomListener(window, 'load', initMap);
});
</script>
<!-- Google maps -->

<?php include("../footer.html"); ?>