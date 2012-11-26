function windw(resize,navigate){
	this.resize="null";
	this.navigate="";
}

windw.prototype.resize = function(){
	var winMinHt = $("html").innerHTML(),
		sectn = $(this);

	sectn.css("min-height",winMinHt+"px");
}