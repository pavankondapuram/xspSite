require(["dojo/window","dojo/query","dojo/dom","dojo/NodeList-dom"], 
	function(win){
		var vpSize = win.getBox();


		//wrapper = query(".wrapper");
		dojo.query(".wrapper").style("min-height",vpSize.h);
		console.log(vpSize.h);
});