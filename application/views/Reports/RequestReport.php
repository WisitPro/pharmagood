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
        if ($_REQUEST['req_status'] == 'เสร็จสิ้น') { ?>
          <h2><strong>รายงานการให้คำปรึกษา</strong></h2>
        <?php } elseif ($_REQUEST['req_status'] == 'ยกเลิก') { ?>
          <h2><strong>รายงานคำปรึกษาที่ยกเลิก</strong></h2>
        <?php } elseif ($_REQUEST['req_status'] == 'รอยืนยัน') { ?>
          <h2><strong>รายงานคำนัดปรึกษาที่รอยืนยัน</strong></h2>
        <?php } ?>

        <?php } elseif ($_REQUEST['day2'] == $_REQUEST['day1']) {
        if ($_REQUEST['req_status'] == 'เสร็จสิ้น') { ?>
          <h2><strong>รายงานการให้คำปรึกษา</strong></h2>
        <?php } elseif ($_REQUEST['req_status'] == 'ยกเลิก') { ?>
          <h2><strong>รายงานคำปรึกษาที่ยกเลิก</strong></h2>
        <?php } elseif ($_REQUEST['req_status'] == 'รอยืนยัน') { ?>
          <h2><strong>รายงานคำนัดปรึกษาที่รอยืนยัน</strong></h2>
        <?php } ?> 
        <h3>วันที่ <?php echo $day1 ?></h3>
        <?php } elseif ($_REQUEST['day1'] != null && $_REQUEST['day2'] != null) {
        if ($_REQUEST['req_status'] == 'เสร็จสิ้น') { ?>
          <h2><strong>รายงานการให้คำปรึกษา</strong></h2>
        <?php } elseif ($_REQUEST['req_status'] == 'ยกเลิก') { ?>
          <h2><strong>รายงานคำปรึกษาที่ยกเลิก</strong></h2>
        <?php } elseif ($_REQUEST['req_status'] == 'รอยืนยัน') { ?>
          <h2><strong>รายงานคำนัดปรึกษาที่รอยืนยัน</strong></h2>
        <?php } ?> 
        <h3>วันที่ <?php echo $day1 ?> ถึงวันที่ <?php echo $day2 ?></h3>
        <?php } elseif ($_REQUEST['day1'] == null || $_REQUEST['day2'] == null) {
        if ($_REQUEST['req_status'] == 'เสร็จสิ้น') { ?>
          <h2><strong>รายงานการให้คำปรึกษา</strong></h2>
        <?php } elseif ($_REQUEST['req_status'] == 'ยกเลิก') { ?>
          <h2><strong>รายงานคำปรึกษาที่ยกเลิก</strong></h2>
        <?php } elseif ($_REQUEST['req_status'] == 'รอยืนยัน') { ?>
          <h2><strong>รายงานคำนัดปรึกษาที่รอยืนยัน</strong></h2>
        <?php } ?> 
        <h3>วันที่ <?php if ($_REQUEST['day1'] == null) {
                      echo $day2;
                    } else {
                      echo $day1;
                    }  ?></h3>
      <?php } ?>

    </header>
    <table class="table ">
      <tr id="tr1">
        <th style="min-width:130px;">หมายเลขคำขอ</th>
        <th style="min-width:210px;">ลูกค้า</th>

        <th style="width:180px !important;">วันเวลาที่นัด</th>
        <th style="min-width:180px;">เภสัชกร</th>
        <th style="width:180px !important;">วันเวลาที่เสร็จสิ้น</th>
        <th style="min-width:120px;">สถานะ</th>
      </tr>
      <?php
      $item = 0;

      foreach ($report as $row) {
        $req_time = date('d-m-Y H:i', strtotime($row->req_time));
        if (isset($row->req_modify)) {
          $req_modify = date('d-m-Y H:i', strtotime($row->req_modify));
        }
        $status = $row->req_status;

      ?>
        <tr id="tr2">
          <td><?php echo $row->req_id; ?></td>
          <td><?php echo $row->cus_name; ?></td>
          <td> <?php echo $req_time ?> น.</td>
          <td> <?php echo isset($row->adm_name) ? $row->adm_name : "-"; ?></td>
          <td> <?php echo isset($row->req_modify) ? $req_modify . ' น.' : "-"; ?></td>
          <td> <?php echo $row->req_status ?></td>
        </tr>
      <?php
        $item++;
      }
      ?>
      <tr>

        <td colspan="3">
          <?php if ($status == "เสร็จสิ้น") { ?>
            <h3> รายการเสร็จสิ้นทั้งหมด <?php echo $item ?> รายการ</h3>
          <?php } elseif ($status == "ยกเลิก") { ?>

            <h3> รายการคำนัดปรึกษาที่ยกเลิก <?php echo $item ?> รายการ</h3>
          <?php } elseif ($status == "รอยืนยัน") { ?>
            <h3> รายการคำนัดปรึกษาที่รอยืนยัน <?php echo $item ?> รายการ</h3>
          <?php } ?>
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