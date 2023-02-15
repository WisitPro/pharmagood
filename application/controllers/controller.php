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
        $this->load->model('m_bill');

        //helper
        $this->load->helper('form', 'url');
    }
    public function LoginPage()
    {
        $this->load->view('component/navbar');
        $this->load->view('LoginPage');
    }
    public function LoginPage2()
    {

        $get_data['cus_user'] = $_REQUEST['username'];
        $get_data['cus_pass'] = $_REQUEST['password'];

        $data = $this->m_customer->login($get_data);
        if ($data) {
            foreach ($data as $row) {
                $userdata = array(
                    'cus_user' => $row->cus_user,
                    'cus_id' => $row->cus_id,
                    'cus_name' => $row->cus_name,
                    'cus_phone' => $row->cus_phone
                );
                $this->session->set_userdata($userdata);
            }
            redirect('controller/Homepage3');
        } elseif (!$data) {
            $get_data['adm_user'] = $_REQUEST['username'];
            $get_data['adm_pass'] = $_REQUEST['password'];

            $admin = $this->m_admin->login($get_data);
            if ($admin) {
                foreach ($admin as $row) {
                    $userdata = array(
                        'adm_user' => $row->adm_user,
                        'adm_name' => $row->adm_name,
                        'adm_role' => $row->adm_role,
                        'adm_id' => $row->adm_id

                    );
                    $this->session->set_userdata($userdata);
                }
                redirect('controller/AdminHomePage');
            } else {
                $data['error'] = "username or password incorrect";
                echo "<script>";
                echo "alert(\" ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง\");";
                echo "window.history.back()";
                echo "</script>";
                $this->load->view('component/navbar');
                $this->load->view('LoginPage', $data);
            }
        }
    }

    public function RegisterPage()
    {
        $this->load->view('component/navbar');
        $this->load->view('RegisterPage');
    }
    public function RegisterPage2()
    {

        $data['cus_id'] = $_REQUEST['cus_id'];
        $data['cus_name'] = $_REQUEST['cus_name'];
        $data['cus_phone'] = $_REQUEST['cus_phone'];
        $data['cus_user'] = $_REQUEST['cus_user'];
        $data['cus_pass'] = $_REQUEST['cus_pass'];
        $cus_id = $data['cus_id'];
        // $data['cus_add'] = $_REQUEST['cus_add'];
        $Get_Cus_Id = $this->m_customer->specf_cus($cus_id);
        if ($Get_Cus_Id == true) {
            echo "<script>";
            echo "alert(\" รหัสบัตรประชาชนนี้มีในระบบแล้ว\");";
            echo "window.history.back()";
            echo "</script>";
            
        } elseif($Get_Cus_Id == false) {
            $Register = $this->m_customer->Register($data);
            if ($Register == true) {
                echo "<script>";
                echo "alert(\" สมัครสมาชิกสำเร็จ\");";
                echo "</script>";
                redirect('controller/LoginPage');
            }else{
                echo "<script>";
                echo "alert(\" ชื่อผู้ใช้ซ้ำ\");";
                echo "window.history.back()";
                echo "</script>";
                
            }
        }
    }


    public function HomePage()
    {
        $this->load->view('component/navbar');
        $this->load->view('HomePage');
    }
    public function HomePage3()
    {

        $this->session->set_flashdata('order_success', false);
        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('HomePage3');
    }
    public function Logout()
    {
        $userdata = array('adm_user', 'adm_pass', 'adm_role', 'adm_name');
        $this->session->unset_userdata($userdata);

        redirect('controller/HomePage');
    }
    public function CusLogout()
    {
        $userdata = array('cus_user', 'cus_pass', 'cus_id', 'cus_name', 'cus_phone',);
        $this->session->unset_userdata($userdata);
        redirect('controller/HomePage');
    }






    public function AdminHomePage()
    {
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminHomePage');
    }
    public function AdminListPage()
    {
        $data['tbl_admin'] = $this->m_admin->admininfo();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminListPage', $data);
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
        if ($success == false) {
            echo "<script>";
            echo "alert(\" ชื่อผู้ใช้ซ้ำ\");";
            echo "window.history.back()";
            echo "</script>";
        } else {
            $data['tbl_admin'] = $this->m_admin->admininfo();
            $this->load->view('navbar_admin/navbar');
            $this->load->view('AdminListPage', $data);
        }
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
        $update = $this->m_admin->Update($data);
        if ($update == false) {
            echo "<script>";
            echo "alert(\" ชื่อผู้ใช้ซ้ำ\");";
            echo "window.history.back()";
            echo "</script>";
        } else {
            $data['tbl_admin'] = $this->m_admin->admininfo();
            $this->load->view('navbar_admin/navbar');
            $this->load->view('AdminListPage', $data);
        }
    }
    public function AdminListEdit()
    {
        $data['tbl_admin'] = $this->m_admin->admininfo();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminListPage', $data);
    }




    public function StoreX()
    {
        $data = array();
        $data['tbl_product'] = $this->m_product->getRows();
        $this->load->view('component/navbar');
        $this->load->view('StoreX', $data);
    }
}
