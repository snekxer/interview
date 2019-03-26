define(["jquery", "formvalidation"], function($, formvalidation) {
    //the jquery.alpha.js and jquery.beta.js plugins have been loaded.
    $(function() {

    	//form validator

    	$.validate({
    		modules : 'date, security, sanitize',
            errorMessagePosition : 'top',
            scrollToTopOnError : true,
            lang: 'es',

    	});

    });
});