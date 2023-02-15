<?php
if (isset($this->session->userdata['cus_user'])) {
    $user = $this->session->userdata['cus_user'];

    $name = $this->session->userdata['cus_name'];
    $id = $this->session->userdata['cus_id'];
    $phone = $this->session->userdata['cus_phone'];
}
    if (!isset($this->session->userdata['ss_req_status'])) {
    $ss_req_status = false;
    }else if(isset($this->session->userdata['ss_req_status'])) {
        $ss_req_status = $this->session->userdata['ss_req_status'];
    
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
    <link href="<?php echo base_url(); ?>css/RqP.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/Fonts.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>

<body>
   
    <div id="container">
        <div id="blue1">
            <p>บริการ</p>
            <p id="b2">ปรึกษาเภสัชกร</p>
            <p id="b3">วิดีโอคอล รับคำแนะนำจากเภสัชกรเพื่อซื้อยารักษาพร้อมบริการจัดส่งถึงบ้าน</p>
            <img id="pic1" src="<?php echo base_url(); ?>images/image 3.png">

        </div>
        <div id="orange2">
        <i  id="x" class="fa-solid fa-circle-xmark fa-xl" onclick="history.back()"></i>
            <p id="o1">รายละเอียดบริการ</p>
            <ul id="l1">
                <li>จ่ายยาตามอาการ</li>
                <li>ปรึกษาอาการกับเภสัชกรคุณภาพก่อนซื้อยา</li>
                <li>บริการจัดส่งยาถึงหน้าบ้าน</li>
                <li>ระยะเวลาการจัดส่งไม่เกิน 1-2 ชม.</li>
            </ul>
            <!-- <p id="o2">ค่าบริการ</p>
            <div id="white3">
                <li>ค่ายารักษา</li>
                <li style="position: absolute; margin-left:180px; margin-top:-28px">ค่าจัดส่ง</li>
            </div> -->
            <?php if($ss_req_status === false){ ?>
            
                <a href="RequestForm" style="color:white;"><button id="btRq"  >นัดเวลาปรึกษาเภสัชกร</button></a>
            <?php }else if($ss_req_status === true){?>
                <a href="MyCurrentRQ" style="color:white;"><button id="btRq"  >ดูการนัดของคุณ</button></a>


            <?php } ?>
            
           

        </div>
    </div>


</body>

</html>
