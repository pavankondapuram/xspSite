require(["dojo/window",
		"dojo/query",
		"dojo/dom-style",
		"dojo/on",
		"dojo/dom-geometry",
		"dojo/dom",
		"dojo/html",
		"dojo/NodeList-manipulate",
		"dojo/_base/lang",
		"dojo/dom-class",
		"dojo/_base/fx",
		"dojo/domReady!"],

	function(win,query,domStyle,on,domClass,fx){
		/*var vs = win.getBox(),
		wrpHt = vs.h+"px",
		ftPsn = (vs.h-24)+"px",
		wrp = query(".wrapper"),
		footer = query("footer"),
		wrpStl = domStyle.get(wrp,"min-height"),
		des = query("nav ul li"),
		hmDv = query("#home");*/

		/*console.log(vs.h);
		wrp.forEach(function(wrp){
			domStyle.set(wrp,"minHeight",wrpHt);
		});

		domStyle.set(footer[0],"top",ftPsn);
		
		on(des,"click",function(){
			var inrCnt = this.innerHTML.toLowerCase().replace(/\s/g, '');

			//console.log(inrCnt);
			//location.hash= "#"+inrCnt;
			//win.scrollIntoView(inrCnt);
			fx.anim(this, win.scrollIntoView(inrCnt), 300);
			domClass.toggle(this, "selected");

		});*/


		function MyWindow() {
			this.minHeight = null;
		}

		MyWindow.prototype.move = function () {
			this.minHeight= win.getBox().h;
		}

		MyWindow.prototype.moveTo = function (position) {
			var current = this.height;
			this.height = new height;
		}



		var window = new MyWindow();
		window.move();



		var movinWin = {
			windw:query(".wrapper"),
			windwDim:win.getBox(),
			ht:windwDim.h+"px",
			ft:query("footer"),
			ftPsn:(vs.h-24)+"px",
			trgr:query("nav ul li"),
		}

		function movinWin(ht){

			this.windw.forEach(function(){
				domStyle.set(windw,"minHeight",ht);
			})
		}
		
	}
);