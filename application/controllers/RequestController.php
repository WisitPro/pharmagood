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
        $this->session->set_userdata('ss_req_status', false);
        $this->session->unset_userdata('rq_id');
        $this->load->view('navbar_admin/navbar');
        redirect('RequestController/ListRQ1');
    }
    public function OrderToCus($cus_id, $req_id)
    {
        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d H:i:s');
        $data['cus_id'] = $cus_id;
        $data['adm_id'] = $this->session->userdata('adm_id');
        $data['date'] = $date;
        $data['total'] = $this->cart->total();
        $data['req_id'] = $req_id;
        $insertResult = $this->m_order->InsertAfterCall($data);
        $this->m_request->SuccessRQ($data);
        $order_id = $insertResult['order_id'];

        $cartItems = $this->cart->contents();
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
            $this->session->set_userdata('ss_req_status', false);
            $this->session->unset_userdata('rq_id');
            $this->load->view('navbar_admin/navbar');
            echo "<script>";
            echo "alert(\" เสร็จสิ้น \");";
            echo "</script>";
            redirect('RequestController/ListRQ4');
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

        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('RequestPage');
    }
    public function RequestForm()
    {

        $data = $this->session->userdata();
        if (isset($data['ss_req_status']) && $data['ss_req_status'] == true) {

            redirect('RequestController/MyCurrentRQ');
        } else {
            $ss_req_status = array(
                'ss_req_status' => false
            );

            $this->session->set_userdata($ss_req_status);
            $data['cus_info'] = $this->m_customer->specf_cus($this->session->userdata('cus_id'));
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

            $ss_req_status = array(
                'ss_req_status' => true,
                'rq_id' => $req_id,
            );
            $this->session->set_userdata($ss_req_status);
            $data = $this->session->userdata();
            // redirect('controller/MyCurrentRQ');
            $data['tbl_request'] = $this->m_request->cur_req($data);
            $this->load->view('ShowRequest', $data);
            redirect('RequestController/MyCurrentRQ');
        } elseif ($this->form_validation->run() == TRUE && $req_id == null) {
            echo "<script>";
            echo "alert(\" มีคำนัดปรึกษาภายในเวลาดังกล่าวแล้ว เรียนลูกค้าได้โปรดเปลี่ยนเวลานัดปรึกษาใหม่ \");";
            echo "</script>";
            $data = $this->session->userdata();
            if (isset($data['ss_req_status']) && $data['ss_req_status'] == true) {

                redirect('RequestController/MyCurrentRQ');
            } else {
                $ss_req_status = array(
                    'ss_req_status' => false
                );

                $this->session->set_userdata($ss_req_status);
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

    public function MyCurrentRQ()
    {
        $data = $this->session->userdata();
        $data['tbl_request'] = $this->m_request->cur_req($data);
        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('MyCurrentRQ', $data);
    }

    public function CancelRQ()
    {
        $getRQ = $this->session->userdata();
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'rq_id' => $getRQ['rq_id'],
            'req_modify' => $date

        );

        $this->m_request->cancel($data);

        $this->session->set_userdata('ss_req_status', false);
        $this->session->unset_userdata('rq_id');
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
