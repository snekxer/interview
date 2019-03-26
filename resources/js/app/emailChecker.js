define(["jquery"], function($) {

    //the jquery.alpha.js and jquery.beta.js plugins have been loaded.

    $(function() {

    	//email check





    	var typingTimer;

    	var typingInterval = 60000;

    	var el = $("#email");



    	$(el).keyup(function(){

    		var email = $(this).val();

    		clearTimeout(typingTimer);

    		typingTimer = setTimeout(doneTyping(email), typingInterval);

    	});



    	$(el).keydown(function(){

    		clearTimeout(typingTimer);

    	});



    	function doneTyping(email){

    		$.ajax({

              url: 'emailChecker.php',

              type: 'post',

              data: {"email": email},

              success: function(response) {

		console.log(response.length);

                 if(response.length == 1) {

                   $("#registrar").attr("type", "submit")
				.removeClass("disabled");

              

                } else{

                	$("#registrar").attr("type", "button");

                	alert("Este email ya esta siendo utilizado, intente otro.");            

           

                  }

              },

          

              error: function(xhr, desc, err) {

             

              }

            }); // end ajax call

    	}



    });

});