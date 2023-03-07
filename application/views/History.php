<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="refresh" content="30">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/History.css">
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
    <p id="p1">ประวัติการซื้อของฉัน</p>
    <div id="p3">
        <div id="p4">
            <table class="table">
                <thead style="font-size: 20px;">
                    <tr>
                        <th style="width:26px;"></th>
                        <th style="width:768px" colspan="5">รายการ</th>
                    </tr>
                </thead>
                <tbody class="tableRow" style="font-size: 16px;">
                    <?php
                    foreach ($order_history as $ol_id => $orderlists) :
                        $order_id = $orderlists[0]->order_id;
                        $order_datetime = date('วันที่ ' . 'd-m-Y' . ' เวลา ' . ' H:i', strtotime($orderlists[0]->order_datetime)) . ' น.';
                    ?>
                        <tr class="trB" style="background: #F79A56;color:white;border-top: 2px solid #464646; ">
                            <td style="width:10px"></td>
                            <td colspan="3" style="width:900px"><strong>ออเดอร์ <?php echo $orderlists[0]->order_id ?></strong></td>
                            <td colspan="2" class="text-right" style="background-color: #F79A56;">
                                    <strong></strong>
                                </td>
                            <!-- <?php if ($orderlists[0]->order_status == "ชำระเงินแล้ว") { ?>
                                <td colspan="2" class="text-right tdstatus" onclick="Confirm('<?php echo $order_id ?>')" style="background-color: #68B3F8;">
                                    <strong>ได้รับสินค้าแล้ว</strong>
                                </td>
                            <?php } else { ?>
                                <td colspan="2" class="text-right" style="background-color: #F79A56;">
                                    <strong></strong>
                                </td>
                            <?php } ?> -->
                        </tr>
                        <!-- <tr class="trB" style="background: #F79A56;color:white;border-top: 2px solid #464646; ">
                            <td style="width:10px"></td>
                            <td colspan="3" style="width:900px"><strong>ออเดอร์ <?php echo $orderlists[0]->order_id ?></strong></td>
                            <?php if ($orderlists[0]->order_status == "ชำระเงินแล้ว") { ?>
                                <td colspan="2" class="text-right" >
                                   
                                </td>
                            <?php } else { ?>
                                <td colspan="2" class="text-right" >
                                   
                                </td>
                            <?php } ?>
                        </tr> -->

                        <?php $line = 1;
                        foreach ($orderlists as $item) : ?>
                            <tr>
                                <td style="width:26px;"></td>
                                <td colspan="3" style="width:340px"><?php echo $line ?>) <?php echo $item->pro_name ?></td>
                                
                               
                                <td class="text-center" style="width:100px"><?php echo $item->qty ?></td>
                                <td class="text-right" style="width:120px"><?php echo $item->sub_total ?></td>
                            </tr>
                        <?php $line++;
                        endforeach; ?>
                        <tr class="trB">
                            <td style="width:10px"></td>
                            <td style="width:340px"><strong><?php echo $order_datetime ?></strong></td>
                           
                            <td colspan="2" class="text-right" style="width:100px"><strong>ยอดสั่งซื้อรวม</strong></td>
                            <td colspan="2" class="text-right" style="width:120px;color:#F79A56;"><strong><?php echo $orderlists[0]->order_total ?> บาท</strong></td>
                        </tr>
                        <tr class="trB">
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
    function Confirm(order_id) {
        if (confirm('คุณได้รับสินค้าของออเดอร์นี้แล้วใช่หรือไม่')) window.location.href = '<?php echo base_url('/index.php/OrderController/OrderSuccess/'); ?>' + order_id;
    }

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