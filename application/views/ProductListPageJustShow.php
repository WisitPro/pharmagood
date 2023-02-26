<?php
// Get search query
$search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';

// Filter $tbl_product by search query
$filtered_products = array_filter($tbl_product, function($product) use ($search_query) {
    return strpos(strtolower($product->pro_name), strtolower($search_query)) !== false  ;
});
if (empty($filtered_products)) {
    echo "<script>";
                echo "alert(\" ไม่พบข้อมูล \");";
                echo "setTimeout(function(){ window.location.href = 'http://localhost/pharmagood/index.php/ProductController/ProductListPage';3000 }, 1);";
                echo "</script>";
    
}

// Divide filtered products into chunks of 10 items per page
$items_per_page = 10;
$chunks = array_chunk($filtered_products, $items_per_page);

// Determine the current page based on the "page" query string parameter
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($current_page < 1) {
    $current_page = 1;
} elseif ($current_page > count($chunks)) {
    $current_page = count($chunks);
}

// Get the current chunk of items to display
$current_chunk = $chunks[$current_page - 1];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ProductList.css">
</head>

<style>

    #pro_img{
        transition: 0.2s ease-in-out;
    }
    #pro_img:hover{
        transform: scale(4);
    }
</style>
<body>
    <br>
    
    <div id="container">
        <strong><span style="font-size:32px; margin-left:auto; color:white">รายการยาและเวชภัณฑ์
        </span></strong>
        <!-- <button  id="addProduct" style="margin-left: 600px;font-size:20px; color:white;" >เพิ่มรายการใหม่</button> -->
        <form method="get"  style="font-size:20px;margin-left:850px;margin-top:-36px;" autocomplete="off">
  
  <input type="text" name="search_query" placeholder="ค้นหา" value="<?php echo htmlspecialchars($search_query); ?>">
  <button type="submit" style="margin-left:8px;height:32px;background-color: #1f98da;color:white">ค้นหา</button>
</form> <br>
      

        <div id="back">
            <table class="table">
                <thead>
                    <tr id="tr1">
                        <th style="min-width: 40px;color:#F69A56" class="text-center">#</th>
                        <th style="min-width: 140px;">รหัสสินค้า</th>
                        <th style="min-width: 60px;" class="text-center">รูปภาพ</th>
                        <th style="min-width: 100px;" >ยี่ห้อ</th>
                        <th style="min-width: 300px;">ชื่อสินค้า</th>
                        <th style="min-width: 200px;">ประเภทยาและเวชภัณฑ์</th>
                        <th style="min-width: 70px;" class="text-right">ราคา</th>
                        <th style="min-width: 90px;"></th>
                    </tr>
                </thead>
                <?php
                
                $item = ($current_page - 1) * $items_per_page+1;
                foreach ($current_chunk as $key => $row) { ?>
                    <tbody>
                        <tr id="tr2">
                            <th class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></th>
                            <td class="data" style="border-right: 1px solid #b6b6b6;"><?php echo $row->pro_id; ?></td>
                            <td  class="data text-center" style="border-right: 1px solid #b6b6b6"><img style="width: 54px;height:54px;color:#F69A56;" id="pro_img" src="<?php echo base_url('/images/Product/'.$row->pro_img.'');?>" alt="ไม่มีรูปภาพ"></td>
                            <td class="data" style="border-right: 1px solid #b6b6b6;"><?php echo $row->pro_brand; ?></td>
                            <td class="data" style="border-right: 1px solid #b6b6b6;"><?php echo $row->pro_name; ?></td>
                            <td class="data" style="border-right: 1px solid #b6b6b6;"><?php echo $row->type_name; ?></td>
                            <td class="data " style="color:#eb0e0e;border-right: 1px solid #b6b6b6;text-align:right;padding-right:8px"><?php echo $row->pro_price; ?></td>
                            <td id="btnTable" class="text-center">
                                <a id="Edit" href='<?php echo base_url('index.php/ProductController/Product_Detail?pro_id='.$row->pro_id.'')?>'>รายละเอียด</a><br>
                                <!-- <a id="Remove" onclick="return confirm('คุณต้องการระงับรายการนี้');" href='<?php echo base_url('index.php/ProductController/');?>Product_Remove?pro_id=<?php echo $row->pro_id; ?>'>
                            <?php if($row->pro_status == 1){echo "ระงับ";}else{ echo "ขาย";} ?></a> -->
                            </td>
                        </tr>
                    </tbody>
                <?php $item++;
                } ?>
            </table>  <!-- Display pagination links -->
  <div style="display: inline;font-size: 16px;font-weight: bold;">
  <?php if (count($chunks) > 1) { ?>
    <div class="pagination">
      <?php if ($current_page > 1) { ?>
        <a href="?page=<?php echo $current_page - 1; ?>">ก่อนหน้า</a>
      <?php } ?>

      <?php for ($i = 1; $i <= count($chunks); $i++) { ?>
        <a href="?page=<?php echo $i; ?>" <?php if ($i == $current_page) { echo 'class="active"'; } ?>><button><?php echo $i; ?></button></a>
      <?php } ?>

      <?php if ($current_page < count($chunks)) { ?>
        <a href="?page=<?php echo $current_page + 1; ?>">ถัดไป</a>
      <?php } ?>
    </div>
  <?php } ?>
  </div><br><br><br><br>
        </div>
    </div>
<div id="myModal" class="modal">
    <form onsubmit="return confirm('ยืนยันเพิ่มข้อมูลนี้');" action="Product_Add" method="POST" autocomplete="off" enctype="multipart/form-data" class="modal-content">
    
        <p style="font-size: 28px;">ฟอร์มเพิ่มข้อมูลยาและเวชภัณฑ์</p> <span class="close">&times;</span>
        <label for="pro_id">*รหัสสินค้า : 
        <input type="text" class="pro_id" name="pro_id" maxlength="13" style="width: 140px;" onkeypress='validate(event)' required>
        </label>&nbsp;&nbsp;&nbsp;
        <select name="type_id" id="selectlist" required>
            <option disabled selected hidden style="color:#FF5353;">ประเภทยารักษา</option>
            <?php foreach ($product_type as $type) { ?>
                <option value="<?php echo $type->type_id ?>"><?php echo $type->type_name ?></option>
            <?php } ?>
        </select>
        <div>
        <label for="pro_brand">*ยี่ห้อ :
        <input type="text" class="pro_name" name="pro_brand" style="width: 130px;" required>&nbsp;
        </label>
            <label for="pro_name">*ชื่อสินค้า :
        <input type="text" class="pro_name" name="pro_name" style="width: 311px;" required>&nbsp;
        </label>
        </label>
            
        </div>
        <td></td>
        <div><textarea maxlength="255"  style="color: black;font-size: 16px;border-radius: 5px;width: 587px;height:100px;resize: none;"
         name="pro_detail" >รายละเอียด...
        </textarea></div>
        <div>
        <label for="pro_price">*ราคา :
                <input type="text" class="pro_price" name="pro_price" style="width: 80px;" onkeypress='validate(event)' required>&nbsp;
        </label>
        <select name="pro_unit" id="selectlist" required style="width: fit-content;">
            <option disabled selected hidden style="color:#FF5353;">หน่วยนับ</option>
                <option value="แผง">แผง</option>
                <option value="กระปุก">กระปุก</option>
                <option value="ขวด">ขวด</option>
                <option value="กล่อง">กล่อง</option>
                <option value="หลอด">หลอด</option>
                <option value="่ห่อ">่ห่อ</option>
                <option value="ซอง">ซอง</option>
                <option value="อื่นๆ">อื่นๆ</option>

        </select>
        <span style="padding-left: 100px;"><label for="pro_limit">*จำนวนจำกัดซื้อ : <input type="number" style="width: 70px;" name="pro_limit" min="1">
        </label>
</span>
        </div>
        
        <label for="pro_img">รูปภาพ :
            <input type="file" class="" name="pro_img" style="width: 200px;position: absolute;margin-left:70px;margin-top:-25px">
         </label>
            
            <div id="line2" style="margin-top:  4px;">
            <label><input type="radio" name="pro_kind" value="ยาสามัญประจำบ้าน" checked>
            <span>ยาสามัญประจำบ้าน</span>   </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input type="radio" name="pro_kind" value="ยาควบคุมพิเศษ">
            <span>ยาควบคุมพิเศษ</span>  </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input type="radio" name="pro_kind" value="เวชภัณฑ์">
           <span>เวชภัณฑ์</span>  </label>
        </div>
        <button id="btnForm1" type="reset" style="background-color:#FF5353">ยกเลิก</button>
        <button id="btnForm2" type="submit" style="background-color:#56FF5D">เพิ่ม</button>
    
    </form></div>
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