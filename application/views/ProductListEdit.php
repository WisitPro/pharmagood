<?php
        foreach ($tbl_product as $row) {
           $pro_id = $row->pro_id;
           $pro_img = $row->pro_img;
           $pro_name = $row->pro_name;
           $pro_type = $row->pro_type;
           $pro_price = $row->pro_price;
           $pro_kind = $row->pro_kind;
        }

        ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good | เจ้าของกิจการ | รายการยาและเวชภัณฑ์ | ฟอร์มแก้ไขข้อมูลสินค้า</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/PdListEditNew.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
    
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <p id="btHome" >ฟอร์มแก้ไขข้อมูลสินค้า</p>
            
            
            <!-- <a id="btLogin" href="AddminLogin">เข้าสู่ระบบ</a> -->
            <!-- <a id="btRegister" href="Register">สมัครสมาชิก</a> -->
        </div>

    </nav>
    <p style="font-size:20px; margin-left:155px; color:white">สำหรับเจ้าของกิจการ</p>

<div id="form">
<form  action="Product_Update" method="POST">
        <p style="font-size: 28px;margin-left: 38px;margin-top:0.5em;position:absolute;">ฟอร์มแก้ไขข้อมูลสินค้า</p>
        <!-- <input type="text" name="pro_id"  style="visibility:hidden ;position:absolute" value="<?php echo $row->pro_id + 1 ?>"> -->


        <input type="text" class="head pro_id" name="pro_id" placeholder="รหัสสินค้า*" value="<?php echo $row->pro_id ?>">
        <input type="text" class="head pro_name" name="pro_name" placeholder="ชื่อสินค้า*" value="<?php echo $row->pro_name ?>">
        <select name="pro_type" class="head ">
            <option disabled selected hidden style="color:#FF5353;">ประเภทยารักษา</option>
            <option>ยาลดกรด แก้ท้องอืด</option>
            <option>ยาบรรเทาอาการท้องเสีย</option>
            <option>ยาระบายแก้ท้องผูก</option>
            <option>ยาแก้ปวด ลดไข้</option>
            <option>ยาแก้แพ้ คัน ผื่น</option>
            <option>ยาแก้ไอ ขับเสมหะ</option>
            <option>ยาทาผิวหนัง</option>
            <option>ยาดม ยาหม่อง</option>
            <option>เวชภัณฑ์</option>
            <option>อุปกรณ์อื่นๆ</option>

        </select>
            <!-- <?php if($type="ยาลดกรด แก้ท้องอืด"){ ?>
                <option selected>ยาลดกรด แก้ท้องอืด</option>
                <option>ยาบรรเทาอาการท้องเสีย</option>
                <option>ยาระบายแก้ท้องผูก</option>
                <option>ยาแก้ปวด ลดไข้</option>
                <option>ยาแก้แพ้ คัน ผื่น</option>
                <option>ยาแก้ไอ ขับเสมหะ</option>
                <option>ยาทาผิวหนัง</option>
                <option>ยาดม ยาหม่อง</option>
                <option>เวชภัณฑ์</option>
                <option>อุปกรณ์อื่นๆ</option>
            <?php }
            
            elseif($type="ยาบรรเทาอาการท้องเสีย"){?>
                echo "<option >ยาลดกรด แก้ท้องอืด</option>
                <option selected>ยาบรรเทาอาการท้องเสีย</option>
                <option>ยาระบายแก้ท้องผูก</option>
                <option>ยาแก้ปวด ลดไข้</option>
                <option>ยาแก้แพ้ คัน ผื่น</option>
                <option>ยาแก้ไอ ขับเสมหะ</option>
                <option>ยาทาผิวหนัง</option>
                <option>ยาดม ยาหม่อง</option>
                <option>เวชภัณฑ์</option>
                <option>อุปกรณ์อื่นๆ</option>";
                <?php }
            elseif($type="ยาระบายแก้ท้องผูก"){?>
                echo "<option >ยาลดกรด แก้ท้องอืด</option>
                <option >ยาบรรเทาอาการท้องเสีย</option>
                <option selected>ยาระบายแก้ท้องผูก</option>
                <option>ยาแก้ปวด ลดไข้</option>
                <option>ยาแก้แพ้ คัน ผื่น</option>
                <option>ยาแก้ไอ ขับเสมหะ</option>
                <option>ยาทาผิวหนัง</option>
                <option>ยาดม ยาหม่อง</option>
                <option>เวชภัณฑ์</option>
                <option>อุปกรณ์อื่นๆ</option>";
                <?php }
            elseif($type="ยาแก้ปวด ลดไข้"){?>
                echo "<option >ยาลดกรด แก้ท้องอืด</option>
                <option >ยาบรรเทาอาการท้องเสีย</option>
                <option>ยาระบายแก้ท้องผูก</option>
                <option selected>ยาแก้ปวด ลดไข้</option>
                <option>ยาแก้แพ้ คัน ผื่น</option>
                <option>ยาแก้ไอ ขับเสมหะ</option>
                <option>ยาทาผิวหนัง</option>
                <option>ยาดม ยาหม่อง</option>
                <option>เวชภัณฑ์</option>
                <option>อุปกรณ์อื่นๆ</option>";
                <?php }
            elseif($type="ยาแก้แพ้ คัน ผื่น"){?>
                echo "<option >ยาลดกรด แก้ท้องอืด</option>
                <option >ยาบรรเทาอาการท้องเสีย</option>
                <option>ยาระบายแก้ท้องผูก</option>
                <option>ยาแก้ปวด ลดไข้</option>
                <option selected>ยาแก้แพ้ คัน ผื่น</option>
                <option>ยาแก้ไอ ขับเสมหะ</option>
                <option>ยาทาผิวหนัง</option>
                <option>ยาดม ยาหม่อง</option>
                <option>เวชภัณฑ์</option>
                <option>อุปกรณ์อื่นๆ</option>";
                <?php }
            elseif($type="ยาแก้ไอ ขับเสมหะ"){?>
                echo "<option >ยาลดกรด แก้ท้องอืด</option>
                <option >ยาบรรเทาอาการท้องเสีย</option>
                <option>ยาระบายแก้ท้องผูก</option>
                <option>ยาแก้ปวด ลดไข้</option>
                <option>ยาแก้แพ้ คัน ผื่น</option>
                <option selected>ยาแก้ไอ ขับเสมหะ</option>
                <option>ยาทาผิวหนัง</option>
                <option>ยาดม ยาหม่อง</option>
                <option>เวชภัณฑ์</option>
                <option>อุปกรณ์อื่นๆ</option>";
                <?php }
            elseif($type="ยาทาผิวหนัง"){?>
                echo "<option >ยาลดกรด แก้ท้องอืด</option>
                <option >ยาบรรเทาอาการท้องเสีย</option>
                <option>ยาระบายแก้ท้องผูก</option>
                <option>ยาแก้ปวด ลดไข้</option>
                <option>ยาแก้แพ้ คัน ผื่น</option>
                <option>ยาแก้ไอ ขับเสมหะ</option>
                <option selected>ยาทาผิวหนัง</option>
                <option>ยาดม ยาหม่อง</option>
                <option>เวชภัณฑ์</option>
                <option>อุปกรณ์อื่นๆ</option>";
                <?php }
            elseif($type="ยาดม ยาหม่อง"){?>
                echo "<option >ยาลดกรด แก้ท้องอืด</option>
                <option >ยาบรรเทาอาการท้องเสีย</option>
                <option>ยาระบายแก้ท้องผูก</option>
                <option>ยาแก้ปวด ลดไข้</option>
                <option>ยาแก้แพ้ คัน ผื่น</option>
                <option>ยาแก้ไอ ขับเสมหะ</option>
                <option>ยาทาผิวหนัง</option>
                <option selected>ยาดม ยาหม่อง</option>
                <option>เวชภัณฑ์</option>
                <option>อุปกรณ์อื่นๆ</option>";
                <?php }
            elseif($type="เวชภัณฑ์"){?>
                echo "<option >ยาลดกรด แก้ท้องอืด</option>
                <option >ยาบรรเทาอาการท้องเสีย</option>
                <option>ยาระบายแก้ท้องผูก</option>
                <option>ยาแก้ปวด ลดไข้</option>
                <option>ยาแก้แพ้ คัน ผื่น</option>
                <option>ยาแก้ไอ ขับเสมหะ</option>
                <option>ยาทาผิวหนัง</option>
                <option>ยาดม ยาหม่อง</option>
                <option selected>เวชภัณฑ์</option>
                <option>อุปกรณ์อื่นๆ</option>";
                <?php }
            elseif($type="อุปกรณ์อื่นๆ"){?>
                echo "<option >ยาลดกรด แก้ท้องอืด</option>
                <option >ยาบรรเทาอาการท้องเสีย</option>
                <option>ยาระบายแก้ท้องผูก</option>
                <option>ยาแก้ปวด ลดไข้</option>
                <option>ยาแก้แพ้ คัน ผื่น</option>
                <option>ยาแก้ไอ ขับเสมหะ</option>
                <option>ยาทาผิวหนัง</option>
                <option>ยาดม ยาหม่อง</option>
                <option>เวชภัณฑ์</option>
                <option selected>อุปกรณ์อื่นๆ</option>";
                <?php }
            
            
            
            
            
            
            ?>
        </select> -->

        

        
        



        <input type="text" class="head pro_price" name="pro_price" placeholder="ราคา*" value="<?php echo $row->pro_price ?>" onkeypress='validate(event)'>
        

        <br><br><p id="img">ลิ้งค์รูปภาพ: <input type="text" class=" pro_img" name="pro_img" value="<?php echo $row->pro_img ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php if($pro_kind=="ยาทั่วไป"){ ?>
            <input type="radio" name="pro_kind" value="ยาทั่วไป" checked> ยาทั่วไป &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="pro_kind" value="ยาผ่านเภสัชกร"> ยาผ่านเภสัชกร
            <?php }else{?>
                <input type="radio" name="pro_kind" value="ยาทั่วไป" > ยาทั่วไป &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="pro_kind" value="ยาผ่านเภสัชกร" checked> ยาผ่านเภสัชกร
            <?php } ?>
            
        
        </p>
        
        





        
        <button id="btnForm2" type="submit" style="background-color:#56FF5D">บันทึก</button>

    </form><a href="ProductListPage"><button id="btnForm1" style="background-color:#FF5353;color:white;margin-top:147px;margin-left:970px;font-family: 'IBM Plex Sans Thai', sans-serif;;">ยกเลิก</button></a>

</div>
    
    




    <img id="admin" src="<?php echo base_url(); ?>images/admin.png">
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