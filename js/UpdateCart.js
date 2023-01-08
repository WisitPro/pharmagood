$(function()
{
    $(".add").click(function()
    {
        var currentVal = parseInt($(this).prev(".qty").val());

        if (currentVal != NaN)
        {
            $(this).prev(".qty").val(currentVal + 1);
         
        }
        
    });

    $(".minus").click(function()
    {
        var currentVal = parseInt($(this).next(".qty").val());
        if (currentVal != NaN)
        {
            if(currentVal > 0){
                    $(this).next(".qty").val(currentVal - 1);
                }

        }
    });
}); 