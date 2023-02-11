<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class OrderController extends CI_Controller
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
        $this->load->model('m_delivery');

        //helper
        $this->load->helper('form', 'url');
    }
    
    public function OrderInfo1(){

        $data['OrderInfo'] = $this->m_payprove->OrderRest();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('component/OrderInfoMenuBar');
        $this->load->view('OrderInfo1' ,$data);
    }
    public function OrderInfo2(){

        $data['OrderInfo'] = $this->m_payprove->OrderVerified();
        $this->load->view('navbar_admin/navbar');   
        $this->load->view('component/OrderInfoMenuBar');
        $this->load->view('OrderInfo2' ,$data);
    }
    public function OrderInfo3(){

        $data['OrderInfo'] = $this->m_payprove->OrderCancel();
        $this->load->view('navbar_admin/navbar');   
        $this->load->view('component/OrderInfoMenuBar');
        $this->load->view('OrderInfo3' ,$data);
    }
    public function OrderInfo4(){

        $data['OrderInfo'] = $this->m_delivery->DeliveryOrder();
        $this->load->view('navbar_admin/navbar');   
        $this->load->view('component/OrderInfoMenuBar');
        $this->load->view('OrderInfo4' ,$data);
    }
    public function VerifyOR($pay_id){
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'pay_id' => $pay_id,
            'adm_id' => $this->session->userdata('adm_id'),
            'pay_modify' => $date
           
        );

        $this->m_payprove->verifying($data);
        $this->m_bill->import($data);
        
        
        redirect('OrderController/OrderInfo1');
    }
    public function DenyOR($pay_id){
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'pay_id' => $pay_id,
            'adm_id' => $this->session->userdata('adm_id'),
            'pay_modify' => $date
           
        );
        $this->m_payprove->denying($data);
        
        
        redirect('OrderController/OrderInfo1');
    }
    public function OrderSuccess($order_id){
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'order_id' => $order_id,
            'delivery_success' => $date
        
        );
        $this->m_delivery->OrderSuccess($data);
        $this->m_order->OrderSuccess($data);

        
        
        redirect('OrderController/OrderHistory');
    }
    
   
    public function OrderDetail($pay_id){
        $pay_id = $pay_id;
        $data['orderdetail'] = $this->m_order->OrderDetail($pay_id);
        $this->load->view('navbar_admin/navbar');
        $this->load->view('OrderDetail' ,$data);
    }
    public function Orderbill($pay_id,$order_id){
        $pay_id = $pay_id;
        $order_id = $order_id;
        $Exists = $this->m_delivery->DeliveryExists($order_id);   
        if($Exists==true){
            $data['orderdetail'] = $this->m_bill->OrderDetail($pay_id);
            $this->load->view('navbar_admin/navbar');
            $this->load->view('Orderbill2' ,$data);
        }elseif($Exists==false){
            $data['orderdetail'] = $this->m_bill->OrderDetail($pay_id);
            $this->load->view('navbar_admin/navbar');
            $this->load->view('Orderbill' ,$data);
        }else{
            redirect('OrderController/OrderInfo1');
        }
        
    }

    public function InsertDelivery($order_id)
    {
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'order_id' => $order_id,
            'adm_id' => $this->session->userdata('adm_id'),
            'delivery_datetime' => $date
        );
        $this->m_delivery->InsertDelivery($data);
        $this->m_payprove->DeliveryStatus($order_id);
        redirect('OrderController/OrderInfo4');
    }
   



   
    public function Ordering()
    {


        date_default_timezone_set("Asia/Bangkok");
        $orderno = gmdate('sHms');
        $orderno2 = $orderno;
        $user_data = $this->session->userdata();
        $data['order_id'] = $orderno2;
        $data['cus_id'] = $user_data['cus_id'];

        $data['order_datetime'] = date('Y-m-d H:i:s');
        $data['order_total'] = $this->cart->total(); 
        $data['order_status'] = 'ยังไม่ชำระเงิน';   
        $insertOrder = $this->m_order->insert($data);


        if ($insertOrder) {

            $cartItems = $this->cart->contents();
            $ordItemData = array();
            $i = 0;
            foreach ($cartItems as $item) {
                $ordItemData[$i]['ol_id']     = "";
                $ordItemData[$i]['order_id']     = $orderno2;
                $ordItemData[$i]['pro_id']     = $item['id'];
                $ordItemData[$i]['qty']     = $item['qty'];
                $ordItemData[$i]['sub_total']     = $item["subtotal"];
                $i++;
            }
            if (!empty($ordItemData)) {
                // Insert order items
                $insertOrderItems = $this->m_order->insertOrderItems($ordItemData);

                if ($insertOrderItems) {
                    // Remove items from the cart
                    $this->session->unset_userdata('order_id');
                    $ordersession = array(
                        'order_id' => $orderno2,

                    );


                    $this->session->set_userdata($ordersession);


                    redirect('OrderController/Payment');
                }
            }
        }
    }
    public function Payment()
    {
        $this->load->view('navbar_customer/navbar_cus');
        $data['cartItems'] = $this->cart->contents();
        $this->load->view('Payment', $data);
    }
    public function Checkout()
    {

        $config['upload_path'] = './upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);

        $data = $this->upload->data();
        if (!$this->upload->do_upload('pay_slip')) {
            echo $this->upload->display_errors();
        } else {
            $data = $this->upload->data();
            $filename = $data["file_name"];

            $getOrder = $this->session->userdata();
            $data['order_id'] = $getOrder['order_id'];
            $data['order_address'] = $_REQUEST['order_address'];
            $data['order_phone'] = $_REQUEST['order_phone'];
            $update = $this->m_order->update($data);
            date_default_timezone_set("Asia/Bangkok");
            $orderno = date('sdHmis');
            $pay['pay_id'] = $orderno;
            $pay['order_id'] = $getOrder['order_id'];
            $pay['pay_slip'] = $filename;
            // $data['order_address'] = $_REQUEST['order_address'];
            // $data['order_phone'] = $_REQUEST['order_phone'];
            $pay['pay_datetime'] = date('Y-m-d H:i:s');
            $pay['adm_id'] = "";
            $pay['pay_modify'] = "";
            $pay['prove_status'] = "ชำระเงินแล้ว";
            $this->m_payprove->payprove($pay);

        }

        $this->session->unset_userdata('order_id');
        $this->cart->destroy();
        $this->session->set_flashdata('order_success', true);
        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('Homepage3');
    }
    public function CancelStore()
    {

        $getOrder = $this->session->userdata();
        $data['order_id'] = $getOrder['order_id'];
        $this->m_order->cancel($data);
        $this->m_order->remove($data);


        $this->session->unset_userdata('order_id');
        $this->cart->destroy();


        redirect('controller/Store');
    }
    public function OrderHistory()
    {
        $cus_mention = $this->session->userdata();
        $data['cus_id'] = $cus_mention['cus_id'];
        $data['order_history'] = $this->m_order->OrderHistory($data);
        //$data['orderlist_history'] = $this->m_order->OrderListHistory($data);
        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('History', $data);
    }


   
}
