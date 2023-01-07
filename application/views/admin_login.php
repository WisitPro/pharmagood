<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
<style>
    
</style>
<title>หน้าเข้าสู่ระบบ</title>
</head>
<main>
    
    <form method="post" action="authen" style="background-color:rgba(227, 228, 226,0.9);">
<h1>เข้าสู่ระบบ</h1>
ชื่อผู้ใช้ <input type="text" name="adm_user"><br>
<font color="red"><?php echo form_error('adm_user'); ?></font>
รหัสผ่าน <input type="password" name="adm_pass"><br>
<font color="red"><?php echo form_error('adm_pass'); ?></font><br>
<button type="submit" style="background-color:#324587">เข้าสู่ระบบ</button>



</form>
    </body>

</main>
</html>
