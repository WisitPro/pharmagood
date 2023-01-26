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
    <title>Pharma Good | เข้าสู่ระบบ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Payment.css">
   
    
</head>


<body onload="disBt()">
    
    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <a id="btHome" onclick="return confirm('คุณต้องการยกเลิกการชำระนี้หรือไม่')" href="<?php echo base_url('/index.php/controller/HomePage3'); ?>">หน้าหลัก</a>

            <!-- <a id="btCart" href="Cart"><i class="fa-solid fa-basket-shopping"></i> ตะกร้าสินค้า</a>
            <a id="btOut" onclick="Out()" style="cursor:pointer;">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a> -->
        </div>

    </nav>
    <a href="<?php echo base_url(); ?>index.php/Cart" onclick="return confirm('คุณต้องการยกเลิกการชำระนี้หรือไม่')"><button id="p2"><i class="fa-solid fa-caret-left"></i> กลับ</button></a>
    <p id="p1">หน้าชำระเงิน</p>


    <div id="p3">
        <div id="p4">

            <table class="table ">
                <thead style="width: 100%;">
                    <tr>
                        <th style="width:30px "></th>
                        <th style="width:250px;">สินค้า</th>
                        <th class="text-right" style="width:70px;">ราคา</th>
                        <th style="width: 60px;" class="text-center">จำนวน</th>
                        <th style="width:70px;" class="text-right">รวม</th>

                    </tr>
                </thead>
                <tbody class="tableRow">
                    <?php

                    if ($this->cart->total_items() > 0) {
                        $qty = 1;
                        foreach ($cartItems as $item) {
                    ?>

                            <tr  class="trB">
                                <td  class="text-right" style="width:30px "><?php echo $qty ?></td>
                                <td style="width:250px;"><strong><?php echo $item["name"]; ?></strong></td>
                                <td class="text-right" style="width:70px;" id="price">
                                    <p><?php echo '' . $item["price"]; ?></p>
                                </td>
                                <td class="text-right" style="width: 40px;">
                                    <!-- <input type="button" value="-" class="minus text-center qtybt" id="minus<?php echo $qty ?>" /> -->
                                    <p style="width:50px;cursor:default;" class="qty text-center " id="qty<?php echo $qty  ?>"><?php echo $item["qty"] ?></p>
                                    <!-- <input type="button" value="+" class="add text-center qtybt" id="add<?php echo $qty ?>" href="<?php echo base_url('/index.php/Cart/updateItemQty/' . $item["rowid"]); ?>"/> -->
                                </td>

                                <td style="width:70px;" class="text-right">
                                    <span class="text-right" style="width:50px;border:transparent;background:transparent;cursor:default;" class="subtt" id="subtt<?php echo $qty ?>"><?php echo $item["subtotal"] ?></span>
                                    <span> บาท</span>

                                </td>


                            </tr>
                        <?php
                            $qty++;
                        }
                    } else { ?>
                        <strong>
                            <h2 style="position:absolute;margin-left:250px;margin-top:180px">ไม่มีสินค้าในตะกร้าสินค้า</h2>
                        </strong>
                    <?php }
                    ?>
                </tbody>
            </table>
            
        </div>
        
        <form action="<?php echo base_url('/index.php/controller/Checkout'); ?>">
        <div id="paymentinput">
            <p id="a2">เลขที่บัญชี :</p>
            <input  type="text"  class="in"  readonly ></input><br><br>
            <p >ธนาคาร :</p>
            <input  type="text"  class="in" readonly ></input><br><br>
            <p >ชื่อบัญชี :</p>
            <input  type="text"  class="in" readonly ></input><br><br>
            <p ><span style="color:red">* </span>สลิปโอนเงิน :</p>
            <input id="slip" type="file" name="pay_slip" accept="image/png, image/gif, image/jpeg" required />
        </div>

        <?php if ($this->cart->total_items() > 0) { ?>
            <span id="totalTxt">ราคาสุทธิ :<input disabled class="text-right" type="text" id="total" value="<?php echo $this->cart->total(); ?>"></input> <span>บาท</span>
                <span id="buttonbar">

                <!-- <a href="<?php echo base_url('/index.php/controller/Checkout'); ?>"> -->
                <button  id="btGo" type="submit" >ยืนยันการชำระเงิน</button>
            <!-- </a> -->
                </span>
                </form>

            <?php

        } ?>
    </div>
</body>

</html>

<script>
    
   
    var fileInput = document.getElementById("slip");   
    var payButton = document.getElementById("btGo");


    function disBt(){
        payButton.disabled = true;
    }
    
    fileInput.oninput = function() {
        if (fileInput.files.length > 0) {
            payButton.disabled = false;
            payButton.style.backgroundColor = "#68B3F8";
        }
        else{
            payButton.disabled = true;
            payButton.style.backgroundColor = "#aac5d5";
        }
    
    }
    

</script>

<script>
    
    function Out() {
        if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href = '<?php echo base_url('/index.php/controller/CusLogout'); ?>';

    }

    


    // function updateCartItem(obj, rowid) {
    //     $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {
    //         rowid: rowid,
    //         qty: obj.value
    //     }, function(resp) {
    //         if (resp == 'ok') {
    //             location.reload();
    //         } else {
    //             alert('Cart update failed, please try again.');
    //         }
    //     });
    // }

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