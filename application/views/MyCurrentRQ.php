<?php
if (isset($this->session->userdata['cus_user'])) {
    $user = $this->session->userdata['cus_user'];
    $name = $this->session->userdata['cus_name'];
    $id = $this->session->userdata['cus_id'];
    $phone = $this->session->userdata['cus_phone'];
}
// if (!isset($this->session->userdata['rq_id'])) {
//     redirect('controller/HomePage3');
// }
?>
<?php
if(isset($tbl_request)){
    foreach ($tbl_request as $row) {
        if ($id == $row->cus_id) {
            $req_id = $row->req_id;
            $cus_name = $row->cus_name;
            $cus_phone = $row->cus_phone;
            $cus_age = $row->cus_age;
            $cus_weight = $row->cus_weight;
            $cus_height = $row->cus_height;
            $time = new DateTime($row->req_time);
            $req_time =  date_format($time, "d/m/Y H:i");
            $req_sym = $row->req_sym;
            $req_status = $row->req_status;
            break;
        }
    }
}elseif(!isset($tbl_request)){
    redirect('RequestController/RequestPage');
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="30">
    <link href="<?php echo base_url(); ?>css/RqF.css" rel="stylesheet">
</head>

<body>
    <div id="total">
        <div id="tab">
        </div>
        <div id="form2" action="">
            <i id="x" class="fa-solid fa-circle-xmark fa-2xl" onclick="window.location.href='http://localhost/pharmagood/index.php/controller/HomePage3';"></i>
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
                <input type="text" style="width: 120px;" value="<?php echo $cus_phone ?>" disabled></input>
            </p>
            <p>อาการเบื้องต้น<span></span><br>
                <textarea disabled name="req_sym"><?php echo $req_sym ?></textarea>
            </p>
            <p>วันและเวลาที่ต้องการปรึกษา<span></span><br>
                <input disabled type="text" name="req_time" value="<?php echo $req_time ?>"></input>
            </p>
            <?php if ($req_status == "ยกเลิก") { ?>
                <p style="color: black;">สถานะ : รายการของคุณถูก<?php echo $req_status ?></p>
            <?php } elseif ($req_status == "ยืนยันแล้ว") { ?>
                <p>สถานะ : รายการของคุณถูก<?php echo $req_status ?> </p>
                <p>เมื่อถึงเวลานัด คุณจะสามารถกดปุ่ม "วิดีโอคอล" ได้</p>
            <?php } elseif($req_status == "รอยืนยัน"){?>
                <p>สถานะ : รอการยืนยันจากทางร้าน </p>
            <?php }else { ?>
                <p>สถานะ : เภสัชกรพร้อมให้คำปรึกษาแล้ว</p>

                <?php if ($req_status == "เสร็จสิ้น") {
                    echo "<script>";
                    echo "alert(\" ขอบคุณที่ใช้บริการ \");";
                    echo "setTimeout(function(){ window.location.href = 'http://localhost/pharmagood/index.php/controller/HomePage3';3000 }, 1);";

                    echo "</script>";
                    
                }elseif($req_status == "ยกเลิก"){
                    echo "<script>";
                    echo "alert(\" รายการนี้ถูกยกเลิกแล้ว \");";
                    echo "setTimeout(function(){ window.location.href = 'http://localhost/pharmagood/index.php/controller/HomePage3';3000 }, 1);";

                    echo "</script>";
                }
            } ?>

        </div><br><br><br>
        <div id="buttonbar">
            <?php if ($req_status == "วิดีโอคอล") { ?>
                <button id="btGo" style="background-color:#68B3F8;" onclick="window.open('https://digitalpharmacysritan.000webhostapp.com');">วิดีโอคอล</button>
            <?php } else { ?>
                <p><button disabled id="btGo" style="background-color:#91afcb;">วิดีโอคอล</button></p>
            <?php } ?>
        </div>
    </div>
    <a onclick="return confirm('คุณต้องการยกเลิกการนัดนี้')" href="<?php echo base_url('/index.php/RequestController/CancelRQ/').$req_id; ?>"><button id="btCancel">ยกเลิก</button></a>
    </div>

</body>

</html>