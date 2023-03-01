<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class RequestController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //libraly   
        $this->load->library('cart');
        $this->load->library('form_validation');


        //model
        $this->load->model('m_admin');
        $this->load->model('m_customer');
        $this->load->model('m_product');
        $this->load->model('m_request');
        $this->load->model('m_order');
        $this->load->model('m_payprove');
        $this->load->model('m_bill');

        //helper
        $this->load->helper('form', 'url');
    }
    public function ListRQ1()
    {

        $data['list_req'] = $this->m_request->List_req1();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('component/ListRQ_ButtonBar');
        $this->load->view('ListRQ1', $data);
    }
    public function ListRQ2()
    {

        $data['list_req'] = $this->m_request->List_req2();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('component/ListRQ_ButtonBar');
        $this->load->view('ListRQ2', $data);
    }
    public function ListRQ3()
    {

        $data['list_req'] = $this->m_request->List_req3();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('component/ListRQ_ButtonBar');
        $this->load->view('ListRQ3', $data);
    }
    public function ListRQ4()
    {

        $data['list_req'] = $this->m_request->List_req4();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('component/ListRQ_ButtonBar');
        $this->load->view('ListRQ4', $data);
    }
    public function VerifyRQ($req_id)
    {
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'req_id' => $req_id,
            'adm_id' => $this->session->userdata('adm_id'),
            'req_modify' => $date

        );
        $this->m_request->verify($data);
        $data['list_req'] = $this->m_request->List_req1();
        redirect('RequestController/ListRQ1');
    }
    public function DenyRQ($req_id)
    {
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'req_id' => $req_id,
            'adm_id' => $this->session->userdata('adm_id'),
            'req_modify' => $date

        );
        $this->m_request->DenyRQ($data);
        $data['list_req'] = $this->m_request->List_req1();
        //$this->session->set_userdata('ss_req_status', false);
        // $this->session->unset_userdata('rq_id');
        $this->load->view('navbar_admin/navbar');
        redirect('RequestController/ListRQ1');
    }
    public function OrderToCus($cus_id, $req_id)
    {
        date_default_timezone_set("Asia/Bangkok");
        $datetime = date('Y-m-d H:i:s');
        $data['cus_id'] = $cus_id;
        $data['adm_id'] = $this->session->userdata('adm_id');
        $data['date'] = $datetime;
        $data['total'] = $this->cart->total();
        $data['req_id'] = $req_id;
        $insertResult = $this->m_order->InsertAfterCall($data);

        $this->m_request->SuccessRQ($data);
        $order_id = $insertResult['order_id'];

        $cartItems = $this->cart->contents();
        if (empty($cartItems)) {

            $data['list_req'] = $this->m_request->List_req4();
            //$this->session->set_userdata('ss_req_status', false);
            // $this->session->unset_userdata('rq_id');
            $this->load->view('navbar_admin/navbar');
            echo "<script>";
            echo "alert(\" เสร็จสิ้น \");";
            echo "</script>";
            redirect('RequestController/ListRQ4');
        } else {


            $ordItemData = array();
            $i = 0;
            foreach ($cartItems as $item) {
                $ordItemData[$i]['ol_id'] = "";
                $ordItemData[$i]['order_id'] = $order_id;
                $ordItemData[$i]['pro_id'] = $item['id'];
                $ordItemData[$i]['qty'] = $item['qty'];
                $ordItemData[$i]['sub_total'] = $item["subtotal"];
                $i++;
            }
            if (!empty($ordItemData)) {
                $insertOrderItems = $this->m_order->insertOrderItems($ordItemData);

                if ($insertOrderItems) {
                    $this->cart->destroy();
                }
                $data['list_req'] = $this->m_request->List_req4();
                //$this->session->set_userdata('ss_req_status', false);
                //$this->session->unset_userdata('rq_id');
                $this->load->view('navbar_admin/navbar');
                echo "<script>";
                echo "alert(\" เสร็จสิ้น \");";
                echo "</script>";
                redirect('RequestController/ListRQ4');
            }
        }
    }

    public function AdminCall($req_id)
    {
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'req_id' => $req_id,
            'adm_id' => $this->session->userdata('adm_id'),
            'req_modify' => $date

        );
        $this->m_request->videocall($data);
        $data = array();
        $data['cartItems'] = $this->cart->contents();
        $data['req_detail'] = $this->m_request->RqDetail($req_id);
        $data['tbl_product'] = $this->m_product->Pharmacy();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminVideoCall', $data);
    }


    public function RequestPage()
    {
        $cus_id = $this->session->userdata['cus_id'];
        $ss_req_status = $this->m_request->check_existing($cus_id);
        $data['ss_req_status'] = $ss_req_status;
        $this->load->view('navbar_customer/navbar_cus'); 
        $this->load->view('RequestPage',$data);
    }
    public function RequestForm()
    {
        $cus_id = $this->session->userdata['cus_id'];
            $ss_req_status = $this->m_request->check_existing($cus_id);
        if ($ss_req_status==true) {
            redirect('RequestController/MyCurrentRQ');
        } else {
            $data['cus_info'] = $this->m_customer->specf_cus($cus_id);
            $this->load->view('navbar_customer/navbar_cus');
            $this->load->view('RequestForm', $data);
        }
      

    }
    public function sent_to_line()
    {
        date_default_timezone_set("Asia/Bangkok");
        $this->form_validation->set_rules('req_sym', 'req_sym', 'required');
        $data['cus_id'] = $_REQUEST['cus_id'];
        $data['req_sym'] = $_REQUEST['req_sym'];
        $data['req_time'] = $_REQUEST['req_time'];
        $data['req_status'] = "รอยืนยัน";
        $data['cus_id'] = $_REQUEST['cus_id'];
        $data['cus_phone'] = $_REQUEST['cus_phone'];
        $data['cus_age'] = $_REQUEST['cus_age'];
        $data['cus_weight'] = $_REQUEST['cus_weight'];
        $data['cus_height'] = $_REQUEST['cus_height'];

        $req_id = $this->m_request->cus_req($data);

        if ($this->form_validation->run() == TRUE && $req_id != null) {
            $this->m_customer->UpdateByRequest($data);
            define('LINE_API', "https://notify-api.line.me/api/notify");
            $token = "2I4JlM2R0DEAYt9nTHnbz2lfIXkiVQ2Twx4YOfMMnmj"; //ใส่Token ที่copy เอาไว้
            $formatted_date = date("วันที่ d/m/Y เวลา H:i น.",strtotime($data['req_time']));
            $str = "\nคำร้องขอนัดปรึกษาเภสัชกร\n" .
                "ชื่อลูกค้า : " . $this->session->userdata['cus_name'] . "\n" .
                "เบอร์โทร : " . $_REQUEST['cus_phone'] . "\n" .
                "อาการ : " . $_REQUEST['req_sym'] . "\n" .
                $formatted_date . "\n"
            ;
            $this->notify_message($str, $token);
            redirect('RequestController/MyCurrentRQ');
            
            //$ss_req_status = array(
            //'ss_req_status' => true,
            //'rq_id' => $req_id,
            //);
            //$this->session->set_userdata($ss_req_status);
            // redirect('controller/MyCurrentRQ');
            // $data['tbl_request'] = $this->m_request->cur_req($data['cus_id']);
            // $this->load->view('ShowRequest', $data);
           // redirect('RequestController/MyCurrentRQ');
        } elseif ($this->form_validation->run() == TRUE && $req_id == null) {
            echo "<script>";
            echo "alert(\" มีคำนัดปรึกษาภายในเวลาดังกล่าวแล้ว ลูกค้าสามารถเปลี่ยนเวลานัดปรึกษาใหม่ได้
            โปรดระบุมากกว่า 30 นาทีจากเวลาเดิมที่ระบุก่อนหน้า \");";
            echo "</script>";
            $data = $this->session->userdata();
            $ss_req_status = $this->m_request->cur_req($this->session->userdata('cus_id'));
            if ($ss_req_status!=null) {

                redirect('RequestController/MyCurrentRQ');
            } else {
                // $ss_req_status = array(
                //     'ss_req_status' => false
                // );

                // $this->session->set_userdata($ss_req_status);
                $data['cus_info'] = $this->m_customer->specf_cus($this->session->userdata('cus_id'));
                $this->load->view('navbar_customer/navbar_cus');
                $this->load->view('RequestForm', $data);
            }
        } else {

            echo "<script>";
            echo "alert(\" เกิดข้อผิดพลาด \");";
            echo "window.history.back()";
            echo "</script>";
        }
    }
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
                //redirect('RequestController/MyCurrentRQ');
            }

    public function MyCurrentRQ()
    {
        $cus_id = $this->session->userdata['cus_id'];
        $data['tbl_request'] = $this->m_request->cur_req($cus_id);
        if($data['tbl_request']==null){
            echo "<script>";
            echo "alert(\" ดำเนินการเสร็จสิ้น \");";
            echo "setTimeout(function(){ window.location.href = 'http://localhost/pharmagood/index.php/controller/HomePage3';3000 }, 1);";

            echo "</script>";
        }
        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('MyCurrentRQ', $data);
    }

    public function CancelRQ($req_id)
    {
       
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'req_id' => $req_id,
            'req_modify' => $date

        );

        $this->m_request->cancel($data);

        // $this->session->set_userdata('ss_req_status', false);
        // $this->session->unset_userdata('rq_id');
        redirect('controller/Homepage3');
    }
    public function VideoCall()
    {
        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('VideoCall');
    }
    public function HistoryRequest()
    {
        $cus_mention = $this->session->userdata();
        $cus_id = $cus_mention['cus_id'];
        $data['request_list'] = $this->m_request->History($cus_id);
        //$data['orderlist_history'] = $this->m_order->OrderListHistory($data);
        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('HistoryRequest', $data);
    }


    public function searchDrug()
    {
        $pro_name = $_REQUEST['search'];
        $req_id = $_REQUEST['req_id'];
        $data['tbl_product'] = $this->m_product->getDrugBySearch($pro_name);
        if ($pro_name == '') {
            $data = array();
            $data['cartItems'] = $this->cart->contents();
            $data['req_detail'] = $this->m_request->RqDetail($req_id);
            $data['tbl_product'] = $this->m_product->Pharmacy();
            $this->load->view('navbar_admin/navbar');
            $this->load->view('AdminVideoCall', $data);
        } elseif ($pro_name != '' && $data['tbl_product'] == null) {
            echo "<script>";
            echo "alert(\" ไม่มีข้อมูลที่คุณค้นหา \");";
            echo "</script>";
            $data = array();
            $data['cartItems'] = $this->cart->contents();
            $data['req_detail'] = $this->m_request->RqDetail($req_id);
            $data['tbl_product'] = $this->m_product->Pharmacy();
            $this->load->view('navbar_admin/navbar');
            $this->load->view('AdminVideoCall', $data);
        } else {
            $data['pro_name'] = $pro_name;
            $data['cartItems'] = $this->cart->contents();
            $data['req_detail'] = $this->m_request->RqDetail($req_id);
            $this->load->view('navbar_admin/navbar');
            $this->load->view('AdminVideoCall', $data);
        }
    }
}
