require(["dojo/window","dojo/query","dojo/dom","dojo/NodeList-dom"], function(win,query){
	var vpSize = win.getBox(),
   		wrapper = query(".wrapper");
	console.log(vpSize.h);

	wrapper.style("min-height", vpSize);
});