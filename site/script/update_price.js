var price_p = document.getElementById("price");
var base_price = parseInt(document.getElementById("base_price").innerText);
var people_input = document.getElementById("people");

people_input.addEventListener("input", function () {
    if(people_input.value != "") {
        price = base_price * parseInt(people_input.value);
        price_p.innerText = "$" + price;
    }
});
