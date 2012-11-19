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