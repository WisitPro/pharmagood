<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ProductList.css">
<?php
foreach ($tbl_product as $row) {
    $pro_id = $row->pro_id;
    $pro_img = $row->pro_img;
    $pro_name = $row->pro_name;
    $type_id = $row->type_id;
    $pro_price = $row->pro_price;
    $pro_kind = $row->pro_kind;
    $pro_limit = $row->pro_limit;
?>
    <body>
        <br><br><br><br><br><br><br><br>
        <div id="form">
            <form action="Product_Update" method="POST" autocomplete="off">
                <p style="font-size: 28px;">ฟอร์มเพิ่มสินค้า</p>
                <input name="pro_id" value="<?php echo $pro_id; ?>" readonly type="text" hidden class="pro_id" placeholder="รหัสสินค้า*" maxlength="13" onkeypress='validate(event)' required>
                <input value="<?php echo $pro_id; ?>" disabled readonly type="text" class="pro_id" placeholder="รหัสสินค้า*" maxlength="13" onkeypress='validate(event)' required>
                <input value="<?php echo $pro_name ?>" type="text" class="pro_name" name="pro_name" placeholder="ชื่อสินค้า*" required>&nbsp;
                <select name="type_id" id="selectlist" required>
                    <option value="<?php echo $row->type_id ?>"><?php echo $row->type_name ?></option>
                    <?php foreach ($product_type as $type) { ?>
                        <option value="<?php echo $type->type_id ?>"><?php echo $type->type_name ?></option>
                    <?php } ?>
                </select>
                <div style="height:10px"></div>
                <span id="line2">
                    <input name="pro_price" value="<?php echo $pro_price ?>" type="text" class="pro_price" placeholder="ราคา*" onkeypress='validate(event)' required>
                    <input name="pro_img" value="<?php echo $pro_img ?>" type="text" class=" pro_img" placeholder=" ลิ้งค์รูปภาพ ">
                    <input name="pro_limit" value="<?php echo $pro_limit ?>" type="number" style="width: 160px;" placeholder="จำนวนจำกัดซื้อ"><br>
                    <div style="height:10px"></div>
                    <?php if ($pro_kind == "ยาสามัญประจำบ้าน") { ?>
                        <label><input type="radio" name="pro_kind" value="ยาสามัญประจำบ้าน" checked> ยาสามัญประจำบ้าน </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" name="pro_kind" value="ยาควบคุมพิเศษ"> ยาควบคุมพิเศษ </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" name="pro_kind" value="เวชภัณฑ์"> เวชภัณฑ์ </label>
                    <?php } elseif ($pro_kind == "ยาควบคุมพิเศษ") { ?>
                        <label><input type="radio" name="pro_kind" value="ยาสามัญประจำบ้าน"> ยาสามัญประจำบ้าน </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" name="pro_kind" value="ยาควบคุมพิเศษ" checked> ยาควบคุมพิเศษ </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" name="pro_kind" value="เวชภัณฑ์"> เวชภัณฑ์ </label>
                    <?php } else { ?>
                        <label><input type="radio" name="pro_kind" value="ยาสามัญประจำบ้าน"> ยาสามัญประจำบ้าน </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" name="pro_kind" value="ยาควบคุมพิเศษ"> ยาควบคุมพิเศษ </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" name="pro_kind" value="เวชภัณฑ์" checked> เวชภัณฑ์ </label>
                    <?php } ?>
                </span>
                <button id="btnForm2" onclick="return confirm('ยืนยันการแก้ไขข้อมูล');" type="submit" style="background-color:#56FF5D">บันทึก</button>
            </form><a onclick="if (confirm('ยกเลิกแก้ไขข้อมูล')) { history.back(); }"><button id="btnForm12"  style="background-color: #FF5353;color:white;position: absolute;margin-top:-54px;margin-left:940px">ยกเลิก</button></a>
        </div>
    <?php } ?>
    <img id="admin" src="<?php echo base_url(); ?>images/admin.png">
    </body>
</html>
<script>
    function validate(evt) {
        var theEvent = evt || window.event;

        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>