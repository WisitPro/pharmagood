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
    <form id="form_search" action="<?php echo base_url('index.php/controller/searchDrug2')?>" autocomplete="off" method="GET">
        <input id="search_field" type="text" name="search" value="<?php if(isset($pro_name)){echo $pro_name;}  ?>" placeholder="ค้นหายา" class="searchBox" id="searchBox"> </input>
        <button type="submit"   class="btnInput" id="btnSearch"> <i class="fa-solid fa-magnifying-glass"></i> ค้นหา</button>
        </form>
        <select onchange="window.location.href='<?php echo base_url('/index.php/controller/SelectByType/') ?>' + this.value" style="font-size: 18px;text-indent: 4px;border-radius: 15px;color:white;background-color: #F69A56;position: absolute;margin-left:804px;height:36px;margin-top:-36px;">
      <option value="">ประเภทยาและเวชภัณฑ์</option>
      <?php foreach ($product_type as $list) { ?>
        <option value="<?php echo $list->type_id ?>"><?php echo $list->type_name ?></option>
        <?php
    // Set the number of items to display per page
    $items_per_page = 10;

    // Determine the current page number
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Calculate the offset for the current page
    $offset = ($current_page - 1) * $items_per_page;

    // Get a slice of the products array based on the current page and items per page
    $products = array_slice($tbl_product, $offset, $items_per_page);

    // Loop through the products on the current page
    foreach ($products as $key => $row) {
        // Output the product HTML as before
        ?>
        <div class="cardGap">
            <div class="card" id="card-<?php echo $key ?>" data-key="<?php echo $key ?>">
                <div class="img">
                    <img src="<?php echo base_url('/images/Product/'.$row['pro_img'].'') ?>" onerror="this.onerror=null; this.src='https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png'" style="width:98%;height:98%;margin-top:2px; line-height: 200px;">
                </div>
                <p class="head hhhhh"><?php echo $row['pro_name'] ?></p>
                <p class="price"><?php echo $row['pro_price'] ?> บาท</p>
                <p class="detail"><?php echo $row['type_name'] ?></p>
                <a><button onclick="Msg()" id="addBt" name="add_product">เพิ่มไปยังตะกร้า</button></a>
            </div>
        </div>
        <?php
    }

    // Output the pagination links
    $total_pages = ceil(count($tbl_product) / $items_per_page);

    if ($total_pages > 1) {
        ?>
        <div class="pagination">
            <?php if ($current_page > 1) { ?>
                <a href="?page=<?php echo $current_page - 1; ?>">Prev</a>
            <?php } ?>
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <?php if ($i == $current_page) { ?>
                    <span class="current-page"><?php echo $i; ?></span>
                <?php } else { ?>
                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php } ?>
            <?php } ?>
            <?php if ($current_page < $total_pages) { ?>
                <a href="?page=<?php echo $current_page + 1; ?>">Next</a>
            <?php } ?>
        </div>
        <?php
    }
?>
        </div>
    </div>
    </div>
    
           
    <div id="myModal" class="modal">
    <div class="modal-content">
    <span class="close">&times;</span>
    
    <img style="width: 240px;height:240px;border:1px solid lightgray;" id="p_img" src="" >
    <div style="position: absolute;margin-left:260px;margin-top:-200px;width:400px"> <p id="p_brand" ></p>
    <strong><p  id="p_name" ></p></strong>
    <p id="p_price"  ></p></div>
           <br><br>
           <div style="width: 720px;">
    <p id="p_detail"  ></p></div>
   
    <p id="p_type" ></p>
    </div>
       
        <a id="addToCartLink">
        <button onclick="Msg()" id="addToCartButton" name="add_product" 
        style="position:absolute; background-color:#F69A56;color:white;border:transparent;
        width:200px;height:40px;font-size:20px;margin-left:911px;margin-top:530px">เพิ่มไปยังตะกร้า</button></a>


    
       
    </div>
    
</body>

</html>

<script>


    // Get the modal
    var modal = document.getElementById("myModal");
    var p_img = document.getElementById("p_img");
    var p_brand = document.getElementById("p_brand");
    var p_name = document.getElementById("p_name");
    var p_detail = document.getElementById("p_detail");
    var p_price = document.getElementById("p_price");
    var p_type = document.getElementById("p_type");
   
    var addToCartLink = document.getElementById("addToCartLink");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on a card, open the modal
var cards = document.getElementsByClassName("card");
for (var i = 0; i < cards.length; i++) {
        cards[i].addEventListener("click", function() {
            var key = this.getAttribute("data-key");
            var product = <?php echo json_encode($tbl_product); ?>;
            p_img.src = '<?php echo base_url('/images/Product/')?>' + product[key]['pro_img'];
            p_brand.innerHTML = '<?php echo "ตรา : "?>'+product[key]['pro_brand'];
            p_name.innerHTML = product[key]['pro_name'];
            p_detail.innerHTML = '<?php echo "รายละเอียก : "?>'+product[key]['pro_detail'];
            p_price.innerHTML = '<?php echo "ราคา : "?>'+product[key]['pro_price'] + " บาท";
            p_type.innerHTML = '<?php echo "ประเภท : "?>'+product[key]['type_name'];
           
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

</script>


<style>
    
    .modal-content {
    width: 800px;
    height: 500px;
    background-color: #ffffff;
    position: absolute;
    margin-left: 360px;
    border-radius: 15px;
    color: #282828;
    padding-left: 36px;
    font-size: 18px;
    padding-top: 1em;
    margin-top: 90px;
    animation-name: modal-anim;
  animation-duration: 0.2s;
}

@keyframes modal-anim {
  from {opacity: 0}
  to {opacity: 1}
}

    



#myModal {
    display: none;
   
}
.modal {
    display: block; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 60px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
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

<script>
function Msg() {
    if (confirm('เข้าสู่ระบบเพื่อซื้อสินค้า')) window.location.href='<?php echo base_url('index.php/controller/LoginPage')?>';

}
</script>