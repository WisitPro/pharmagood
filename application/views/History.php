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
    <script>
        function updateTotal() {
            var subtt = document.getElementsByName("subtotal");
            var total = 0;
            for (var i = 0; i < subtt.length; i++) {
                total += parseFloat(subtt[i].value);
            }

            document.getElementById("total").value = total;
        }
    </script>

    
    <a href="<?php echo base_url(); ?>index.php/controller/Store"><button id="p2"><i class="fa-solid fa-prescription-bottle-medical"></i> ดูสินค้า</button></a>
    <p id="p1">ประวัติการซื้อของฉัน</p>


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
                   
                    foreach ($order_history as $ol_id => $orderlists):
                        $order_id =$orderlists[0]->order_id;
                        $order_datetime = date('วันที่ '.'d-m-Y'.' เวลา '.' H:i', strtotime($orderlists[0]->order_datetime)).' น.';
                    ?>
                        <tr class="trB" style="background: #F79A56;color:white;border-top: 2px solid #464646; ">
                            <td style="width:10px"></td>
                            <td colspan="3" style="width:900px"><strong>ออเดอร์ <?php echo $orderlists[0]->order_id?></strong></td>                          
                            
                           
                           <?php if($orderlists[0]->order_status== "ชำระเงินแล้ว"){ ?>
                            <td colspan="2" class="text-right tdstatus" 
                            onclick="Confirm('<?php echo $order_id ?>')" style="background-color: #68B3F8;" >
                            <strong>ได้รับสินค้าแล้ว</strong></td>
                            <?php }else{?>
                                <td colspan="2" class="text-right" style="background-color: #F79A56;" >
                                <strong>ได้รับสินค้าแล้ว</strong></td>
                                <?php }?>
                        </tr>
                        
                        <?php
                         $line = 1;
                            foreach ($orderlists as $item):
                               
                        ?>
                                <tr>
                                    <td style="width:26px;"></td>
                                    <td style="width:340px"><?php echo $line ?>) <?php echo $item->pro_name?></td>
                                    <td style="width:100px"><?php echo $item->qty?></td>
                                    <td class="text-center" style="width:30px"></td>
                                    <td class="text-right" style="width:100px"></td>
                                    <td class="text-right" style="width:120px"><?php echo $item->sub_total?></td>
                                </tr>
                            <?php $line++; endforeach; ?>
                            <tr class="trB">
                            <td style="width:10px"></td>
                            <td style="width:340px"><strong><?php echo $order_datetime?></strong></td>                          
                            <td style="width:100px"></td>
                            <td class="text-center" style="width:72px"></td>
                            <td class="text-right" style="width:100px"><strong>รวม</strong></td>
                            <td class="text-right" style="width:120px;color:#F79A56;"><strong><?php echo $orderlists[0]->order_total?></strong></td>
                        </tr>
                        <tr class="trB" >
                            <td style="width:10px"></td>
                            <td style="width:340px"></td>                          
                            <td style="width:100px"></td>
                            <td class="text-center" style="width:72px"></td>
                            <td class="text-right" style="width:100px"></td>
                            <td class="text-right" style="width:120px;color:#F79A56;"></td>
                        </tr>
                        <?php endforeach; ?>
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
    function Out() {
        if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href = '<?php echo base_url('/index.php/controller/CusLogout'); ?>';

    }
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