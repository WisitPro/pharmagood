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

    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <a id="btHome" href="<?php echo base_url('/index.php/controller/HomePage3'); ?>">หน้าหลัก</a>
            <a id="btHistory" href="<?php echo base_url('/index.php/controller/OrderHistory'); ?>"><i class="fa-solid fa-clock-rotate-left"></i> ประวัติการซื้อ</a>
            <a id="btCart" href="<?php echo base_url(); ?>index.php/Cart"><i class="fa-solid fa-basket-shopping"></i><?php echo ($this->cart->total_items() > 0) ? ' ตะกร้าสินค้า (' . $this->cart->total_items() . ')' : ' ตะกร้าสินค้า'; ?></a>
            <a id="btOut" onclick="Out()" style="cursor:pointer;">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>

    </nav>
    <a href="<?php echo base_url(); ?>index.php/controller/Store"><button id="p2"><i class="fa-solid fa-prescription-bottle-medical"></i> ดูสินค้า</button></a>
    <p id="p1">ประวัติการซื้อของฉัน</p>


    <div id="p3">
        <div id="p4">

            <table class="table ">
                <thead style="width: 100%;font-size: 20px;">
                    <!-- 660px -->
                    <tr>
                        <th style="width:26px;"></th>
                        <th style="width:340px">สินค้า</th>
                        <th style="width:100px">ราคา</th>
                        <th style="width:30px">จำนวน</th>
                        <th class="text-right" style="width:100px">ราคารวม</th>
                        <th class="text-right" style="width:120px">วันที่สั่งซื้อ</th>

                    </tr>
                </thead>
                <tbody class="tableRow" style="font-size: 16px;">
                    <?php


                    $qty = 1;
                    foreach ($order_history as $row) {
                        $formatted_date = date("d/m/Y", strtotime($row->order_datetime));
                        $pro_price = number_format($row->pro_price);
                        $sub_total = number_format($row->sub_total);
                    ?>

                        <tr class="trB">
                            <td style="width:10px"><?php echo $qty; ?></td>
                            <td style="width:340px"><strong><?php echo $row->pro_name; ?></strong></td>
                            <td style="width:100px"><?php echo $pro_price ?></td>
                            <td class="text-center" style="width:72px"><?php echo $row->qty; ?></td>
                            <td class="text-right" style="width:100px"><?php echo $sub_total; ?></td>
                            <td class="text-right" style="width:120px"><?php echo $formatted_date ?></td>



                        </tr>
                    <?php
                        $qty++;
                    }

                    ?>
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