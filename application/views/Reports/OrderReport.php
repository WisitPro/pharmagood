<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" href="<?php echo base_url(); ?>css/ReportResult.css">
</head>
<?php

$date1 = isset($_REQUEST['day1']) ? $_REQUEST['day1'] : null;
if (isset($date1)) {
  $day1 = date("d-m-Y", strtotime($date1));
}

$date2 = isset($_REQUEST['day2']) ? $_REQUEST['day2'] : null;
if (isset($date2)) {
  $day2 = date("d-m-Y", strtotime($date2));
}


$basename = basename($_SERVER['PHP_SELF']);
date_default_timezone_set("Asia/Bangkok");



?>

<body>


  <div id="backform">
    <header style="padding-left: 8px;">
      <?php if ($date1 == null && $date2 == null) {
        if ($_REQUEST['order_type'] == 1) { ?>
          <h2><strong>รายงานคำสั่งซื้อจากลูกค้า</strong></h2>
        <?php } elseif ($_REQUEST['order_type'] == 2) { ?>
          <h2><strong>รายงานคำสั่งจ่ายยาโดยเภสัชกร</strong></h2>
        <?php } ?>
        <?php if ($_REQUEST['order_status'] == "ยืนยันแล้ว") {
          echo "<h3>" . "สถานะ : ยืนยันแล้ว" . "</h3>";
        } elseif ($_REQUEST['order_status'] == "ชำระเงินแล้ว") {
          echo "<h3>" . "สถานะ : รอการยืนยัน" . "</h3>";
        } else {
          echo "<h3>" . "สถานะ : ยกเลิก" . "</h3>";
        } ?>
        <?php } elseif ($date1 != null && $date2 != null && $date1 == $date2) {
        if ($_REQUEST['order_type'] == 1) { ?>
          <h2><strong>รายงานคำสั่งซื้อจากลูกค้า</strong></h2>
          <?php if ($_REQUEST['order_status'] == "ยืนยันแล้ว") {
            echo "<h3>" . "สถานะ : ยืนยันแล้ว" . "</h3>";
          } elseif ($_REQUEST['order_status'] == "ชำระเงินแล้ว") {
            echo "<h3>" . "สถานะ : รอการยืนยัน" . "</h3>";
          } else {
            echo "<h3>" . "สถานะ : ยกเลิก" . "</h3>";
          } ?>
        <?php } elseif ($_REQUEST['order_type'] == 2) { ?>
          <h2><strong>รายงานคำสั่งจ่ายยาโดยเภสัชกร</strong></h2>
          <?php if ($_REQUEST['order_status'] == "ยืนยันแล้ว") {
            echo "<h3>" . "สถานะ : ยืนยันแล้ว" . "</h3>";
          } elseif ($_REQUEST['order_status'] == "ชำระเงินแล้ว") {
            echo "<h3>" . "สถานะ : รอการยืนยัน" . "</h3>";
          } else {
            echo "<h3>" . "สถานะ : ยกเลิก" . "</h3>";
          } ?>
           <?php } ?>
          <h3>วันที่ <?php echo $day1 ?></h3>
         
          
        <?php } elseif ($date1 != null && $date2 != null) { 
          if ($_REQUEST['order_type'] == 1) { ?>
          <h2><strong>รายงานคำสั่งซื้อโดยลูกค้า</strong></h2>
          <?php if ($_REQUEST['order_status'] == "ยืนยันแล้ว") {
            echo "<h3>" . "สถานะ : ยืนยันแล้ว" . "</h3>";
          } elseif ($_REQUEST['order_status'] == "ชำระเงินแล้ว") {
            echo "<h3>" . "สถานะ : รอการยืนยัน" . "</h3>";
          } else {
            echo "<h3>" . "สถานะ : ยกเลิก" . "</h3>";
          } ?>
        <?php } elseif ($_REQUEST['order_type'] == 2) { ?>
          <h2><strong>รายงานคำสั่งจ่ายยาโดยเภสัชกร</strong></h2>
          <?php if ($_REQUEST['order_status'] == "ยืนยันแล้ว") {
            echo "<h3>" . "สถานะ : ยืนยันแล้ว" . "</h3>";
          } elseif ($_REQUEST['order_status'] == "ชำระเงินแล้ว") {
            echo "<h3>" . "สถานะ : รอการยืนยัน" . "</h3>";
          } else {
            echo "<h3>" . "สถานะ : ยกเลิก" . "</h3>";
          } ?>
          
        <?php } ?>
        <h3>วันที่ <?php echo $day1 ?> ถึงวันที่ <?php echo $day2 ?></h3>
      <?php }elseif ($date1 = null || $date2 == null) { 
          if ($_REQUEST['order_type'] == 1) { ?>
          <h2><strong>รายงานคำสั่งซื้อโดยลูกค้า</strong></h2>
          <?php if ($_REQUEST['order_status'] == "ยืนยันแล้ว") {
            echo "<h3>" . "สถานะ : ยืนยันแล้ว" . "</h3>";
          } elseif ($_REQUEST['order_status'] == "ชำระเงินแล้ว") {
            echo "<h3>" . "สถานะ : รอการยืนยัน" . "</h3>";
          } else {
            echo "<h3>" . "สถานะ : ยกเลิก" . "</h3>";
          } ?>
        <?php } elseif ($_REQUEST['order_type'] == 2) { ?>
          <h2><strong>รายงานคำสั่งจ่ายยาโดยเภสัชกร</strong></h2>
          <?php if ($_REQUEST['order_status'] == "ยืนยันแล้ว") {
            echo "<h3>" . "สถานะ : ยืนยันแล้ว" . "</h3>";
          } elseif ($_REQUEST['order_status'] == "ชำระเงินแล้ว") {
            echo "<h3>" . "สถานะ : รอการยืนยัน" . "</h3>";
          } else {
            echo "<h3>" . "สถานะ : ยกเลิก" . "</h3>";
          } ?>
          <?php }?>
          <h3>วันที่ <?php if ($_REQUEST['day1'] == null) {
                      echo $day2;
                    } elseif($_REQUEST['day2']==null) {
                      echo $day1;
                    }  ?></h3>

          
          <?php }?>

    </header>
    <table class="table ">
      <tr id="tr1">
        <th style="min-width:130px;">หมายเลขคำสั่งซื้อ</th>
        <th style="min-width:200px;">ลูกค้า</th>
        <th class="text-right" style="min-width: 100px;">ยอดสั่งซื้อ</th>
        <th style="min-width:170px">วันเวลาสั่งซื้อ</th>
        <th style="min-width:200px;">ผู้ยืนยัน</th>
        <th style="min-width:170px">วันเวลายืนยัน</th>



      </tr>
      <?php
      $item = 0;
      $grand_total = 0;
      foreach ($report as $row) {
        $order_time = date('d-m-Y H:i', strtotime($row->order_datetime));
        $pay_modify = date('d-m-Y H:i', strtotime($row->pay_datetime));
        $grand_total += $row->order_total;

      ?>
        <tr id="tr2">
          <td><?php echo $row->order_id; ?></td>
          <td><?php echo $row->cus_name; ?></td>
          <td class="text-right"><?php echo $row->order_total; ?></td>
          <td> <?php echo $order_time ?> น.</td>
          <td> <?php echo $row->adm_name ?></td>
          <?php if($_REQUEST['order_status']=="ชำระเงินแล้ว"){?>
            <td> </td>
<?php }else{?>
  <td> <?php echo $pay_modify ?> น.</td>
  <?php }?>
        </tr>
      <?php
        $item++;
      }
      ?>
      <tr>

        <td colspan="3">
          <h3> จำนวนทั้งหมด <?php echo $item ?> รายการ</h3>
          <h3> รวมยอดสั่งซื้อเป็นเงิน <?php echo number_format($grand_total, 2); ?> บาท</h3>
        </td>

      </tr>
    </table>
  </div> <br><br><br>
  </container>

  <div>
  </div>

  <!-- <img id="admin" src="<?php echo base_url(); ?>images/admin.png"> -->

</body>

</html>