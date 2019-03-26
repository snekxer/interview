define(["jquery"], function($) {

    //the jquery.alpha.js and jquery.beta.js plugins have been loaded.



      function myForm(name, adType){
        var self = this;
        var formName = name;

      
        this.config = function(){
          formId = $("#form"+formName);
          return formId;
        };
        this.init = function(button){
          button.click(function(e){
            e.preventDefault();
            var id = $(this).attr('id'); 
            if(id == "submit" ){
              self.save();
            }else if(id == "editar"){
              self.edit();
            }else if(id == "eliminar"){
              self.delete();
            }
          })
        };

        this.redir = function(){
          setTimeout(function(){  
            switch(adType){
              case 0:
                window.location.href = "../perfiles/empresas/perfil-empresas.php"
                break;
              case 1:
                window.location.href = "../perfiles/emprendedores/perfil-emprendedores.php"
                break;
              default:
                break;
            }        

          }, 5000);

        };


        this.messageAlert = function(message_cont, message_type){
          var d_message = $('.alert');
          d_message.addClass(message_type)
          .append('<p>'+message_cont+'</p>'); 
        };

        this.save = function(){    
           self.postForm("formCreate"+formName+".php");
         };

         this.edit = function(){       
          self.postForm("formEdit"+formName+".php");

        };
        this.delete = function(){       
          $.post( "formDelete"+formName+".php", { id: $("#id"+formName).val() })
           .done(function(data) {
              self.messageAlert(data, 'alert-success');
              self.redir();
           });

        };

        this.postForm = function(url){

          formData = self.config().serialize();
          $.ajax({
            url: url,
            type: 'post',
            data: formData,
            success: function(response) {
             if(response) {
               self.messageAlert(response, 'alert-success');
               self.redir();
             } else{
              self.messageAlert(response, 'alert-danger');
            }

          },
          error: function(xhr, desc, err) {
            self.messageAlert("Ha ocurrido un error, vuelva a intentar", 'alert-danger');
          }
            }); // end ajax call 
        };
      } 
      return myForm;



  });