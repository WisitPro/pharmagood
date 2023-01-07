<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load library
        $this->load->library('cart');
        $this->load->library('form_validation');
        // Load model
        $this->load->model('m_admin');
        $this->load->model('m_customer');
        $this->load->model('m_product');
        $this->load->model('m_cart');
        $this->load->model('m_request');
        // Other
        $this->load->helper('form', 'url');

        

    }
    public function AdminHomePage()
    {
        $this->load->view('AdminHomePage');
    }
    public function PhaHomePage()
    {
        $this->load->view('PhaHomePage');
    }
    public function AdminListPage()
    {
        $data['tbl_admin'] = $this->m_admin->admininfo();
        $this->load->view('AdminListPage', $data);
    }
    
    public function AdminLoginPage()
    {
        $this->load->view('AdminLoginPage');
    }
    public function AdminLoginPage2()
    {
        
        $this->form_validation->set_rules('adm_user','adm_user','required');
            $this->form_validation->set_rules('adm_pass','adm_pass','required');
            if($this->form_validation->run()==FALSE){
                echo "<script>";
                echo "alert(\" กรุณากรอกข้อมูลให้ครบถ้วน\");";
                echo "window.history.back()";
                echo "</script>";
            $this->load->view('AdminLoginPage');
            }
            else{
            $get_data['adm_user'] = $_REQUEST['adm_user'];
            $get_data['adm_pass'] = $_REQUEST['adm_pass'];
            
            
            $data = $this->m_admin->login($get_data);
            if($data){//ตรวจสอบว่าพบข้อมูล username password
            foreach($data as $row){
            $userdata = array(
            'adm_user'=>$row->adm_user,
            'adm_name'=>$row->adm_name,
            'adm_role'=>$row->adm_role
            
            );
            $this->session->set_userdata($userdata);
            }
            if($userdata['adm_role']=="เจ้าของกิจการ"){
                $this->load->view('AdminHomePage');
            }
            elseif($userdata['adm_role']=="เภสัชกร"){
                $this->load->view('PhaHomePage');
            }

            
            }
            else{//ไม่พบข้อมูลใน database
            $data['error'] = "username or password incorrect";
            echo "<script>";
            echo "alert(\" ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง\");";
            echo "window.history.back()";
            echo "</script>";
            $this->load->view('AdminLoginPage',$data);
            }
            /**** */
            }
        
        
     }
    
    
    public function admin_management()
    {
        $data['tbl_admin'] = $this->m_admin->admininfo();
        $this->load->view('admin_management', $data);
    }
    public function HomePage()
    {
        
        $this->load->view('HomePage');
    }
    public function HomePage3()
    {

        $this->load->view('HomePage3');
    }
    
    public function LoginPage(){
        $this->load->view('LoginPage');
    }
    public function LoginPage2()
    {
        
        $this->form_validation->set_rules('cus_user','cus_user','required');
            $this->form_validation->set_rules('cus_pass','cus_pass','required');
            if($this->form_validation->run()==FALSE){
                echo "<script>";
                echo "alert(\" กรุณากรอกข้อมูลให้ครบถ้วน\");";
                echo "window.history.back()";
                echo "</script>";
            $this->load->view('LoginPage');
            }
            else{
            $get_data['cus_user'] = $_REQUEST['cus_user'];
            $get_data['cus_pass'] = $_REQUEST['cus_pass'];
               
            
            $data = $this->m_customer->login($get_data);
            if($data){//ตรวจสอบว่าพบข้อมูล username password
            foreach($data as $row){
            $userdata = array(
            'cus_user'=>$row->cus_user,
            'cus_id'=>$row->cus_id,
            'cus_name'=>$row->cus_name,
            'cus_phone'=>$row->cus_phone
            
            

            );
            $this->session->set_userdata($userdata);
            }
            // $this->load->view('HomePage3');
            redirect('controller/Homepage3');
            }
            else{//ไม่พบข้อมูลใน database
            $data['error'] = "username or password incorrect";
            echo "<script>";
            echo "alert(\" ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง\");";
            echo "window.history.back()";
            echo "</script>";
            $this->load->view('LoginPage',$data);
            }
            /**** */
            }
    }
    public function RegisterPage()
    {
        $this->load->view('RegisterPage');
    }
    public function RegisterPage2(){
        $this->form_validation->set_rules('cus_id', 'รหัสบัตรประชาชน', 'required|min_length[13]');
        $this->form_validation->set_rules('cus_name', 'ชื่อ-นามสกุล', 'required');
        $this->form_validation->set_rules('cus_phone', 'เบอร์โทร', 'required|min_length[10]');
        $this->form_validation->set_rules('cus_user', 'ชื่อผู้ใช้', 'required');
        $this->form_validation->set_rules('cus_pass', 'รหัสผ่าน', 'required');
        $this->form_validation->set_rules('cus_add', 'ที่อยู่', 'required');
        $this->form_validation->set_message('required', 'จำเป็นต้องกรอกข้อมูล {field} ก่อน');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('RegisterPage');
        } else {
            $data['cus_id'] = $_REQUEST['cus_id'];
            $data['cus_name'] = $_REQUEST['cus_name'];
            $data['cus_phone'] = $_REQUEST['cus_phone'];
            $data['cus_user'] = $_REQUEST['cus_user'];
            $data['cus_pass'] = $_REQUEST['cus_pass'];
            $data['cus_add'] = $_REQUEST['cus_add'];

            $success = $this->m_customer->insert($data);
            if ($success)
                $data['msg'] = "register complete";
            else
                $data['msg'] = "register error";
                echo "<script>";
                echo "alert(\" สมัครสมาชิกสำเร็จ\");";
                
                echo "</script>";
            $this->load->view('LoginPage');
        }
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
        $this->load->view('AdminListPage', $data);
    }

    public function Admin_Remove()
    {
        $adm_id = $_REQUEST['adm_id'];
        $this->m_admin->Remove($adm_id);
        $data['tbl_admin'] = $this->m_admin->admininfo();
        $this->load->view('AdminListPage', $data);
    }
    public function Admin_Edit()
    {
        $adm_id = $_REQUEST['adm_id'];
        $data['tbl_admin'] = $this->m_admin->Edit($adm_id);
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
        $this->load->view('AdminListPage', $data);
    }
    public function AdminListEdit()
    {
        $data['tbl_admin'] = $this->m_admin->admininfo();
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
        
        $this->load->view('LoginPage');
    }

    public function ProductListPage()
    {
        $data['tbl_product'] = $this->m_product->Product();
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
                $data['msg'] = "error";
            }

            $data['tbl_product'] = $this->m_product->Product();
            $this->load->view('ProductListPage', $data);
        }
    }
    public function Product_Remove()
    {
        $pro_id = $_REQUEST['pro_id'];
        $this->m_product->Remove($pro_id);
        $data['tbl_product'] = $this->m_product->Product();
        $this->load->view('ProductListPage', $data);
    }
    public function Product_Edit()
    {
        $pro_id = $_REQUEST['pro_id'];
        $data['tbl_product'] = $this->m_product->Edit($pro_id);
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
        $this->load->view('ProductListPage', $data);
    }
    public function Store(){
        $data = array();
        $data['tbl_product'] = $this->m_product->getRows();
        $this->load->view('Store', $data);
    }
    public function Basket(){
        
        $data['tbl_orderList'] = $this->m_basket->Load();
        $this->load->view('Basket', $data);
    }
    public function StoreX(){
        $data['tbl_product'] = $this->m_product->Store();
        $this->load->view('StoreX', $data);
    }
    public function AddtoCart($pro_id)
    {
        $product = $this->m_product->getRows($pro_id);

        $data = array(
                'pro_id'    => $product['pro_id'],
                'qty'    => 1,
                'pro_price'    => $product['pro_price'],
                'pro_name'    => $product['pro_name'],
                'pro_img' => $product['pro_img']
        );
        $this->cart->insert($data);
        // redirect('controller/Store');
           
        
    }
    public function RequestPage(){
        
       
        $this->load->view('RequestPage');
    }   
    public function RequestForm(){
        
        $this->load->view('RequestForm');
    }
    public function sent_to_line()
    {
        $this->form_validation->set_rules('req_id', 'รหัสคำร้องขอคำปรึกษา');
        $this->form_validation->set_rules('cus_id', 'รหัสบัตรประชาชนลูกค้า', 'required');
        $this->form_validation->set_rules('req_sym', 'อาการเบื้องต้น', 'required');
        $this->form_validation->set_rules('req_time', 'เวลานัด', 'required');
        $this->form_validation->set_rules('req_status', 'สถานะ', 'required');
        

        $this->form_validation->set_message('required', ' จำเป็นต้องกรอกข้อมูล {field} ก่อน');

        if ($this->form_validation->run() == FALSE) {
            echo "<script>";
            echo "alert(\"เกิดข้อผิดพลาดในการส่งคำร้องขอ \");";
            echo "window.history.back()";
            echo "</script>";
            
            
        } else {
            $data['req_id'] = $_REQUEST['req_id'];
            $data['cus_id'] = $_REQUEST['cus_id'];
            $data['req_sym'] = $_REQUEST['req_sym'];
            $data['req_time'] = $_REQUEST['req_time'];
            $data['req_status'] = $_REQUEST['req_status'];
            
            $success = $this->m_request->cus_req($data);
            if ($success) {
                $data['msg'] = "complete";
            } else {
                $data['msg'] = "error";
            }

            $data['tbl_request'] = $this->m_request->cur_req($data);
            
            $this->load->view('ShowRequest',$data);
            
            
        }
        
        
        }   
    public function RqF(){
        $this->form_validation->set_rules('req_id', 'รหัสคำร้องขอคำปรึกษา');
        $this->form_validation->set_rules('cus_id', 'รหัสบัตรประชาชนลูกค้า', 'required');
        $this->form_validation->set_rules('req_sym', 'อาการเบื้องต้น', 'required');
        $this->form_validation->set_rules('req_time', 'เวลานัด', 'required');
        $this->form_validation->set_rules('req_status', 'สถานะ', 'required');
        

        $this->form_validation->set_message('required', ' จำเป็นต้องกรอกข้อมูล {field} ก่อน');

        if ($this->form_validation->run() == FALSE) {
            echo "<script>";
            echo "alert(\"เกิดข้อผิดพลาดในการส่งคำร้องขอ \");";
            echo "window.history.back()";
            echo "</script>";
            
            
        } else {
            $data['req_id'] = $_REQUEST['req_id'];
            $data['cus_id'] = $_REQUEST['cus_id'];
            $data['req_sym'] = $_REQUEST['req_sym'];
            $data['req_time'] = $_REQUEST['req_time'];
            $data['req_status'] = $_REQUEST['req_status'];
            
            $success = $this->m_request->cus_req($data);
            if ($success) {
                $data['msg'] = "complete";
            } else {
                $data['msg'] = "error";
            }

            $data['tbl_request'] = $this->m_request->cur_req($data);
            
            $this->load->view('ShowRequest',$data);
            
            
        }
        
    }
    public function ShowRq(){

        $this->load->view('ShowRequest');
    }


        
        
    

        
    
}
    
?>


    
   

