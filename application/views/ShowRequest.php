<?php
define('LINE_API', "https://notify-api.line.me/api/notify");
$cus_id = $this->session->userdata['cus_id'];
foreach ($tbl_request as $row) {
    if ($cus_id == $row->cus_id) {
        $cus_name = $row->cus_name;
        $cus_phone = $row->cus_phone;
        $req_time = date_create($row->req_time);
        $req_sym = $row->req_sym;
        $req_status = $row->req_status;
    }
    break;
}

$token = "2I4JlM2R0DEAYt9nTHnbz2lfIXkiVQ2Twx4YOfMMnmj"; //ใส่Token ที่copy เอาไว้
$formatted_date = date("วันที่ d/m/Y เวลา H:i น.",$req_time);
$str = "\nคำร้องขอนัดปรึกษาเภสัชกร\n" .
    "ชื่อลูกค้า : " . $cus_name . "\n" .
    "เบอร์โทร : " . $cus_phone . "\n" .
    "อาการ : " . $req_sym . "\n" .
    $formatted_date . "\n"
;
$res = notify_message($str, $token);
function notify_message($message, $token)
{
    $queryData = array('message' => $message);
    $queryData = http_build_query($queryData, '', '&');
    $headerOptions = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                . "Authorization: Bearer " . $token . "\r\n"
                . "Content-Length: " . strlen($queryData) . "\r\n",
            'content' => $queryData
        ),
    );
    $context = stream_context_create($headerOptions);
    $result = file_get_contents(LINE_API, FALSE, $context);
    $res = json_decode($result);
    return $res;
    //redirect('controller/MyCurrentRQ');
}

