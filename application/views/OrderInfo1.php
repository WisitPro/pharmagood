<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="30">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/OrderInfo.css">
</head>
<body>
<br><br>     
        <div id="backform" class="animate-bottom">
            <table >
                <tr id="tr1">
                    <th style="width:60px ;text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56">ลำดับ</th>
                    <th style="min-width:150px ;text-indent: 4px;">รหัสการแจ้งโอน</th>
                    <th style="min-width:110px ;">เลขออเดอร์</th>
                    <th style="width:62px ;" class="text-right">ราคา</th>
                    <th style="width:300px ;">ลูกค้า</th>
                    <th style="width:250px;">เวลาชำระ</th>
                    <th style="width:140px  ;" class="st" >สถานะ</th>
                    <th style="width:200px ;"></th>
                </tr>
                <?php
                $item = 1;
                foreach ($OrderInfo as $row) {
                    $fmd = date('d-m-Y H:i', strtotime($row->pay_datetime));
                ?>
                    <tr id="tr2" style="height: 32px;">
                        <td class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></td>
                        <td class="data" style="text-indent: 4px;"><?php echo $row->pay_id; ?></td>
                        <td class="data" ><a href="OrderDetail/<?php echo $row->pay_id; ?>"><?php echo $row->order_id; ?></a></td>
                        <td class="data text-right"><?php echo $row->order_total; ?></td>
                        <td class="data"><?php echo $row->cus_name; ?></td>
                        
                        <td class="data"><?php echo $fmd; ?> น.</td>
                        <td class="data st text-center"><strong><?php echo $row->prove_status; ?></strong></td>
                        <td id="btnTable" class="text-right">
                            <a id="Edit"  onclick="return confirm('ยืนยันออเดอร์');" 
                            href='<?php echo base_url('index.php/OrderController/VerifyOR/'.$row->pay_id.'');?>'>ยืนยัน</a>
                            &nbsp;&nbsp;&nbsp;
                            <a id="Remove" onclick="return confirm('ยกเลิกออเดอร์');" 
                            href='<?php echo base_url('index.php/OrderController/DenyOR/'.$row->pay_id.'');?>'>ยกเลิก</a>
                        </td>
                    </tr>
                <?php $item++;}?>
            </table>       
        </div>
    </container>
    <div>
    </div>
    <img id="admin" src="<?php echo base_url(); ?>images/admin.png">
</body>
</html>