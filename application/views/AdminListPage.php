<!-- <?php
foreach ($tbl_admin as $row) {
    $adm_id = $row->adm_id;
}

?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/AmList1.css">
</head>
<body>
    <container>
        <p style="font-size:32px; margin-left:auto; color:white">ข้อมูลผู้ใช้ภายใน</p>
        <div id="backform">
            <table>
                <tr id="tr1">
                    <th style="width:60px ;text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56">ลำดับ</th>
                    <th style="width:140px ;text-indent: 4px;">รหัสผู้ใช้</th>
                    <th style="width:300px ;">ชื่อ-นามสกุล</th>
                    <th style="width:200px ;">เบอร์โทรศัพท์</th>
                    <th style="width:200px;">ชื่อผู้ใช้</th>
                    <th style="width:120px ;">รหัสผ่าน</th>
                    <th style="width:300px  ;" >ตำแหน่ง</th>
                    <th style="width:200px ;"></th>
                </tr>
                <?php $item = 1;foreach ($tbl_admin as $row) { ?>
                    <tr id="tr2" style="height: 32px;">
                        <td class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></td>
                        <td class="data" style="text-indent: 4px;"><?php echo $row->adm_id; ?></td>
                        <td class="data"><?php echo $row->adm_name; ?></td>
                        <td class="data"><?php echo $row->adm_phone; ?></td>
                        <td class="data"><?php echo $row->adm_user; ?></td>
                        <td class="data">********</td>
                        <td class="data"><?php echo $row->adm_role; ?></td>
                        <td id="btnTable">
                            <a id="Edit" href='Admin_Edit?adm_id=<?php echo $row->adm_id; ?>'>แก้ไข</a>
                            <?php if($row->adm_role == "เจ้าของกิจการ"){
                                }else{?>
                            <a id="Remove" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่');" href='Admin_Remove?adm_id=<?php echo $row->adm_id; ?>'>ลบ</a>
<?php }?>
                        </td>
                    </tr>
                <?php
                    $item++;
                }
                ?>
            </table>
            <form action="AddAdmin" method="POST" autocomplete="off">
                <p style="font-size: 28px;margin-left: 38px;margin-top:0.5em;position:absolute;">ฟอร์มเพิ่มผู้ใช้</p>
                <input required type="text" name="adm_id"  style="visibility:hidden ;position:absolute" value="<?php echo $row->adm_id+1 ?>">
                <p class="head hd1">ชื่อ-นามสกุล*<br>
                    <input required type="text" name="adm_name">
                    <font color="red">
                        <?php echo form_error('adm_name'); ?>
                    </font>
                </p>
                <p class="head hd2">เบอร์โทร<br>
                    <input  type="text" name="adm_phone" minlength="10" maxlength="10">
                    <font color="red">
                        <?php echo form_error('adm_phone'); ?>
                    </font>
                </p>
                <p class="head hd3">ชื่อผู้ใช้*<br>
                    <input required type="text" name="adm_user">
                    <font color="red">
                        <?php echo form_error('adm_user'); ?>
                    </font>
                </p>
                <p class="head hd4">รหัสผ่าน*<br>
                    <input required type="password" name="adm_pass">
                    <font color="red">
                        <?php echo form_error('adm_pass'); ?>
                    </font>
                </p>
                <p id="radio">
                    <input  type="radio" name="adm_role" value="เจ้าของกิจการ"> เจ้าของกิจการ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <input  type="radio" name="adm_role" value="เภสัชกร" checked> เภสัชกร
                </p>

                <br>
                <button id="btnForm2" type="submit" style="background-color:#56FF5D">เพิ่ม</button>
                <button id="btnForm1" type="reset" style="background-color:#FF5353">ยกเลิก</button>
               
            </form>
        </div>
    </container>
    <div>
    </div>
    <img id="admin" src="<?php echo base_url(); ?>images/admin.png">
</body>
</html>