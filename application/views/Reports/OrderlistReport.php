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
      <?php if ($date1 == null && $date2 == null){ ?>
        <h2><strong>รายงานรายการสั่งซื้อ</strong></h2>

      <?php } elseif ($date1 != null && $date2 != null && $date1 == $date2) { ?>
        <h2><strong>รายงานรายการสั่งซื้อ</strong></h2>
        <h3>วันที่ <?php echo $day1 ?></h3>


      <?php } elseif ($date1 != null && $date2 != null) { ?>
        <h2><strong>รายงานรายการสั่งซื้อ</strong></h2>
        <h3>วันที่ <?php echo $day1 ?> ถึงวันที่ <?php echo $day2 ?></h3>
      <?php } elseif ($date1 = null || $date2 == null) { ?>
        <h2><strong>รายงานรายการสั่งซื้อ</strong></h2>
        <h3>วันที่ <?php if ($_REQUEST['day1'] == null) {
                      echo $day2;
                    } elseif ($_REQUEST['day2'] == null) {
                      echo $day1;
                    }  ?></h3>


      <?php } ?>

    </header>
    <table class="table ">
      <tr id="tr1">
        <th style="min-width:145px;">หมายเลขคำสั่งซื้อ</th>
        <th style="min-width:160px;">รหัสยาและเวชภัณฑ์</th>
        <th style="min-width: 400px;">ชื่อยาและเวชภัณฑ์</th>
        <th style="min-width: 120px;">ราคาต่อหน่วย</th>
        <th class="text-center" style="min-width: 80px;">จำนวน</th>
        <th class="text-right" style="min-width: 80px;">เป็นเงิน</th>




      </tr>
      <?php
      
      $item = 0;
      $own_data = "";
      $own_price = "";
      $own_cus = "";
      $grand_sub =0;
      foreach ($report as $ol_id => $row) {
        $order_time = date('d-m-Y H:i', strtotime($row[0]->order_datetime));
        $pay_modify = date('d-m-Y H:i', strtotime($row[0]->order_datetime));
        $own_data = $row[0]->pro_id;
        $own_price = $row[0]->sub_total;
        $own_cus = $row[0]->cus_name;
        $grand_sub += $row[0]->order_total;


      ?>
        <tr id="tr2">
          <td><strong><?php echo $row[0]->order_id; ?></strong></td>
          <td><?php echo $row[0]->pro_id; ?></td>
          <td><?php echo $row[0]->pro_name ?></td>
          <td><?php echo $row[0]->pro_price ?></td>
          <td><?php echo $row[0]->qty . ' ' . $row[0]->pro_unit ?></td>
          <td class="text-right"><?php echo $row[0]->sub_total ?></td>

        </tr>

        <?php $list_total = 0;
        foreach ($row as $list) {

          if ($list->pro_id == $own_data) {
          } else {
            $list_total += $list->sub_total; ?>

            <tr id="tr2">

              <td></td>
              <td><?php echo $list->pro_id; ?></td>
              <td><?php echo $list->pro_name ?></td>
              <td><?php echo $list->pro_price ?></td>
              <td><?php echo $list->qty . ' ' . $list->pro_unit ?></td>
              <td class="text-right"><?php echo $list->sub_total ?></td>


            </tr>

        <?php }
        } ?>
        <tr id="tr2" style="font-weight: bold;">

          <td colspan="2">ลูกค้า : <?php echo $own_cus ?></td>

          <td></td>
          <td>รวมเป็นเงิน</td>

          <td colspan="2" class="text-right"><?php echo number_format($list_total + $own_price, 2) ?> บาท</td>


        </tr>


      <?php $item++;
      }  ?>
      <tr>

        <td colspan="2">
          <h3> คำสั่งซื้อทั้งหมด <?php echo $item ?> รายการ</h3>
        </td>
        <td colspan="4">
          <h3 class="text-right"> เป็นเงินทั้งหมด <?php echo number_format($grand_sub) ?> บาท</h3>
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