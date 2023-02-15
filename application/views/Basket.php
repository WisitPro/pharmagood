<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="30">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Basket.css">
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
    <a href="<?php echo base_url();?>index.php/ProductController/Store"><button id="p2"><i class="fa-solid fa-prescription-bottle-medical"></i> ดูสินค้า</button></a>
    <p id="p1">ตะกร้าสินค้าของฉัน</p>
    <div id="p3">
        <div id="p4">
            <table class="table ">
                <thead style="width: 100%;">
                    <tr>
                        <th style="width:340px;padding-left:16px">สินค้า</th>
                        <th class="text-left" style="width:100px;">ราคา</th>
                        <th style="width: 170px;" class="text-center">จำนวน</th>
                        <th style="width:100px;" class="text-right">ราคารวม</th>
                        <th style="width: 50px;"></th>
                    </tr>
                </thead>
                <tbody class="tableRow">
                    <?php if ($this->cart->total_items() > 0) {$qty = 1;foreach ($cartItems as $item) {?>
                            <tr class="trB">
                                <td style="width:340px;padding-top: 12px;padding-left:16px"><strong><?php echo $item["name"]; ?></strong></td>
                                <td style="width:100px;padding-top: 12px;" id="price">
                                    <p><?php echo '' . $item["price"]; ?></p><input type="hidden" id="pz<?php echo $qty  ?>" value="<?php echo '' . $item["price"]; ?>" />
                                </td>
                                <td class="text-center" style="width: 170px;">
                                    <input type="button" value="-" class="minus text-center qtybt" id="minus<?php echo $qty ?>" />
                                    <input style="width:60px;cursor:default" class="qty text-center " type="text" value="<?php echo $item["qty"] ?>" id="qty<?php echo $qty  ?>" readonly />
                                    <input type="button" value="+" class="add text-center qtybt" id="add<?php echo $qty ?>" href="<?php echo base_url('/index.php/CartController/updateItemQty/'.$item["rowid"]); ?>"/>
                                </td>
                                <td style="padding-top: 12px;width:100px;" >
                                    <input class="text-right" style="width:50px;border:transparent;background:transparent;cursor:default;" disabled name="subtotal" type="text" class="subtt" id="subtt<?php echo $qty ?>" value=" <?php echo $item["subtotal"] ?>" >   
                                        <script>
                                            document.getElementById("add<?php echo $qty ?>").onclick = function() {
                                                var pz = document.getElementById("pz<?php echo $qty ?>");
                                                var qty = document.getElementById("qty<?php echo $qty ?>");
                                                if (qty.value >= <?php echo $item['limit']?>) {   
                                                    return;
                                                }    
                                                qty.value++;                                                
                                                document.getElementById("subtt<?php echo $qty ?>").value = pz.value * qty.value;
                                                updateTotal();
                                                window.location='<?php echo base_url('/index.php/CartController/updateItemQty/'.$item["rowid"].'/'); ?>'+qty.value;
                                            }
                                            document.getElementById("minus<?php echo $qty ?>").onclick = function() {
                                                var pz = document.getElementById("pz<?php echo $qty ?>");
                                                var qty = document.getElementById("qty<?php echo $qty ?>");
                                                if (qty.value <= 1) {
                                                    return;
                                                }
                                                qty.value--;
                                                document.getElementById("subtt<?php echo $qty ?>").value = pz.value * qty.value;
                                                updateTotal();  
                                                window.location='<?php echo base_url('/index.php/CartController/updateItemQty2/'.$item["rowid"].'/'); ?>'+qty.value;
                                            }
                                        </script>
                                    <span> บาท</span>
                                </td>
                                <td style="width: 50px;"><i class="fa fa-trash-o" style="padding-top: 2px;font-size:22px;color:red;cursor: pointer;" 
                                class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการลบรายการนี้หรือไม่')?
                            window.location.href='<?php echo base_url('/index.php/CartController/removeItem/' . $item["rowid"]); ?>':false;"></i> </td>
                            </tr>
                        <?php $qty++;}} else { ?>
                        <strong>
                            <h2 style="position:absolute;margin-left:250px;margin-top:180px">ไม่มีสินค้าในตะกร้าสินค้า</h2>
                        </strong>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <?php if ($this->cart->total_items() > 0) { ?>
            <span id="totalTxt">ราคาสุทธิ :<input  disabled class="text-right" type="text" id="total" value="<?php echo $this->cart->total(); ?>"></input> <span>บาท</span>
            <span id="buttonbar">
                <a href="<?php echo base_url('/index.php/OrderController/Ordering'); ?>"><button id="btGo" >ชำระเงิน</button></a>
            </span>
        <?php } ?>
    </div>
</body>
</html>
<script>
    function updateCartItem(obj, rowid) {
        $.get("<?php echo base_url('CartController/updateItemQty/'); ?>", {
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
</script>