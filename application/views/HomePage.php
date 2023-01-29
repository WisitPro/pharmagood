
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link href="<?php echo base_url();?>css/HomePageNew.css" rel="stylesheet" >
    <link href="<?php echo base_url();?>css/Fonts.css" rel="stylesheet" >
</head>
<body>
    <nav>
        <img id="logo" src="<?php echo base_url('images/logo.png'); ?>">
        <div id="menu">
            <a id="btHome" href="HomePage">หน้าหลัก</a>
            <a id="btLogin" href="LoginPage">เข้าสู่ระบบ</a>
            <a id="btRegister" href="RegisterPage">สมัครสมาชิก</a>
        </div>
    
    </nav>
    <banner>
        <a href="StoreX"><button id="btn1" >
            ดูรายการยาและเวชภัณฑ์
        </button></a>
        <img id="capsule" src="<?php echo base_url('images/Group 15.png'); ?>">
        <button id="btn2" onclick="Msg()" >
            นัดเวลาปรึกษาเภสัชกร
        </button>
    </banner>
    <footer>
        <div id="footer">
            <p id="footH">บริการของ Pharma Good</p>
            <a href="StoreX"><button id="ft1" >
            <p style="font-size: 20px">สั่งซื้อสินค้า</p>
            <p>สั่งซื้อยาสามัญประจำบ้าน</p>
            <p>และเวชภัณฑ์ได้ทันที</p>
            <img id="pic1" src="<?php echo base_url('images/image 1.png'); ?>">
        </button></a>
        <button id="ft2" onclick="Msg()">
            <p style="font-size: 20px">ปรึกษาเภสัชกร</p>
            <p>ระบุอาการเบื้องต้นและเวลาที่ต้องการปรึกษา</p>
            <p>สามารถวิดีโอคอลหรือส่งแชทข้อความได้</p>
            <img id="pic2"src="<?php echo base_url('images/image 2.png'); ?>">
        </button>
        </div>
        
    </footer>
</body>
</html>
<script>
function Msg() {
    if (confirm('เข้าสู่ระบบเพื่อใช้บริการ')) window.location.href='LoginPage';
  

}
</script>