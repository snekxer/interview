define(["jquery"], function($) {

    //the jquery.alpha.js and jquery.beta.js plugins have been loaded.



      function myForm(profileType){



        var self = this;

        var profile =  profileType;



        this.config = function(){

          formId = $("#registro-"+profileType);

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

            }

          })

        };



        this.redir = function(){

          setTimeout(function(){  

            window.location.href = "../perfiles/"+profile+"/perfil-"+profile+".php" 

          }, 5000);

        };



        this.messageAlert = function(message_cont, message_type){

          var d_message = $('.alert');

          d_message.addClass(message_type)

          .append('<p>'+message_cont+'</p>'); 



        };



        this.save = function(){        

           // myForm.config.formId.serialize();

           self.postForm("form-registro-"+profile+".php");     



         };



         this.edit = function(){            

          self.postForm("editar_informacion_"+profile+".php");



        };





        this.postForm = function(url){

          formData = self.config().serialize();



          $.ajax({

            url: url,

            type: 'post',

            data: formData,

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

        self.messageAlert("Ha ocurrido un error, vuelva a intentar", 'alert-danger');

      }

            }); // end ajax call 



        };

      } 



      return myForm;



  });