$(function() {
    var price = parseFloat($('#price').text());
  
    $('#subtract').on("click",function() {
      var $qty = $('#qty');
      var current = parseInt($qty.val());
      if ( current > 0 ) {
          $qty.val(current-1);
          $('#Subtotal').val(price*(current-1));
      } else {
          $('#Subtotal').val(0);
      }
    });
  
    $('#add').on("click",function() {
      var $qty = $('#qty');
      var current = parseInt($qty.val());
      $qty.val(current+1);
      $('#Subtotal').val(price*(current+1));
    });
  });    