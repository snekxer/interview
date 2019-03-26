define(function () {


  return {
   cargarArea: function(){
     $.ajax({
      url: '/resources/controllers/cargar-area.php',
      type: 'post',
      dataType: 'json',
      success: function(data) {
        var len = data.length;
            //    $('#areas').empty();

            for (var i = 0; i < len; i++) {
              var id = data[i]['id'];
              var nombre = data[i]['nombre'];
              $('#areas').append("<option value='"+id+"'>"+nombre+"</option");


            }

          },

          error: function(xhr, desc, err) {
            console.log(xhr, desc, err);

          }
            }); // end ajax call

   },


   cargarSubareas:function(){
     $('#areas').change(function(){
      var area_id = $(this).children(":selected").attr("value");

      $.ajax({
        url: '/resources/controllers/cargar-subareas.php',
        type: 'post',
        data: {area_id:area_id},
        dataType: 'json',
        success: function(data) {
                  // if(data == "success") {                

                    var len = data.length;
                    $('#subarea').empty();

                    for (var i = 0; i < len; i++) {

                      var id = data[i]['id'];
                      var nombre = data[i]['nombre'];

                      $('#subarea').append("<option value='"+id+"'>"+nombre+"</option");
                      
                    }
                    
                  },

                  error: function(xhr, desc, err) {
                    console.log(xhr, desc, err);
                    
                  }
                }); // end ajax call  


    });

   },

   
   cargarProfesiones:function(){
     $.ajax({
      url: '/resources/controllers/cargar-profesiones.php',
      type: 'post',
      dataType: 'json',
      success: function(data) {
              // if(data == "success") {                

                var len = data.length;
              //  $('#profesiones').empty();

              for (var i = 0; i < len; i++) {

                var id = data[i]['id'];
                var nombre = data[i]['nombre'];
                $('#profesiones').append("<option value='"+id+"'>"+nombre+"</option");

              }
              
            },
            
            error: function(xhr, desc, err) {
              console.log(xhr, desc, err);
              
            }
            }); // end ajax call
     
   },


   cargarIndustrias:function(){
     $.ajax({
      url: '/resources/controllers/cargar-industrias.php',
      type: 'post',
      dataType: 'json',
      success: function(data) {
              // if(data == "success") {                

                var len = data.length;
               
                for (var i = 0; i < len; i++) {

                  var id = data[i]['id'];
                  var nombre = data[i]['nombre'];

                  $('#industrias').append("<option value='"+id+"'>"+nombre+"</option");

                }

              },
              
              error: function(xhr, desc, err) {
                console.log('error');
                
              }
            }); // end ajax call  

   },


   cargarNacionalidad: function(){
     $.ajax({
      url: '/resources/controllers/cargar-paises.php',
      type: 'post',
      dataType: 'json',
      success: function(data) {
              // if(data == "success") {                

                var len = data.length;
            //    $('#paises').empty();

            for (var i = 0; i < len; i++) {

              var id = data[i]['id'];
              var nombre = data[i]['nombre'];
              $('#nacionalidad').append("<option value='"+id+"'>"+nombre+"</option");

              
            }

          },
          
          error: function(xhr, desc, err) {
            console.log(xhr, desc, err);
            
          }
            }); // end ajax call

   },


   cargarPaises: function(){
     $.ajax({
      url: '/resources/controllers/cargar-paises.php',
      type: 'post',
      dataType: 'json',
      success: function(data) {
              // if(data == "success") {                

                var len = data.length;
            //    $('#paises').empty();

            for (var i = 0; i < len; i++) {

              var id = data[i]['id'];
              var nombre = data[i]['nombre'];
              $('#paises').append("<option value='"+id+"'>"+nombre+"</option");

              
            }

          },
          
          error: function(xhr, desc, err) {
            console.log(xhr, desc, err);
            
          }
            }); // end ajax call

   },


   cargarProvincias:function(){
     $('#paises').change(function(){
      var pais_id = $(this).children(":selected").attr("value");

      $.ajax({
        url: '/resources/controllers/cargar-provincias.php',
        type: 'post',
        data: {pais_id:pais_id},
        dataType: 'json',
        success: function(data) {
                  // if(data == "success") {                

                    var len = data.length;
                    $('#provincias').empty();

                    $('#provincias').append("<option value=''>seleccione una opción</option");

                    for (var i = 0; i < len; i++) {

                      var id = data[i]['id'];
                      var nombre = data[i]['nombre'];

                      $('#provincias').append("<option value='"+id+"'>"+nombre+"</option");
                      
                    }
                    
                  },

                  error: function(xhr, desc, err) {
                    console.log(xhr, desc, err);
                    
                  }
                }); // end ajax call  

    });

   },



   cargarCiudades:function(){
    $('#provincias').change(function(){
      var provincia_id = $(this).children(":selected").attr("value");

      $.ajax({
        url: '/resources/controllers/cargar-ciudades.php',
        type: 'post',
        data: {provincia_id:provincia_id},
        dataType: 'json',
        success: function(data) {
                  // if(data == "success") {                

                    var len = data.length;
                    $('#ciudad').empty();

                    for (var i = 0; i < len; i++) {

                      var id = data[i]['id'];
                      var nombre = data[i]['nombre'];

                      $('#ciudad').append("<option value='"+id+"'>"+nombre+"</option");

                    }
                    
                  },
                  
                  error: function(xhr, desc, err) {
                    console.log(xhr, desc, err);
                    
                  }
                }); // end ajax call 

    });

  }

};
});
