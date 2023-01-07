<?php
foreach ($tbl_admin as $row) {
    $adm_id = $row->adm_id;
    $adm_name = $row->adm_name;
    $adm_phone = $row->adm_phone;
    $adm_user = $row->adm_user;
    $adm_pass = $row->adm_pass;
    $adm_role = $row->adm_role;
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good | เจ้าของกิจการ | แก้ไขข้อมูลผู้ใช้ระบบ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/AmListEdit.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
</head>

<body>
    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
        <a id="btHome" href="AdminHomePage">หน้าหลัก</a>
            <a id="bt1" href="AdminListPage">ข้อมูลผู้ใช้งาน</a>
            <a id="bt5" href="ProductListPage">รายการสินค้า</a>
            <a id="bt2" href="">ข้อมูลร้องขอคำปรึกษา</a>
            <a id="bt3" href="">ข้อมูลการชำระเงิน</a>
            <a id="bt4"  onclick="AmOut()" style="cursor:pointer">ออกจากระบบ</a>
            <!-- <a id="btLogin" href="AddminLogin">เข้าสู่ระบบ</a> -->
            <!-- <a id="btRegister" href="Register">สมัครสมาชิก</a> -->
        </div>

    </nav>
    <p style="font-size:20px; margin-left:190px; color:white">สำหรับเจ้าของกิจการ</p>

    <container>
        
        
            
            <form action="Admin_Update" method="POST">
                <p style="font-size: 28px;margin-left: 38px;margin-top:0.5em;position:absolute;">ฟอร์มแก้ไขข้อมูลผู้ใช้</p>
                <input type="text" name="adm_id"  style="visibility:hidden ;position:absolute" value="<?php echo $row->adm_id ?>">
                    
                <p class="head hd1">ชื่อ-นามสกุล*<br>
                    <input type="text" name="adm_name" value="<?php echo $row->adm_name ?>">
                    <font color="red">
                        <?php echo form_error('adm_name'); ?>
                    </font>
                </p>
                <p class="head hd2">เบอร์โทร*<br>
                    <input type="text" name="adm_phone" value="<?php echo $row->adm_phone ?>">
                    <font color="red">
                        <?php echo form_error('adm_phone'); ?>
                    </font>
                </p>
                <p class="head hd3">ชื่อผู้ใช้*<br>
                    <input type="text" name="adm_user" value="<?php echo $row->adm_user ?>">
                    <font color="red">
                        <?php echo form_error('adm_user'); ?>
                    </font>
                </p>
                <p class="head hd4">รหัสผ่าน*<br>
                    <input type="text" name="adm_pass" value="<?php echo $row->adm_pass ?>">
                    <font color="red">
                        <?php echo form_error('adm_pass'); ?>
                    </font>
                </p>
                <p id="radio">
                    <?php if($adm_role=="เจ้าของกิจการ"){ ?>
                        <input type="radio"  name="adm_role" value="เจ้าของกิจการ" checked> เจ้าของกิจการ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                <input type="radio"  name="adm_role" value="เภสัชกร" > เภสัชกร
                </p>
                        
                        <?php }else{?>
                            <input type="radio"  name="adm_role" value="เจ้าของกิจการ" > เจ้าของกิจการ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                <input type="radio"  name="adm_role" value="เภสัชกร" checked> เภสัชกร
                </p>

                            <?php }?>
                    
                
                    <br>



                <button id="btnForm1" onclick="history.back()" style="background-color:#FF5353">ยกเลิก</button>
                <button id="btnForm2" type="submit" style="background-color:#56FF5D">บันทึก</button>

            </form>
        </div>
    </container>

    <div>

    </div>



    <img id="admin" src="<?php echo base_url(); ?>images/admin.png">
</body>

</html>