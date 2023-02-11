<?php
if (isset($this->session->userdata['cus_user'])) {
    $user = $this->session->userdata['cus_user'];

    $name = $this->session->userdata['cus_name'];
    $id = $this->session->userdata['cus_id'];
    $phone = $this->session->userdata['cus_phone'];
    $basename = basename($_SERVER['PHP_SELF']);
} else {

    session_destroy();

    redirect('controller/LoginPage');
}

?>
<script>

</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharma Good</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="<?php echo base_url(); ?>css/Navbar_cus.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/Fonts.css" rel="stylesheet">
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/Loader.js"></script> -->
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>
<!-- <?php
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
        ?> -->

<body>
    <?php if ($basename == "Payment") { ?>
        <nav>
            <img id="logo" src="<?php echo base_url('images/logo.png'); ?>">
            <div id="menu">

            <span style="visibility: hidden;">
                <a id="btHome" href="<?php echo base_url('/index.php/controller/HomePage3'); ?>">หน้าหลัก</a>


                <a href="<?php echo base_url('/index.php/Cart'); ?>" id="btCart"><i class="fa-solid fa-basket-shopping"></i>
                    <?php echo ($this->cart->total_items() > 0) ? ' ตะกร้าสินค้า (' . $this->cart->total_items() . ')' : ' ตะกร้าสินค้า'; ?></a>
                    </span>
                <div class="dropdown">
                    <button disabled class="dropbtn text-left"><i class="fa-solid fa-circle-user"></i> <?php echo $name ?>
                        </button>
                        <span style="visibility: hidden;"><div class="dropdown-content">
                     
                        <a id="btHistory" href="<?php echo base_url('/index.php/controller/OrderHistory'); ?>">
                            <i class="fa-solid fa-clock-rotate-left"></i> ประวัติการซื้อ</a>
                        <a id="btOut" onclick="Out()" style="cursor:pointer;">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> ออกจากระบบ</a>
                    </div></span>
                </div>
             
            </div>


        </nav>
    <?php } else { ?>
        <nav>
            <img id="logo" src="<?php echo base_url('images/logo.png'); ?>">
            <div id="menu">


                <a id="btHome" href="<?php echo base_url('/index.php/controller/HomePage3'); ?>">
                <i class="fa-solid fa-house-medical-flag"></i> หน้าหลัก</a>


                <a href="<?php echo base_url('/index.php/Cart'); ?>" id="btCart"><i class="fa-solid fa-basket-shopping"></i>
                    <?php echo ($this->cart->total_items() > 0) ? ' ตะกร้าสินค้า (' . $this->cart->total_items() . ')' : ' ตะกร้าสินค้า'; ?></a>

                <div class="dropdown">
                    <button disabled class="dropbtn text-left"><i class="fa-solid fa-circle-user"></i> <?php echo $name ?>
                        <i class="fa-solid fa-caret-down" style="color:#525252;"></i></button>
                    <div class="dropdown-content">
                      
                        <a id="btHistory" href="<?php echo base_url('/index.php/OrderController/OrderHistory'); ?>">
                            <i class="fa-solid fa-clock-rotate-left"></i> ประวัติการซื้อ</a>
                        <a id="btOut" onclick="Out()" style="cursor:pointer;">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> ออกจากระบบ</a>
                    </div>
                </div>
              
            </div>


        </nav>






    <?php } ?>