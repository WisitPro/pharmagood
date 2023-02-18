<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Store.css">
</head>
<body>
    <div id="banner">
        <p style="font-size:40px; color:white">รายการยาและเวชภัณฑ์</p>
    </div>
    <div id="container">
        <div id="list" onclick="Msg()">
            <?php $item = 1;foreach ($tbl_product as $row) {?>
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
            <?php  $item++;}?>
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