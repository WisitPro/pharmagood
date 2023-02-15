<!-- <?php
foreach ($tbl_product as $row) {
    $pro_id = $row->pro_id;
}

?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Store.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
    <style>
        .dropdown {
    display: inline-block;
    height: 70px;
    margin-left: 0px;
}

.dropbtn {

    margin-left: 1%;
    
    min-width: 260px;
    color: #F87F28;
    border: none;
}

  
.dropdown-content {
    display: none;
    position: absolute;
    border-radius: 10px;

    min-width: 220px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content a {
    color: #ffffff;
    padding: 8px 10px;
    text-decoration: none;
    display: block;
    transition: 0.1s ease-in-out;
}

.dropdown-content a:hover {
    background-color: #ffffff;
    color: #525252;
    border-radius: 10px;
}

.dropdown:hover .dropdown-content {
    display: block;
    background-color: #50a7f8e9;
}

.dropdown:hover .dropbtn {
    background-color: rgba(255, 255, 255, 0.8);
}
nav {
    height: 62px;
    background-color: rgb(255, 255, 255);
    border-bottom: 2px solid #0386FF;
}
nav a{
    color: #525252;

}


#logo {
    position: absolute;
    margin-left: 10%;
    margin-top: 2px;

}

#menu{
    
    
    position: absolute;
    font-size: 20px;
    width: 100%;
    padding-top: 18px;
    
}
#btHome {

    color: #525252;
    margin-left: 22%;
}
#btLogin{
    color: #525252;
    margin-left: 48%;
}
#btRegister{
    color: #525252;
    margin-left: 1%;
}
button:not(:disabled):hover {
    
    transform: scale(1.06);
}
* button{
    
    transition: 0.2s ease-in-out;
}
a {
    text-decoration: none !important;
    cursor: pointer;
    transition: 0.2s ;
    
  }
a:hover{
   color: #0386FF !important;   
}





    </style>
</head>

<body>
    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
        <a id="btHome" href="<?php echo base_url('/index.php/controller/HomePage'); ?>">
                <i class="fa-solid fa-house-medical-flag"></i> หน้าหลัก</a>

            <a id="btLogin" href="LoginPage">เข้าสู่ระบบ</a>
            <a id="btRegister" href="RegisterPage">สมัครสมาชิก</a>
            <!-- <a id="btLogin" href="AddminLogin">เข้าสู่ระบบ</a> -->
            <!-- <a id="btRegister" href="Register">สมัครสมาชิก</a> -->
        </div>

    </nav>





    <div id="banner">
        <p style="font-size:40px; color:white">รายการยาและเวชภัณฑ์</p>
    </div>
    <div id="container">
       
        <div id="list" onclick="Msg()">
            <?php
            $item = 1;

            foreach ($tbl_product as $row) {



            ?>
                <div class="cardGap">
                    <div class="card">
                        
                        <div class="img">
                        
                            <img src="<?php echo $row['pro_img'] ?>" onerror="this.onerror=null; this.src='https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png'" style="width:98%;height:98%;margin-top:2px; line-height: 200px;">
                        </div>
                        <p class="head hhhhh" ><?php echo $row['pro_name'] ?></p>
                        <p class="price"><?php echo $row['pro_price'] ?> บาท</p>
                        <p class="detail"><?php echo $row['type_name'] ?></p>
                        <a ><button id="addBt" name="add_product">เพิ่มไปยังตะกร้า</button></a>
                    </div>
                </div>               
                
            <?php
                $item++;
            }
            ?>
        </div>
    </div>

    </div>







</body>

</html>
<script>
function Msg() {
    if (confirm('เข้าสู่ระบบเพื่อซื้อสินค้า')) window.location.href='LoginPage';
  

}
</script>