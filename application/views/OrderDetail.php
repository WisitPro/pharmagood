<?php


foreach ($orderdetail as $row) {
    $fmd = date('d-m-Y', strtotime($row->pay_datetime));
    $time = date('H:i', strtotime($row->pay_datetime));



?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Pharma Good</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/OrderDetail.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>js/AdminOut.js"></script>
        <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <page>


            <img id="admin" src="<?php echo base_url(); ?>images/admin.png">

        </page>
        <br><br>
        <container>
            <span style="font-size:24px;" class="animate-bottom">
            
                <button id="spb2" onclick="history.back()" class="text-center"><i class="fa-solid fa-angle-left"></i></button>
           
                <span id="spb1" style="color:white;margin-left:8px">
                    <span   class="text-left" style="padding-left:16px;">
                        <i class="fa-brands fa-wpforms"></i> ข้อมูลออเดอร์ : <?php echo $row->order_id; ?>
                    </span></span>
                <!-- <a href="OrderInfo2" style=" margin-left:auto; color:white"><button id="spb2">ออเดอร์ที่ยืนยันแล้ว</button></a> 
            <a href="OrderInfo3" style=" margin-left:auto; color:white"><button id="spb3">ออเดอร์ที่ยกเลิก</button></a> -->
            </span>
            <p></p>
           
            <img id="slip" src="<?php echo base_url('/upload/' . $row->pay_slip . ''); ?>">
            

            <div id="backform" class="animate-bottom">
                <div id="cus_detail">
                    <p>รหัสลูกค้า : <?php echo $row->cus_id ?></p>
                    <p>ลูกค้า : <?php echo $row->cus_name ?></p>
                    <p>เบอร์โทร : <?php echo $row->order_phone ?></p>
                    <p>ที่อยู่ : <?php echo $row->order_address ?></p>
                    <?php if($row->prove_status!="ชำระเงินแล้ว" && $row->prove_status!="ยกเลิก" ){ ?>
                    <i class="fa-solid fa-file-invoice" id="print" style="position: absolute;cursor:pointer;
                    margin-left:490px;margin-top:-150px;font-size:28px;color:black"
                    onclick="window.location='<?php 
                    echo base_url('index.php/OrderController/Orderbill/'.$row->pay_id.'/'.$row->order_id.'');?>'"></i>
                    <?php } ?>
                </div>

                <table>
                    <thead>
                        <tr id="tr1">

                            <th>รายการสินค้า</th>
                            <th class="text-center">จำนวน</th>
                            <th class="text-right lastcolumn">ราคารวม</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = 1;
                        foreach ($orderdetail as $row) {

                        ?>
                            <tr id="tr2">

                                <td><?php echo $item ?>. <?php echo $row->pro_name ?></td>
                                <td class="text-center"><?php echo $row->qty ?></td>
                                <td class="text-right lastcolumn"><?php echo $row->sub_total ?></td>

                            </tr>
                        <?php
                            $item++;
                        }

                        ?>

                    </tbody>
                    <tfoot>

                        <tr style="border-bottom: 1px solid #82b8d5;
                        border-top: 1px solid #82b8d5;">

                            <td></td>

                            <td class="text-right">รวม</td>
                            <td class="text-right lastcolumn"><?php echo $row->order_total ?> บาท</td>

                        </tr>
                    </tfoot>
                   


                </table>








            </div>
        </container>
        <?php if($row->prove_status=="ชำระเงินแล้ว"){ ?>
                    <div id="button_bar">
                        <a id="Remove" onclick="return confirm('ยกเลิกออเดอร์');" 
                        href='<?php echo base_url('index.php/OrderController/DenyOR/'.$row->pay_id.'');?>'>
                            <button id="cancelbt">ยกเลิก</button></a>
                        <a onclick="return confirm('ยืนยันออเดอร์');" 
                        href='<?php echo base_url('index.php/OrderController/VerifyOR/'.$row->pay_id.'');?>'>
                            <button id="verifybt">ยืนยัน</button></a>
                    </div>
                    <?php }?>
    </body>

    </html>
<?php
    break;
}

?>