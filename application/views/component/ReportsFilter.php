<?php
$basename = basename($_SERVER['PHP_SELF']);
date_default_timezone_set("Asia/Bangkok");
if (isset($print)) {
    $Print = $print;
} else {
    $Print = '0';
}



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
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ReportsFilter.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">

    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
    <style>
        @media print {

            nav {
                visibility: hidden;
            }

            nav * {
                visibility: hidden;
            }

            body * {
                visibility: hidden;
                border: none !important;
            }

            #backform,
            #backform * {
                visibility: visible;
            }

            #backform {
                position: absolute;
                width: 100%;
                height: auto;
                margin-left: -100px;
            }

            container {
                visibility: hidden;
            }


        }

        #cover input,
        select,
        option {
            font-weight: bold;
        }

        #cover button {
            font-weight: bold;
        }
    </style>
    <script>
        var body = document.getElementById('body');

        var subjectDropdown = document.getElementById('Subject');
        var productTypeDropdown = document.getElementsByName('product_type')[0];
        var adminDropdown = document.getElementById('adminlist');
        var req_statusDropdown = document.getElementById('req_status');
        var order_statusDropdown = document.getElementById('order_status');
        var pdSearch = document.getElementById('pro_id');
        var orderlistSearch = document.getElementById('order_id');

        window.addEventListener('load', function() {
            if (subjectDropdown.value == '1') {
                productTypeDropdown.style.display = 'inline-block';
                pdSearch.style.display = 'inline-block';
                adminDropdown.style.display = 'none';
                req_statusDropdown.style.display = 'none';
                order_statusDropdown.style.display = 'none';
                orderlistSearch.style.display = 'none';
            } else if (subjectDropdown.value == '2') {
                productTypeDropdown.style.display = 'none';
                adminDropdown.style.display = 'inline-block';
                req_statusDropdown.style.display = 'inline-block';
                order_statusDropdown.style.display = 'none';
                pdSearch.style.display = 'none';
                orderlistSearch.style.display = 'none';
            } else if (subjectDropdown.value == '3') {
                productTypeDropdown.style.display = 'none';
                adminDropdown.style.display = 'none';
                req_statusDropdown.style.display = 'none';
                order_statusDropdown.style.display = 'inline-block';
                pdSearch.style.display = 'none';
                orderlistSearch.style.display = 'none';
            }  else if (subjectDropdown.value == '4') {
                productTypeDropdown.style.display = 'none';
                adminDropdown.style.display = 'none';
                req_statusDropdown.style.display = 'none';
                order_statusDropdown.style.display = 'none';
                pdSearch.style.display = 'none';
                orderlistSearch.style.display = 'none';
            } else if (subjectDropdown.value == '5') {
                productTypeDropdown.style.display = 'none';
                adminDropdown.style.display = 'none';
                req_statusDropdown.style.display = 'none';
                order_statusDropdown.style.display = 'none';
                pdSearch.style.display = 'none';
                orderlistSearch.style.display = 'inline-block';
            }else {
                productTypeDropdown.style.display = 'none';
                adminDropdown.style.display = 'none';
                req_statusDropdown.style.display = 'none';
                order_statusDropdown.style.display = 'none';
                pdSearch.style.display = 'none';
                orderlistSearch.style.display = 'none';
            }
        });
    </script>

</head>

<body>
    <br><br>
    <img src="<?php echo base_url();?>images/report.png" alt="" style="position: absolute;margin-left:620px;margin-top:140px;width: 300px;">
    <container id="bclass">

        <div id="cover">
            <!-- <?php if ($basename == 'ReportsPage2' || $basename == 'PharmacistReport') { ?>
            <form action="PharmacistReport" method="POST" autocomplete="off" style="font-size: larger;display: inline;">
           
           
            <label for="">วันที่
                <input type="date" name="day1"   value=""  >
            </label>
            <label for="">ถึงวันที่
                <input type="date" name="day2" value="">
            </label>
            <select name="task" required>
                <option disabled selected hidden style="color:#FF5353;">ประเภทงาน</option>
                <option value="ให้คำปรึกษา">ให้คำปรึกษา</option>
                <option value="ยืนยันการชำระเงิน">ยืนยันการชำระเงิน</option>
                <option value="จัดส่ง">จัดส่ง</option>
            </select>
            
            <select name="admin">
                <option disabled selected hidden style="color:#FF5353;">รายชื่อเภสัชกร</option>
                <?php foreach ($admin_list as $list) { ?>

                    <option value="<?php echo $list->adm_id ?>"><?php echo $list->adm_id . ' ' . $list->adm_name ?></option>
                <?php } ?>
            </select>
            <button type="submit">แสดงผล</button>

            </form>
            <?php } else { ?> -->

            <form action="ReportFilter" method="POST" autocomplete="off" style="font-size: larger;display: inline;">
                <select name="Subject" id="Subject" required>
                    <?php if(isset($Subject)){?>
                    <option value="" selected disabled>รายงาน</option>
                    <option value="1" <?php echo $Subject == 1 ? "selected" : ""; ?>>รายงานการขาย</option>
                    <option value="2" <?php echo $Subject == 2 ? "selected" : ""; ?>>รายงานการให้คำปรึกษา</option>
                    <option value="3" <?php echo $Subject == 3 ? "selected" : ""; ?>>รายงานคำสั่งซื้อ</option>
                    <option value="4" <?php echo $Subject == 4 ? "selected" : ""; ?>>รายงานการจัดส่งยาและเวชภัณฑ์</option>
                    <option value="5" <?php echo $Subject == 5 ? "selected" : ""; ?>>รายงานรายการสั่งซื้อ</option>

                    <?php }else{?>
                        <option value="" selected disabled>รายงาน</option>
                    <option value="1">รายงานการขาย</option>
                    <option value="2">รายงานการให้คำปรึกษา</option>
                    <option value="3">รายงานการสั่งซื้อ</option>
                    <option value="4">รายงานการจัดส่งยาและเวชภัณฑ์</option>
                    <option value="5">รายงานรายการสั่งซื้อ</option>

                        <?php }?>

                </select><button type="submit" name="Reset" value="1" style="margin-left: 4px;">รีเซ็ต</button><br><br>
                <label for="">วันที่
                    <input type="date" name="day1" value="">
                </label>
                <label for="">ถึงวันที่
                    <input type="date" name="day2" value="">
                </label>

                <select name="product_type">
                    <option disabled selected hidden style="color:#FF5353;">ประเภทยาและเวชภัณฑ์</option>
                    <?php foreach ($product_type_list as $type_list) { ?>
                        <option value="<?php echo $type_list->type_id ?>"><?php echo $type_list->type_name ?></option>
                    <?php } ?>
                </select>
                <input type="text" name="pro_id" id="pro_id" style="width: 155px;" maxlength="13" minlength="13" placeholder="รหัสยาและเวชภัณฑ์">

                <select name="req_status" id="req_status">
                    <option selected value="เสร็จสิ้น">รายการให้คำปรึกษา</option>
                    <option value="ยกเลิก">รายการยกเลิก</option>
                </select>

                <select name="admin" id="adminlist">
                    <option disabled selected hidden style="color:#FF5353;">รายชื่อเภสัชกร</option>
                    <?php foreach ($admin_list as $list) { ?>

                        <option value="<?php echo $list->adm_id ?>"><?php echo $list->adm_id . ' ' . $list->adm_name ?></option>
                    <?php } ?>
                </select>

                <input type="text" name="order_id" id="order_id" style="width: 155px;"  placeholder="หมายเลขคำสั่งซื้อ">

                <select name="order_status" id="order_status">
                    <option selected value="ยืนยันแล้ว">ยืนยันแล้ว</option>
                    <option value="ยกเลิก">ยกเลิก</option>
                </select>

                <button type="submit">แสดงผล</button>







            </form>



        <?php } ?>


        <?php if ($basename == 'ReportsPage' ||  $Print == '0') {
        } elseif ($basename != 'ReportsPage' && $Print == '1') { ?>
            <button onclick="window.print();" id="printbt" style="font-size: larger;float:right;">ปริ้นท์</button>
        <?php } ?>
        </div>

        <script>
            var today = new Date().toISOString().split('T')[0];
            document.getElementsByName("day1")[0].setAttribute('max', today);
            document.getElementsByName("day2")[0].setAttribute('max', today);


            var body = document.getElementById('body');

            var subjectDropdown = document.getElementById('Subject');
            var productTypeDropdown = document.getElementsByName('product_type')[0];
            var adminDropdown = document.getElementById('adminlist');
            var req_statusDropdown = document.getElementById('req_status');
            var order_statusDropdown = document.getElementById('order_status');
            var pdSearch = document.getElementById('pro_id');
            var orderlistSearch = document.getElementById('order_id');

            subjectDropdown.addEventListener('change', function() {
                if (this.value == '1') {
                productTypeDropdown.style.display = 'inline-block';
                pdSearch.style.display = 'inline-block';
                adminDropdown.style.display = 'none';
                req_statusDropdown.style.display = 'none';
                order_statusDropdown.style.display = 'none';
                orderlistSearch.style.display = 'none';
            } else if (this.value == '2') {
                productTypeDropdown.style.display = 'none';
                adminDropdown.style.display = 'inline-block';
                req_statusDropdown.style.display = 'inline-block';
                order_statusDropdown.style.display = 'none';
                pdSearch.style.display = 'none';
                orderlistSearch.style.display = 'none';
            } else if (this.value == '3') {
                productTypeDropdown.style.display = 'none';
                adminDropdown.style.display = 'none';
                req_statusDropdown.style.display = 'none';
                order_statusDropdown.style.display = 'inline-block';
                pdSearch.style.display = 'none';
                orderlistSearch.style.display = 'none';
            }  else if (this.value == '4') {
                productTypeDropdown.style.display = 'none';
                adminDropdown.style.display = 'none';
                req_statusDropdown.style.display = 'none';
                order_statusDropdown.style.display = 'none';
                pdSearch.style.display = 'none';
                orderlistSearch.style.display = 'none';
            } else if (this.value == '5') {
                productTypeDropdown.style.display = 'none';
                adminDropdown.style.display = 'none';
                req_statusDropdown.style.display = 'none';
                order_statusDropdown.style.display = 'none';
                pdSearch.style.display = 'none';
                orderlistSearch.style.display = 'inline-block';
            }else {
                productTypeDropdown.style.display = 'none';
                adminDropdown.style.display = 'none';
                req_statusDropdown.style.display = 'none';
                order_statusDropdown.style.display = 'none';
                pdSearch.style.display = 'none';
                orderlistSearch.style.display = 'none';
            }
            });
        </script>