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
     

    </header>
    <table class="table ">
      <tr id="tr1">
        <th style="min-width:145px;">หมายเลขคำสั่งซื้อ</th>
        <th style="min-width:160px;">รหัสยาและเวชภัณฑ์</th>
        <th style="min-width: 520px;">ชื่อยาและเวชภัณฑ์</th>
        <th class="text-center">จำนวน</th>
        <th class="text-right" style="min-width: 110px;">ราคาสุทธิ</th>
      
      

    
      </tr>
      <?php
      $item = 0;

      foreach ($report as $row) {
        $order_time = date('d-m-Y H:i', strtotime($row->order_datetime));
        $pay_modify = date('d-m-Y H:i', strtotime($row->order_datetime));

        
      ?>
        <tr id="tr2">
        
          <td><?php echo $row->order_id; ?></td>
          <td><?php echo $row->pro_id; ?></td>
          <td><?php echo $row->pro_name ?></td>
          <td class="text-center"><?php echo $row->qty ?></td>
          <td class="text-right"><?php echo $row->sub_total ?></td>

         
        </tr>
      <?php
        $item++;
      }
      ?>
      <tr>

        <td colspan="3">
          <h3> รายการสั่งซื้อทั้งหมด <?php echo $item ?> รายการ</h3>
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