<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="refresh" content="30">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/History.css">
</head>

<body onload="updateTotal()">
    <p id="p1">ประวัตินัดปรึกษาของฉัน</p>
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
                    $line = 1;
                    foreach ($request_list as $list) :
                        $req_modify = date('วันที่ ' . 'd-m-Y' . ' เวลา ' . ' H:i', strtotime($list->req_modify)) . ' น.';
                        $req_time = date('วันที่นัด ' . 'd-m-Y' . ' เวลา ' . ' H:i', strtotime($list->req_time)) . ' น.';
                    ?>
                        <tr class="trB" style="border-top: 2px solid #F79A56; ">
                            <td style="width:10px"><?php echo $line ?></td>
                            <td colspan="3" style="width:300px"><strong>อาการที่ปรึกษา <?php echo $list->req_sym ?></strong></td>
                            <td colspan="3" style="width:500px" class="text-right"><?php echo  $req_time ?></td>
                        </tr>
                        <tr class="trB">
                            <td colspan="12" style="width:500px" class="text-left"><?php echo  $list->req_status ?> <?php echo  $req_modify ?></td>
                        </tr>
                        <tr>
                            <td colspan="12"></td>
                        </tr>
                    <?php $line++;
                    endforeach; ?>
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
</script>