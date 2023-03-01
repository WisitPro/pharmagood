<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" href="<?php echo base_url(); ?>css/ReportResult.css">
</head>
<?php
$type = isset($_REQUEST['product_type']) ? $_REQUEST['product_type'] : null;
if (isset($type)) {
  foreach($product_type_list as $listtype){
    if ($type == $listtype->type_id) {
      $type_name = $listtype->type_name;
      break;
  }
}

}

$date = isset($_REQUEST['day1']) ? $_REQUEST['day1'] : null;
if (isset($date)) {
  $day1 = date("d-m-Y", strtotime($date));
}

$date2 = isset($_REQUEST['day2']) ? $_REQUEST['day2'] : null;
if (isset($date)) {
  $day2 = date("d-m-Y", strtotime($date2));
}

$pro_name_by_pro_id = isset($_REQUEST['pro_id']) ? $_REQUEST['pro_id'] : null;
if (isset($pro_name_by_pro_id)) {
  foreach($report as $row) {
    $pro_name_by_pro_id = $row->pro_name;
  }
}



$basename = basename($_SERVER['PHP_SELF']);
date_default_timezone_set("Asia/Bangkok");



?>

<body>

  <div id="backform">
    <header style="padding-left: 8px;">
   
      <?php if ($date == null && $date2 == null) { ?>
        <h2><strong>รายงานการขายทั้งหมดของระบบ</strong></h2>
        <?php if($_REQUEST['pro_id']!=null){  ?>
          <h3>เฉพาะ <?php echo $pro_name_by_pro_id  ?></h3>
          <?php  }else{?>
        <?php if($type!=null){ ?>
          <h3>ประเภท : <?php echo $type_name ?></h3>

        <?php }else{  echo "<h3>"."ประเภทยาและเวชภัณฑ์ทั้งหมด"."</h3>";} ?>
     <?php }?>

      <?php } elseif ($_REQUEST['day2'] == $_REQUEST['day1']) { ?>
        <h2><strong>รายงานการขาย</strong></h2>
        <?php if($_REQUEST['pro_id']!=null){  ?>
          <h3>เฉพาะ <?php echo $pro_name_by_pro_id  ?></h3>
          <?php  }else{?>
        <?php if($type!=null){ ?>
          <h3>ประเภท : <?php echo $type_name ?></h3>

        <?php }else{  echo "<h3>"."ประเภทยาและเวชภัณฑ์ทั้งหมด"."</h3>";} ?>
     <?php }?>
        <h3>วันที่ <?php echo $day1 ?></h3>
       
      <?php } elseif ($_REQUEST['day1'] != null && $_REQUEST['day2'] != null) { ?>
        <h2><strong>รายงานการขาย</strong></h2>
         <?php if($_REQUEST['pro_id']!=null){  ?>
          <h3>เฉพาะ <?php echo $pro_name_by_pro_id  ?></h3>
          <?php  }else{?>
        <?php if($type!=null){ ?>
          <h3>ประเภท : <?php echo $type_name ?></h3>

        <?php }else{  echo "<h3>"."ประเภทยาและเวชภัณฑ์ทั้งหมด"."</h3>";} ?>
     <?php }?>
        <h3>วันที่ <?php echo $day1 ?> ถึงวันที่ <?php echo $day2 ?></h3>
      <?php } elseif ($_REQUEST['day1'] == null || $_REQUEST['day2'] == null) { ?>
        <h2><strong>รายงานการขาย</strong></h2>
        <?php if($_REQUEST['pro_id']!=null){  ?>
          <h3>เฉพาะ <?php echo $pro_name_by_pro_id  ?></h3>
          <?php  }else{?>
        <?php if($type!=null){ ?>
          <h3>ประเภท : <?php echo $type_name ?></h3>

        <?php }else{  echo "<h3>"."ประเภทยาและเวชภัณฑ์ทั้งหมด"."</h3>";} ?>
     <?php }?>
        <h3>วันที่ <?php if ($_REQUEST['day1'] == null) {
                      echo $day2;
                    } else {
                      echo $day1;
                    }  ?></h3>

      <?php } ?>
    </header>
    <table class="table " style="border-bottom: 1px solid #dbdbdb;">
      <tr id="tr1">
        <th style="min-width: 160px;">รหัสยาและเวชภัณฑ์</th>
        <th style="width: 650px;">ชื่อยาและเวชภัณฑ์</th>
        <th style="width: 140px;">ราคาต่อหน่วย</th>
        <th class="text-center" style="width: 100px;">จำนวน</th>
        <th style="min-width: 90px;" class="text-right">เป็นเงิน</th>
      </tr>
  
      <?php
      $item = 1;
      $grand_total = 0;
      $grand_qty = 0;
      foreach ($report as $row) {
        if ($item == 1) {
          $best_selling_qty = $row->total_quantity;
          $best_selling_name = $row->pro_name;
          $best_selling_income = $row->total_income;
          $best_selling_unit = $row->pro_unit;
        }
       
        $grand_total += $row->total_income;
        $grand_qty += $row->total_quantity;
      ?>

        <tr id="tr2">
          <td class="data"   ><?php echo $row->pro_id; ?></td>
          <td class="data "><?php echo $row->pro_name; ?></td>
          <td class="data text-center"><?php echo number_format(($row->total_income/$row->total_quantity),2); ?></td>
          <td class="data"  ><?php echo $row->total_quantity.' '.$row->pro_unit ?></td>
          <td class="data text-right"> <?php echo number_format($row->total_income, 2); ?></td>
        </tr>

      <?php

        $item++;
      }
      ?>
<tr>


<td colspan="5"> <h3 style="display: inline;float: left;" > ขายได้ทั้งหมด <?php echo $grand_qty ?> รายการ</h3>
      <h3  style="display: inline;float: right;"> รายได้ทั้งหมด <?php echo number_format($grand_total, 2); ?> บาท</h3></td>
</tr>
      </table>
      <div style="padding-left: 8px;">
      
    <?php if($item == 2){ ?>
      <h4>รายการยอดขายสูงสุด : <?php echo $best_selling_name  ?> ขายได้ <?php echo $best_selling_qty.' '.$best_selling_unit  ?> </h4> 
      <?php }else{?>
            <h4>รายการยอดขายสูงสุด : <?php echo $best_selling_name  ?> ขายได้ <?php echo $best_selling_qty.' '.$best_selling_unit  ?>  เป็นเงิน <?php echo number_format($best_selling_income, 2); ?> บาท</h4> 
            <h4>รายการยอดขายต่ำสุด : <?php echo $row->pro_name; ?> ขายได้ <?php echo $row->total_quantity.' '.$row->pro_unit ?>  เป็นเงิน <?php echo number_format($row->total_income, 2); ?> บาท</h4>  
                <?php }?>
      </div>
      



    
  </div> <br><br><br>
  </container>

  <div>
  </div>

  <!-- <img id="admin" src="<?php echo base_url(); ?>images/admin.png"> -->

</body>

</html>