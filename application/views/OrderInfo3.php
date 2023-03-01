

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30">
    <title>Pharma Good</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/OrderInfo.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/AdminOut.js"></script>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>
<body>
<br><br>     
        <div id="backform3" class="animate-bottom">
            <table >
                <tr id="tr1">
                <th style="width:60px ;text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56">ลำดับ</th>
                    <th style="min-width:150px ;text-indent: 4px;">รหัสการแจ้งโอน</th>
                    <th style="min-width:110px ;">เลขออเดอร์</th>
                    <th style="min-width:84px ;" class="text-right">ยอดสั่งซื้อ</th>
                    <th style="width:360px ;">ลูกค้า</th>
                    <th style="min-width:120px;">เวลาแจ้งชำระ</th>
                    <th style="width:200px;">ยืนยันโดย</th>
                    <th style="min-width:120px;">เวลายืนยัน</th>                   
                    <th style="width:140px  ;" class="st" >สถานะ</th>
                </tr>
                <?php
                $item = 1;
                foreach ($OrderInfo as $row) {
                    $fmd = date('d-m-Y H:i', strtotime($row->pay_datetime));
                ?>
                    <tr id="tr2" style="height: 32px;">
                        <td class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></td>
                        <td class="data" style="text-indent: 4px;"><?php echo $row->pay_id; ?></td>
                        <td class="data"><a href="OrderDetail/<?php echo $row->pay_id; ?>"><?php echo $row->order_id; ?></a></td>
                        <td class="data text-right"><?php echo $row->order_total; ?></td>
                        <td class="data"><?php echo $row->cus_name; ?></td>                     
                        <td class="data"><?php echo $fmd; ?> น.</td>
                        <td class="data"><?php echo $row->adm_name; ?></td>
                        <td class="data"><?php echo $row->pay_modify; ?></td>
                        <td class="data st text-center"><strong><?php echo $row->prove_status; ?></strong></td>                      
                    </tr>
                <?php $item++;} ?>
            </table>
        </div>
    </container>
    <div>
    </div>
    <img id="admin" src="<?php echo base_url(); ?>images/admin.png">
</body>
</html>