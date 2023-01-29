<?php
if (isset($this->session->userdata['cus_user'])) {
    $user = $this->session->userdata['cus_user'];

    $name = $this->session->userdata['cus_name'];
    $id = $this->session->userdata['cus_id'];
    $phone = $this->session->userdata['cus_phone'];
    if (!isset($this->session->userdata['req_status'])) {
    $req_status = false;
    }else if(isset($this->session->userdata['req_status'])) {
        $req_status = true;
    }
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
    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <a id="btHome" href="HomePage3">หน้าหลัก</a>
            <!-- <span id="n1">สวัสดีคุณ <?php echo $name ?></span> -->
            <a id="btOut" onclick="Out()" style="cursor:pointer;">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>

    </nav>
    <container>
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
            <p id="o2">ค่าบริการ</p>
            <div id="white3">
                <li>ค่ายารักษา</li>
                <li style="position: absolute; margin-left:180px; margin-top:-28px">ค่าจัดส่ง</li>

            </div>
            <?php if($req_status === false){ ?>
            
                <a href="RequestForm" style="color:white"><button id="btRq"  >นัดเวลาปรึกษาเภสัชกร</button></a>
            <?php }else if($req_status === true){?>
                <a href="RequestForm" style="color:white"><button id="btRq"  >ดูการนัดของคุณ</button></a>


            <?php } ?>
            
           

        </div>
    </container>


</body>

</html>
<script>
function Out() {
    if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href='CusLogout';
  

}
</script>