<?php
// session_destroy();
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good | รายการยาและเวชภัณฑ์</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Shope.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/cal.js"></script> -->
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <a id="btHome" href="HomePage3">หน้าหลัก</a>

            <a id="btCart" href="Basket"><i class="fa-solid fa-basket-shopping"></i> ตะกร้าสินค้า</a>
            <a id="btOut" onclick="Out()" style="cursor:pointer">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            <!-- <a id="btLogin" href="AddminLogin">เข้าสู่ระบบ</a> -->
            <!-- <a id="btRegister" href="Register">สมัครสมาชิก</a> -->
        </div>

    </nav>





    <div id="banner">
        <p style="font-size:40px; color:white">รายการยาและเวชภัณฑ์</p>
    </div>
    <div id="container">
   
    <div class="cart-view">
        <a href="<?php echo base_url('cart'); ?>" title="View Cart"><i class="icart"></i> (<?php echo ($this->cart->total_items() > 0)?$this->cart->total_items().' Items':'Empty'; ?>)</a>
    </div>
        <div id="list">
            <?php
            $item = 1;
            foreach ($tbl_product as $row) {
            ?>
                <div class="cardGap">

                    <div class="card">
                        <div class="img">
                            <img src="<?php echo $row['pro_img'] ?>" alt="ไม่มีรูฟภาพ" style="width:98%;height:98%;margin-top:2px; line-height: 200px;">
                        </div>

                        <p class="head"><?php echo $row['pro_name'] ?></p>
                        <p class="price"><?php echo $row['pro_price'] ?> บาท</p>
                        <p class="detail"><?php echo $row['pro_type'] ?></p>
                        <a href="<?php echo base_url('/index.php/Products/AddtoCart/'.$row['pro_id']); ?>"><button id="addBt" name="add_product">เพิ่มไปยังตะกร้า</button></a>
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
    function Out() {
        if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href = 'CusLogout';


    }
</script>