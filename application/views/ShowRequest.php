<?php
define('LINE_API',"https://notify-api.line.me/api/notify");
 

    $token = "2I4JlM2R0DEAYt9nTHnbz2lfIXkiVQ2Twx4YOfMMnmj"; //ใส่Token ที่copy เอาไว้
// $str = $_POST['req_sym']; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
   
   
    $cus_name = $this->session->userdata['cus_name'];
    $cus_phone = $this->session->userdata['cus_phone'];
    $req_sym = $_POST['req_sym'];
    
    $req_time = $_POST['req_time'];
    $formatted_date = date("วันที่ d/m/Y เวลา H:i น.", strtotime($req_time));

    // $str = "รายละเอียดคำร้องขอนัดปรึกษาเภสัชกร\n";
    // $str = "ชื่อลูกค้า : ".$cus_name."\n";
    // $str = "เบอร์โทร : ".$cus_phone."\n";
    // $str = "อาการ : ".$req_name."\n";
    // $str = "เวลา : ".$req_time."\n";

    $str = "\nคำร้องขอนัดปรึกษาเภสัชกร\n".
    "ชื่อลูกค้า : ".$cus_name."\n" .
    "เบอร์โทร : ".$cus_phone."\n".
    "อาการ : ".$req_sym."\n".
    $formatted_date."\n"
    // "เวลา : ".$formatted_date."\n"
    ;

    


 
$res = notify_message($str,$token);


function notify_message($message,$token){
 $queryData = array('message' => $message);
 $queryData = http_build_query($queryData,'','&');
 $headerOptions = array( 
         'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                      ."Authorization: Bearer ".$token."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
         ),
 );
 $context = stream_context_create($headerOptions);
 $result = file_get_contents(LINE_API,FALSE,$context);
 $res = json_decode($result);
 return $res;
 
}   




//https://havespirit.blogspot.com/2017/02/line-notify-php.html
//https://medium.com/@nattaponsirikamonnet/%E0%B8%A1%E0%B8%B2%E0%B8%A5%E0%B8%AD%E0%B8%87-line-notify-%E0%B8%81%E0%B8%B1%E0%B8%99%E0%B9%80%E0%B8%96%E0%B8%AD%E0%B8%B0-%E0%B8%9E%E0%B8%B7%E0%B9%89%E0%B8%99%E0%B8%90%E0%B8%B2%E0%B8%99-65a7fc83d97f
?>
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
    $req_time=date_create( $row->req_time);
    $req_sym = $row->req_sym;
    
    
    $req_status = $row->req_status;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <form>


        </form>
        

            <form id="form2" action="">
                <i id="x" class="fa-solid fa-circle-xmark fa-2xl" onclick="window.location.href='http://localhost/pharmagood/index.php/controller/HomePage3';"></i>
                <h1><img src="<?php echo base_url(); ?>images/image 4.png"> ข้อมูลขอคำปรึกษา</h1>
                <input style="visibility: hidden;position:absolute;" type="text" name="req_id" value="<?php echo $req_id ?> "></input>

                <input style="visibility: hidden;position:absolute;" type="text" name="cus_id" value="<?php echo $cus_id ?> "></input>
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
                    <input disabled type="text" name="req_time" value="<?php echo date_format($req_time,"d/m/Y H:i"); ?> " ></input>
                </p>
                <p>*<?php echo $req_status ?>*
                </p>

                <br>


    </div>


    </form2>


</div>
</body>

</html>
<script>
function Out() {
    if (confirm('คุณต้องการออกจากระบบใช่หรือไม่')) window.location.href='CusLogout';
  

}
</script>