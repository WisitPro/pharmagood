<?php
$basename = basename($_SERVER['PHP_SELF']);
if (isset($this->session->userdata['adm_user'])) {
    $adm_id = $this->session->userdata['adm_id'];
    $adm_role = $this->session->userdata['adm_role'];
    $adm_name = $this->session->userdata['adm_name'];
} else {
    redirect('controller/LoginPage');
}

if(isset($request)){
    $req_row = 0;
    foreach($request as $notiReq){
    
        $req_row++;
    
    }
    
}
if(isset($order)){
    $or_row = 0;
    foreach($order as $notiOr){
    
        $or_row++;
    
    }
    
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/navbar_admin.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/Fonts.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/date_time.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/AdminOut.js"></script>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
    <style>
        /* body{
            background-color: #99c9ed !important;} */
    </style>
</head>

<body>
    <?php if ($adm_role == "เจ้าของกิจการ") { ?>
        <nav>
            <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
            <div id="menu">
                <a id="btHome" href="<?php echo base_url('/index.php/controller/AdminHomePage'); ?>">หน้าหลัก</a>
                <div class="dropdown">
                    <button class="dropbtn" disabled>เมนู <i class="fa-solid fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="<?php echo base_url('/index.php/controller/AdminListPage'); ?>">ข้อมูลผู้ใช้ภายใน</a>
                        <a href="<?php echo base_url('/index.php/ProductController/ProductListPage'); ?>">รายการยาและเวชภัณฑ์</a>
                        <a href="<?php echo base_url('/index.php/RequestController/ListRQ1'); ?>">ข้อมูลคำนัดปรึกษา</a>
                        <a href="<?php echo base_url('/index.php/OrderController/OrderInfo1'); ?>">ข้อมูลการสั่งซื้อ</a>
                        <a href="<?php echo base_url('/index.php/ReportsController/ReportsPage'); ?>">รายงาน</a>
                    </div>
                </div>
                <span id="n1"><i class="fa-regular fa-user"></i></span>
                <span id="n2"><?php echo $adm_name ?></span>
                <a id="bt4" onclick="AmOut()" style="cursor:pointer">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>
        </nav>
    <?php } elseif ($adm_role == "เภสัชกร") { ?>
        <nav>
            <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
            <div id="menu">
                <a id="btHome" href="<?php echo base_url('/index.php/controller/AdminHomePage'); ?>">หน้าหลัก</a>
                <div class="dropdown">
                    <button class="dropbtn" disabled>เมนู <i class="fa-solid fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <!-- <a  href="<?php echo base_url('/index.php/controller/AdminListPage'); ?>">ข้อมูลผู้ใช้งาน</a> -->
                        <a href="<?php echo base_url('/index.php/ProductController/ProductListPageJustShow'); ?>">รายการยาและเวชภัณฑ์</a>
                        <a href="<?php echo base_url('/index.php/RequestController/ListRQ1'); ?>">ข้อมูลการนัดปรึกษา</a>
                        <a href="<?php echo base_url('/index.php/OrderController/OrderInfo1'); ?>">ข้อมูลออเดอร์</a>
                    </div>
                </div>
                <span id="n1"><i class="fa-regular fa-user"></i></span>
                <span id="n2"><?php echo $adm_name ?></span>
                <a id="bt4" onclick="AmOut()" style="cursor:pointer">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>
        </nav>
        <?php if ($basename == 'AdminHomePage') { 
            if($req_row == 0 && $or_row ==0){}elseif($req_row > 0 && $or_row > 0){?>
            
            <div style="position: absolute;" id="notibar">
                <a style="display: inline;" href="<?php echo base_url('index.php/RequestController/ListRQ1'); ?>
                "><i class="fa-solid fa-exclamation"></i> คำนัดปรึกษารอยืนยัน  <?php echo $req_row?> รายการ</a>
                <a style="display: inline;margin-left:70px" href="<?php echo base_url('index.php/OrderController/OrderInfo1'); ?>
                "><i class="fa-solid fa-exclamation"></i> ข้อมูลชำระเงินรอยืนยัน  <?php echo $or_row?> รายการ </a>

            </div><?php }elseif($req_row > 0){?>
                <div style="position: absolute;" id="notibar">
                <a style="display: inline;" href="<?php echo base_url('index.php/RequestController/ListRQ1'); ?>
                "><i class="fa-solid fa-exclamation"></i> คำนัดปรึกษารอยืนยัน  <?php echo $req_row?> รายการ</a></div>
               
            <?php }elseif($or_row > 0){?>
                <div style="position: absolute;" id="notibar">
                
                <a style="display: inline;margin-left:10px" href="<?php echo base_url('index.php/OrderController/OrderInfo1'); ?>
                "><i class="fa-solid fa-exclamation"></i> ข้อมูลชำระเงินรอยืนยัน  <?php echo $or_row?> รายการ </a>

            </div>

            <?php }} ?>
    <?php } else {
        redirect('controller/HomePage');
    } ?>
</body>

</html>
<script>
    function AmOut() {
        if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href = '<?php echo base_url('/index.php/controller/Logout'); ?>';
    }
</script>


<style>
    #notibar {
        background: #f7c97b;
        width: 700px;
        height: 60px;
        margin-top: 20px;
        border-radius: 15px;
        margin-left: 425px;
        border: 2px solid white;
        font-size: 20px;
        font-weight: bold;
        padding: 14px;

    }

    #notibar a {
        color: black;
    }
</style>