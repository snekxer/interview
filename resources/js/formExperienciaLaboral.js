 //Interview.ec

            requirejs(['app'], function (app) {

                requirejs(["app/initSelects"], function(initSelects){
                		//populate selectors 
                        initSelects.cargarSubareas();
                        initSelects.cargarProvincias();
                        initSelects.cargarCiudades();

                });

            });