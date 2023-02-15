<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/Passwordconfirm.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/RegisterPage.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/Fonts.css">
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>

<script type='text/javascript'>

</script>
<body>
    <img id="pic1" src="<?php echo base_url('images/image-removebg-preview (9).png'); ?>">
    
    <form action="RegisterPage2" method="POST" autocomplete="off">
        <h1>สมัครสมาชิก</h1>
        <input type="text" name="cus_id" id="id" placeholder="รหัสบัตรประชาชน" maxlength="13" minlength="13"  required onkeypress='validate(event)' >
        <br>
        <br>
            
        <input type="text" name="cus_name" id="name" placeholder="ชื่อ-นามสกุล" required  >
        <br>
        <br>
        <input  type="tel" name="cus_phone" id="phone" placeholder="เบอร์โทร" minlength="10" maxlength="10" onkeypress='validate(event)' required>
        <br>
        <br>
        
        <input type="text" minlength="5" maxlength="20" name="cus_user" id="user" placeholder="ชื่อผู้ใช้(เพื่อใช้เข้าระบบ)" required>
        <br>
        <br>
        <input type="password" minlength="8" name="cus_pass" id="pass" placeholder="รหัสผ่าน" required>
        <br>
        <br>
        <input type="password" minlength="8" name="cus_pass2" id="confirmpass" placeholder="ยืนยันรหัสผ่าน" required>
        <i id="not"class="fa-solid fa-not-equal" style="position: absolute;color:red;font-size:22px;margin-left:-27px;margin-top:6px;transition:0.2s;"></i>
        <i id="check" class="fa-regular fa-circle-check" style="position: absolute;color:limegreen;font-size:22px;margin-left:-27px;margin-top:6px;transition:0.2s;"></i>
            <br>
            <br>
       
        
            <button id="regisbt2" disabled >สมัครสมาชิก</button>
        <button id="regisbt" type="submit" >สมัครสมาชิก</button>
    </form>
    <img id="plaster" src="<?php echo base_url('images/plaster.png'); ?>">
    <img id="plaster2" src="<?php echo base_url('images/plaster.png'); ?>">
    

    

</body>

</html>

<script>
function validate(evt) { //รับค่าเฉพาะตัวเลข
    var theEvent = evt || window.event;
  
    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
    // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }

  </script>




