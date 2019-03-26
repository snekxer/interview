define(["jquery"], function($) {

    //the jquery.alpha.js and jquery.beta.js plugins have been loaded.

      function myForm(name, typef){
        var self = this;
        var formName =  name;
        var formType =  typef;
        this.config = function(){
          formId = $("#form"+name);
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
            switch(formType){
              case 0:
                window.location.href = "../perfiles/personas/perfil-personas.php"
                break;
              case 1:
                window.location.href = "../perfiles/empresas/perfil-empresas.php"
                break;
              case 2:
                window.location.href = "../perfiles/emprendedor/perfil-emprendedor.php"
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
           self.postForm("formCreate"+name+".php");     
         };

        this.edit = function(){            
          self.postForm("formEdit"+name+".php");
        };

        this.delete = function(){            
          $.post( "formDelete"+name+".php", { id: $("#id"+name).val() })
           .done(function(data) {
              self.messageAlert(data, 'alert-success');
              self.redir();
           });
        };
        
        this.postForm = function(url){
          formData = self.config();
          $.ajax({
            url: url,
            type: 'post',
            data: new FormData(formData[0]),
            contentType: false,
            processData: false,
            success: function(response) {
             if(response) {
              //    console.log(response);
              self.messageAlert(response, 'alert-success');
              self.redir();
            } else{
              self.messageAlert(response, 'alert-danger');
            }
          },

          error: function(xhr, desc, err) {
            //self.messageAlert("Ha ocurrido un error, vuelva a intentar", 'alert-danger');
          }
            }); // end ajax call         
        };
      } 


      return myForm;



  });