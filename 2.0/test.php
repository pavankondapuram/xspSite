<!DOCTYPE html>
<html >
<head>
	<style type="text/css">.example{
  margin: 1em;
  text-align: center;
  padding: 1em;
  border: 2px solid black;
  color: white;
  background-color: blue;
  width: 200px;
  height: 100px;
}</style>
<script>dojoConfig = {async: true, parseOnLoad: false}</script><script src='http://ajax.googleapis.com/ajax/libs/dojo/1.8.1/dojo/dojo.js'></script><script>require(["dojo/dom-style", "dojo/dom", "dojo/on", "dojo/domReady!"],
function(style, dom, on){
  on(dom.byId("command"), "click", function(){
    var node = dom.byId("example");
    var computedStyle = style.getComputedStyle(node);
    var output = "computedStyle.width: " + computedStyle.width + "<br/>";
    output += "computedStyle.height: " + computedStyle.height + "<br/>";
    output += "computedStyle.backgroundColor: " + computedStyle.backgroundColor + "<br/>";
    dom.byId("output").innerHTML = output;
  });
});</script>
</head>
<body class="claro">
    <button id="command" type="button">getComputedStyle()</button>
<div class="example" id="example">Some example node</div>
<p><strong>Output:</strong></p>
<div id="output"></div>
</body>
</html>