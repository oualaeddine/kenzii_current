// JavaScript Document
$(document).ready(function(e) {
			$(".device-nav").click(function(){
				$(this).find('span').toggleClass('fa-times').toggleClass('fa-bars');
				$("nav").toggleClass("reveal");
			});
			$('.navigation nav ul li a').smoothScroll();
			$('label.pink').click(function(e) {
                $('.pink-image').addClass('active');
				$('.whait-image').removeClass('active');
            });
			$('label.white').click(function(e) {
				$('.whait-image').addClass('active');
                $('.pink-image').removeClass('active');
            });
});