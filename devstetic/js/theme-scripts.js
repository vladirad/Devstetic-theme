/**
 * Theme JS Scripts.
 */

(function($) {

    // Slick slider.
    $('.slideit').slick({

    	 slidesToShow: 3,
         slidesToScroll: 3
    });

    $(window).scroll(function() {
	
		var section = fullpage_api.getActiveSection();
		console.log(section);

	    if (section == 2) {
	        $('.responsive-menu-pro-box').addClass("white");
	    }

	});

	// Slick slider.
    $('.team-slider').slick({

    	 slidesToShow: 1,
         slidesToScroll: 1,
         responsive: [
          	{
            breakpoint: 9999,
            settings: "unslick"
        	},
		    {
		      breakpoint: 830,
		      settings: {
		        slidesToShow: 2,
         		slidesToScroll: 1,
         		dots: true,
         		arrows: true
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
         		slidesToScroll: 1,
         		dots: true,
         		arrows: true
		      }
		    }
		  ]
    });


})(jQuery);


