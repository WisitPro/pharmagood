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

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/AmListEdit.css">
</head>

<body>
    <container>
        <form action="Admin_Update" method="POST" autocomplete="off">
            <p style="font-size: 28px;margin-left: 38px;margin-top:0.5em;position:absolute;">ฟอร์มแก้ไขข้อมูลผู้ใช้ระบบ</p>
            
            <p class="head hd1">ชื่อ-นามสกุล*<br>
                <input type="text" name="adm_name" value="<?php echo $row->adm_name ?>">
                <font color="red">
                    <?php echo form_error('adm_name'); ?>
                </font>
            </p>
            <p class="head hd2">เบอร์โทรศัพท์*<br>
                <input type="text" name="adm_phone" minlength="10" maxlength="10" value="<?php echo $row->adm_phone ?>">
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
            
            <p id="radio">
                <?php if ($adm_role == "เจ้าของกิจการ") { ?>
                    <input type="radio" name="adm_role" value="เจ้าของกิจการ" checked> เจ้าของกิจการ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="adm_role" value="เภสัชกร"> เภสัชกร
            </p>
        <?php } else { ?>
            <input type="radio" name="adm_role" value="เจ้าของกิจการ"> เจ้าของกิจการ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="adm_role" value="เภสัชกร" checked> เภสัชกร
            </p>
        <?php } ?>
        <br>
        <button id="btnForm11" onclick="return confirm('ยกเลิกการแก้ไขข้อมูล');" onclick="history.back()" style="background-color:#FF5353">ยกเลิก</button>
        <button id="btnForm22" onclick="return confirm('ยืนยันการแก้ไขข้อมูล');" type="submit" style="background-color:#56FF5D">บันทึก</button>
        </form>
        </div>
    </container>
    <img id="admin" src="<?php echo base_url(); ?>images/admin.png">
</body>

</html>