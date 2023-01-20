<?php
foreach ($tbl_admin as $row) {
    $adm_id = $row->adm_id;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good | เจ้าของกิจการ | ข้อมูลผู้ใช้ระบบ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/AmList1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/AdminOut.js"></script>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <a id="btHome" href="AdminHomePage">หน้าหลัก</a>
            <div class="dropdown">
                <button class="dropbtn">เมนู <i class="fa-solid fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a  href="AdminListPage">ข้อมูลผู้ใช้งาน</a>
                    <a  href="ProductListPage">รายการสินค้า</a>
                    <a  href="">ข้อมูลร้องขอคำปรึกษา</a>
                    <a  href="">ข้อมูลการชำระเงิน</a>
                </div>
            </div>

            

            <a id="bt4" onclick="AmOut()" style="cursor:pointer">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>

            <!-- <a id="btLogin" href="AddminLogin">เข้าสู่ระบบ</a> -->
            <!-- <a id="btRegister" href="Register">สมัครสมาชิก</a> -->

        </div>

    </nav>
    <p style="font-size:20px; margin-left:155px; color:white">สำหรับเจ้าของกิจการ</p>

    <container>
        <p style="font-size:32px; margin-left:auto; color:white">ข้อมูลผู้ใช้</p>
        <div id="backform">
            <table>

                <tr id="tr1">

                    <th style="width:6% ;text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56">ลำดับ</th>
                    <th style="width:8% ;text-indent: 4px;">รหัสผู้ใช้</th>
                    <th style="width:auto ;">ชื่อ-นามสกุล</th>
                    <th style="width:15% ;">เบอร์โทร</th>
                    <th style="width:15% ;">ชื่อผู้ใช้</th>
                    <th style="width:10% ;">รหัสผ่าน</th>
                    <th style="width:12% ;">ตำแหน่ง</th>
                    <th style="width:15% ;"></th>

                </tr>
                <?php
                $item = 1;
                foreach ($tbl_admin as $row) {


                ?>
                    <tr id="tr2">
                        <td class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></td>
                        <td class="data" style="text-indent: 4px;">A0<?php echo $row->adm_id; ?></td>
                        <td class="data"><?php echo $row->adm_name; ?></td>
                        <td class="data"><?php echo $row->adm_phone; ?></td>
                        <td class="data"><?php echo $row->adm_user; ?></td>
                        <td class="data"><?php echo $row->adm_pass; ?></td>
                        <td class="data"><?php echo $row->adm_role; ?></td>
                        <td id="btnTable">
                            <a id="Edit" href='Admin_Edit?adm_id=<?php echo $row->adm_id; ?>'>แก้ไข</a>
                            <a id="Remove" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่');" href='Admin_Remove?adm_id=<?php echo $row->adm_id; ?>'>ลบ</a>

                        </td>
                    </tr>
                <?php
                    $item++;
                }

                ?>



            </table>

            <form action="AddAdmin" method="POST">
                <p style="font-size: 28px;margin-left: 38px;margin-top:0.5em;position:absolute;">ฟอร์มเพิ่มผู้ใช้</p>
                <input required type="text" name="adm_id"  style="visibility:hidden ;position:absolute" value="<?php echo $row->adm_id+1 ?>">
                
                

                <p class="head hd1">ชื่อ-นามสกุล*<br>
                    <input required type="text" name="adm_name">
                    <font color="red">
                        <?php echo form_error('adm_name'); ?>
                    </font>
                </p>
                <p class="head hd2">เบอร์โทร*<br>
                    <input required type="text" name="adm_phone">
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
                    <input required type="text" name="adm_pass">
                    <font color="red">
                        <?php echo form_error('adm_pass'); ?>
                    </font>
                </p>
                <p id="radio">
                    <input  type="radio" name="adm_role" value="เจ้าของกิจการ"> เจ้าของกิจการ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <input  type="radio" name="adm_role" value="เภสัชกร" checked> เภสัชกร
                </p>

                <br>



                <button id="btnForm1" type="reset" style="background-color:#FF5353">ยกเลิก</button>
                <button id="btnForm2" type="submit" style="background-color:#56FF5D">เพิ่ม</button>

            </form>
        </div>
    </container>

    <div>

    </div>



    <img id="admin" src="<?php echo base_url(); ?>images/admin.png">
</body>

</html>