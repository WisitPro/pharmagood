<?php
// Get search query
$search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';

// Filter $tbl_product by search query
$filtered_products = array_filter($tbl_product, function ($product) use ($search_query) {
    return strpos(strtolower($product->pro_name), strtolower($search_query)) !== false;
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
$first_index = ($current_page - 1) * $items_per_page;

// Get the current chunk of items to display
$current_chunk = $chunks[$current_page - 1];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ProductList.css">
</head>

<style>
    #pro_img {
        transition: 0.2s ease-in-out;
    }

    #pro_img:hover {
        transform: scale(4);
    }
</style>

<body>
    <br>

    <div id="container">
        <strong><span style="font-size:32px; margin-left:auto; color:white">รายการยาและเวชภัณฑ์
            </span></strong>
        <!-- <button  id="addProduct" style="margin-left: 600px;font-size:20px; color:white;" >เพิ่มรายการใหม่</button> -->
        <form method="get" style="font-size:20px;margin-left:850px;margin-top:-36px;" autocomplete="off">

            <input type="text" name="search_query" placeholder="ค้นหา" value="<?php echo htmlspecialchars($search_query); ?>">
            <button type="submit" style="margin-left:8px;height:32px;background-color: #1f98da;color:white">ค้นหา</button>
        </form> <br>


        <div id="back">
            <table class="table">
                <thead>
                    <tr id="tr1">
                        <th style="min-width: 40px;color:#F69A56" class="text-center">#</th>
                        <th style="min-width: 161px;">รหัสยาและเวชภัณฑ์</th>
                        <th style="min-width: 60px;" class="text-center">รูปภาพ</th>
                        <th style="min-width: 100px;">ยี่ห้อ</th>
                        <th style="min-width: 300px;">ชื่อสินค้า</th>
                        <th style="min-width: 200px;">ประเภทยาและเวชภัณฑ์</th>
                        <th style="min-width: 90px;" class="text-center" >หน่วยนับ</th>
                        <th style="min-width: 70px;" class="text-right">ราคา</th>
                        <th style="min-width: 90px;"></th>
                    </tr>
                </thead>
                <?php

                $item = ($current_page - 1) * $items_per_page + 1;
                foreach ($current_chunk as $key => $row) {
                    $card_key = $first_index + $key;  ?>
                    <tbody>
                        <tr id="tr2">
                            <th class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></th>
                            <td class="data" style="border-right: 1px solid #b6b6b6;"><?php echo $row->pro_id; ?></td>
                            <td class="data text-center" style="border-right: 1px solid #b6b6b6"><img style="width: 54px;height:54px;color:#F69A56;" id="pro_img" src="<?php echo base_url('/images/Product/' . $row->pro_img . ''); ?>" alt="ไม่มีรูปภาพ"></td>
                            <td class="data" style="border-right: 1px solid #b6b6b6;"><?php echo $row->pro_brand; ?></td>
                            <td class="data" style="border-right: 1px solid #b6b6b6;"><?php echo $row->pro_name; ?></td>
                            <td class="data" style="border-right: 1px solid #b6b6b6;"><?php echo $row->type_name; ?></td>
                            <td class="data text-center" style="border-right: 1px solid #b6b6b6;"><?php echo $row->pro_unit; ?></td>
                            <td class="data " style="color:#eb0e0e;border-right: 1px solid #b6b6b6;text-align:right;padding-right:8px"><?php echo $row->pro_price; ?></td>
                            <td id="btnTable" class="text-center">
                                <a id="Edit" class="ProductTag" data-key="<?php echo  $card_key  ?>">รายละเอียด</a>
                                <!-- <a id="Edit" href='<?php echo base_url('index.php/ProductController/Product_Detail?pro_id=' . $row->pro_id . '') ?>'>รายละเอียด</a> -->
                                <br>
                                <!-- <a id="Remove" onclick="return confirm('คุณต้องการระงับรายการนี้');" href='<?php echo base_url('index.php/ProductController/'); ?>Product_Remove?pro_id=<?php echo $row->pro_id; ?>'>
                            <?php if ($row->pro_status == 1) {
                                echo "ระงับ";
                            } else {
                                echo "ขาย";
                            } ?></a> -->
                            </td>
                        </tr>
                    </tbody>
                <?php $item++;
                } ?>
            </table> <!-- Display pagination links -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>


                    <img style="width: 240px;height:240px;border:1px solid lightgray;" id="p_img" src="">
                    <div style="position: absolute;margin-left:260px;margin-top:-200px;width:400px">
                    <p id="p_id"></p>
                        <p id="p_brand"></p>
                        <strong>
                            <p id="p_name"></p>
                        </strong>
                        <p id="p_price"></p>
                        <p id="p_unit"></p>
                    </div>
                    <br><br>
                    <div style="width: 720px;">
                        <p id="p_detail"></p>
                    </div>

                    <p id="p_type"></p>
                    <p id="p_kind"></p>

                </div>
            </div>
            <div style="display: inline;font-size: 16px;font-weight: bold;">
                <?php if (count($chunks) > 1) { ?>
                    <div class="pagination">
                        <?php if ($current_page > 1) { ?>
                            <a href="?page=<?php echo $current_page - 1; ?>">ก่อนหน้า</a>
                        <?php } ?>

                        <?php for ($i = 1; $i <= count($chunks); $i++) { ?>
                            <a href="?page=<?php echo $i; ?>" <?php if ($i == $current_page) {
                                                                    echo 'class="active"';
                                                                } ?>><button><?php echo $i; ?></button></a>
                        <?php } ?>

                        <?php if ($current_page < count($chunks)) { ?>
                            <a href="?page=<?php echo $current_page + 1; ?>">ถัดไป</a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div><br><br><br><br>
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

    var modal = document.getElementById("myModal");
    var p_id = document.getElementById("p_id");
    var p_img = document.getElementById("p_img");
    var p_brand = document.getElementById("p_brand");
    var p_name = document.getElementById("p_name");
    var p_unit = document.getElementById("p_unit");
    var p_detail = document.getElementById("p_detail");
    var p_price = document.getElementById("p_price");
    var p_type = document.getElementById("p_type");
    var p_kind = document.getElementById("p_kind");

    var addToCartLink = document.getElementById("addToCartLink");
    var span = document.getElementsByClassName("close")[0];
    var ProductTag = document.getElementsByClassName("ProductTag");

    for (var i = 0; i < ProductTag.length; i++) {
        ProductTag[i].addEventListener("click", function() {
            var key = this.getAttribute("data-key");
            var product = <?php echo json_encode($tbl_product); ?>;
            p_img.src = '<?php echo base_url('/images/Product/') ?>' + product[key]['pro_img'];
            p_id.innerHTML = '<?php echo "รหัสยาและเวชภัณฑ์ : " ?>'+product[key]['pro_id'];
            p_brand.innerHTML = '<?php echo "ตรา : " ?>' + product[key]['pro_brand'];
            p_name.innerHTML = '<?php echo "ชื่อ : " ?>' + product[key]['pro_name'];
            p_detail.innerHTML = '<?php echo "รายละเอียด : " ?>' + product[key]['pro_detail'];
            p_price.innerHTML = '<?php echo "ราคา : " ?>' + product[key]['pro_price'] + " บาท";
            p_type.innerHTML = '<?php echo "ประเภท : " ?>' + product[key]['type_name'];
            if (product[key]['pro_status'] === 1) {
                p_status.innerHTML = '<?php echo "สถานะการขาย : ขาย" ?>';
            } else if(product[key]['pro_status'] === 2) {
                p_status.innerHTML = '<?php echo "สถานะการขาย : ระงับ" ?>';
            }
            p_unit.innerHTML = '<?php echo "หน่วย : " ?>'+product[key]['pro_unit'];
            p_kind.innerHTML = '<?php echo "ชนิด : " ?>'+product[key]['pro_kind'];

            modal.style.display = "block";
        });
    }

    // When the user clicks on the close button, close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    // When the user clicks anywhere outside of the modal, close it
</script>
<style>
    .modal-content {
        width: 800px;
        height: 500px;
        background-color: white;
        position: absolute;
        margin-left: 360px;
        border-radius: 15px;
        color: #000000;
        padding-left: 36px;
        font-size: 18px;
        padding-top: 1em;
        margin-top: 90px;
        animation-name: modal-anim;
        animation-duration: 0.2s;
    }

    @keyframes modal-anim {
        from {
            opacity: 0
        }

        to {
            opacity: 1
        }
    }





    #myModal {
        display: none;

    }

    .modal {
        display: block;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 60px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */

        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }


    /* The Close Button */
    .close {
        color: #000000;
        float: right;
        font-size: 38px;
        font-weight: bold;
        margin-right: 16px;
        margin-top: -10px;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>