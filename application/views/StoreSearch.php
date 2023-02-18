<?php
if ($this->session->flashdata('error_message') !== NULL) {
    echo "<script>alert('คุณเพิ่มรายการนี้ถึงขีดจำกัดแล้ว');</script>";
    $this->session->set_flashdata('error_message', null);
} else {
}
?>
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
        <form id="form_search" action="searchDrug" autocomplete="off" method="GET">
        <input id="search_field" type="text" name="search" value="<?php if(isset($pro_name)){echo $pro_name;}  ?>" placeholder="ค้นหายา" class="searchBox" id="searchBox"> </input>
        <button type="submit"   class="btnInput" id="btnSearch"> <i class="fa-solid fa-magnifying-glass"></i> ค้นหา</button>
        </form>
        <div id="list">
            <?php $item = 1;
            foreach ($StoreSearch as $row) { ?>
                <div class="cardGap">
                    <div class="card">
                        <div class="img">
                            <img src="<?php echo $row->pro_img ?>" onerror="this.onerror=null; this.src='https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png'" style="width:98%;height:98%;margin-top:2px; line-height: 200px;">
                        </div>
                        <p class="head hhhhh"><?php echo $row->pro_name ?></p>
                        <p class="price"><?php echo $row->pro_price ?> บาท</p>
                        <p class="detail"><?php echo $row->type_name ?></p>
                        <a href="<?php echo base_url('/index.php/ProductController/AddtoCart/' . $row->pro_id); ?>"><button id="addBt" name="add_product">เพิ่มไปยังตะกร้า</button></a>
                    </div>
                </div>
            <?php $item++;
            } ?>
        </div>
    </div>
    </div>
</body>

</html>