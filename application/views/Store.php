<!-- <?php
        // session_destroy();
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
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Shope.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/cal.js"></script> -->
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>

<body>
    
    <div id="banner">
        <p style="font-size:40px; color:white">รายการยาและเวชภัณฑ์</p>
    </div>
    <div id="container">

        <div id="list">
            <?php
            $item = 1;
            foreach ($tbl_product as $row) {
            ?>
                <div class="cardGap">
                    <div class="card">

                        <div class="img">

                            <img src="<?php echo $row['pro_img'] ?>" onerror="this.onerror=null; this.src='https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png'" style="width:98%;height:98%;margin-top:2px; line-height: 200px;">
                        </div>
                        <p class="head hhhhh"><?php echo $row['pro_name'] ?></p>
                        <p class="price"><?php echo $row['pro_price'] ?> บาท</p>
                        <p class="detail"><?php echo $row['pro_type'] ?></p>
                        <a href="<?php echo base_url('/index.php/Products/AddtoCart/' . $row['pro_id']); ?>"><button id="addBt" name="add_product">เพิ่มไปยังตะกร้า</button></a>
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