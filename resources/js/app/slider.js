define(["jquery", "bxslider"], function($, bxSlider) {

    //the jquery.alpha.js and jquery.beta.js plugins have been loaded.

    $(function() {

    	//slider

    	$('.bxslider').bxSlider({ 

    		maxSlides: 4,

    		moveSlides:1,

    		responsive:true,

    		slideWidth: 280,

    		slideMargin: 5,

    		pager:false,

		infiniteLoop: false,

    		onSliderLoad: function(){

    			$(".loading").fadeOut("slow");

    			setTimeout(function(){$(".bxslider").fadeIn("slow")

    				.css("visibility", "visible");}, 1000);

    		}

    	});



    });

});