 //Load common code that includes config, then load the app
            //logic for this page. Do the requirejs calls here instead of
            //a separate file so after a build there are only 2 HTTP
            //requests instead of three.
            requirejs(['app'], function (app) {
                //js/common sets the baseUrl to be js/ so
                //can just ask for 'app/main1' here instead
                //of 'js/app/main1'
                requirejs(["app/formvalidation"]);
            });