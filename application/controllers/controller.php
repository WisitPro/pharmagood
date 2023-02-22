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
        $this->load->model('m_product_type');
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

        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $get_data['adm_user'] = $username;
        $get_data['adm_pass'] = $password;

        $admin = $this->m_admin->login($get_data);
        if ($admin!=null) {
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
        } elseif ($admin==null) {
            $get_data['cus_user'] = $username;
            $get_data['cus_pass'] = $password;
            $data = $this->m_customer->login($get_data);
            if ($data!=null) {
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
            }else{
                $data['error'] = "username or password incorrect";
                echo "<script>";
                echo "alert(\" ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง\");";
                echo "window.history.back()";
                echo "</script>";
                $this->load->view('component/navbar');
                $this->load->view('LoginPage', $data);
            }
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



    public function RegisterPage()
    {
        $this->load->view('component/navbar');
        $this->load->view('RegisterPage');
    }
    public function RegisterPage2()
    {
        $this->form_validation->set_rules('cus_user', 'ชื่อผู้ใช้', 'required');
        $this->form_validation->set_rules('cus_pass', 'รหัสผ่าน', 'required');
        $this->form_validation->set_rules('cus_pass2', 'ยืนยันรหัสผ่าน', 'required|matches[cus_pass]');
        $this->form_validation->set_rules('cus_name', 'ชื่อ-นามสกุล', 'required');
        $this->form_validation->set_rules('cus_phone', 'เบอร์โทรศัพท์', 'required');
        $this->form_validation->set_rules('cus_age', 'อายุ', 'required');
        $this->form_validation->set_rules('cus_height', 'ส่วนสูง', 'required');
        $this->form_validation->set_rules('cus_weight', 'น้ำหนัก', 'required');
        $this->form_validation->set_rules('cus_gender', 'เพศสภาพ', 'required');
        $this->form_validation->set_message('required', ' จำเป็นต้องกรอกข้อมูล {field} ก่อน');
        if ($this->form_validation->run() == FALSE) {
            echo "<script>";
            echo "alert(\" รหัสผ่านไม่ตรงกัน\");";
            echo "</script>";

            $this->load->view('component/navbar');
            $this->load->view('RegisterPage');
        } else {

            $data['cus_user'] = $_REQUEST['cus_user'];
            $data['cus_pass'] = $_REQUEST['cus_pass'];
            $data['cus_name'] = $_REQUEST['cus_name'];
            $data['cus_phone'] = $_REQUEST['cus_phone'];
            $data['cus_age'] = $_REQUEST['cus_age'];
            $data['cus_height'] = $_REQUEST['cus_height'];
            $data['cus_weight'] = $_REQUEST['cus_weight'];
            $data['cus_gender'] = $_REQUEST['cus_gender'];
            // $cus_id = $data['cus_id'];
            // $data['cus_add'] = $_REQUEST['cus_add'];
            // $Get_Cus_Id = $this->m_customer->specf_cus($cus_id);
            // if ($Get_Cus_Id == true) {
            //     echo "<script>";
            //     echo "alert(\" รหัสบัตรประชาชนนี้มีในระบบแล้ว\");";
            //     echo "window.history.back()";
            //     echo "</script>";

            // } elseif($Get_Cus_Id == false) {
            $Register = $this->m_customer->Register($data);
            if ($Register == true) {
                echo "<script>";
                echo "alert(\" สมัครสมาชิกสำเร็จ\");";
                echo "</script>";
                redirect('controller/LoginPage');
            } elseif ($this->form_validation->run() == true && $Register == false) {

                echo "<script>";
                echo "alert(\" ชื่อผู้ใช้ซ้ำ\");";

                echo "</script>";
                $this->load->view('component/navbar');
                $this->load->view('RegisterPage');
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

        $this->form_validation->set_rules('adm_name', 'ชื่อ-นามสกุล', 'required');
        $this->form_validation->set_rules('adm_phone', 'เบอร์โทรศัพท์', 'required');
        $this->form_validation->set_rules('adm_user', 'ชื่อผู้ใช้', 'required');
        $this->form_validation->set_rules('adm_pass', 'รหัสผ่าน', 'required');
        $this->form_validation->set_rules('adm_pass2', 'ยืนยันรหัสผ่าน', 'required|matches[adm_pass]');
        $this->form_validation->set_rules('adm_role', 'ตำแหน่ง', 'required');
        $this->form_validation->set_message('required', ' จำเป็นต้องกรอกข้อมูล {field} ก่อน');
        if ($this->form_validation->run() == FALSE) {
            echo "<script>";
            echo "alert(\" รหัสผ่านไม่ตรงกัน\");";
            echo "</script>";
            $data['tbl_admin'] = $this->m_admin->admininfo();
            $this->load->view('navbar_admin/navbar');
            $this->load->view('AdminListPage', $data);
        } else {

            $data['adm_name'] = $_REQUEST['adm_name'];
            $data['adm_phone'] = $_REQUEST['adm_phone'];
            $data['adm_user'] = $_REQUEST['adm_user'];
            $data['adm_pass'] = $_REQUEST['adm_pass'];
            $data['adm_role'] = $_REQUEST['adm_role'];
            $success = $this->m_admin->Add($data);
            if ($this->form_validation->run() == true && $success == false) {
                echo "<script>";
                echo "alert(\" ชื่อผู้ใช้ซ้ำ\");";
                echo "window.history.back()";
                echo "</script>";
            } else {

                redirect('controller/AdminListPage');
            }
        }
    }

    public function Admin_Keep()
    {
        $adm_id = $_REQUEST['adm_id'];
        $this->m_admin->Keep($adm_id);
        $data['tbl_admin'] = $this->m_admin->admininfo();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminListPage', $data);
    }
    public function Admin_Edit()
    {
        $data['tbl_admin'] = $this->m_admin->admininfo();
        $adm_id = $_REQUEST['adm_id'];
        $data['GetAdmin'] = $this->m_admin->GetAdminById($adm_id);
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminListPage', $data);
    }
    public function Admin_Update()
    {
        $data['adm_id'] = $_REQUEST['adm_id'];
        $data['adm_name'] = $_REQUEST['adm_name'];
        $data['adm_phone'] = $_REQUEST['adm_phone'];
        $data['adm_user'] = $_REQUEST['adm_user'];

        $data['adm_role'] = $_REQUEST['adm_role'];
        $update = $this->m_admin->Update($data);
        if ($update == false) {
            echo "<script>";
            echo "alert(\" ชื่อผู้ใช้ซ้ำ\");";
            echo "window.location.href='http://localhost/pharmagood/index.php/controller/AdminListPage'";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert(\" บันทึกข้อมูลเรียบร้อยแล้ว\");";
            echo "</script>";
            redirect('controller/AdminListPage');
        }
    }
    // public function AdminListEdit()
    // {
    //     $data['tbl_admin'] = $this->m_admin->admininfo();
    //     $this->load->view('navbar_admin/navbar');
    //     $this->load->view('AdminListPage', $data);
    // }
    public function UpdateAdminPassword($adm_id)
    {

        $data['tbl_admin'] = $this->m_admin->admininfo();
        $data['UpdatePassword'] = $this->m_admin->GetAdminById($adm_id);
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminListPage', $data);
    }
    public function NewAdminPassword()
    {
        $this->form_validation->set_rules('adm_pass', 'รหัสผ่าน', 'required');
        $this->form_validation->set_rules('adm_pass2', 'ยืนยันรหัสผ่าน', 'required|matches[adm_pass]');
        if ($this->form_validation->run() == FALSE) {
            echo "<script>";
            echo "alert(\" รหัสผ่านไม่ตรงกัน\");";
            echo "</script>";
            $data['tbl_admin'] = $this->m_admin->admininfo();
            $data['UpdatePassword'] = $this->m_admin->GetAdminById($_REQUEST['adm_id']);
            $this->load->view('navbar_admin/navbar');
            $this->load->view('AdminListPage', $data);
        } else {
            $data['adm_id'] = $_REQUEST['adm_id'];
            $data['adm_pass'] = $_REQUEST['adm_pass'];
            $this->m_admin->UpdateAdminPassword($data);
            echo "<script>";
            echo "alert(\" บันทึกข้อมูลเรียบร้อยแล้ว\");";
            echo "</script>";

            redirect('controller/AdminListPage');
        }
    }



    public function StoreX()
    {
        $data = array();
        $data['product_type'] = $this->m_product_type->Type();
        $data['tbl_product'] = $this->m_product->getRows();
        $this->load->view('component/navbar');
        $this->load->view('StoreX', $data);
    }
    public function searchDrug2()
    {
        $pro_name = $_REQUEST['search'];
        $data['tbl_product'] = $this->m_product->getDrugBySearch($pro_name);
        if ($pro_name == '') {
            redirect('controller/StoreX');
        }

        if ($data['tbl_product'] == null) {
            echo "<script>";
            echo "alert(\" ไม่มีข้อมูลที่คุณค้นหา \");";
            echo "window.location.href='http://localhost/pharmagood/index.php/controller/StoreX'";
            echo "</script>";
        } else {
            $data['pro_name'] = $pro_name;
            $data['product_type'] = $this->m_product_type->Type();
            $this->load->view('component/navbar');
            $this->load->view('StoreSearchOut', $data);
        }
    }
    public function SelectByType($type_id)
    {
        $data = array();
        $data['tbl_product'] = $this->m_product->SelectByType($type_id);
        $data['product_type'] = $this->m_product_type->Type();

        $this->load->view('component/navbar');
        $this->load->view('StoreX', $data);
    }
}
