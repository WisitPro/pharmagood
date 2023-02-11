<?php
if (isset($this->session->userdata['adm_user'])) {
    $user = $this->session->userdata['adm_user'];
    $name = $this->session->userdata['adm_name'];
}
?>
<!-- <?php
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/OwnerHomePage2.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/Fonts.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/date_time.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/AdminOut.js"></script> -->
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <a id="btHome" href="<?php echo base_url('/index.php/controller/AdminHomePage');?>">หน้าหลัก</a>
            <div class="dropdown">
                <button class="dropbtn">เมนู <i class="fa-solid fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a  href="<?php echo base_url('/index.php/controller/AdminListPage'); ?>">ข้อมูลผู้ใช้งาน</a>
                    <a  href="<?php echo base_url('/index.php/ProductController/ProductListPage'); ?>">รายการสินค้า</a>
                    <a  href="<?php echo base_url('/index.php/RequestController/ListRQ1'); ?>">ข้อมูลการนัดปรึกษา</a>
                    <a  href="<?php echo base_url('/index.php/OrderController/OrderInfo1'); ?>">ข้อมูลออเดอร์</a>
                </div>
            </div>

            <span id="n1"><i class="fa-regular fa-user"></i></span>
            <span id="n2"><?php echo $name ?></span>

            <a id="bt4" onclick="AmOut()" style="cursor:pointer">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>

            <!-- <a id="btLogin" href="AddminLogin">เข้าสู่ระบบ</a> -->
            <!-- <a id="btRegister" href="Register">สมัครสมาชิก</a> -->

        </div>

    </nav>

    

</body>

</html>
<script>
    function AmOut() {
    if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href='<?php echo base_url('/index.php/controller/Logout'); ?>';
    

}

</script>

