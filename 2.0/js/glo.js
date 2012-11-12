require(["dojo/window","dojo/query","dojo/dom-style","dojo/on","dojo/dom-geometry","dojo/html"],
	function(win,query,domStyle,on){
		var vs = win.getBox(),
		wrpHt = vs.h+"px",
		ftPsn = (vs.h-24)+"px",
		wrp = query(".wrapper"),
		footer = query("footer"),
		wrpStl = domStyle.get(wrp,"min-height"),
		des = query("nav ul li");

		console.log(vs.h);
		wrp.forEach(function(wrp){
			domStyle.set(wrp,"minHeight",wrpHt)
		});

		domStyle.set(footer[0],"top",ftPsn);
	
		/*on(des,"click",function(){
			alert(this);
		})*/
		
		des.onclick(function(){
			this.style("display","none");
		})

	}
);