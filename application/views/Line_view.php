<?php
define('LINE_API',"https://notify-api.line.me/api/notify");
 

    $token = "2I4JlM2R0DEAYt9nTHnbz2lfIXkiVQ2Twx4YOfMMnmj"; //ใส่Token ที่copy เอาไว้
// $str = $_POST['req_sym']; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
    $req_id = $_POST['req_id'];
    $cus_id = $_POST['cus_id'];
    $cus_name = $_POST['cus_name'];
    $cus_phone = $_POST['cus_phone'];
    $req_sym = $_POST['req_sym'];
    $req_time = $_POST['req_time'];

    // $str = "รายละเอียดคำร้องขอนัดปรึกษาเภสัชกร\n";
    // $str = "ชื่อลูกค้า : ".$cus_name."\n";
    // $str = "เบอร์โทร : ".$cus_phone."\n";
    // $str = "อาการ : ".$req_name."\n";
    // $str = "เวลา : ".$req_time."\n";

    $str = "\nคำร้องขอนัดปรึกษาเภสัชกร\n".
    "ชื่อลูกค้า : ".$cus_name."\n" .
    "เบอร์โทร : ".$cus_phone."\n".
    "อาการ : ".$req_sym."\n".
    "เวลา : ".$req_time."\n"
    ;

    


 
$res = notify_message($str,$token);

print_r($res);
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
