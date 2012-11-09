require(["dojo/window","dojo/query","dojo/dom-style"],
	function(win,query,domStyle){
		var vs = win.getBox(),
		wrapper = query(".wrapper"),
		wrapperStyles = domStyle.get(wrapper[0]);
		console.log(vs.h);
		console.log(wrapper);
		console.log(wrapperStyles);
		dojo.style(wrapper[1],"min-height",vs.h+"px");
		console.log(domStyle.get(wrapper[0]));
	}
);