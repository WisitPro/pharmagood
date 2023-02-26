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
             
          <?php if($_REQUEST['day2']==null && $_REQUEST['day1']==null){?>  
            <h2><strong>รายงานข้อมูลจัดส่งยาและเวชภัณฑ์ทั้งหมด</strong></h2> 

          
      <?php }elseif ($_REQUEST['day2'] == $_REQUEST['day1']) { ?>       
        <h2><strong>รายงานข้อมูลจัดส่งยาและเวชภัณฑ์</strong></h2>  
        <h3>วันที่ <?php echo $day1 ?></h3>
      <?php } elseif ($_REQUEST['day1'] != null && $_REQUEST['day2'] != null) { ?>
        <h2><strong>รายงานข้อมูลจัดส่งยาและเวชภัณฑ์</strong></h2> 
        <h3>วันที่ <?php echo $day1 ?> ถึงวันที่ <?php echo $day2 ?></h3>
      <?php } else{ ?>
       
       
      <?php } ?>

    </header>
    <table class="table ">
      <tr id="tr1">
        <th style="min-width:130px;">หมายเลขคำสั่งซื้อ</th>
        <th style="min-width:200px;">บริษัทจัดส่ง</th>
        <th style="min-width: 260px;">หมายเลขติดตามพัสดุ</th>
        <th style="min-width:170px">วันเวลาบันทึก</th>
        <th style="min-width:200px;">บันทึกโดย</th> 
      </tr>
      <?php
      $item = 0;

      foreach ($report as $row) {
        $delivery_datetime = date('d-m-Y H:i', strtotime($row->delivery_datetime));            
      ?>
        <tr id="tr2">
          <td><?php echo $row->order_id; ?></td>
          <td><?php echo $row->delivery_service; ?></td>
          <td><?php echo $row->delivery_tracking; ?></td>
          <td> <?php echo $delivery_datetime ?> น.</td>
          <td> <?php echo $row->adm_name ?></td>    
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