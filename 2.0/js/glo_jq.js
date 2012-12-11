/*function windw(resize,navigate){
	this.resize="null";
	this.navigate="";
};

windw.prototype.resize = function(){
	var winMinHt = $("html").innerHTML(),
		sectn = $(this);

	sectn.css("min-height",winMinHt+"px");
};

var home = new windw();*/

$(function(){
	var pos = $(window).innerHeight();
	$(".wrapper").css("min-height",pos-120+"px");

	$("footer").css("top",pos-28+"px");

	$("nav ul li").click(function(){

		var clicked = $(this).html().toLowerCase().replace(/\s/g, '');

		$("nav ul li").removeClass("selected");
		$(this).addClass("selected");

		//$("body,html").animate({scrollTop:($(this).index())*pos},300,"swing");
		
		console.log(clicked);//$("body,html").scrollTo($(clicked),{duration:300});
		
	});

	$(window).scroll(function(){
		var posss = ($("nav ul li").offset().top);
	});
});