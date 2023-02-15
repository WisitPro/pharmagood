<?php


foreach ($orderdetail as $row) {
    $fmd = date('d-m-Y', strtotime($row->pay_datetime));
    $time = date('H:i', strtotime($row->pay_datetime));
    $bill_date =  date('d-m-Y', strtotime($row->bill_date));
    $or_date = date('d-m-Y H:i:s', strtotime($row->order_datetime));

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
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/Orderbill.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>js/AdminOut.js"></script>
        <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
    </head>


    <body>
        <page>


        </page>
        <br><br>
        <container>
            <span style="font-size:24px;" class="animate-bottom">
                <button id="spb2" onclick="history.back()" class="text-center"><i class="fa-solid fa-angle-left"></i></button>

                <!-- <a href="OrderInfo2" style=" margin-left:auto; color:white"><button id="spb2">ออเดอร์ที่ยืนยันแล้ว</button></a> 
            <a href="OrderInfo3" style=" margin-left:auto; color:white"><button id="spb3">ออเดอร์ที่ยกเลิก</button></a> -->
            </span>
            <p></p>



            <div id="backform" class="animate-bottom ">
                <div id="store_detail">
                    <span><img id="logooo" src="<?php echo base_url(); ?>images/Logo.png">
                        <br>
                        <p>เลขที่ใบเสร็จ : <?php echo $row->bill_no ?></p>
                        <p>เวลาออกใบเสร็จ : <?php echo $bill_date ?></p>
                    </span>

                </div>
                <table>
                    <thead>
                        <tr id="tr1">
                            <td>รายการสินค้า</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = 1;
                        $total_qty = 0;
                        foreach ($orderdetail as $row) {
                            $total_qty += $row->qty;
                        ?>
                            <tr id="tr2">
                                <td><?php echo $row->pro_name ?></td>
                                <td class="text-center"><?php echo $row->qty ?></td>
                                <td class="text-right lastcolumn"><?php echo $row->sub_total ?></td>
                            </tr>
                        <?php
                            $item++;
                        }

                        ?>

                    </tbody>
                    <tfoot>

                        <tr style="font-size: 16px;">

                            <td>ยอดสุทธิ</td>
                            
                            <td class="text-center"><?php echo $total_qty ?> ชิ้น</td>
                            <td class="text-right lastcolumn"><?php echo $row->order_total ?> บาท</td>

                        </tr>
                        <!-- <tr style="font-size: 16px;">
                            <td>ค่าจัดส่ง</td>
                            <td></td>
                            <td></td>
                        </tr> -->
                        <tr style="font-size: 16px;">

                            <td style="width:200px ">หมายเลขออเดอร์ <?php echo $row->order_id ?></td>

                            <td colspan="2" class="text-right" ><?php echo $or_date ?></td>

                        </tr>

                    </tfoot>

                </table>


            </div>
            <br>
            <a onclick="return confirm('ยืนยันข้อมูล')" href="<?php echo base_url('/index.php/OrderController/InsertDelivery/' . $row->order_id) ?>">
                <button id="delbt">ทำการส่ง</button> </a>
            <button id="printbt" onclick="window.print();">ปริ้นท์</button>
        </container>

    </body>

    </html>
<?php
    break;
}

?>