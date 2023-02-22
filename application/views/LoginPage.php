<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/LoginPage.css">
</head>
<body> 
    <img id="pic1" src="<?php echo base_url(); ?>images/image-removebg-preview (9).png">
    <form action="LoginPage2" method="POST" autocomplete="off">
        <h1>เข้าสู่ระบบ</h1>
        <input type="text" name="username" id="user" placeholder="ชื่อผู้ใช้" value="wisit" required><br>
        <font color="red">
            <?php echo form_error('cus_user'); ?>
        </font><br>
        <input type="password" name="password" id="pass" placeholder="รหัสผ่าน" value="12345678" required><br>
        <font color="red">
            <?php echo form_error('cus_pass'); ?>
        </font><br>
        <button id="btnLogin" type="submit">เข้าสู่ระบบ</button>
    </form>
    <img id="plaster" src="<?php echo base_url(); ?>images/plaster.png">
    <img id="plaster2" src="<?php echo base_url(); ?>images/plaster.png">
</body>
</html>