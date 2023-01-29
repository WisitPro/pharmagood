<!-- <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script> -->
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
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://api.bistri.com/bistri.conference.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/VideoCall.css">
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/qtyxprice.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/call.js"></script>
    
</head>


<body>
   

    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <a id="btHome" href="<?php echo base_url('/index.php/controller/HomePage3'); ?>">หน้าหลัก</a>
            
            <a id="btOut" onclick="Out()" style="cursor:pointer;">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>

    </nav>
    
    <p id="p1"></p>
    

    <div id="p3">
        <div id="p4">
        
       

        </div>
    </div>
    
</body>

</html>

<script>
    function Out() {
        if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href = '<?php echo base_url('/index.php/controller/CusLogout'); ?>';



    }

</script>