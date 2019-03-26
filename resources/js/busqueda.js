    $(function () {
        // Oculta el cuadro de busqueda si el usuario pulse el boton cerrar
		$('body, .navbar-collapse form[role="search"] button[type="reset"]').on('click keyup', function(event) {
			if (event.which == 27 && $('.navbar-collapse form[role="search"]').hasClass('active') ||
				$(event.currentTarget).attr('type') == 'reset') {
				closeSearch();
			}
		});

		function closeSearch() {
            var $form = $('.navbar-collapse form[role="search"].active')
    		$form.find('input').val('');
			$form.removeClass('active');
		}

		// Mostrar cuadro de busqueda si no esta activo
		$(document).on('click', '.navbar-collapse form[role="search"]:not(.active) button[type="submit"]', function(event) {
			event.preventDefault();
			var $form = $(this).closest('form'),
				$input = $form.find('input');
			$form.addClass('active');
			$input.focus();

		});
		$(document).on('click', '.navbar-collapse form[role="search"].active button[type="submit"]', function(event) {
			event.preventDefault();
			var $form = $(this).closest('form');
				//$input = $form.find('input');
				$form.submit();
            //closeSearch()
		});
    });