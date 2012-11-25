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


		function myWindow(minHeight,position) {
			this.minHeight=null;
			this.position=null;
		}

		MyWindow.prototype.minHeightSet = function () {
			this.forEach(function(){
				domStyle.set(this,"minHeight",ht);
			})
		}

		MyWindow.prototype.moveTo = function (position) {
			var current = this.height;
			this.height = new height;
		}

		var home= new myWindow()
		
	}
);