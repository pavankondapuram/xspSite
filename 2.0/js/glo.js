require(["dojo/window","dojo/query"],
	function(win,query){
		var vs = win.getBox(),
		wrapper = query(".wrapper");
		console.log(vs.h);
		console.log(wrapper);
	}
);