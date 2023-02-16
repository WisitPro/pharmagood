<?php
if (isset($this->session->userdata['adm_user'])) {
    $adm_id = $this->session->userdata['adm_id'];
    $adm_role = $this->session->userdata['adm_role'];
    $adm_name = $this->session->userdata['adm_name'];
    
}else{
    redirect('controller/LoginPage');
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
    <meta http-equiv="refresh" content="30">
    <title>Pharma Good</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/navbar_admin.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/Fonts.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/date_time.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/AdminOut.js"></script>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php if($adm_role == "เจ้าของกิจการ"){ ?>
    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <a id="btHome" href="<?php echo base_url('/index.php/controller/AdminHomePage');?>">หน้าหลัก</a>
            <div class="dropdown">
                <button class="dropbtn" disabled>เมนู <i class="fa-solid fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a  href="<?php echo base_url('/index.php/controller/AdminListPage'); ?>">ข้อมูลผู้ใช้งาน</a>
                    <a  href="<?php echo base_url('/index.php/ProductController/ProductListPage'); ?>">รายการสินค้า</a>
                    <a  href="<?php echo base_url('/index.php/RequestController/ListRQ1'); ?>">ข้อมูลการนัดปรึกษา</a>
                    <a  href="<?php echo base_url('/index.php/OrderController/OrderInfo1'); ?>">ข้อมูลออเดอร์</a>
                </div>
            </div>
            <span id="n1"><i class="fa-regular fa-user"></i></span>
            <span id="n2"><?php echo $adm_name ?></span>
            <a id="bt4" onclick="AmOut()" style="cursor:pointer">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </nav>
    <?php }elseif($adm_role == "เภสัชกร"){ ?>
        <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <a id="btHome" href="<?php echo base_url('/index.php/controller/AdminHomePage');?>">หน้าหลัก</a>
            <div class="dropdown">
                <button class="dropbtn" disabled>เมนู <i class="fa-solid fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <!-- <a  href="<?php echo base_url('/index.php/controller/AdminListPage'); ?>">ข้อมูลผู้ใช้งาน</a> -->
                    <a  href="<?php echo base_url('/index.php/ProductController/ProductListPage'); ?>">รายการสินค้า</a>
                    <a  href="<?php echo base_url('/index.php/RequestController/ListRQ1'); ?>">ข้อมูลการนัดปรึกษา</a>
                    <a  href="<?php echo base_url('/index.php/OrderController/OrderInfo1'); ?>">ข้อมูลออเดอร์</a>
                </div>
            </div>
            <span id="n1"><i class="fa-regular fa-user"></i></span>
            <span id="n2"><?php echo $adm_name ?></span>
            <a id="bt4" onclick="AmOut()" style="cursor:pointer">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </nav>
        <?php }else{redirect('controller/HomePage'); } ?>
</body>
</html>
<script>
    function AmOut() {
    if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href='<?php echo base_url('/index.php/controller/Logout'); ?>';
}
</script>



