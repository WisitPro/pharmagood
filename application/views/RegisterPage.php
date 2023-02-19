<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/Passwordconfirm.js"></script> -->
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/RegisterPage.css">
</head>
<body>
    <img id="pic1" src="<?php echo base_url('images/image-removebg-preview (9).png'); ?>">  
    <form action="RegisterPage2" id="registerform" method="POST" autocomplete="off">
        <h1>สมัครสมาชิก</h1>       
        <input type="text" minlength="5" maxlength="20" value="<?php echo set_value('cus_user'); ?>" name="cus_user" id="user" placeholder="ชื่อผู้ใช้(เพื่อใช้เข้าระบบ)" required>
        <br>
        <br>
        <input type="password" minlength="8" name="cus_pass" id="pass"  placeholder="รหัสผ่าน" required>
        <br>
        <br>
        <input type="password" minlength="8" name="cus_pass2" id="confirmpass" placeholder="ยืนยันรหัสผ่าน" required>
        <!-- <i id="not"class="fa-solid fa-not-equal" style="position: absolute;color:red;font-size:22px;margin-left:-27px;margin-top:6px;transition:0.2s;"></i>
        <i id="check" class="fa-regular fa-circle-check" style="position: absolute;color:limegreen;font-size:22px;margin-left:-27px;margin-top:6px;transition:0.2s;"></i> -->
        <br>
        <br>
        <input type="text" name="cus_name" id="name" placeholder="ชื่อ-นามสกุล" value="<?php echo set_value('cus_name'); ?>" required  >
        <br>
        <br>
        <input  type="tel" name="cus_phone" id="phone" placeholder="เบอร์โทร" value="<?php echo set_value('cus_phone'); ?>" minlength="10" maxlength="10" onkeypress='validate(event)' required>
        <br>
        <br>       
        <input  type="text" name="cus_age" id="age" placeholder="อายุ" value="<?php echo set_value('cus_age'); ?>" minlength="2" maxlength="3" onkeypress='validate(event)' required>       
            <br>
            <br>   
            <div id="tallandweight">
            <input  type="text" name="cus_height" id="tall" placeholder="ส่วนสูง" value="<?php echo set_value('cus_height'); ?>" minlength="2" maxlength="3" onkeypress='validate(event)' required>   
            <br>
            <br>   
            <input  type="text" name="cus_weight" id="weight" placeholder="น้ำหนัก"value="<?php echo set_value('cus_weight'); ?>" minlength="2" maxlength="3" onkeypress='validate(event)' required>        
            </div>   
            <div id="RadioGender">
      <span>เพศสภาพ :&nbsp;&nbsp; </span> <input type="radio" id="contactChoice1" name="cus_gender" value="ชาย" checked/>
      <label for="contactChoice1" id="gender">ชาย</label>

      <input type="radio" id="contactChoice2" name="cus_gender" value="หญิง" />
      <label for="contactChoice2" id="gender2">หญิง</label>
    </div>
            <!-- <button id="regisbt2" disabled >สมัครสมาชิก</button> -->
        <button id="regisbt" type="submit" >สมัครสมาชิก</button>
    </form>
    <img id="plaster" src="<?php echo base_url('images/plaster.png'); ?>">
    <img id="plaster2" src="<?php echo base_url('images/plaster.png'); ?>">
</body>
</html>
<script>
function validate(evt) { 
    var theEvent = evt || window.event;
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
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




