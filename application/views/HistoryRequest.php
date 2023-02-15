<!-- <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script> -->
<!-- <?php

        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
        ?> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/History.css">
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/qtyxprice.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/UpdateCart.js"></script> -->
</head>


<body onload="updateTotal()">


    
    <!-- <a href="<?php echo base_url(); ?>index.php/ProductController/Store"><button id="p2"><i class="fa-solid fa-prescription-bottle-medical"></i> ดูสินค้า</button></a> -->
    <p id="p1">ประวัตินัดปรึกษาของฉัน</p>


    <div id="p3">
        <div id="p4">

            <table class="table" >
                <thead style="font-size: 20px;">
                    <!-- 660px -->
                    <tr>
                        <th style="width:26px;"></th>
                        <th style="width:768px" colspan="5">รายการ</th>
                       
                    </tr>
                </thead>
                <tbody class="tableRow" style="font-size: 16px;">
                    <?php 
                    $line = 1;
                    foreach ($request_list as $list):                  
                        $req_modify = date('วันที่ '.'d-m-Y'.' เวลา '.' H:i', strtotime($list->req_modify)).' น.';
                        $req_time = date('วันที่นัด '.'d-m-Y'.' เวลา '.' H:i', strtotime($list->req_time)).' น.';
                    ?>
                        <tr class="trB" style="border-top: 2px solid #F79A56; ">
                            <td style="width:10px"><?php echo $line ?></td>
                            <td colspan="3" style="width:300px" ><strong>อาการที่ปรึกษา <?php echo $list->req_sym ?></strong></td>                          
                            <td colspan="3" style="width:500px" class="text-right"><?php echo  $req_time ?></td>
                        </tr>
                        
                        <tr class="trB" >
                                              
                            <td colspan="12" style="width:500px" class="text-left"><?php echo  $list->req_status ?> <?php echo  $req_modify ?></td>
                        </tr>
                        <tr  >
                            <td colspan="12"></td>
                            
                        </tr>
                       
                        <?php  $line++; endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
<script>
    // const subtotal = document.getElementByClassName('subtt')[0];
    // console.log(subtotal);
    // subotal.getElementByClassName('subtt')[0].innerHTML = "New text!";
</script>
<script>
   
    function Confirm(order_id) {
        if (confirm('คุณได้รับสินค้าของออเดอร์นี้แล้วใช่หรือไม่')) window.location.href ='<?php echo base_url('/index.php/OrderController/OrderSuccess/'); ?>'+ order_id;
            
        

    }

    function updateCartItem(obj, rowid) {
        $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {
            rowid: rowid,
            qty: obj.value
        }, function(resp) {
            if (resp == 'ok') {
                location.reload();
            } else {
                alert('Cart update failed, please try again.');
            }
        });
    }

    // function updatePrice() {
    //     // Get the quantity value
    //     var quantity = document.getElementByClassName("qty").value;
    //     console.log(quantity)

    //     // Get the unit price
    //     var unitPrice = document.getElementByClassName("pz").value;
    //     console.log(unitPrice)

    //     // Calculate the total price
    //     var totalPrice = quantity * unitPrice;
    //     console.log(totalPrice)

    //     // Update the total price display
    //     document.getElementById("subtt").innerHTML = totalPrice;
    // }
</script>