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
        $this->load->model('m_information');

        //helper
        $this->load->helper('form', 'url');
    }

    public function OrderInfo1()
    {

        $data['OrderInfo'] = $this->m_payprove->OrderRest();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('component/OrderInfoMenuBar');
        $this->load->view('OrderInfo1', $data);
    }
    public function OrderInfo2()
    {

        $data['OrderInfo'] = $this->m_payprove->OrderVerified();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('component/OrderInfoMenuBar');
        $this->load->view('OrderInfo2', $data);
    }
    public function OrderInfo3()
    {

        $data['OrderInfo'] = $this->m_payprove->OrderCancel();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('component/OrderInfoMenuBar');
        $this->load->view('OrderInfo3', $data);
    }
    public function OrderInfo4()
    {

        $data['OrderInfo'] = $this->m_delivery->DeliveryOrder();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('component/OrderInfoMenuBar');
        $this->load->view('OrderInfo4', $data);
    }
    public function VerifyOR($order_id)
    {
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'order_id' => $order_id,
            'adm_id' => $this->session->userdata('adm_id'),
            'pay_modify' => $date
        );

        $verifying_result = $this->m_payprove->verifying($data);

        if ($verifying_result === false) {
            echo "<script>";
            echo "alert(\" ยืนยันไม่สำเร็จ \");";
            echo "window.history.back()";
            echo "</script>";
        } else {
            $this->m_bill->import($data);
            $order_id = $this->m_order->getOrderIdByPayId($order_id);
            $this->m_order->verifying($order_id);
            echo "<script>";
            echo "alert(\" ยืนยันสำเร็จ \");";
            echo "</script>";
            $order_id = $order_id;
            // $data['orderdetail'] = $this->m_order->OrderDetail($pay_id);
            // $this->load->view('navbar_admin/navbar');
            // $this->load->view('OrderDetail', $data);
            redirect('OrderController/OrderDetail/'.$order_id);
        }
    }


    public function DenyOR($pay_id)
    {
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'pay_id' => $pay_id,
            'adm_id' => $this->session->userdata('adm_id'),
            'pay_modify' => $date

        );
        $this->m_payprove->denying($data);
        echo "<script>";
        echo "alert(\" ยกเลิกคำสั่งซื้อสำเร็จ \");";

        echo "</script>";

        redirect('OrderController/OrderInfo1');
    }
    public function OrderSuccess($order_id)
    {
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'order_id' => $order_id,
           

        );
        $this->m_delivery->OrderSuccess($data);
        $this->m_order->OrderSuccess($data);



        redirect('OrderController/OrderHistory');
    }


    public function OrderDetail($order_id)
    {
        $order_id = $order_id;
        $data['orderdetail'] = $this->m_order->OrderDetail($order_id);
        $this->load->view('navbar_admin/navbar');
        $this->load->view('OrderDetail', $data);
    }
    public function Orderbill($pay_id, $order_id)
    {
        $pay_id = $pay_id;
        $order_id = $order_id;
        $Exists = $this->m_delivery->DeliveryExists($order_id);
        if ($Exists == true) {
            $data['orderdetail'] = $this->m_bill->OrderDetail($pay_id);
            $this->load->view('navbar_admin/navbar');
            $this->load->view('Orderbill2', $data);
        } elseif ($Exists == false) {
            $data['orderdetail'] = $this->m_bill->OrderDetail($pay_id);
            $this->load->view('navbar_admin/navbar');
            $this->load->view('Orderbill', $data);
        } else {
            redirect('OrderController/OrderInfo1');
        }
    }
    // public function InsertDelivery($order_id)
    // {
    //     $data['order_id'] = $order_id;
    //     $this->load->view('navbar_customer/navbar_cus');
    //     $this->load->view('DeliveryForm', $data);
    // }

    public function InsertDelivery()
    {
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'order_id'=> $_REQUEST['order_id'],
            'delivery_service' => $_REQUEST['delivery_service'],
            'delivery_tracking'=> $_REQUEST['delivery_tracking'],
            'adm_id' => $this->session->userdata('adm_id'),
            'delivery_datetime' => $_REQUEST['delivery_datetime'],
        );
        $this->m_delivery->InsertDelivery($data);
        $this->m_order->delivery($data);
        echo "<script>";
        echo "alert(\" บันทึกข้อมูลเรียบร้อย \");";
        echo "setTimeout(function(){ window.location.href = 'http://localhost/pharmagood/index.php/OrderController/OrderInfo4';3000 }, 1);";
        echo "</script>";
       
    }
    public function OrderingForm()
    {
        $order_id = $_REQUEST['order_id'];
        $data = array();
        $data['order_item'] = $this->m_order->GetOrderById($order_id);
        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('OrderingForm', $data);
    }
    public function OrderingNoPay()
    {
        date_default_timezone_set("Asia/Bangkok");

        $user_data = $this->session->userdata();
        $data['cus_id'] = $user_data['cus_id'];
        $data['order_datetime'] = date('Y-m-d H:i:s');
        $data['order_total'] = $this->cart->total();      

        // Call the model method and check for success
        $insertResult = $this->m_order->insert($data);
        if ($insertResult) {
            $order_id = $insertResult['order_id'];

            $cartItems = $this->cart->contents();
            $ordItemData = array();
            $i = 0;
            foreach ($cartItems as $item) {
                $ordItemData[$i]['order_id'] = $order_id;
                $ordItemData[$i]['pro_id'] = $item['id'];
                $ordItemData[$i]['qty'] = $item['qty'];
                $ordItemData[$i]['sub_total'] = $item["subtotal"];
                $i++;
            }

            if (!empty($ordItemData)) {
                // Insert order items
                $insertOrderItems = $this->m_order->insertOrderItems($ordItemData);

                if ($insertOrderItems) {
                    $this->cart->destroy();
                    echo "<script>";
                    echo "alert(\" เพิ่มรายการสั่งซื้อสำเร็จ \");";

                    echo "</script>";
                    // $data['ListMyOrder'] = $this->m_order->ListMyOrder();
                    // $this->load->view('navbar_customer/navbar_cus');
                    // $this->load->view('ListMyOrder', $data);
                    redirect('OrderController/ListMyOrder');
                }
            }
        } else {
            // Handle the error if the query was not successful
            echo "Database error: " . $insertResult['error'];
        }
    }



    public function Ordering()
    {
        $data['order_id'] = $_REQUEST['order_id'];
        $data['order_address'] = $_REQUEST['order_address'];
        $data['order_phone'] = $_REQUEST['order_phone'];     

        $order_id = $this->m_order->OrderAddress($data);
        redirect('OrderController/Payment/'.$order_id.'');
      
    }

    public function ListMyOrder()
    {
        //session cus_id ใน model
        $data['ListMyOrder'] = $this->m_order->ListMyOrder();
        //$data['orderlist_history'] = $this->m_order->OrderListHistory($data);
        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('ListMyOrder', $data);
    }
    public function Payment($order_id)
    {

        $data['BankInfo'] = $this->m_information->BankInPayment();
        $data['orderlist'] = $this->m_order->GetOrderById($order_id);
        $payment = $order_id;
        $this->load->view('navbar_customer/navbar_cus', array('payment' => $payment));
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
            date_default_timezone_set("Asia/Bangkok");
            $pay['order_id'] = $_REQUEST['order_id'];
            $pay['pay_bank'] = $_REQUEST['pay_bank'];
            $pay['pay_number'] = $_REQUEST['pay_number'];
            $pay['pay_slip'] = $filename;
            $pay['pay_datetime'] = date('Y-m-d H:i:s');
            $this->m_payprove->payprove($pay);
        }

        $this->session->unset_userdata('order_id');
        $data['request'] = $this->m_request->check_existingForHomePage($this->session->userdata['cus_id']);
        $this->session->set_flashdata('order_success', true);
        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('Homepage3',$data);
    }
    public function CancelStore($order_id)
    {

        // $getOrder = $this->session->userdata();
        // $data['order_id'] = $getOrder['order_id'];
        $this->m_order->cancel($order_id);
        // $this->m_order->remove($data);


        // $this->session->unset_userdata('order_id');



        redirect('ProductController/Store');
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
