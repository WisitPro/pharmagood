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
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/Orderbill.css">
    
    </head>
    <body>
        <br><br>
        <container>
            <span style="font-size:24px;" class="animate-bottom">
                <button id="spb2" onclick="history.back()" class="text-center"><i class="fa-solid fa-angle-left"></i></button>
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
                            <td><?php echo $total_qty ?> ชิ้น</td>
                            <td class="text-right lastcolumn"><?php echo $row->order_total ?> บาท</td>
                        </tr>
                        <tr style="font-size: 16px;">
                            <td>หมายเลขออเดอร์ <?php echo $row->order_id ?></td>
                            <td colspan="2" class="text-right"><?php echo $or_date ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <br>
            
            <button id="printbt" onclick="window.print();">ปริ้นท์</button>
        </container>
    </body>
    </html>
<?php break;}?>