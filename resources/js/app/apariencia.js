define(["jquery"], function($) {
  function apariencia(){

   var self = this;

   
   var uploader_avatar = $('#uploader_avatar')[0];
   var uploader_video = $('#uploader_video')[0];
   var uploader_encabezado = $('#uploader_encabezado')[0];
   

   this.init = function(el){
    el.click(function(e){
      var id = $('.tab-op .active').attr('id');

     e.preventDefault();
     if(id == 'menu0'){
      self.saveImage();
    }
    else if(id == 'menu1'){
      self.saveVideo();

    }
    else if(id == 'menu2'){
      self.saveHeader();

    }
    else if(id == 'menu3'){
      self.saveTheme();

    }
    else{
      //
    }


  })
  };

  this.saveImage = function(){
    self.postAjax("/resources/controllers/subir-avatar.php", uploader_avatar);
  };

  this.saveVideo = function(){
    self.postAjax("/resources/controllers/subir-video.php", uploader_video);
  };

  this.saveHeader  = function(){
    self.postAjax("/resources/controllers/subir-encabezado.php", uploader_encabezado);
  };

  this.saveTheme  = function(){
    var upload_tema = $('#upload-tema').serialize();

    $.ajax({
      url: '/resources/controllers/guardar-tema.php',
      type: 'post',
      data:  upload_tema,
      success: function(data, status) {
       if(data) {
           location.reload();
      } else{
                  //add alert alert-danger class to #error-div 
                //         $('#error').html('el email o contrasena ingresado no existe, pofavor verifique los datos ingresados');
              }
            },
            error: function(xhr, desc, err) {
            }
                }); // end ajax call

  };

  this.postAjax = function(url, form){
    $.ajax({
      url: url,
      type: 'post',
      data:  new FormData(form),
      contentType: false,
      processData: false,
      success: function(data, status) {
       if(data) {
                  // console.log(data);
                   location.reload();

                 } else{
                //add alert alert-danger class to #error-div       
              }
            },
            error: function(xhr, desc, err) {
            }
              }); // end ajax call

  }

}

return apariencia;

});