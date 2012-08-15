$(document).ready(function() {
                $('.dropdown').mouseenter(function(){
 		 $('.sublinks').stop(false, true).hide();

 		var submenu = $(this).parent().next();

 		submenu.css({
 		position:'absolute',
 	 	top: $(this).offset().top + $(this).height() + 'px',
  		left: $(this).offset().left + 'px',
  		zIndex:1000
  		});

 		submenu.stop().slideDown(600);

 		submenu.mouseleave(function(){
  		$(this).slideUp(600);
  		});
  });

});


