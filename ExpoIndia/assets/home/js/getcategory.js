/*
			isotop Active js Code
			-------------------------
			active isotop with jquery
			-------------------------
		*/
		$('.main-iso').isotope({
			itemSelector:'.item',
			layoutMode:'fitRows'
		});
		$('.iso-nav ul li').click(function(){
			$('.iso-nav ul li').removeClass('active');
			$(this).addClass('active');

			var selector = $(this).attr('data-filter');
			$('.main-iso').isotope({
				filter: selector
			});
			return false;
		});