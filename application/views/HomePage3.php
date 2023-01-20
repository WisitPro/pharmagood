<?php
// session_destroy();
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
?>


<?php
            if(isset($this->session->userdata['cus_user'])){
            $user = $this->session->userdata['cus_user'];
            
            $name = $this->session->userdata['cus_name'];
            $id = $this->session->userdata['cus_id'];
            $phone = $this->session->userdata['cus_phone'];
            }
            
            ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good | หน้าหลัก</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link href="<?php echo base_url();?>css/HomePage3N.css" rel="stylesheet" >
    <link href="<?php echo base_url();?>css/Fonts.css" rel="stylesheet" >
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <img id="logo" src="<?php echo base_url('images/logo.png'); ?>">
        <div id="menu">
            <a id="btHome" href="HomePage3">หน้าหลัก</a>
            <span id="n1">สวัสดีคุณ <?php echo $name ?></span>
            <a id="btCart" href="Basket"><i class="fa-solid fa-basket-shopping"></i> ตะกร้าสินค้า</a>
            
            <a id="btOut"  onclick="Out()" style="cursor:pointer;">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            <!-- <a id="btLogin" href="AddminLogin">เข้าสู่ระบบ</a> -->
            <!-- <a id="btRegister" href="Register">สมัครสมาชิก</a> -->
        </div>

    
    </nav>
    <banner>
        <a href="<?php echo base_url('/index.php/Products/Store');?>"><button id="btn1"  >
            ดูรายการยาและเวชภัณฑ์
        </button></a>
        <img id="capsule" src="<?php echo base_url('images/Group 15.png'); ?>">
        <a href="RequestPage"><button id="btn2">
            นัดเวลาปรึกษาเภสัชกร
        </button></a>
    </banner>
    <footer>
        <div id="footer">
            <p id="footH">บริการของ Pharma Good</p>
            <a href="Store"><button id="ft1">
            <p style="font-size: 20px">สั่งซื้อสินค้า</p>
            <p>สั่งซื้อยาสามัญประจำบ้าน</p>
            <p>และเวชภัณฑ์ได้ทันที</p>
            <img id="pic1" src="<?php echo base_url('images/image 1.png'); ?>">
        </button></a>
        <a href="RequestPage"><button id="ft2">
            <p style="font-size: 20px">ปรึกษาเภสัชกร</p>
            <p>ระบุอาการเบื้องต้นและเวลาที่ต้องการปรึกษา</p>
            <p>สามารถวิดีโอคอลหรือส่งแชทข้อความได้</p>
            <img id="pic2"src="<?php echo base_url('images/image 2.png'); ?>">
        </button>
        </a>
        </div>
        
    </footer>
    
</body>
</html>
<script>
function Out() {
    if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href='CusLogout';
  

}
</script>