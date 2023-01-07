<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
<title>สมัครสมาชิก</title>
<style>
    
    form{
        
        position: absolute;
        left:65%;
        top:20%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>
</head>
<body >
<main>

<form action="register2" method="post" style="background-color:rgba(227, 228, 226,0.9);">
<h1>สมัครสมาชิก</h1>

<div>
<label for="username">ชื่อบัญชี:</label>
<input type="text" name="username" id="username">
<font color="red"><?php echo form_error('username'); ?></font>
</div>
<div>
<label for="email">ชื่อบัญชี:</label>
<input type="text" name="email" id="email">
<font color="red"><?php echo form_error('email'); ?></font>
</div>
<div>
<label for="password">รหัสผ่าน:</label>
<input type="password" name="password" id="password">
<font color="red"><?php echo form_error('password'); ?></font>
</div>
<div>
<label for="password2">ยืนยันรหัสผ่าน:</label>
<input type="password" name="password2" id="password2">
<font color="red"><?php echo form_error('password2'); ?></font>
</div>
<div>

</div>
<button type="submit" style="background-color:#324587">สมัคสมาชิก</button>

<footer>เป็นสมาชิกแล้ว <a href="login">เข้าสู่ระบบ</a></footer>
</form>
</main>
</body>
</html>