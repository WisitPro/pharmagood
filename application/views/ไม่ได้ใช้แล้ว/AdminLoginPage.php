<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/AdminLoginN.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/Fonts.css">
</head>

<body>
    <nav>
        <img id="logo" src="<?php echo base_url();?>images/logo.png">
        <div id="menu">
            <a id="btHome" href="HomePage">หน้าหลัก</a>
            <a id="btBack" href="LoginPage">เข้าสู่ระบบด้วยบัญชีลูกค้า</a>
            <!-- <a id="btRegister" href="Register">สมัครสมาชิก</a> -->
        </div>

    </nav>
    <img id="pic1" src="<?php echo base_url(); ?>images/Admin2.png">
    
    <form action="AdminLoginPage2" method="POST" autocomplete="off">
        <h1>เข้าสู่ระบบ</h1>
        <input type="text" name="adm_user" id="user" placeholder="ชื่อผู้ใช้" value="admin"><br>
        <font color="red">
            <?php echo form_error('adm_user'); ?>
        </font><br>
        <input type="password" name="adm_pass" id="pass" placeholder="รหัสผ่าน" value="12345"><br>
        <font color="red">
            <?php echo form_error('adm_pass'); ?>
        </font><br>
        <button id="btnLogin" type="submit">เข้าสู่ระบบ</button>
    </form>
    <img id="plaster" src="<?php echo base_url(); ?>images/plaster.png">
    <img id="plaster2" src="<?php echo base_url(); ?>images/plaster.png">
</body>

</html>