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
	var pos = $(window).innerHeight(),
		scrlTo = ($(this).index())*pos;
	$(".wrapper").css("min-height",pos+"px");

	$("footer").css("top",pos-28+"px");

	$("nav ul li").click(function(){
		$("nav ul li").removeClass("selected");
		$(this).addClass("selected");

		//$(this).animate("#"+$(this).html().toLowerCase().replace(/\s/g));
		$(window).animate({scrollTop:scrlTo},'slow');
		console.log($(this).index());
	})
});