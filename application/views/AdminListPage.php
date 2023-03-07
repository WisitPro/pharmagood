
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/AdminEdit.css">
</head>
<body>
    <container>
   <?php  if(isset($UpdatePassword)){ 
                foreach($UpdatePassword as $admin)?>
                
                <form onsubmit="return confirm('ยืนยันข้อมูล');" action="<?php echo base_url('/index.php/controller/NewAdminPassword');?>" method="POST"  autocomplete="off">
                <p style="font-size: 28px;margin-left: 38px;margin-top:0.5em;position:absolute;">สร้างรหัสผ่านใหม่</p>
                <input required type="hidden" name="adm_id" value="<?php echo $admin->adm_id ?>">
                <span id="inputline" style="padding-left: 100px;">
                <p class="head hd4">รหัสผ่าน*<br>
                    <input required type="password" minlength="8" name="adm_pass">
                   
                </p>
                <p class="head hd4"  style="margin-left: 100px;">ยืนยันรหัสผ่าน*<br>
                    <input required type="password" minlength="8"  name="adm_pass2">
                   
                </p>
                </span>
                

                <br>
                <button id="btnForm2"" type="submit" style="background-color:#56FF5D">บันทึก</button>
                
            </form>
            <a onclick="return confirm('ยกเลิกสร้างรหัสผ่าน');"  style="position:absolute;color: white;margin-top:-64px;width:160px"
            href="<?php echo base_url('/index.php/controller/AdminlistPage');?>">
            <button id="btnForm1"  style="background-color:#FF5353">ยกเลิก</button>
            </a>
            
               

                <?php }else{?>
        <p style="font-size:32px; margin-left:auto; color:white">ข้อมูลผู้ใช้ภายใน</p>
        <div id="backform">
            <table>
                <tr id="tr1">
                    <th style="width:60px ;text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56">ลำดับ</th>
                    <th style="width:140px ;text-indent: 4px;">รหัสผู้ใช้</th>
                    <th style="width:300px ;">ชื่อ-นามสกุล</th>
                    <th style="width:200px ;">เบอร์โทรศัพท์</th>
                    <th style="width:200px;">ชื่อผู้ใช้</th>
                    <th style="width:160px ;">รหัสผ่าน</th>
                    <th style="min-width:120px  ;" >ตำแหน่ง</th>
                    <th style="min-width:150px ;"></th>
                </tr>
                <?php $item = 1;foreach ($tbl_admin as $row) { ?>
                    <tr id="tr2" style="height: 32px;">
                        <td class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></td>
                        <td class="data" style="text-indent: 4px;"><?php echo $row->adm_id; ?></td>
                        <td class="data"><?php echo $row->adm_name; ?></td>
                        <td class="data"><?php echo $row->adm_phone; ?></td>
                        <td class="data"><?php echo $row->adm_user; ?></td>
                        <td class="data"><a  onclick="return confirm('สร้างรหัสผ่านใหม่');" href="<?php echo base_url('index.php/controller/UpdateAdminPassword/'.$row->adm_id.''); ?>">ลืมรหัสผ่าน</a></td>
                        <td class="data"><?php echo $row->adm_role; ?></td>
                        <td id="btnTable">
                            <a id="Edit" onclick="return confirm('แก้ไขข้อมูล');" href='<?php echo base_url('/index.php/controller/Admin_Edit?adm_id='.$row->adm_id.''); ?>'>แก้ไข</a>
                            <?php if($row->adm_role == "เจ้าของกิจการ"){
                                }else{?>
                            <a id="Remove" onclick="return confirm('คุณต้องการปิดบัญชีผู้ใช้นี้');" href='Admin_Keep?adm_id=<?php echo $row->adm_id; ?>'>ปิดบัญชี</a>
<?php }?>
                        </td>
                    </tr>
                <?php
                    $item++;
                }
                ?>
            </table>
            <?php if(isset($GetAdmin)){ 
                foreach($GetAdmin as $edit)?>
                
                <form action="Admin_Update" method="POST" autocomplete="off">
                <p style="font-size: 28px;margin-left: 38px;margin-top:0.5em;position:absolute;">ฟอร์มแก้ไขข้อมูลผู้ใช้ระบบ</p>
                <input required type="hidden" name="adm_id" value="<?php echo $edit->adm_id ?>">
                <span id="inputline"><p class="head hd1">ชื่อ-นามสกุล*<br>
                    <input required type="text" name="adm_name" value="<?php echo $edit->adm_name ?>">
                   
                </p>
                <p class="head hd2">เบอร์โทรศัพท์<br>
                    <input  type="text" name="adm_phone" minlength="10" maxlength="10" value="<?php echo $edit->adm_phone ?>">
                   
                </p>
                <p class="head hd3">ชื่อผู้ใช้*<br>
                    <input required type="text" name="adm_user" value="<?php echo $edit->adm_user ?>" >
                   
                </p>
                </span>
                <p id="radio">
                <?php if ($edit->adm_role == "เจ้าของกิจการ") { ?>
                    <input type="radio" name="adm_role" value="เจ้าของกิจการ" checked> เจ้าของกิจการ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="adm_role" value="เภสัชกร"> เภสัชกร
            </p>
        <?php } else { ?>
            <input type="radio" name="adm_role" value="เจ้าของกิจการ"> เจ้าของกิจการ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="adm_role" value="เภสัชกร" checked> เภสัชกร
            </p>
        <?php } ?>

                <br>
                <button id="btnForm2" onclick="return confirm('บันทึกข้อมูล');" type="submit" style="background-color:#56FF5D">บันทึก</button>
                <button id="btnForm1" onclick="return confirm('ยกเลิกแก้ไขข้อมูล');" onclick="history.back()" style="background-color:#FF5353">ยกเลิก</button>
               
            </form>

                <?php }else{?>
            <form action="AddAdmin" method="POST" autocomplete="off">
                <p style="font-size: 28px;margin-left: 38px;margin-top:0.5em;position:absolute;">ฟอร์มเพิ่มข้อมูลผู้ใช้ภายใน</p>
               
                <span id="inputline"><p class="head hd1">ชื่อ-นามสกุล*<br>
                    <input required type="text" name="adm_name">
                   
                </p>
                <p class="head hd2">เบอร์โทรศัพท์<br>
                    <input  type="text" name="adm_phone" minlength="10" maxlength="10">
                   
                </p>
                <p class="head hd3" >ชื่อผู้ใช้*<br>
                    <input required type="text" name="adm_user" minlength="5">
                    
                </p>
                <p class="head hd4" >รหัสผ่าน*<br>
                    <input required type="password"  minlength="8"  name="adm_pass" >
                    
                </p>
                <p class="head hd4">ยืนยันรหัสผ่าน*<br>
                    <input required type="password" minlength="8"  name="adm_pass2">
                   
                </p></span>
                <p id="radio">
                    <label><input type="radio" name="adm_role" value="เจ้าของกิจการ"> เจ้าของกิจการ</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <label> <input type="radio" name="adm_role" value="เภสัชกร" checked> เภสัชกร</label>
                </p>

                <br>
                <button id="btnForm2" type="submit" style="background-color:#56FF5D">เพิ่ม</button>
                <button id="btnForm1" type="reset" style="background-color:#FF5353">ยกเลิก</button>
               
            </form>
            <?php }?>
        </div>

    </container>
    
    <div>
    </div>

    <img id="admin" src="<?php echo base_url(); ?>images/admin.png">    
    <?php }?>
</body>
</html>