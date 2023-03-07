<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="30">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ListRQ.css">
</head>
<body>
        <div id="backform">
            <table>
                <tr id="tr1">
                    <th style="width:60px ;text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56">ลำดับ</th>
                    <th style="min-width:130px ;text-indent: 4px;">หมายเลขคำขอ</th>
                    <th style="width:280px ;">ลูกค้า</th>
                    
                    <th style="width:200px;">อาการ</th>
                    <th style="min-width:190px ;">วันที่นัด</th>
                    <th style="min-width:100px  ;" class="st" >สถานะ</th>
                    <!-- <th style="min-width:120px ;"></th> -->
                </tr>
                <?php
                $item = 1;
                foreach ($list_req as $key => $row) {
                    $fmd = date('d-m-Y H:i', strtotime($row->req_time));
                ?>
                    <tr id="tr2"  style="height: 32px;" class="tablerow" data-key="<?php echo $key ?>">
                        <td class="co1" style="text-align:center;border-right: 1px solid #b6b6b6;color:#F69A56"><?php echo $item ?></td>
                        <td class="data" style="text-indent: 4px;"><?php echo $row->req_id; ?></td>
                        <td class="data"><?php echo $row->cus_name; ?></td>
                        
                        <td class="data" style="  white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 100px;">
                        <?php echo $row->req_sym; ?></td>
                        <td class="data"><?php echo $fmd; ?> น.</td>
                        <td class="data st text-center"><strong><?php echo $row->req_status ?></strong></td>
                        <!-- <td id="btnTable" class="text-right">
                            <a id="Edit"  onclick="return confirm('ยืนยันคำขอนัด');" href='VerifyRQ/<?php echo $row->req_id; ?>'>ยืนยัน</a>
                            &nbsp;&nbsp;&nbsp;
                            <a id="Remove" onclick="return confirm('ยกเลิกคำขอนัด');" href='DenyRQ/<?php echo $row->req_id; ?>'>ยกเลิก</a>
                        </td> -->
                    </tr>
                <?php
                    $item++;
                }
                ?>
            </table> 
        </div>
    </container>
    <div>
    </div>
    <img id="admin" src="<?php echo base_url(); ?>images/admin.png">
    <div id="myModal" class="modal">
    <div class="modal-content">
      
      <div id="form2" action="">
                <h1><img src="<?php echo base_url(); ?>images/image 4.png"> ข้อมูลขอคำปรึกษา</h1> 
                <i id="x" class="fa-solid fa-circle-xmark fa-2xl" onclick="window.location.href='http://localhost/pharmagood/index.php/RequestController/ListRQ1';"></i>
                <p style="position: absolute;margin-left:230px;margin-top:28px" >อายุ 
                    <input id="age" type="text" style="width:60px" disabled required></input>
                    ปี </span>       
                <p>ชื่อ-นามสกุล<span></span><br>
                    <input id="name" type="text"disabled></input>
                </p>
                <p style="position: absolute;margin-left:130px;margin-top:28px">น้ำหนัก <span></span>
                    <input id="weight" type="text" style="width:60px"  disabled required></input> กก.
                    </span>
                <p style="position: absolute;margin-left:300px;margin-top:28px">ส่วนสูง <span></span>
                    <input id="height" type="text" style="width:60px"  disabled required></input> ซม.
                    </span>
                <p>เบอร์โทรศัพท์<span></span><br>
                    <input id="phone" type="text"  style="width: 120px;"  disabled></input>
                </p><span style="color: white;font-size: 20px;;" id="gender"></span>
                <p>อาการเบื้องต้น<span></span><br>
                    <textarea disabled id="sym" style="height: 140px;"></textarea>
                </p>
                <p>วันและเวลาที่ต้องการปรึกษา<span></span><br>
                    <input id="req_time" disabled type="text" ></input>
                </p>
                
                <p style="color: black;">สถานะ : <span id="status"></span></p>
    </div>
    <a onclick="return confirm('ยืนยันคำขอนัดปรึกษา');" href="<?php echo base_url('/index.php/RequestController/VerifyRQ/'); ?>" id="verifyBT">
        <button id="verifyBTT"  style="background-color:#55fe3d;color:white;border:transparent;
        width:100px;height:34px;font-size:20px;margin-left:240px">ยืนยัน</button></a>
        <a onclick="return confirm('ยกเลิกคำขอนัดปรึกษา');" href="<?php echo base_url('/index.php/RequestController/DenyRQ/'); ?>" id="denyBT">
        <button id="denyBTT"  style="background-color:#ff4242;color:white;border:transparent;
        width:100px;height:34px;font-size:20px;margin-left:20px;position: absolute;">ยกเลิก</button></a>
   
      


    </div>
  </div>
</body>
</html>
<script>
  // Get the modal
  var modal = document.getElementById("myModal");
  var name = document.getElementById("name");
  var age = document.getElementById("age");
  var weight = document.getElementById("weight");
  var height = document.getElementById("height");
  var phone = document.getElementById("phone");
  var sym = document.getElementById("sym");
  var req_time = document.getElementById("req_time");
  var status = document.getElementById("status");
  var gender = document.getElementById("gender");

  var verifyBT = document.getElementById("verifyBT");
  var denyBT = document.getElementById("denyBT");
 


  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on a card, open the modal
  var rows = document.getElementsByClassName("tablerow");
  for (var i = 0; i < rows.length; i++) {
    rows[i].addEventListener("click", function() {
      var key = this.getAttribute("data-key");
      var request = <?php echo json_encode($list_req); ?>;
      
   
    var name = request[key].cus_name;
    var age = request[key].cus_age;
    var gender = request[key].cus_gender;
    var weight = request[key].cus_weight;
    var height = request[key].cus_height;
    var phone = request[key].cus_phone;
    var sym = request[key].req_sym;
    var req_time = request[key].req_time;
    var status = request[key].req_status;
    verifyBT.href = "<?php echo base_url('/index.php/RequestController/VerifyRQ/'); ?>" + request[key]['req_id'];
    denyBT.href = "<?php echo base_url('/index.php/RequestController/DenyRQ/'); ?>" + request[key]['req_id'];
    
    document.getElementById("name").value = name;
    document.getElementById("age").value = age;
    document.getElementById("weight").value = weight;
    document.getElementById("height").value = height;
    document.getElementById("phone").value = phone;
    document.getElementById("sym").value = sym;
    document.getElementById("req_time").value = req_time;
    document.getElementById("status").innerHTML = status;
    document.getElementById("gender").innerHTML = "เพศสภาพ : ผู้"+gender;
    
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
    position: absolute;
  width: 560px;
  height: 600px;
  margin-left: 480px;
  margin-top: 40px;
  display: inline-block;
  background: #f79a56;
  border-radius: 0px 20px 20px 0px;
  padding-left: 44px;
  padding-top: 10px;
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
  .modal input{
    font-size: 18px;
  color: #000000;
  text-indent: 4px;
  }
  .modal textarea {
  color: black;
  width: 460px;
  resize: none;
  text-indent: 4px;
}
.modal h1 {
  color: white;
  margin-left: -10px;
}
.modal p {
  color: white;
  font-size: 20px;
}
.modal-content span {
  font-size: 16px;
  color: black;
}
.modal p span{
  color: black;
  font-size: 20px;
}
.modal #x {
  position: absolute;
  margin-left: 478px;
  margin-top: -68px;
  cursor: pointer;
  color: white;
}


  /* The Close Button */
  .close {
    color: #000000;
    float: right;
    font-size: 60px;
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