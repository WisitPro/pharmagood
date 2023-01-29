<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class controller extends CI_Controller
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

        //helper
        $this->load->helper('form', 'url');
    }
    public function ListRQ1(){

        $data['list_req'] = $this->m_request->List_req1();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('ListRQ1',$data);
    }
    public function ListRQ2(){

        $data['list_req'] = $this->m_request->List_req2();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('ListRQ2',$data);
    }
    public function ListRQ3(){

        $data['list_req'] = $this->m_request->List_req3();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('ListRQ3',$data);
    }
    public function VerifyRQ($req_id){
        $verify = $this->m_request->verify($req_id);
        $data['list_req'] = $this->m_request->List_req1();
        redirect('controller/ListRQ1');
    }
    public function DenyRQ($req_id){
        $DenyRQ = $this->m_request->DenyRQ($req_id);
        $data['list_req'] = $this->m_request->List_req1();
        $this->load->view('navbar_admin/navbar');
        redirect('controller/ListRQ1');
    }
    public function OrderInfo1(){

        $data['OrderInfo'] = $this->m_payprove->OrderRest();
        $this->load->view('navbar_admin/navbar');   
        $this->load->view('OrderInfo1' ,$data);
    }
    public function OrderInfo2(){

        $data['OrderInfo'] = $this->m_payprove->OrderVerified();
        $this->load->view('navbar_admin/navbar');   
        $this->load->view('OrderInfo2' ,$data);
    }
    public function OrderInfo3(){

        $data['OrderInfo'] = $this->m_payprove->OrderCancel();
        $this->load->view('navbar_admin/navbar');   
        $this->load->view('OrderInfo3' ,$data);
    }
    public function VerifyOR($pay_id){
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'pay_id' => $pay_id,
            'adm_id' => $this->session->userdata('adm_name'),
            'pay_modify' => $date
           
        );
        $verify = $this->m_payprove->verifying($data);
        
        redirect('controller/OrderInfo1');
    }
    public function DenyOR($pay_id){
        $data = array(
            date_default_timezone_set("Asia/Bangkok"),
            $date = date('Y-m-d H:i:s'),
            'pay_id' => $pay_id,
            'adm_id' => $this->session->userdata('adm_name'),
            'pay_modify' => $date
           
        );
        $verify = $this->m_payprove->denying($data);
        
        redirect('controller/OrderInfo1');
    }



































    public function AdminHomePage()
    {
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminHomePage');
    }
    public function PhaHomePage()
    {
        $this->load->view('navbar_admin/navbar');
        $this->load->view('PhaHomePage');
    }
    public function AdminListPage()
    {
        $data['tbl_admin'] = $this->m_admin->admininfo();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminListPage', $data);
    }

    public function AdminLoginPage()
    {
        $this->load->view('AdminLoginPage');
    }
    public function AdminLoginPage2()
    {

        $this->form_validation->set_rules('adm_user', 'adm_user', 'required');
        $this->form_validation->set_rules('adm_pass', 'adm_pass', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo "<script>";
            echo "alert(\" กรุณากรอกข้อมูลให้ครบถ้วน\");";
            echo "window.history.back()";
            echo "</script>";

            $this->load->view('AdminLoginPage');
        } else {
            $get_data['adm_user'] = $_REQUEST['adm_user'];
            $get_data['adm_pass'] = $_REQUEST['adm_pass'];


            $data = $this->m_admin->login($get_data);
            if ($data) { //ตรวจสอบว่าพบข้อมูล username password
                foreach ($data as $row) {
                    $userdata = array(
                        'adm_user' => $row->adm_user,
                        'adm_name' => $row->adm_name,
                        'adm_role' => $row->adm_role

                    );
                    $this->session->set_userdata($userdata);
                }
                if ($userdata['adm_role'] == "เจ้าของกิจการ") {
                    $this->load->view('navbar_admin/navbar');
                    $this->load->view('AdminHomePage');
                } elseif ($userdata['adm_role'] == "เภสัชกร") {
                    $this->load->view('PhaHomePage');
                }
            } else { //ไม่พบข้อมูลใน database
                $data['error'] = "username or password incorrect";
                echo "<script>";
                echo "alert(\" ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง\");";
                echo "window.history.back()";
                echo "</script>";
                $this->load->view('AdminLoginPage', $data);
            }
            /**** */
        }
    }
    public function removeItem($rowid)
    {
        // Remove item from cart
        $remove = $this->cart->remove($rowid);

        // Redirect to the cart page
        redirect('Cart/');
    }


    public function admin_management()
    {
        $data['tbl_admin'] = $this->m_admin->admininfo();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('admin_management', $data);
    }
    public function HomePage()
    {

        $this->load->view('HomePage');
    }
    public function HomePage3()
    {

        $this->session->set_flashdata('order_success', false);

        $this->load->view('HomePage3');
    }

    public function LoginPage()
    {
        $this->load->view('LoginPage');
    }
    public function LoginPage2()
    {

        $this->form_validation->set_rules('cus_user', 'cus_user', 'required');
        $this->form_validation->set_rules('cus_pass', 'cus_pass', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo "<script>";
            echo "alert(\" กรุณากรอกข้อมูลให้ครบถ้วน\");";
            echo "window.history.back()";
            echo "</script>";
            $this->load->view('LoginPage');
        } else {
            $get_data['cus_user'] = $_REQUEST['cus_user'];
            $get_data['cus_pass'] = $_REQUEST['cus_pass'];


            $data = $this->m_customer->login($get_data);
            if ($data) { //ตรวจสอบว่าพบข้อมูล username password
                foreach ($data as $row) {
                    $userdata = array(
                        'cus_user' => $row->cus_user,
                        'cus_id' => $row->cus_id,
                        'cus_name' => $row->cus_name,
                        'cus_phone' => $row->cus_phone



                    );
                    $this->session->set_userdata($userdata);
                }
                // $this->load->view('HomePage3');
                redirect('controller/Homepage3');
            } else { //ไม่พบข้อมูลใน database
                $data['error'] = "username or password incorrect";
                echo "<script>";
                echo "alert(\" ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง\");";
                echo "window.history.back()";
                echo "</script>";
                $this->load->view('LoginPage', $data);
            }
            /**** */
        }
    }
    public function RegisterPage()
    {
        $this->load->view('RegisterPage');
    }
    public function RegisterPage2()
    {
        // $this->form_validation->set_rules('cus_id', 'รหัสบัตรประชาชน', 'required|min_length[13]');
        // $this->form_validation->set_rules('cus_name', 'ชื่อ-นามสกุล', 'required');
        // $this->form_validation->set_rules('cus_phone', 'เบอร์โทร', 'required|min_length[10]');
        // $this->form_validation->set_rules('cus_user', 'ชื่อผู้ใช้', 'required');
        // $this->form_validation->set_rules('cus_pass', 'รหัสผ่าน', 'required');
        // $this->form_validation->set_rules('cus_add', 'ที่อยู่', 'required');
        // $this->form_validation->set_message('required', 'จำเป็นต้องกรอกข้อมูล {field} ก่อน');


        // if ($this->form_validation->run() == FALSE) {
        //     $this->load->view('RegisterPage');
        // } else {
        $data['cus_id'] = $_REQUEST['cus_id'];
        $data['cus_name'] = $_REQUEST['cus_name'];
        $data['cus_phone'] = $_REQUEST['cus_phone'];
        $data['cus_user'] = $_REQUEST['cus_user'];
        $data['cus_pass'] = $_REQUEST['cus_pass'];
        $data['cus_add'] = $_REQUEST['cus_add'];

        $success = $this->m_customer->insert($data);
        echo "<script>";
        echo "alert(\" สมัครสมาชิกสำเร็จ\");";

        echo "</script>";
        $this->load->view('LoginPage');
    }




    public function AddAdmin()
    {

        $this->form_validation->set_rules('adm_id', 'รหัสผู้ใช้', 'required');
        $this->form_validation->set_rules('adm_name', 'ชื่อ-นามสกุล', 'required');
        $this->form_validation->set_rules('adm_phone', 'เบอร์โทร', 'required');
        $this->form_validation->set_rules('adm_user', 'ชื่อผู้ใช้', 'required');
        $this->form_validation->set_rules('adm_pass', 'รหัสผ่าน', 'required');
        $this->form_validation->set_rules('adm_role', 'ตำแหน่ง', 'required');


        $this->form_validation->set_message('required', ' จำเป็นต้องกรอกข้อมูล {field} ก่อน');
        if ($this->form_validation->run() == FALSE) {
            $data['tbl_admin'] = $this->m_admin->admininfo();
            $this->load->view('navbar_admin/navbar');
            $this->load->view('AdminListPage');
        }


        $data['adm_id'] = $_REQUEST['adm_id'];
        $data['adm_name'] = $_REQUEST['adm_name'];
        $data['adm_phone'] = $_REQUEST['adm_phone'];
        $data['adm_user'] = $_REQUEST['adm_user'];
        $data['adm_pass'] = $_REQUEST['adm_pass'];
        $data['adm_role'] = $_REQUEST['adm_role'];
        $success = $this->m_admin->Add($data);
        if ($success) {
            $data['msg'] = "register complete";
        } else {
            $data['msg'] = "register error";
        }

        $data['tbl_admin'] = $this->m_admin->admininfo();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminListPage', $data);
    }

    public function Admin_Remove()
    {
        $adm_id = $_REQUEST['adm_id'];
        $this->m_admin->Remove($adm_id);
        $data['tbl_admin'] = $this->m_admin->admininfo();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminListPage', $data);
    }
    public function Admin_Edit()
    {
        $adm_id = $_REQUEST['adm_id'];
        $data['tbl_admin'] = $this->m_admin->Edit($adm_id);
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminListEdit', $data);
    }
    public function Admin_Update()
    {
        $data['adm_id'] = $_REQUEST['adm_id'];
        $data['adm_name'] = $_REQUEST['adm_name'];
        $data['adm_phone'] = $_REQUEST['adm_phone'];
        $data['adm_user'] = $_REQUEST['adm_user'];
        $data['adm_pass'] = $_REQUEST['adm_pass'];
        $data['adm_role'] = $_REQUEST['adm_role'];
        $this->m_admin->Update($data);
        $data['tbl_admin'] = $this->m_admin->admininfo();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminListPage', $data);
    }
    public function AdminListEdit()
    {
        $data['tbl_admin'] = $this->m_admin->admininfo();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminListPage', $data);
    }
    public function Logout()
    {
        $userdata = array('adm_user', 'adm_pass');
        $this->session->unset_userdata($userdata);

        $this->load->view('AdminLoginPage');
    }
    public function CusLogout()
    {
        $userdata = array('cus_user', 'cus_pass');
        $this->session->unset_userdata($userdata);
        redirect('controller/LoginPage');
    }

    public function ProductListPage()
    {
        $data['tbl_product'] = $this->m_product->Product();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('ProductListPage', $data);
    }

    public function Product_Add()
    {
        $this->form_validation->set_rules('pro_id', 'รหัสสินค้า', 'required');
        $this->form_validation->set_rules('pro_img', 'รูปภาพ');
        $this->form_validation->set_rules('pro_name', 'ชื่อสินค้า', 'required');
        $this->form_validation->set_rules('pro_type', 'ประเภท', 'required');
        $this->form_validation->set_rules('pro_price', 'ราคา', 'required');
        $this->form_validation->set_rules('pro_kind', 'ชนิด', 'required');

        $this->form_validation->set_message('required', ' จำเป็นต้องกรอกข้อมูล {field} ก่อน');

        if ($this->form_validation->run() == FALSE) {
            $data['tbl_product'] = $this->m_product->Product();
            $this->load->view('ProductListPage', $data);
        } else {
            $data['pro_id'] = $_REQUEST['pro_id'];
            $data['pro_img'] = $_REQUEST['pro_img'];
            $data['pro_name'] = $_REQUEST['pro_name'];
            $data['pro_type'] = $_REQUEST['pro_type'];
            $data['pro_price'] = $_REQUEST['pro_price'];
            $data['pro_kind'] = $_REQUEST['pro_kind'];
            $success = $this->m_product->Product_Add($data);
            if ($success) {
                $data['msg'] = "complete";
            } else {
                $data['tbl_product'] = $this->m_product->Product();
                $this->load->view('navbar_admin/navbar');
                $this->load->view('ProductListPage', $data);
            }

            $data['tbl_product'] = $this->m_product->Product();
            $this->load->view('navbar_admin/navbar');
            $this->load->view('ProductListPage', $data);
        }
    }
    public function Product_Remove()
    {
        $pro_id = $_REQUEST['pro_id'];
        $this->m_product->Remove($pro_id);
        $data['tbl_product'] = $this->m_product->Product();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('ProductListPage', $data);
    }
    public function Product_Edit()
    {
        $pro_id = $_REQUEST['pro_id'];
        $data['tbl_product'] = $this->m_product->Edit($pro_id);
        $this->load->view('navbar_admin/navbar');
        $this->load->view('ProductListEdit', $data);
    }
    public function Product_Update()
    {
        $data['pro_id'] = $_REQUEST['pro_id'];
        $data['pro_img'] = $_REQUEST['pro_img'];
        $data['pro_name'] = $_REQUEST['pro_name'];
        $data['pro_type'] = $_REQUEST['pro_type'];
        $data['pro_price'] = $_REQUEST['pro_price'];
        $data['pro_kind'] = $_REQUEST['pro_kind'];
        $this->m_product->Update($data);
        $data['tbl_product'] = $this->m_product->Product();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('ProductListPage', $data);
    }
    public function Store()
    {
        $data = array();
        $data['tbl_product'] = $this->m_product->getRows();
        $this->load->view('Store', $data);
    }
    public function Basket()
    {

        redirect('Cart');
    }
    public function StoreX()
    {
        $data = array();
        $data['tbl_product'] = $this->m_product->getRows();
        $this->load->view('StoreX', $data);
    }
    public function AddtoCart($pro_id)
    {
        $product = $this->m_product->getRows($pro_id);

        $data = array(
            'pro_id' => $product['pro_id'],
            'qty' => 1,
            'pro_price' => $product['pro_price'],
            'pro_name' => $product['pro_name'],
            'pro_img' => $product['pro_img']
        );
        $this->cart->insert($data);
        // redirect('controller/Store');


    }
    public function RequestPage()
    {


        $this->load->view('RequestPage');
    }
    public function RequestForm()
    {
       
        $data = $this->session->userdata();
        if(isset($data['req_status']) && $data['req_status'] == true ){
           
            $data['tbl_request'] = $this->m_request->cur_req($data);
            $this->load->view('MyCurrentRQ', $data);
        }else{
            $req_status = array(
                'req_status' => false
            );
            
        $req_session = $this->session->set_userdata($req_status);
        $this->load->view('RequestForm');
         }
        
    }
    public function sent_to_line()
    {
        date_default_timezone_set("Asia/Bangkok");
        $get_req_id = gmdate('sHms');
        $data['req_id'] = $get_req_id;
        $data['cus_id'] = $_REQUEST['cus_id'];
        $data['req_sym'] = $_REQUEST['req_sym'];
        $data['req_time'] = $_REQUEST['req_time'];
        $data['req_status'] = "รอยืนยัน";
        
        $success = $this->m_request->cus_req($data);

        $req_status = array(
            'req_status' => true,
            'rq_id' => $get_req_id
        );
        $req_session = $this->session->set_userdata($req_status);
        redirect('controller/MyCurrentRQ');
        // $data['tbl_request'] = $this->m_request->cur_req($data);
        // $this->load->view('ShowRequest', $data);
    }
    // public function RqF()
    // {
    //     $this->form_validation->set_rules('req_id', 'รหัสคำร้องขอคำปรึกษา');
    //     $this->form_validation->set_rules('cus_id', 'รหัสบัตรประชาชนลูกค้า', 'required');
    //     $this->form_validation->set_rules('req_sym', 'อาการเบื้องต้น', 'required');
    //     $this->form_validation->set_rules('req_time', 'เวลานัด', 'required');
    //     $this->form_validation->set_rules('req_status', 'สถานะ', 'required');


    //     $this->form_validation->set_message('required', ' จำเป็นต้องกรอกข้อมูล {field} ก่อน');

    //     if ($this->form_validation->run() == FALSE) {
    //         echo "<script>";
    //         echo "alert(\"เกิดข้อผิดพลาดในการส่งคำร้องขอ \");";
    //         echo "window.history.back()";
    //         echo "</script>";
    //     } else {
    //         $data['req_id'] = $_REQUEST['req_id'];
    //         $data['cus_id'] = $_REQUEST['cus_id'];
    //         $data['req_sym'] = $_REQUEST['req_sym'];
    //         $data['req_time'] = $_REQUEST['req_time'];
    //         $data['req_status'] = $_REQUEST['req_status'];

    //         $success = $this->m_request->cus_req($data);

    //         if ($success) {
    //             $data['msg'] = "complete";
    //         } else {
    //             $data['msg'] = "error";
    //         }
    //         // foreach($success as $row){
    //         //     $req_data = array(
    //         //     'req_id'=>$row->req_id
    //         //     );
    //         //     $this->session->request_data($req_data);
    //         //     }
    //         $data['tbl_request'] = $this->m_request->cur_req($data);

    //         $this->load->view('ShowRequest', $data);
    //     }
    // }
    public function MyCurrentRQ()
    {   
        $data = $this->session->userdata();
        $data['tbl_request'] = $this->m_request->cur_req($data);
        $this->load->view('MyCurrentRQ', $data);
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


                    redirect('controller/Payment');
                }
            }
        }
    }
    public function Payment()
    {

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
            $update = $this->m_order->update($data);
            date_default_timezone_set("Asia/Bangkok");
            $orderno = date('sHsmis');
            $data['pay_id'] = $orderno;
            $data['order_id'] = $getOrder['order_id'];
            $data['pay_slip'] = $filename;
            $data['pay_datetime'] = date('Y-m-d H:i:s');
            $data['adm_id'] = "";
            $data['pay_modify'] = "";
            $data['prove_status'] = "ชำระเงินแล้ว";
            $paysuccess = $this->m_payprove->payprove($data);
        }

        $this->session->unset_userdata('order_id');
        $this->cart->destroy();
        $this->session->set_flashdata('order_success', true);

        $this->load->view('Homepage3');
    }
    public function CancelStore()
    {

        $getOrder = $this->session->userdata();
        $data['order_id'] = $getOrder['order_id'];
        $cancel = $this->m_order->cancel($data);
        $remove = $this->m_order->remove($data);


        $this->session->unset_userdata('order_id');
        $this->cart->destroy();


        redirect('controller/Store');
    }
    public function OrderHistory()
    {
        $cus_mention = $this->session->userdata();
        $data['cus_id'] = $cus_mention['cus_id'];
        $data['order_history'] = $this->m_order->OrderHistory($data);

        $this->load->view('History', $data);
    }
    public function CancelRQ()
    {
        $getRQ = $this->session->userdata();
        $data['rq_id'] = $getRQ['rq_id'];
        $cancel = $this->m_request->cancel($data);
        
        $this->session->set_userdata('req_status', false);
        $this->session->unset_userdata('rq_id');
        redirect('controller/Homepage3');
    }
    public function VideoCall()
    {
        
        $this->load->view('VideoCall');
    }
}
