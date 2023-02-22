<?php
    $basename = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="<?php echo base_url(); ?>css/navbar.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/Fonts.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>
<!-- <?php
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
        ?> -->
<body>
        <nav>
            <img id="logo" src="<?php echo base_url('images/logo.png'); ?>">
            <div id="menu">
                <a id="btHome" href="HomePage">
                <i class="fa-solid fa-house-medical-flag"></i> หน้าหลัก</a>
                <?php if($basename == "HomePage" || $basename == "StoreX"  ){?>
                <a id="btLogin" href="LoginPage">เข้าสู่ระบบ <i class="fa-solid fa-right-to-bracket"></i></a>
                <a id="btRegister" href="RegisterPage">สมัครสมาชิก <i class="fa-solid fa-user-plus"></i></a>
                <?php }elseif($basename == "LoginPage"){?>
                    <a id="btRegister" href="RegisterPage" style="margin-left: 49%;">สมัครสมาชิก <i class="fa-solid fa-user-plus"></i></a>
                    <?php }elseif($basename == "RegisterPage"){?>
                <a id="btLogin" href="LoginPage" style="margin-left: 49%;">มีบัญชีอยู่แล้ว <i class="fa-solid fa-right-to-bracket"></i></a>  
                <?php }else{?>
                  
                        <a id="btLogin" href="<?php  echo base_url('/index.php/controller/LoginPage');?>">เข้าสู่ระบบ <i class="fa-solid fa-right-to-bracket"></i></a>
                <a id="btRegister" href="<?php  echo base_url('/index.php/controller/RegisterPage');?>">สมัครสมาชิก <i class="fa-solid fa-user-plus"></i></a>
                    <?php }  ?>            
            </div>  
        </nav>
