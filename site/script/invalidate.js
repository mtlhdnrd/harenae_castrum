var from_input = document.getElementById("from");
var datalist = document.getElementById("planet_list").children;

var number_of_planets = datalist.length;

var planets = new Array();
for(var i = 0; i < number_of_planets; i++) {
    planets.push(datalist[i].value);
}

console.log(planets);

from_input.addEventListener("input", function() {
    if(planets.includes(from_input.value)) {
        console.log("planet found");
        from_input.setCustomValidity("");
    } else {
        console.log("unknown planet");
        from_input.setCustomValidity("Invalid field.");
    }
});
