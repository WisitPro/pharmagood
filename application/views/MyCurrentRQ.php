
<!-- <?php
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
?>  -->

<?php
if (isset($this->session->userdata['cus_user'])) {
    $user = $this->session->userdata['cus_user'];

    $name = $this->session->userdata['cus_name'];
    $id = $this->session->userdata['cus_id'];
    $phone = $this->session->userdata['cus_phone'];
}
?>
<?php
foreach ($tbl_request as $row) {
    
    
    $cus_name = $row->cus_name;
    $cus_phone = $row->cus_phone;
    $time = new DateTime($row->req_time);
    $req_time =  date_format($time,"d/m/Y H:i");
   
    $req_sym = $row->req_sym;
    $req_status = $row->req_status;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30">
    <title>Pharma Good</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="<?php echo base_url(); ?>css/RqF.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/Fonts.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4812969020.js" crossorigin="anonymous"></script>
</head>

<body>
<?php
// session_destroy();
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
?>
    <nav>
        <img id="logo" src="<?php echo base_url(); ?>images/Logo.png">
        <div id="menu">
            <a id="btHome" href="HomePage3">หน้าหลัก</a>

            <a id="btOut" onclick="Out()" style="cursor:pointer;">ออกจากระบบ <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>

    </nav>

    <div id="total">
        <div id="tab">


        </div>
        

            <div id="form2" action="">
                <i id="x" class="fa-solid fa-circle-xmark fa-2xl" onclick="window.location.href='http://localhost/pharmagood/index.php/controller/HomePage3';"></i>
                <h1><img src="<?php echo base_url(); ?>images/image 4.png"> ข้อมูลขอคำปรึกษา</h1>
                

                
                <p>ชื่อ-นามสกุล<span></span><br>
                    <input type="text" value="<?php echo $cus_name ?>" disabled></input>
                </p>
                <p>เบอร์โทร<span></span><br>
                    <input type="text" value="<?php echo $cus_phone ?>" disabled></input>
                </p>
                <p>อาการเบื้องต้น<span></span><br>
                    <textarea disabled name="req_sym"><?php echo $req_sym ?></textarea>
                </p>
                <p>วันและเวลาที่ต้องการปรึกษา<span></span><br>
                    <input disabled type="text" name="req_time" value="<?php echo $req_time ?>" ></input>
                </p>
                <p>สถานะ : <?php echo $req_status ?></p>

    </div><div id="buttonbar">
        <?php if($req_status == "ยืนยันแล้ว"){?>
            <a href="<?php echo base_url('/index.php/controller/VideoCall'); ?>"><button id="btGo" style="background-color:#68B3F8;" >วิดีโอคอล</button></a>
        <?php }else{?>
            <p ><button disabled id="btGo" style="background-color:#91afcb;">วิดีโอคอล</button></p>
        <?php } ?>
        
            </div>
            
            


        </div>

    <a onclick="return confirm('คุณต้องการยกเลิกการนัดนี้')" href="<?php echo base_url('/index.php/controller/CancelRQ'); ?>" ><button id="btCancel" >ยกลิก</button></a>
</div>
</body>

</html>
<script>
function Out() {
    if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href='CusLogout';
  

}
</script>