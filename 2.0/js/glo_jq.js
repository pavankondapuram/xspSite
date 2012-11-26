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
	$(".wrapper").css("min-height",$(window).innerHeight()+"px");

	$("footer").css("top",($(window).innerHeight())-28+"px");

	$("nav ul li").click(function(){
		$("nav ul li").removeClass("selected");
		$(this).addClass("selected");

		$(window).scroll("#"+$(this).html().toLowerCase().replace(/\s/g, ''));
		console.log($(this).html().toLowerCase().replace(/\s/g, ''));
	})
});