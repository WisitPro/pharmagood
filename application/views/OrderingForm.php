<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/OrderingForm.css">
</head>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbE5PxKKnEVpr873MVdBeGvS5veUJ0Nd0&callback=initMap&v=weekly" defer></script>
<body onload="disBt()" onload="initMap()">
    <a href="<?php echo base_url(); ?>index.php/CartController" onclick="return confirm('ยืนยันกลับหน้าตะกร้า')"><button id="p2"><i class="fa-solid fa-caret-left"></i> กลับ</button></a>
    <p id="p1">สั่งซื้อยาและเวชภัณฑ์</p>
    <div id="p3">
        <div id="p4">
            <table class="table ">
                <thead style="width: 100%;">
                    <tr>
                        <th style="width:30px "></th>
                        <th style="width:250px;">สินค้า</th>
                        <th class="text-right" style="width:70px;">ราคา</th>
                        <th style="width: 60px;" class="text-center">จำนวน</th>
                        <th style="min-width:80px;" class="text-right">รวม</th>
                    </tr>
                </thead>
                <tbody class="tableRow">
                    <?php
                    if ($this->cart->total_items() > 0) {
                        $qty = 1;
                        foreach ($cartItems as $item) {
                    ?>
                            <tr class="trB">
                                <td class="text-right" style="width:30px "><?php echo $qty ?></td>
                                <td style="width:250px;"><strong><?php echo $item["name"]; ?></strong></td>
                                <td class="text-right" style="width:70px;" id="price">
                                    <p><?php echo '' . $item["price"]; ?></p>
                                </td>
                                <td class="text-right" style="width: 40px;">
                                    <!-- <input type="button" value="-" class="minus text-center qtybt" id="minus<?php echo $qty ?>" /> -->
                                    <p style="width:50px;cursor:default;" class="qty text-center " id="qty<?php echo $qty  ?>"><?php echo $item["qty"] ?></p>
                                    <!-- <input type="button" value="+" class="add text-center qtybt" id="add<?php echo $qty ?>" href="<?php echo base_url('/index.php/CartController/updateItemQty/' . $item["rowid"]); ?>"/> -->
                                </td>
                                <td style="min-width:80px;" class="text-right">
                                    <span class="text-right" style="width:50px;border:transparent;background:transparent;cursor:default;" class="subtt" id="subtt<?php echo $qty ?>"><?php echo $item["subtotal"] ?></span>
                                    <span> บาท</span>
                                </td>
                            </tr>
                        <?php $qty++;} } else { ?>
                        <strong>
                            <h2 style="position:absolute;margin-left:250px;margin-top:180px">ไม่มีสินค้าในตะกร้าสินค้า</h2>
                        </strong>
                    <?php }?>
                </tbody>
            </table>
        </div>
       
        <form onsubmit="return confirm('ยืนยันคำสั่งซื้อนี้');"  action="<?php echo base_url('/index.php/OrderController/Ordering'); ?>" method="post" autocomplete="off">
            <div id="paymentinput" >
                <p id="a2"></p>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <p></p>
                <img style="position: absolute;width:200px;margin-left:550px;margin-top:-210px" src="<?php echo base_url('images/Pharmacist.png'); ?>" alt=""> 
                <p><span style="color:red">* </span>เบอร์โทรศัพท์ :</p>
                <input type="text" name="order_phone"  value="<?php echo $this->session->userdata['cus_phone']; ?>"  required /><br><br>
                <p><span style="color:red">* </span>สถานที่จัดส่ง :</p>
                <input onclick="OpenMap()" type="text" name="order_address" class="text-center" id="order_address" value="" style="text-indent: 0px;border:2px solid red;caret-color: transparent;text-overflow: clip;" maxlength="0"  placeholder="คลิ๊ก" required />
            </div>
            <?php if ($this->cart->total_items() > 0) { ?>
                <span id="totalTxt">ราคาสุทธิ : <input disabled class="text-right" type="text" id="total" value="<?php echo $this->cart->total(); ?>"> บาท</input>
                    <span id="buttonbar">               
                        <button id="btGo"  type="submit">ยืนยันคำสั่งซื้อ</button>                
                    </span>
        </form>
<script>
    var fileInput = document.getElementById("slip");
    var payButton = document.getElementById("btGo");
    var cancelBt = document.getElementById("p2");
    var cancelBt2 = document.getElementById("btHome");

    function disBt() {
        payButton.disabled = true;
    }
    
    var pin = document.getElementById("order_address");
    var map = document.getElementById("map");

    function OpenMap() {
        var map = document.getElementById('map');
        if (map.style.visibility == 'visible') {
            map.style.visibility = 'hidden';
        } else {
            map.style.visibility = 'visible'
        }
    }
    var map;
    var markers = [];
    var infoWindow;
    var location1;


    function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: 16.434132,
            lng: 102.816064
        },
        zoom: 15
    });
    infoWindow = new google.maps.InfoWindow();
    var geocoder = new google.maps.Geocoder();
    google.maps.event.addListener(map, "click", function(event) {
        clearMarkers();
        var marker = new google.maps.Marker({
            position: event.latLng,
            map: map
        });
        markers.push(marker);
        marker.addListener('click', function() {
            clearMarkers();
        });
        geocoder.geocode({
            location: event.latLng
        }, function(results, status) {
            if (status === "OK") {
                if (markers.length == 1) {
                    location1 = event.latLng;
                    infoWindow.setContent(
                        "order address: " + results[0].formatted_address
                    );
                    infoWindow.open(map, marker);
                    document.getElementById("order_address").value =
                        results[0].formatted_address;
                    if (pin.value !== 0) {
                        payButton.disabled = false;
                        cancelBt.disabled = true;
                        cancelBt2.disabled = true;
                        payButton.style.backgroundColor = "#68B3F8";
                        cancelBt.style.backgroundColor = "#925e5e";
                        cancelBt2.style.visibility = "hidden";
                    } else if (pin.value == 0) {
                        payButton.disabled = true;
                        payButton.style.backgroundColor = "#aac5d5";
                        cancelBt.disabled = false;
                        cancelBt2.disabled = false;
                    }
                }
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
    });
}

function clearMarkers() {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
    markers = [];
    document.getElementById("order_address").value = "";
    payButton.disabled = true;
    payButton.style.backgroundColor = "#aac5d5";
    cancelBt.disabled = false;
    cancelBt2.disabled = false;
}


//     window.addEventListener('popstate', function(event) {
//   if (document.URL.includes("<?php echo base_url(); ?>index.php/OrderController/CancelStore")) {
//     if (confirm('รายการของคุณจะถูกยกเลิกและกลับไปยังหน้าหลัก')) {
//       event.preventDefault(); // Prevent the default back button behavior
//       window.location = "<?php echo base_url(); ?>index.php/OrderController/CancelStore";
//     } else {
//       // User clicked cancel, do nothing
//       window.history.pushState(null, null, window.location.href); // Reset the history state
//     }
//   }
// });
</script>
    <?php } ?>
    </div>
    <div class="map1" id="map" ondblclick="clearMarkers ()">
        <div id="BoxSelectMap">
            <p id="TextSelectMap">
            <div class="dd">
                <input type="hidden" id="myText">
            </div>
            <div id="BoxSelectAddress">
                <p id="TextSelectAddress">
            </div>
        </div>

</body>

</html>

