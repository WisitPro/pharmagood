<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class ProductController extends CI_Controller
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
        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('Store', $data);
    }
    public function Basket()
    {

        redirect('Cart');
    }
  
   
}
