

var myArray = [1,2];
myArray.push(3);
console.log(object.getPrototypeOf(push));
myArray.reverse();
myArray.pop();
var lenght = myArray.lenght;
console.log(myArray,lenght);

var point = {
	x:10,
	y:5,
	add: function(otherPoint) {
		this.x += otherPoint.x;
		this.y += otherPoint.y;
	}
};