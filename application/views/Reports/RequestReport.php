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
        if ($_REQUEST['req_status'] == 'เสร็จสิ้น') { ?>

          <h2><strong>รายงานการให้คำปรึกษาทั้งหมด</strong></h2>
        <?php } else { ?>
          <h2><strong>รายงานยกเลิกคำปรึกษาทั้งหมด</strong></h2>
        <?php } ?>

      <?php } elseif ($_REQUEST['day2'] == $_REQUEST['day1']) { ?>
        <h2><strong>รายงานการให้คำปรึกษา</strong></h2>
        <h3>วันที่ <?php echo $day1 ?></h3>
      <?php } elseif ($_REQUEST['day1'] != null && $_REQUEST['day2'] != null) { ?>
        <h2><strong>รายงานการให้คำปรึกษา</strong></h2>

        <h3>วันที่ <?php echo $day1 ?> ถึงวันที่ <?php echo $day2 ?></h3>
      <?php } elseif ($_REQUEST['day1'] == null || $_REQUEST['day2'] == null) { ?>
        <h2><strong>รายงานการให้คำปรึกษา</strong></h2>
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
        <th style="min-width:140px;">ลูกค้า</th>
        <th style="min-width: 365px;">อาการ</th>
        <th style="width:110px !important;">วันเวลาที่นัด</th>
        <th style="min-width:110px;">เภสัชกร</th>
        <th style="width:141px !important;">วันเวลาที่เสร็จสิ้น</th>
      </tr>
      <?php
      $item = 0;

      foreach ($report as $row) {
        $req_time = date('d-m-Y H:i', strtotime($row->req_time));
        $req_modify = date('d-m-Y H:i', strtotime($row->req_modify));
        

      ?>
        <tr id="tr2">
          <td><?php echo $row->req_id; ?></td>
          <td><?php echo $row->cus_name; ?></td>
          <td><?php echo $row->req_sym; ?></td>
          <td> <?php echo $req_time ?> น.</td>
          <td> <?php echo isset($row->adm_name) ? $row->adm_name : null; ?></td>
          <td> <?php echo $req_modify ?> น.</td>
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