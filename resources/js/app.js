require.config({
	"baseUrl": "/resources/js/lib",
	"paths": {
		"app": "../app",
		"jquery": "jquery-3.3.1.min",
		"bxslider": "../plugins/jquery.bxslider.min",
		"formvalidation": "../plugins/form-validator/jquery.form-validator.min"
	},
	shim:{
		"bxslider": {
			deps: ["jquery"],
			exports: "bxslider"
		},
		"formvalidation":{
			deps: ["jquery"],
			exports: "formvalidation"
		}
	}

});
