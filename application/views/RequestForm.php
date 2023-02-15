<?php
 if(isset($this->session->userdata['cus_user'])){
    $user = $this->session->userdata['cus_user'];
    
    $name = $this->session->userdata['cus_name'];
    $id = $this->session->userdata['cus_id'];
    $phone = $this->session->userdata['cus_phone'];
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

<body >
    

    <div id="total">
        <div id="tab">


        </div>

        <form id="form2" action="sent_to_line" method="post">
        <i  id="x" class="fa-solid fa-circle-xmark fa-2xl" onclick="history.back()"></i>
            <h1><img src="<?php echo base_url(); ?>images/image 4.png"> กรอกข้อมูลอาการ</h1>
            <input style="visibility: hidden;position:absolute;" type="text" name="req_id" value=" " ></input>

            <input style="visibility: hidden;position:absolute;" type="text" name="cus_id" value="<?php echo $id ?> " ></input>
            
            <p>ชื่อ-นามสกุล<span></span><br>
                <input type="text" name="cus_name" value="<?php echo $name ?>" readonly disabled required></input>
            </p>
            <p>เบอร์โทร<span></span><br>
                <input type="text"  name="cus_phone" value="<?php echo $phone ?>" maxlength="10" minlength="10" required></input>
            </p>
            <p>อาการเบื้องต้น<span>*</span><br>
                <textarea name="req_sym" required></textarea>
            </p>
            <p>วันและเวลาที่ต้องการปรึกษา<span>*(โปรดระบุเวลามากกว่า 30 นาทีขึ้นไป)</span><br>
                <input type="datetime-local" name="req_time"  required ></input>
            </p>
            <p>
                เวลาทำการ 9:30 น. - 18:30 น.
            </p>
            <input style="visibility: hidden;position:absolute;" type="text" name="req_status" value="รอยืนยันการขอคำปรึกษาจากเภสัชกร" ></input>

                
            <button type="submit" id="bt">ยืนยันข้อมูล</button>

    </div>


    </form2>

    </div>
</body>

</html>
