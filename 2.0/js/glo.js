require(["dojo/window",
		"dojo/query",
		"dojo/dom-style",
		"dojo/on",
		"dojo/dom-geometry",
		"dojo/dom",
		"dojo/html",
		"dojo/NodeList-manipulate",
		"dojo/_base/lang",
		"dojo/domReady!"],

	function(win,query,domStyle,on){
		var vs = win.getBox(),
		wrpHt = vs.h+"px",
		ftPsn = (vs.h-24)+"px",
		wrp = query(".wrapper"),
		footer = query("footer"),
		wrpStl = domStyle.get(wrp,"min-height"),
		des = query("nav ul li"),
		hmDv = query("#home");

		console.log(vs.h);
		wrp.forEach(function(wrp){
			domStyle.set(wrp,"minHeight",wrpHt);
		});

		domStyle.set(footer[0],"top",ftPsn);

		/*if(wrpHt>800){
			domStyle.set(hmDv[0],backgroundPsition,"50% bottom")
		};*/
	
		/*on(des,"click",function(){
			alert(this);
		})*/
		on(des,"click",function(win){
			var inrCnt = this.innerHTML.trim().toLowerCase();

			//console.log(inrCnt);
			location.hash= "#"+inrCnt;
		});
	}
);