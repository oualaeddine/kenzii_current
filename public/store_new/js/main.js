

(function($){ "use strict";
             
    $(window).on('load', function() {
        $('body').addClass('loaded');
    });

 /*=========================================================================
	shaky button
=========================================================================*/ 

    $( document ).ready(function() {
        setInterval(function() {
         var div = document.getElementsByClassName('btn-shaky');
         var interval = 100;
         var distance = 10;
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


})(jQuery);
