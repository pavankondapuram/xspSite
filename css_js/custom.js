$(function() {	
	//$('#coda-slider-1').codaSlider();  
	jQuery('#parallax').jparallax({
	});
	
	/*$('.overviewB, .servicesB, .ways, .about, .contact').click(function () {
		$('nav a').removeClass('select'),
		$(this).addClass('select');
	});*/

	$('#gallery .item .scrnSht').hide();
	$('#gallery .item').click(function(){
		$('#gallery .item .scrnSht').hide();
		$(this).children('.scrnSht').show();
	})
	
});