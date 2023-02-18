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
                    <th style="min-width:150px ;text-indent: 4px;">รหัสการแจ้งโอน</th>
                    <th style="min-width:110px ;">เลขออเดอร์</th>
                    <th style="width:62px ;" class="text-right">ราคา</th>
                    <th style="width:360px ;">ลูกค้า</th>
                    <th style="min-width:120px;">เวลาส่ง</th>
                    <th style="width:200px;">โดย</th>
                    <th style="min-width:120px;">เวลาถึง</th>                    
                    <th style="width:140px  ;" class="st" >สถานะ</th>
                </tr>
                <?php
                $item = 1;
                foreach ($OrderInfo as $row) {
                    $delivery_time = date('d-m-Y H:i', strtotime($row->delivery_datetime)).' น.';
                    if($row->delivery_success!= null){
                        $success = date('d-m-Y H:i', strtotime($row->delivery_success)).' น.';
                    }else{
                        $success = '';
                    }           
                ?>
                    <tr id="tr2" style="height: 32px;">
                        <td class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></td>
                        <td class="data" style="text-indent: 4px;"><?php echo $row->pay_id; ?></td>
                        <td class="data"><a href="OrderDetail/<?php echo $row->pay_id; ?>"><?php echo $row->order_id; ?></a></td>
                        <td class="data text-right"><?php echo $row->order_total; ?></td>
                        <td class="data"><?php echo $row->cus_name; ?></td>                      
                        <td class="data"><?php echo $delivery_time; ?></td>
                        <td class="data"><?php echo $row->adm_name; ?></td>
                        <td class="data"><?php echo $success; ?></td>
                        <td class="data st text-center"><strong><?php echo $row->delivery_status; ?></strong></td>                      
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