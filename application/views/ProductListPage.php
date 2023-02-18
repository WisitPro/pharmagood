<?php
foreach ($tbl_product as $row) {
    $pro_id = $row->pro_id;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ProductList.css">
</head>

<body>
    <br><br><br>
    <form action="Product_Add" method="POST" autocomplete="off">
        <p style="font-size: 28px;">ฟอร์มเพิ่มสินค้า</p>
        <input type="text" class="pro_id" name="pro_id" placeholder="รหัสสินค้า*" maxlength="13" onkeypress='validate(event)' required>
        <input type="text" class="pro_name" name="pro_name" placeholder="ชื่อสินค้า*" required>&nbsp;
        <select name="type_id" id="selectlist" required>
            <option disabled selected hidden style="color:#FF5353;">ประเภทยารักษา</option>
            <?php foreach ($product_type as $type) { ?>
                <option value="<?php echo $type->type_id ?>"><?php echo $type->type_name ?></option>
            <?php } ?>
        </select>
        <div style="height:10px"></div>
        <span id="line2">
            <input type="text" class="pro_price" name="pro_price" placeholder="ราคา*" onkeypress='validate(event)' required>
            <input type="text" class=" pro_img" name="pro_img" placeholder=" ลิ้งค์รูปภาพ "> <input type="number" style="width: 160px;" name="pro_limit" min="1" placeholder="จำนวนจำกัดซื้อ"><br>
            <div style="height:10px"></div>
            <label><input type="radio" name="pro_kind" value="ยาสามัญประจำบ้าน" checked> ยาสามัญประจำบ้าน </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input type="radio" name="pro_kind" value="ยาควบคุมพิเศษ"> ยาควบคุมพิเศษ </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input type="radio" name="pro_kind" value="เวชภัณฑ์"> เวชภัณฑ์ </label>
        </span>
        <button id="btnForm1" type="reset" style="background-color:#FF5353">ยกเลิก</button>
        <button id="btnForm2" type="submit" style="background-color:#56FF5D">เพิ่ม</button>
    </form>
    <div id="container">
        <p style="font-size:32px; margin-left:auto; color:white">รายการยาและเวชภัณฑ์</p>
        <div id="back">
            <table class="table">
                <thead>
                    <tr id="tr1">
                        <th style="min-width: 40px;color:#F69A56" class="text-center">#</th>
                        <th style="min-width: 160px;">รหัสสินค้า</th>
                        <th style="min-width: 60px;" class="text-center">รูปภาพ</th>
                        <th style="min-width: 300px;">ชื่อสินค้า</th>
                        <th style="min-width: 200px;">ประเภทยา</th>
                        <th style="min-width: 100px;" class="text-right">ราคา</th>
                        <th style="min-width: 130px;" class="text-center">จำนวนจำกัดซื้อ</th>
                        <th style="min-width: 90px;"></th>
                    </tr>
                </thead>
                <?php
                $item = 1;
                foreach ($tbl_product as $row) { ?>
                    <tbody>
                        <tr id="tr2">
                            <th class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></th>
                            <td class="data" style="border-right: 1px solid #b6b6b6;"><?php echo $row->pro_id; ?></td>
                            <td class="data text-center" style="border-right: 1px solid #b6b6b6"><?php echo ' <img style="width: 54px;height:54px;color:#F69A56;"  src="' . $row->pro_img . '" alt="ไม่มีรูปภาพ"> ' ?></td>
                            <td class="data" style="border-right: 1px solid #b6b6b6;"><?php echo $row->pro_name; ?></td>
                            <td class="data" style="border-right: 1px solid #b6b6b6;"><?php echo $row->type_name; ?></td>
                            <td class="data " style="color:#eb0e0e;border-right: 1px solid #b6b6b6;text-align:right;padding-right:8px"><?php echo $row->pro_price; ?></td>
                            <td class="data text-center"><?php echo $row->pro_limit; ?></td>
                            <td id="btnTable">
                                <a id="Edit" href='Product_Edit?pro_id=<?php echo $row->pro_id; ?>'>แก้ไข</a>
                                <a id="Remove" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่');" href='Product_Remove?pro_id=<?php echo $row->pro_id; ?>'>ลบ</a>
                            </td>
                        </tr>
                    </tbody>
                <?php $item++;
                } ?>
            </table><br><br><br><br>
        </div>
    </div>
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