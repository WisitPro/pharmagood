<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/OrderInfo.css">
</head>
<body>
  
<br><br>     
        <div id="backform4" class="animate-bottom">
            <table >
                <tr id="tr1">
                <th style="width:60px ;text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56">ลำดับ</th>
                   
                    <th style="min-width:110px ;">เลขออเดอร์</th>
                    <th style="min-width:84px ;" class="text-right">ยอดสั่งซื้อ</th>
                    <th style="width:360px ;">ลูกค้า</th>
                    <th style="width:200px;">บริษัท</th>
                    <th style="width:200px;">หมายเลขติดตามพัสดุ</th>

                    <th style="min-width:120px;">เวลาจัดส่ง</th>
                    <th style="width:200px;">โดย</th>
                               
                   
                </tr>
                <?php
                $item = 1;
                foreach ($OrderInfo as $row) {
                    $delivery_time = date('d-m-Y H:i', strtotime($row->delivery_datetime)).' น.';
                   
                ?>
                    <tr id="tr2" style="height: 32px;">
                        <td class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></td>
                       
                        <td class="data"><a href="OrderDetail/<?php echo $row->order_id; ?>"><?php echo $row->order_id; ?></a></td>
                        <td class="data text-right"><?php echo $row->order_total; ?></td>
                        <td class="data"><?php echo $row->cus_name; ?></td>   
                        <td class="data"><?php echo $row->delivery_service; ?></td>
                        <td class="data"><?php echo $row->delivery_tracking; ?></td>                   
                        <td class="data"><?php echo $delivery_time; ?></td>
                        <td class="data"><?php echo $row->adm_name; ?></td>
                       
                                          
                    </tr>
                <?php $item++; } ?>
            </table>      
        </div>
    </container>
    <div>
    </div>
    <img id="admin" src="<?php echo base_url(); ?>images/admin.png">
</body>
</html>