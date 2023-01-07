
<?php 
 
if (!$_SESSION["adm_id"]){  //check session
 
	  Header("Location: AdminLoginPage.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
 
}else{?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good | เภสัชกร</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/AdminHomePageCSS.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/Fonts.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/date_time.js"></script>
</head>

<body>
    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <a id="btHome" href="PhaHomePage">หน้าหลัก</a>
            
            <a id="bt2" href="">ข้อมูลร้องขอคำปรึกษา</a>
            <a id="bt3" href="">ข้อมูลการชำระเงิน</a>
            <!-- <a id="btLogin" href="AddminLogin">เข้าสู่ระบบ</a> -->
            <!-- <a id="btRegister" href="Register">สมัครสมาชิก</a> -->
        </div>

    </nav>

    <p style="font-size:20px; margin-left:190px; color:white">สำหรับเภสัชกร</p>
    <span id="date_time"></span><br>

    <span id="time"></span>


    <img id="admin" src="<?php echo base_url(); ?>images/admin.png">
    
</body>

</html>


<script type="text/javascript">
    window.onload = date_time('date_time');
</script>
<script type="text/javascript">
    window.onload = time('time');
</script>

<?php } ?>