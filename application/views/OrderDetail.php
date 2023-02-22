<?php
foreach ($orderdetail as $row) {
    $fmd = date('d-m-Y', strtotime($row->pay_datetime));
    $time = date('H:i', strtotime($row->pay_datetime));
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/OrderDetail.css">
    </head>
    <body>
        <page>
            <img id="admin" src="<?php echo base_url(); ?>images/admin.png">
        </page>
        <br><br>
        <container>
            <span style="font-size:24px;" class="animate-bottom">        
                <button id="spb2" onclick="history.back()" class="text-center"><i class="fa-solid fa-angle-left"></i></button>       
                <span id="spb1" style="color:white;margin-left:8px">
                    <span   class="text-left" style="padding-left:16px;">
                        <i class="fa-brands fa-wpforms"></i> ข้อมูลออเดอร์ : <?php echo $row->order_id; ?>
                    </span></span>
            </span>
            <p></p>       
            <img id="slip" src="<?php echo base_url('/upload/' . $row->pay_slip . ''); ?>">
            <div id="backform" class="animate-bottom">
                <div id="cus_detail">
                    <p>รหัสลูกค้า : <?php echo $row->cus_id ?></p>
                    <p>ลูกค้า : <?php echo $row->cus_name ?></p>
                    <p>เบอร์โทร : <?php echo $row->order_phone ?></p>
                    <p>ที่อยู่ : <?php echo $row->order_address ?></p>
                    <?php if($row->prove_status!="รอการยืนยัน" && $row->prove_status!="ยกเลิก" ){ ?>
                    <button id="print" style="position: absolute;cursor:pointer;
                    margin-left:420px;margin-top:-180px;font-size:20px;color:white;width:110px;background-color: #f79a56;border-radius:10px;border:white 2px solid"
                    onclick="window.location='<?php 
                    echo base_url('index.php/OrderController/Orderbill/'.$row->pay_id.'/'.$row->order_id.'');?>'">ใบเสร็จ <i class="fa-solid fa-file-invoice"></i></button>
                    <?php } ?>
                </div>
                <table>
                    <thead>
                        <tr id="tr1">
                            <th>รายการสินค้า</th>
                            <th class="text-center">จำนวน</th>
                            <th class="text-right lastcolumn">ราคารวม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $item = 1; foreach ($orderdetail as $row) { ?>
                            <tr id="tr2">
                                <td><?php echo $item ?>. <?php echo $row->pro_name ?></td>
                                <td class="text-center"><?php echo $row->qty ?></td>
                                <td class="text-right lastcolumn"><?php echo $row->sub_total ?></td>
                            </tr>
                        <?php  $item++; }  ?>
                    </tbody>
                    <tfoot>
                        <tr style="border-bottom: 1px solid #82b8d5;
                        border-top: 1px solid #82b8d5;">
                            <td class="text-right">รวม</td>
                            <td ></td>
                            <td class="text-right lastcolumn"><?php echo $row->order_total ?> บาท</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </container>
        
        <?php if($row->prove_status=="รอการยืนยัน"){ ?>
                    <div id="button_bar">
                        <a id="Remove" onclick="return confirm('ยกเลิกออเดอร์');" 
                        href='<?php echo base_url('index.php/OrderController/DenyOR/'.$row->pay_id.'');?>'>
                            <button id="cancelbt">ยกเลิก</button></a>
                        <a onclick="return confirm('ยืนยันออเดอร์');" 
                        href='<?php echo base_url('index.php/OrderController/VerifyOR/'.$row->pay_id.'');?>'>
                            <button id="verifybt">ยืนยัน</button></a>
                    </div>
                    <?php }elseif($row->prove_status=="ยืนยันแล้ว"){?>
                        <div id="button_bar">
                        
                        <!-- <a 
                        href='<?php echo base_url('index.php/OrderController/VerifyOR/'.$row->pay_id.'');?>'>
                            <button id="verifybt2">จัดส่งแล้ว</button></a> -->
                            <a id=""><button id="verifybt2">จัดส่งแล้ว</button></a>
                    </div>

                        <?php }?>
                        <div id="myModal" class="modal">
    <form onsubmit="return confirm('ยืนยันเพิ่มข้อมูลนี้');" action="Product_Add" method="POST" autocomplete="off" enctype="multipart/form-data" class="modal-content">
    <p style="font-size: 28px;">ฟอร์มบันทึกข้อมูลการจัดส่ง</p> <span class="close">&times;</span>
        <p for="">*บริษัทที่จัดส่ง : </p>
        <input type="text" style="width: 200px;" required>
       
        
        <p for="">*หมายเลขติดตามพัสดุ :</p>
        <input type="text"  style="width: 200px;" required><br><br>
       
        <button id="btnForm1" type="reset" style="background-color:#FF5353">ยกเลิก</button>
        <button id="btnForm2" type="submit" style="background-color:#56FF5D">บันทึก</button>
    
    </form></div>
    </body>
    </html>
<?php break;}?>


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
var btn = document.getElementById("verifybt2");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    window.location = '<?php echo base_url('/index.php/OrderController/OrderDetail/').$row->pay_id ?>';
}
// When the user clicks anywhere outside of the modal, close it



</script>
<style>
.modal-content {
    width: 400px;
    height: 400px;
    background-color: #F69A56;
    position: absolute;
    margin-left: 600px;
    border-radius: 15px;
    color: white;
    padding-left: 36px;
    font-size: 18px;
    padding-top: 1em;
    margin-top: 90px;
    
}
.modal-content input{
    color: #000000;
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
    margin-top: -60px;
  }
  
  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }
</style>