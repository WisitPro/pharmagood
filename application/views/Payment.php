<!-- <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script> -->

<!-- <?php
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
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Fonts.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Payment.css">


</head>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbE5PxKKnEVpr873MVdBeGvS5veUJ0Nd0&callback=initMap&v=weekly" defer></script>


<body onload="disBt()" onload="initMap()">


    <a href="<?php echo base_url(); ?>index.php/OrderController/CancelStore" onclick="return confirm('รายการของคุณจะถูกยกเลิกและกลับไปยังหน้าหลัก')"><button id="p2"><i class="fa-solid fa-caret-left"></i> ยกเลิก</button></a>
    <p id="p1">หน้าชำระเงิน</p>


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
                        <?php
                            $qty++;
                        }
                    } else { ?>
                        <strong>
                            <h2 style="position:absolute;margin-left:250px;margin-top:180px">ไม่มีสินค้าในตะกร้าสินค้า</h2>
                        </strong>
                    <?php }
                    ?>
                </tbody>
            </table>

        </div>
        <?php 
        
        foreach($BankInfo as $bank){
            $bank_name = $bank->value_1;
            $bank_no = $bank->value_2;
            $bank_owner = $bank->value_3;
            $formatted_bank_no = sprintf('%03d-%d-%05d-%d', 
                             substr($bank_no, 0, 3), 
                             substr($bank_no, 3, 1), 
                             substr($bank_no, 4, 5), 
                             substr($bank_no, -1)
                            );
            
        }
        
        
        ?>
        
        <form action="<?php echo base_url('/index.php/OrderController/Checkout'); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
            <div id="paymentinput" >
                <p id="a2">ธนาคาร :</p>
                <span id="bank">
                <strong><input type="text" class="in" disabled readonly value="<?php echo $bank_name ?>"></input></strong><br><br>
                <p>เลขที่บัญชี :</p>
                <strong><input type="text" class="in" disabled readonly value="<?php echo $formatted_bank_no?>"></input></strong><br><br>
                <p>ชื่อบัญชี :</p>
                <strong><input type="text" class="in" disabled readonly value="<?php echo $bank_owner?>"></input></strong><br><br>
                </span>
                <p><span style="color:red">* </span>สลิปโอนเงิน :</p>
                <input id="slip" type="file" name="pay_slip" accept="image/png, image/gif, image/jpeg" required />
                <p><span style="color:red">* </span>เบอร์โทร :</p>
                <input type="text" name="order_phone" value="<?php echo $this->session->userdata['cus_phone']; ?>" required />

                <input onclick="OpenMap()" type="text" name="order_address" class="text-center" id="order_address" value="" style="margin-top: 33px;text-indent: 0px;border:2px solid red;" placeholder="เลือกที่จัดส่ง" required />



            </div>


            <?php if ($this->cart->total_items() > 0) { ?>
                <span id="totalTxt">ราคาสุทธิ : <input disabled class="text-right" type="text" id="total" value="<?php echo $this->cart->total(); ?>"></input>
                    <span id="buttonbar">

                     
                        <button id="btGo" type="submit">ยืนยันการชำระเงิน</button>
                       
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

    fileInput.oninput = function() {
        if (fileInput.files.length > 0 && pin.value.length < 0) {
            payButton.disabled = false;
            cancelBt.disabled = true;
            cancelBt2.disabled = true;
            payButton.style.backgroundColor = "#68B3F8";
            cancelBt.style.backgroundColor = "#925e5e";
            cancelBt2.style.visibility = "hidden";
        } else {
            payButton.disabled = true;
            payButton.style.backgroundColor = "#aac5d5";
            cancelBt.disabled = false;
            cancelBt2.disabled = false;


        }

    }
    var pin = document.getElementById("order_address");

    // pin.oninput = function(){
    //         if (fileInput.files.length > 0 && pin.value !== 0) {
    //         payButton.disabled = false;
    //         cancelBt.disabled = true;
    //         cancelBt2.disabled = true;
    //         payButton.style.backgroundColor = "#68B3F8";
    //         cancelBt.style.backgroundColor = "#925e5e";
    //         cancelBt2.style.visibility = "hidden";
    //     }
    //     else if(fileInput.files.length == 0 && pin.value == 0){
    //         payButton.disabled = true;
    //         payButton.style.backgroundColor = "#aac5d5";
    //         cancelBt.disabled = false;
    //         cancelBt2.disabled = false;


    //     }
    //     }

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
            if (markers.length >= 1) {


                return;
            }



            var marker = new google.maps.Marker({
                position: event.latLng,
                map: map
            });

            markers.push(marker);

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
                        if (fileInput.files.length > 0 && pin.value !== 0) {
                            payButton.disabled = false;
                            cancelBt.disabled = true;
                            cancelBt2.disabled = true;
                            payButton.style.backgroundColor = "#68B3F8";
                            cancelBt.style.backgroundColor = "#925e5e";
                            cancelBt2.style.visibility = "hidden";
                        } else if (fileInput.files.length == 0 && pin.value == 0) {
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
    window.addEventListener('popstate', function(event) {
  if (document.URL.includes("<?php echo base_url(); ?>index.php/OrderController/CancelStore")) {
    if (confirm('รายการของคุณจะถูกยกเลิกและกลับไปยังหน้าหลัก')) {
      event.preventDefault(); // Prevent the default back button behavior
      window.location = "<?php echo base_url(); ?>index.php/OrderController/CancelStore";
    } else {
      // User clicked cancel, do nothing
      window.history.pushState(null, null, window.location.href); // Reset the history state
    }
  }
});






    // function updateCartItem(obj, rowid) {
    //     $.get("<?php echo base_url('CartController/updateItemQty/'); ?>", {
    //         rowid: rowid,
    //         qty: obj.value
    //     }, function(resp) {
    //         if (resp == 'ok') {
    //             location.reload();
    //         } else {
    //             alert('Cart update failed, please try again.');
    //         }
    //     });
    // }

    // function updatePrice() {
    //     // Get the quantity value
    //     var quantity = document.getElementByClassName("qty").value;
    //     console.log(quantity)

    //     // Get the unit price
    //     var unitPrice = document.getElementByClassName("pz").value;
    //     console.log(unitPrice)

    //     // Calculate the total price
    //     var totalPrice = quantity * unitPrice;
    //     console.log(totalPrice)

    //     // Update the total price display
    //     document.getElementById("subtt").innerHTML = totalPrice;
    // }
</script>

    <?php

            } ?>
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

