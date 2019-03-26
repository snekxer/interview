define(["jquery"], function($) {
    //the jquery.alpha.js and jquery.beta.js plugins have been loaded.
    $(function() {
    	//email check


     jQuery.fn.multiselect = function() {
       $(this).each(function() {
         var checkboxes = $(this).find("input:checkbox");
         checkboxes.each(function() {
           var checkbox = $(this);
           
           // Highlight checkboxes that the user selects
           checkbox.click(function() {
             if (checkbox.prop("checked")){
               checkbox.parent().addClass("multiselect-on");
               ajaxCall("guardar-areas-interes.php", checkbox.val());
             }
             else{
               checkbox.parent().removeClass("multiselect-on");
               ajaxCall("remover-areas-interes.php", checkbox.val());

             }
           });
         });
       });

       function ajaxCall(url, id_area_int){

         $.ajax({
           url: url,
           type: 'post',
           data: { "id_area_int": id_area_int},
           success: function(data, status) {
             if(data) {
               console.log(data);
             }

           },

           error: function(xhr, desc, err) {

           }
        }); // end ajax call

       };
     };


     //function call
     $(function() {
       $(".multiselect").multiselect();
     });


   });
  });