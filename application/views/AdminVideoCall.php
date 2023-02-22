<?php
foreach ($req_detail as $row) { 
    $req_id = $row->req_id;
    $cus_name = $row->cus_name;
    $cus_phone = $row->cus_phone;
    $cus_age = $row->cus_age;
    $cus_weight = $row->cus_age;
    $cus_height = $row->cus_height;
    $cus_id = $row->cus_id;
    
    $time = new DateTime($row->req_time);
    $req_time =  date_format($time,"d/m/Y H:i"); 
    $req_sym = $row->req_sym;
    $req_status = $row->req_status;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Pharma Good</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="<?php echo base_url(); ?>css/AdminVideoCall.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/Fonts.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/AdminOut.js"></script>
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>
<body onload="updateTotal()">
<script>
    function updateTotal() {
        var subtt = document.getElementsByName("subtotal");
        var total = 0;
        for (var i = 0; i < subtt.length; i++) {
            total += parseFloat(subtt[i].value);
        }
        document.getElementById("total").value = total;
    }
</script>
<div id="total">
        <div id="tab">
        </div>
            <div id="form1">  
                <h1>รายการยา</h1>    
                <table class="table" id="druglist">
<thead>
                <tr id="tr1">
                    <th></th>
                    <th  class="dt"> <form id="form_search" action="<?php echo base_url('index.php/RequestController/searchDrug') ?>" value="<?php if (isset($pro_name)) {
                                                                  echo $pro_name;
                                                                }  ?>"autocomplete="off" method="POST">
                    <input type="hidden" name="req_id" value="<?php echo $req_id;?>">
      <input id="search_field" style="font-size: 16px !important;margin-left:-8px" type="text" name="search" value="<?php if (isset($pro_name)) {
                                                                  echo $pro_name;
                                                                }  ?>" placeholder="ยา" class="searchBox" id="searchBox"> </input>
      <button type="submit" class="btnInput" id="btnSearch"> <i class="fa-solid fa-magnifying-glass"></i> ค้นหา</button>
    </form></th>
                    <th>ประเภท</th>
                    <th  class="dt" >ราคา</th>   
                    <th></th>
                </tr>
                </thead>
                    <?php $item = 1;foreach ($tbl_product as $row) { ?>
                        <tbody>
                        <tr id="tr2">
                            <th class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></th>
                            <td class="data dt"style="border-right: 1px solid #b6b6b6;"><?php echo $row['pro_name'] ?></td>
                            <td class="data dt"style="border-right: 1px solid #b6b6b6;"><?php echo $row['type_name'] ?></td>
                            <td class="data " style="color:#eb0e0e;border-right: 1px solid #b6b6b6;text-align:right;padding-right:8px">
                            <?php echo $row['pro_price']; ?></td>
                            <td id="btnTable">
                                <a  href="<?php echo base_url('/index.php/ProductController/AddToCus/'.$row['pro_id'].'/'.$req_id) ?>">เลือก</a>
                            </td>
                        </tr></tbody>
                    <?php $item++; } ?>
            </table>
    </div>
        </div>
</div>
    <div id="total">
        <div id="tab">
        </div>
            <div id="form2" action="">
                <i id="x" class="fa-solid fa-circle-xmark fa-2xl" onclick="window.location.href='<?php echo base_url('index.php/RequestController/ListRQ4') ?>';"></i>
                
                <h1><img src="<?php echo base_url(); ?>images/image 4.png"> ข้อมูลขอคำปรึกษา</h1> 
                <p style="position: absolute;margin-left:230px;margin-top:28px">อายุ <span></span>
                    <input type="text" style="width:60px" name="cus_age" disabled value="<?php echo $cus_age ?>" required></input>
                    ปี </span>       
                <p>ชื่อ-นามสกุล<span></span><br>
                    <input type="text" value="<?php echo $cus_name ?>" disabled></input>
                </p>
                <p style="position: absolute;margin-left:130px;margin-top:28px">น้ำหนัก <span></span>
                    <input type="text" style="width:60px" name="cus_weight" disabled value="<?php echo $cus_weight ?>" required></input> กก.
                    </span>
                <p style="position: absolute;margin-left:300px;margin-top:28px">ส่วนสูง <span></span>
                    <input type="text" style="width:60px" name="cus_height" disabled value="<?php echo $cus_height ?>" required></input> ซม.
                    </span>
                <p>เบอร์โทรศัพท์<span></span><br>
                    <input type="text"  style="width: 120px;" value="<?php echo $cus_phone ?>" disabled></input>
                </p>
                <p>อาการเบื้องต้น<span></span><br>
                    <textarea disabled name="req_sym"><?php echo $req_sym ?></textarea>
                </p>
                <p>วันและเวลาที่ต้องการปรึกษา<span></span><br>
                    <input disabled type="text" name="req_time" value="<?php echo $req_time ?>" ></input>
                </p>
                <!-- <p style="color: black;">สถานะ : <?php echo $req_status ?></p>           -->
    </div><div id="buttonbar">
        <?php if($req_status == "วิดีโอคอล"){?>   
            <button id="btGo" style="background-color:#68B3F8;" onclick="window.open('https://digitalpharmacysritan.000webhostapp.com');">วิดีโอคอล</button>
        <?php }else{?>
            <p ><button disabled id="btGo" style="background-color:#91afcb;">วิดีโอคอล</button></p>
        <?php } ?>      
            </div>
                 </div>
    <a onclick="return confirm('เสร็จสิ้น')"
     href="<?php echo base_url('/index.php/RequestController/OrderToCus/'.$cus_id.'/'.$req_id.''); ?>" ><button id="btCancel" >เสร็จสิ้น</button></a>
</div>
<div id="p3">
        <div id="p4">
            <table class="table">
                <thead >
                    <tr>
                        <th style="min-width: 300px;">ยา</th>
                        <th  class="text-left" >ราคา</th>
                        <th style="width: 40px;"  class="text-center">จำนวน</th>
                        <th  style="width: 40px;"  class="text-right">รวม</th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody class="tableRow">
                    <?php
                    if ($this->cart->total_items() > 0) {
                        $qty = 1;
                        foreach ($cartItems as $item) {
                    ?>
                            <tr class="trB">
                                <td ><?php echo $item["name"]; ?></td>
                                <td  id="price">
                                    <p style="color: black;"><?php echo '' . $item["price"]; ?></p><input type="hidden" id="pz<?php echo $qty  ?>" value="<?php echo '' . $item["price"]; ?>" />
                                </td>
                                <td class="text-center">             
                                    <input  class="qty text-center " style="width: 40px;" type="text" value="<?php echo $item["qty"] ?>" id="qty<?php echo $qty  ?>" readonly />                              
                                </td>

                                <td  >
                                    <input class="text-right" style="width: 40px;"  disabled name="subtotal" type="text" class="subtt" id="subtt<?php echo $qty ?>" value=" <?php echo $item["subtotal"] ?>" >                                  
                                    <span></span>
                            </td>
                                <td ><i class="fa fa-trash-o" style="padding-top: 2px;font-size:16px;color:red;cursor: pointer;" class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการลบรายการนี้หรือไม่')?
                            window.location.href='<?php echo base_url('/index.php/CartController/remove/'.$item["rowid"].'/'.$req_id); ?>':false;"></i> </td>
                            </tr>
                        <?php
                            $qty++;
                        }
                    }
                    ?>
                </tbody>
        </div>
    </div>
    </table>
        </div>
        <?php if ($this->cart->total_items() > 0) { ?>
            <strong >
            <span id="totalTxt"
            style="position:absolute; margin-left:360px;margin-top:24px;font-size: 24px;color: white;">ราคาสุทธิ :
            <input  style="border:transparent;background-color: transparent;font-size: 24px;width: 120px;color: white;"
             disabled class="text-right" type="text" id="total" 
            value="<?php echo number_format($this->cart->total()); ?>"></input> <span style="color: white;font-size: 24px;">บาท</span>
           </strong>
        <?php } ?>
    </div>
</body>
</html>
<script>
    function updateCartItem(obj, rowid) {
        $.get("<?php echo base_url('CartController/updateItemQty/'); ?>", {
            rowid: rowid,
            qty: obj.value
        }, function(resp) {
            if (resp == 'ok') {
                location.reload();
            } else {
                alert('Cart update failed, please try again.');
            }
        });
    }
</script>