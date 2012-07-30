$(document).ready(function() {	
	/*$('.home').mousedown(function(){
		$(this).css('background', 'url(images/sprite.png) no-repeat -222px -402px');
	});
	$('.home').mouseover(function(){
		$(this).css('background','url(images/sprite.png) no-repeat -109px -403px');
	})
	$('.home').mouseup(function(){
		$(this).css('background','url(images/sprite.png) no-repeat -109px -403px');
	})
	$('.home').mouseout(function(){
		$(this).css('background','url(images/sprite.png) no-repeat 1px -402px');
	})
	
	
	
	$('.team').mousedown(function(){
		$(this).css('background','url(images/sprite.png) no-repeat -223px -515px');
	});
	$('.team').mouseover(function(){
		$(this).css('background','url(images/sprite.png) no-repeat -110px -516px');
	})
	$('.team').mouseup(function(){
		$(this).css('background','url(images/sprite.png) no-repeat -110px -516px');
	})
	$('.team').mouseout(function(){
		$(this).css('background','url(images/sprite.png) no-repeat 0 -515px');
	})
	
	
	
	$('.contact').mousedown(function(){
		$(this).css('background','url(images/sprite.png) no-repeat -223px -630px');
	});
	$('.contact').mouseover(function(){
		$(this).css('background','url(images/sprite.png) no-repeat -110px -631px');
	})
	$('.contact').mouseup(function(){
		$(this).css('background','url(images/sprite.png) no-repeat -110px -631px');
	})
	$('.contact').mouseout(function(){
		$(this).css('background','url(images/sprite.png) no-repeat 0 -630px');
	});*/
	
	
	
	$('#coda-slider-1').codaSlider();  
	jQuery('#parallax').jparallax({
	});
	
	
	$('.overviewB, .servicesB, .ways, .about, .contact').click(function () {
		$('nav a').removeClass('select'),
		$(this).addClass('select');
	});
});