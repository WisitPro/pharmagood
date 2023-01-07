<?php
foreach($tbl_admin as $row){
    $adm_user=$row->adm_user;
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>หน้าหลัก</title>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap');

   
</style>
</head>


<body>
    
   
    <div id="button">
        <a href="insert"><button id="insert" href='insert'><i class="fa-solid fa-plus"></i>&nbsp;เพิ่ม</button></a>
        <button id="delete_all" name="delete_all"><i class="fa-solid fa-trash-can"></i></i>&nbsp;ลบ</button>
        <!--<button id="ed" onclick="myFunction()"><i class="fa-solid fa-pencil"></i></i>&nbsp;แก้ไข</button>-->
        <a href="admin_management"><button id="f5"><i class="fa-solid fa-arrow-rotate-right"></i>&nbsp;รีเฟรชเพจ</button></a>

    </div>


    <div id="bigbox">
        <div id="tbody">
            <table id="backbox">
                <thead>
                    <tr id="row1">
                        <th class="hc hc1 col1"><input type="checkbox" class="checkall">&nbsp;&nbsp;&nbsp;&nbsp;รหัสผู้ใช้ระบบ</th>
                        <th class="hc hc2 col2">ชื่อ-นามสกุล</th>
                        <th class="hc hc3 col3">เบอร์โทรศัพท์</th>
                        <th class="hc hc4 col4">ชื่อผู้ใช้</th>
                        <th class="hc hc5 col5">รหัสผ่าน</th>


                    </tr>

                </thead>
                <tbody>
                    <?php
                    foreach ($tbl_admin as $row) {
                    ?>


                        <tr>
                            <td  class="col1"><input type="checkbox" class="delete_checkbox " value="<?php echo $row->adm_id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo @$k += 1; ?></td>
                            <td class="col2"><?php echo $row->adm_name; ?></td>
                            <td class="col3"><?php echo $row->adm_phone; ?></td>
                            <td class="col4"><?php echo $row->adm_user; ?></td>
                            <td class="col5"><?php echo $row->adm_pass; ?></td>
                            <td class="col5"><?php echo $row->adm_role; ?></td>
                        </tr>
                        


                    <?php
                    }

                    ?>
                </tbody>



            </table>
        </div>
        <div id="tbody2"></div>
    </div>
    
    


   








</body>



</html>