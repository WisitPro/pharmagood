<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/Payment.css">
</head>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbE5PxKKnEVpr873MVdBeGvS5veUJ0Nd0&callback=initMap&v=weekly" defer></script>
<body onload="disBt()" onload="initMap()">
    <button id="p2" onclick="Cancel()"><i class="fa-solid fa-caret-left"></i> ยกเลิก</button>
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
                        <th style="min-width:100px;" class="text-right">รวม</th>
                    </tr>
                </thead>
                <tbody class="tableRow">
                   
                    <?php  $line=1; $order_total=0;foreach($orderlist as $row){
                        $order_total += $row->sub_total;?>
                        
                <tr>
                        <td style="width:30px "></td>
                        <td style="width:250px;"><?php echo $row->pro_name?></td>
                        <td class="text-right" style="width:70px;"><?php echo $row->pro_price?></td>
                        <td style="width: 60px;" class="text-center"><?php echo $row->qty?></td>
                        <td style="min-width:100px;" class="text-right"><?php echo $row->sub_total?></td>
                    </tr>
                    <?php }?>
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
        }?>  
        <form onsubmit="return confirm('ยืนยันการชำระเงิน');"  action="<?php echo base_url('/index.php/OrderController/Checkout'); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
            <div id="paymentinput" >
                <p id="a2">ธนาคาร :</p>
                <span id="bank">
                <strong><input type="text" class="in" disabled readonly value="<?php echo $bank_name ?>"></input></strong><br><br>
                <p>เลขที่บัญชี :</p>
                <strong><input type="text" class="in" disabled readonly value="<?php echo $formatted_bank_no?>"></input></strong><br><br>
                <p>ชื่อบัญชี :</p>
                <strong><input type="text" class="in" disabled readonly value="<?php echo $bank_owner?>"></input></strong><br><br>
                </span>
                <p><span style="color:red">* </span>สลิปชำระเงิน :</p>
                <input id="slip" type="file" name="pay_slip" accept="image/png, image/gif, image/jpeg" required />
                <input type="hidden"  name="order_id" readonly value="<?php echo $row->order_id ?>"></input>
            </div>
           
                <span id="totalTxt">ราคาสุทธิ : <input disabled class="text-right" type="text" id="total" value="<?php echo $order_total.' บาท' ?>"></input>
                    <span id="buttonbar">               
                        <button id="btGo" type="submit">ยืนยันการชำระเงิน</button>                
                    </span>
        </form>
<script>
      function Cancel(order_id) {
        if (confirm('ยกเลิกรายการคำสั่งซื้อนี้')) window.location.href = '<?php echo base_url('/index.php/OrderController/CancelStore/'); ?>' + order_id;
    }
    var fileInput = document.getElementById("slip");
    var payButton = document.getElementById("btGo");
    var cancelBt = document.getElementById("p2");
    var cancelBt2 = document.getElementById("btHome");

    function disBt() {
        payButton.disabled = true;
    }
    fileInput.oninput = function() {
        if (fileInput.files.length > 0 ) {
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
</script>
    
    </div>


</body>

</html>

