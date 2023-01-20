$(function () {
  $(".add").click(function () {
    var currentVal = parseInt($(".qty").val());
     
    console.log('plus');
    
    // var currentVal = $(".qty").val();

    if (currentVal <5) {
      $(this)
        .prev(".qty")
        .val(currentVal + 1);
        
        
    }
     
    // console.log(currentVal);

    //     // Get the unit price
    //     var unitPrice = parseInt($(".pz").val());
    //     console.log(unitPrice);

    //     // Calculate the total price
    //     var totalPrice = (currentVal+1) * unitPrice;
    //     console.log(totalPrice);

    //     // Update the total price display
    //     document.getElementByClassName("subtt")[0].innerHTML = totalPrice;
    
  });

  $(".minus").click(function () {
    var currentVal = parseInt($(this).next(".qty").val());
    if (currentVal != NaN) {
      if (currentVal > 1) {
        $(this)
          .next(".qty")
          .val(currentVal - 1);
      }
    }
    console.log('minus');
    // console.log(currentVal);

    //     // Get the unit price
    //     var unitPrice = parseInt($(".pz").val());
    //     console.log(unitPrice);

    //     // Calculate the total price
    //     var totalPrice = (currentVal-1) * unitPrice;
    //     console.log(totalPrice);

    //     // Update the total price display
    //     document.getElementByClassName("subtt").innerHTML = totalPrice;
    
  });
});
