$(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                responsiveClass:true,
			    responsive:{
			        0:{
			            items:1,
			            loop: true,
		                margin: 10,
		                autoplay: true,
		                autoplayTimeout: 2000,
			            nav:false
			        },
			        768:{
			            items:3,
			            loop: true,
		                margin: 10,
		                autoplay: true,
		                autoplayTimeout: 2000,
		                nav:false
			        },
			        1000:{
			            items:5,
			            loop: true,
		                margin: 1,
		                autoplay: true,
		                autoplayTimeout: 2000,
		                nav:false
			        }
			       
			    }
              });
            })
		