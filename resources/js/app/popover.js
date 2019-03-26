define(["jquery"], function($) {
    //the jquery.alpha.js and jquery.beta.js plugins have been loaded.
    var $j = jQuery.noConflict();
    $j(function() {
                $j('[data-toggle="popover"]').popover({trigger: "focus", placement: "left", content:function(){return  $j( $j(this).data('content')).text();} });

    });
});