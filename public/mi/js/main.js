/* Sintex Theme Scripts */

(function($){ "use strict";
             
    $(window).on('load', function() {
        $('body').addClass('loaded');
    });

             
/*=========================================================================
	Sticky Header
=========================================================================*/ 
	$(function() {
		var header = $("#header"),
			yOffset = 0,
			triggerPoint = 80;
		$(window).on( 'scroll', function() {
			yOffset = $(window).scrollTop();

			if (yOffset >= triggerPoint) {
				header.addClass("navbar-fixed-top");
			} else {
				header.removeClass("navbar-fixed-top");
			}

		});
	});

 /*=========================================================================
	shaky button
=========================================================================*/ 

    $( document ).ready(function() {
        setInterval(function() {
         var div = document.getElementsByClassName('btn-shaky');
         var interval = 100;
         var distance = 500;
         var times = 6;
   
         $(div).css('position', 'relative');
   
         for (var iter = 0; iter < (times + 1) ; iter++) {
             $(div).animate({
                 left: ((iter % 2 == 0 ? distance : distance * -1))
             }, interval);
         }                                                                                                          
         $(div).animate({ left: 0 }, interval);

                                                                                                        
       

        },5000);
  });
/*=========================================================================
        Mobile Menu
=========================================================================*/  
    $('.menu-wrap ul.nav').slicknav({
        prependTo: '.header-section .navbar',
        label: '',
        allowParentLinks: true
    });          

/*=========================================================================
    Product Carousel
=========================================================================*/
	$('#product-carousel').owlCarousel({
        loop: true,
        margin: 15,
        autoplay: true,
        smartSpeed: 500,
        items: 1,
        nav: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        dots: true,
        responsive : {
			0 : {
				items: 1,
			},
			480 : {
				items: 2,
			},
			768 : {
				items: 2
			},
			992 : {
				items: 4
			}
		}
    });

/*=========================================================================
    Testimonial Carousel
=========================================================================*/
	$('#testimonial-carousel').owlCarousel({
        loop: true,
        margin: 15,
        autoplay: true,
        smartSpeed: 500,
        items: 1,
        nav: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        dots: true,
        responsive : {
			0 : {
				items: 1,
			},
			480 : {
				items: 2,
			},
			768 : {
				items: 2
			},
			992 : {
				items: 4
			}
		}
    });

/*=========================================================================
    Sponsor Carousel
=========================================================================*/
    $('#sponsor-carousel').owlCarousel({
        loop: true,
        margin: 40,
        autoplay: true,
        smartSpeed: 500,
        nav: false,
        dots: false,
        responsive : {
            0 : {
                items: 2
            },
            480 : {
                items: 3,
            },
            768 : {
                items: 4
            },
            992 : {
                items: 6
            }
        }
    });

/*=========================================================================
	Initialize smoothscroll plugin
=========================================================================*/
	smoothScroll.init({
		offset: 60
	});
	 
/*=========================================================================
	Scroll To Top
=========================================================================*/ 
    $(window).on( 'scroll', function () {
        if ($(this).scrollTop() > 100) {
            $('#scroll-to-top').fadeIn();
        } else {
            $('#scroll-to-top').fadeOut();
        }
    });

})(jQuery);
