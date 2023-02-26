<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ProductList.css">
    <?php
    foreach ($tbl_product as $row) {
        
    ?>

<body>
    <br><div id="myModal" class="modal" style="display: block !important;">
    <form  onsubmit="return confirm('ยืนยันแก้ไขข้อมูล');" action="Product_Update" method="POST" autocomplete="off" enctype="multipart/form-data" class="modal-content">
        <input name="pro_id" value="<?php echo $row->pro_id; ?>"  readonly type="hidden" class="pro_id" placeholder="รหัสสินค้า*" maxlength="13" onkeypress='validate(event)' required>
        <p style="font-size: 28px;">รายละเอียด</p> 
        <label for="pro_id">*รหัสสินค้า :
            <input type="text" class="pro_id" disabled readonly value="<?php echo $row->pro_id ?>" name="" maxlength="13" style="width: 140px;font-weight:bold;" onkeypress='validate(event)' required>
        </label>&nbsp;&nbsp;&nbsp;
        <select disabled name="type_id" id="selectlist" required>
            <option value="<?php echo $row->type_id ?>"><?php echo $row->type_name ?></option>
            <?php foreach ($product_type as $type) { ?>
                <option value="<?php echo $type->type_id ?>"><?php echo $type->type_name ?></option>
            <?php } ?>
        </select>
        <div>
            <label for="pro_brand">*ยี่ห้อ :
                <input type="text"disabled class="pro_name" value="<?php echo $row->pro_brand ?>" name="pro_brand" style="width: 130px;" required>&nbsp;
            </label>
            <label for="pro_name">*ชื่อสินค้า :
                <input type="text"disabled class="pro_name" value="<?php echo $row->pro_name ?>" name="pro_name" style="width: 311px;" required>&nbsp;
            </label>
            </label>

        </div>
        <td></td>
        <div><textarea maxlength="255"disabled style=" color: black;font-size: 16px;border-radius: 5px;width: 587px;height:100px;resize: none;" name="pro_detail"><?php echo $row->pro_detail ?>
        </textarea></div>
        <div>
            <label for="pro_price">*ราคา :
                <input type="text" disabled class="pro_price" value="<?php echo $row->pro_price ?>" name="pro_price" style="width: 80px;" onkeypress='validate(event)' required>&nbsp;
            </label>
            <select name="pro_unit" disabled id="selectlist" required style="width: fit-content;">
                <?php if ($row->pro_unit == "แผง") { ?>
                    <option selected value="แผง">แผง</option>
                    <option value="กระปุก">กระปุก</option>
                    <option value="ขวด">ขวด</option>
                    <option value="กล่อง">กล่อง</option>
                    <option value="หลอด">หลอด</option>
                    <option value="ห่อ">ห่อ</option>
                    <option value="ซอง">ซอง</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                <?php } elseif ($row->pro_unit == "กระปุก") { ?>
                    <option selected value="กระปุก">กระปุก</option>
                    <option value="แผง">แผง</option>
                    <option value="ขวด">ขวด</option>
                    <option value="กล่อง">กล่อง</option>
                    <option value="หลอด">หลอด</option>
                    <option value="ห่อ">ห่อ</option>
                    <option value="ซอง">ซอง</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                <?php } elseif ($row->pro_unit == "ขวด") { ?>
                    <option selected value="ขวด">ขวด</option>
                    <option value="แผง">แผง</option>
                    <option value="กระปุก">กระปุก</option>
                    <option value="กล่อง">กล่อง</option>
                    <option value="หลอด">หลอด</option>
                    <option value="ห่อ">ห่อ</option>
                    <option value="ซอง">ซอง</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                <?php } elseif ($row->pro_unit == "กล่อง") { ?>
                    <option selected value="กล่อง">กล่อง</option>
                    <option value="แผง">แผง</option>
                    <option value="กระปุก">กระปุก</option>
                    <option value="ขวด">ขวด</option>
                    <option value="หลอด">หลอด</option>
                    <option value="ห่อ">ห่อ</option>
                    <option value="ซอง">ซอง</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                <?php } elseif ($row->pro_unit == "หลอด") { ?>
                    <option selected value="หลอด">หลอด</option>
                    <option value="แผง">แผง</option>
                    <option value="กระปุก">กระปุก</option>
                    <option value="ขวด">ขวด</option>
                    <option value="กล่อง">กล่อง</option>
                    <option value="ห่อ">ห่อ</option>
                    <option value="ซอง">ซอง</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                    <?php } elseif ($row->pro_unit == "ซอง") { ?>
                    <option selected value="ซอง">ซอง</option>
                    <option value="แผง">แผง</option>
                    <option value="กระปุก">กระปุก</option>
                    <option value="ขวด">ขวด</option>
                    <option value="กล่อง">กล่อง</option>
                    <option value="ห่อ">ห่อ</option>
                    
                    
                    <option value="อื่นๆ">อื่นๆ</option>
                <?php } elseif ($row->pro_unit == "ห่อ") { ?>
                    <option selected value="ห่อ">ห่อ</option>
                    <option value="แผง">แผง</option>
                    <option value="กระปุก">กระปุก</option>
                    <option value="ขวด">ขวด</option>
                    <option value="กล่อง">กล่อง</option>
                    <option value="หลอด">หลอด</option>
                    <option value="ซอง">ซอง</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                <?php } elseif ($row->pro_unit == "อื่นๆ") { ?>
                    <option selected value="อื่นๆ">อื่นๆ</option>
                    <option value="แผง">แผง</option>
                    <option value="กระปุก">กระปุก</option>
                    <option value="ขวด">ขวด</option>
                    <option value="กล่อง">กล่อง</option>
                    <option value="หลอด">หลอด</option>
                    <option value="ห่อ">ห่อ</option>
                    <option value="ซอง">ซอง</option>
                <?php }else{ ?>
                    <option value="แผง">แผง</option>
                <option value="กระปุก">กระปุก</option>
                <option value="ขวด">ขวด</option>
                <option value="กล่อง">กล่อง</option>
                <option value="หลอด">หลอด</option>
                <option value="่ห่อ">่ห่อ</option>
                <option value="ซอง">ซอง</option>
                <option value="อื่นๆ">อื่นๆ</option>


                    <?php }?>

            </select>
            <span style="padding-left: 100px;"><label for="pro_limit">*จำนวนจำกัดซื้อ : <input disabled type="number" value="<?php echo $row->pro_limit?>" style="width: 70px;" name="pro_limit" min="1">
                </label>
            </span>
        </div>

  
        

        <div id="line2" style="margin-top:  4px;">
        <?php if ($row->pro_kind == "ยาสามัญประจำบ้าน") { ?>
            <label><input  type="radio" name="pro_kind" value="ยาสามัญประจำบ้าน" checked>
                <span>ยาสามัญประจำบ้าน</span> </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input disabled type="radio" name="pro_kind" value="ยาควบคุมพิเศษ">
                <span>ยาควบคุมพิเศษ</span> </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input disabled type="radio" name="pro_kind" value="เวชภัณฑ์">
                <span>เวชภัณฑ์</span> </label>
                <?php }elseif($row->pro_kind == "ยาควบคุมพิเศษ") { ?>
                    <label><input type="radio" name="pro_kind" value="ยาสามัญประจำบ้าน" >
                <span>ยาสามัญประจำบ้าน</span> </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input disabled type="radio" name="pro_kind" value="ยาควบคุมพิเศษ" checked>
                <span>ยาควบคุมพิเศษ</span> </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input disabled type="radio" name="pro_kind" value="เวชภัณฑ์">
                <span>เวชภัณฑ์</span> </label>
                    <?php }elseif($row->pro_kind == "เวชภัณฑ์") { ?>
                        <label><input type="radio" name="pro_kind" value="ยาสามัญประจำบ้าน" >
                <span>ยาสามัญประจำบ้าน</span> </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input disabled type="radio" name="pro_kind" value="ยาควบคุมพิเศษ">
                <span>ยาควบคุมพิเศษ</span> </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input  type="radio" name="pro_kind" value="เวชภัณฑ์" checked>
                <span>เวชภัณฑ์</span> </label>

                        <?php }?>
        </div>
        
        

    </form><a onclick=" history.back();"><button id="btnForm111"  style="background-color: #6bb9e7;color:white;position: absolute;margin-top:462px;margin-left:940px">กลับ</button></a>
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
    var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("addProduct");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    window.location = '<?php echo base_url('/index.php/ProductController/ProductListPage/') ?>';
}
// When the user clicks anywhere outside of the modal, close it


</script>