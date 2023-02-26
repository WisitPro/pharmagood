<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" href="<?php echo base_url(); ?>css/ReportResult.css">
</head>
<?php

$date = isset($_REQUEST['day1']) ? $_REQUEST['day1'] : null;
if (isset($date)) {
  $day1 = date("d-m-Y", strtotime($date));
}

$date2 = isset($_REQUEST['day2']) ? $_REQUEST['day2'] : null;
if (isset($date)) {
  $day2 = date("d-m-Y", strtotime($date2));
}


$basename = basename($_SERVER['PHP_SELF']);
date_default_timezone_set("Asia/Bangkok");



?>

<body>


  <div id="backform">
    <header style="padding-left: 8px;">
      <?php if ($date == null && $date2 == null) {
       if ($_REQUEST['order_status'] == 'ยืนยันแล้ว') { ?>
          <h2><strong>คำสั่งซื้อที่ยืนยันแล้วทั้งหมด</strong></h2>
        <?php } elseif ($_REQUEST['order_status'] == 'ยกเลิก') { ?>
          <h2><strong>คำสั่งซื้อที่ยกเลิกทั้งหมด</strong></h2>
        <?php }else{} ?>
      <?php } elseif ($_REQUEST['day2'] == $_REQUEST['day1']) { 
         if ($_REQUEST['order_status'] == 'ยืนยันแล้ว') { ?>
          <h2><strong>คำสั่งซื้อที่ยืนยันแล้ว</strong></h2>
        <?php } elseif ($_REQUEST['order_status'] == 'ยกเลิก') { ?>
          <h2><strong>คำสั่งซื้อที่ยกเลิก</strong></h2>
        <?php }else{} ?>
        <h3>วันที่ <?php echo $day1 ?></h3>
      <?php } elseif ($_REQUEST['day1'] != null && $_REQUEST['day2'] != null) { 
         if ($_REQUEST['order_status'] == 'ยืนยันแล้ว') { ?>
          <h2><strong>คำสั่งซื้อที่ยืนยันแล้ว</strong></h2>
        <?php } elseif ($_REQUEST['order_status'] == 'ยกเลิก') { ?>
          <h2><strong>คำสั่งซื้อที่ยกเลิก</strong></h2>
        <?php }else{} ?>

        <h3>วันที่ <?php echo $day1 ?> ถึงวันที่ <?php echo $day2 ?></h3>
      <?php } elseif ($_REQUEST['day1'] == null || $_REQUEST['day2'] == null) { 
         if ($_REQUEST['order_status'] == 'ยืนยันแล้ว') { ?>
          <h2><strong>คำสั่งซื้อที่ยืนยันแล้ว</strong></h2>
        <?php } elseif ($_REQUEST['order_status'] == 'ยกเลิก') { ?>
          <h2><strong>คำสั่งซื้อที่ยกเลิก</strong></h2>
        <?php }else{} ?>
        <h3>วันที่ <?php if ($_REQUEST['day1'] == null) {
                      echo $day2;
                    } else {
                      echo $day1;
                    }  ?></h3>
      <?php } ?>

    </header>
    <table class="table ">
      <tr id="tr1">
        <th style="min-width:130px;">หมายเลขคำสั่งซื้อ</th>
        <th style="min-width:200px;">ลูกค้า</th>
        <th class="text-right" style="min-width: 100px;">ราคา</th>
        <th style="min-width:170px">วันเวลาสั่งซื้อ</th>
        <th style="min-width:200px;">ผู้ยืนยัน</th>
        <th style="min-width:170px">วันเวลายืนยัน</th>
      

    
      </tr>
      <?php
      $item = 0;

      foreach ($report as $row) {
        $order_time = date('d-m-Y H:i', strtotime($row->order_datetime));
        $pay_modify = date('d-m-Y H:i', strtotime($row->order_datetime));

        
      ?>
        <tr id="tr2">
          <td><?php echo $row->order_id; ?></td>
          <td><?php echo $row->cus_name; ?></td>
          <td  class="text-right" ><?php echo $row->order_total; ?></td>
          <td> <?php echo $order_time ?> น.</td>
          <td> <?php echo $row->adm_name ?></td>
          <td> <?php echo $pay_modify ?> น.</td>

         
        </tr>
      <?php
        $item++;
      }
      ?>
      <tr>

        <td colspan="3">
          <h3> จำนวนทั้งหมด <?php echo $item ?> รายการ</h3>
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