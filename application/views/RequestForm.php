<?php
if (isset($this->session->userdata['cus_user'])) {
    $user = $this->session->userdata['cus_user'];

    $name = $this->session->userdata['cus_name'];
    $id = $this->session->userdata['cus_id'];
    $phone = $this->session->userdata['cus_phone'];
}
foreach ($cus_info as $customer) {
    if($id = $customer->cus_id){
        $cus_phone = $customer->cus_phone;
        $cus_age = $customer->cus_age;
        $cus_height = $customer->cus_height;
        $cus_weight = $customer->cus_weight;
    }
   

    $now = new DateTime();
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
        <link href="<?php echo base_url(); ?>css/RqF.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/Fonts.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <div id="total">
            <div id="tab">
            </div>
            <form id="form2" action="sent_to_line" method="post">
                <i id="x" class="fa-solid fa-circle-xmark fa-2xl" onclick="window.location.href='<?php echo base_url('index.php/RequestController/RequestPage') ?>';"></i>
                <h1><img src="<?php echo base_url(); ?>images/image 4.png"> กรอกข้อมูลอาการ</h1>
                <input style="visibility: hidden;position:absolute;" type="text" name="req_id" value=" "></input>
                <input style="visibility: hidden;position:absolute;" type="text" name="cus_id" value="<?php echo $id ?> "></input>
                <p style="position: absolute;margin-left:230px;margin-top:28px">อายุ <span></span>
                    <input type="number" style="width:60px" name="cus_age"  value="<?php echo $cus_age ?>" required></input>
                    ปี </span>
                <p>ชื่อ-นามสกุล<span></span><br>
                    <input type="text" name="cus_name" value="<?php echo $name ?>" readonly disabled required></input>
                </p>
                <p style="position: absolute;margin-left:130px;margin-top:28px">น้ำหนัก <span></span>
                    <input type="text" style="width:60px" name="cus_weight" value="<?php echo $cus_weight ?>" required></input> กก.
                    </span>
                <p style="position: absolute;margin-left:300px;margin-top:28px">ส่วนสูง <span></span>
                    <input type="text" style="width:60px" name="cus_height" value="<?php echo $cus_height ?>" required></input> ซม.
                    </span>

                <p>เบอร์โทรศัพท์<span></span><br>
                    <input type="text" style="width: 120px;" name="cus_phone" value="<?php echo $cus_phone ?>" maxlength="10" minlength="10" required></input>
                </p>
                <?php if (!empty(set_value('req_sym'))) { ?>
                    <p>อาการเบื้องต้น<span>*</span><br>
                        <textarea name="req_sym" required minlength="30"><?php echo set_value('req_sym'); ?></textarea>
                    </p>
                <?php } else { ?>
                    <p>อาการเบื้องต้น<span>*</span><br>
                        <textarea name="req_sym" required minlength="30" maxlength="300">ปวดหัว ปวดหัว ปวดหัว ปวดหัว ปวดหัว ปวดหัว ปวดหัว</textarea>
                    </p>
                <?php } ?>



                <?php
                date_default_timezone_set("Asia/Bangkok");
                $currentDateTime = date('Y-m-d H:i');
                // echo $currentDateTime;
                ?>

                <p>วันและเวลาที่ต้องการปรึกษา<span>*(โปรดระบุเวลามากกว่า 30 นาทีขึ้นไป)</span><br>
                    <input type="datetime-local" name="req_time" required min="<?php echo $currentDateTime ?>"></input>
                </p>

                <p>
                    เวลาทำการ 9:30 น. - 18:30 น.
                </p>
                <input style="visibility: hidden;position:absolute;" type="text" name="req_status" value="รอยืนยันการขอคำปรึกษาจากเภสัชกร"></input>
                <button type="submit" id="bt">ยืนยันข้อมูล</button>
        </div>
        </form2>
        </div>
    </body>
<?php } ?>

    </html>