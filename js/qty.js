var minus = document.querySelector(".btn-subtract")
var add = document.querySelector(".btn-add");
var quantityNumber = document.querySelector(".item-quantity");
var currentValue = 1;

minus.addEventListener("click", function(){
    currentValue -= 1;
    quantityNumber.value = currentValue;
    console.log(currentValue)
});

add.addEventListener("click", function() {
    currentValue += 1;
    quantityNumber.value = currentValue;
    console.log(currentValue);
});