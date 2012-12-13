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

/*$(function()
{
	$('body').jScrollPane();
});*/

$(function(){
	var pos = $(window).innerHeight();
	$(".wrapper").css("min-height",pos);

	$("footer").css("top",pos-26+"px");

	$("nav ul li").click(function(){

		var clicked = $(this).html().toLowerCase().replace(/\s/g, '');

		$("nav ul li").removeClass("selected");
		$(this).addClass("selected");

		//$("body,html").animate({scrollTop:($(this).index())*pos},300,"swing");
		
		//console.log(clicked);//$("body,html").scrollTo($(clicked),{duration:300});
		$("body,html").scrollTo("#"+clicked, 600);
		
	});

	$(window).scroll(function(){
		//var posss = ($("nav ul li").offset().top);
		//var posss = scrollTo();
		//console.log(posss);
	});
});


//contact form validation

$(document).ready(function(){
    $("#myform").validate({
      debug: false,
      rules: {
        name: "required",
        contact_no: { 
                required:true,
                number:true
        },
        email: {
          required: true,
          email: true
        },
        message: "required"
      },
      messages: {
        name: "Please let us know who you are",
        contact_no: "Please provide your contact number",
        email: "A valid email will help us get in touch with you",
        message: "Pleasge enter a message",
      },
      submitHandler: function(form) {
        // do other stuff for a valid form
        $.post('admin/cu-core-functions.php', $("#myform").serialize(), function(data) {
          $('#results').html(data);
          document.getElementById('myform').reset();
        });
      }
    });
  });