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
        $this->load->model('m_product');
        $this->load->model('m_product_type');

        //helper
        $this->load->helper('form', 'url');
    }



    public function ProductListPage()
    {
        $data['tbl_product'] = $this->m_product->Product();
        $data['product_type'] = $this->m_product_type->Type();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('ProductListPage', $data);
    }

    public function Product_Add()
    {

        $data['pro_id'] = $_REQUEST['pro_id'];
        $data['pro_img'] = $_REQUEST['pro_img'];
        $data['pro_name'] = $_REQUEST['pro_name'];
        $data['type_id'] = $_REQUEST['type_id'];
        $data['pro_price'] = $_REQUEST['pro_price'];
        $data['pro_kind'] = $_REQUEST['pro_kind'];
        $data['pro_limit'] = $_REQUEST['pro_limit'];
        $add = $this->m_product->Product_Add($data);
        if ($add == false) {
            echo "<script>";
            echo "alert(\" รหัสสินค้านี้มีอยู่แล้ว\");";
            echo "window.history.back()";
            echo "</script>";
        }else{
            redirect('ProductController/ProductListPage');
        }
        
    }
    public function Product_Remove()
    {
        $pro_id = $_REQUEST['pro_id'];
        $this->m_product->Remove($pro_id);
        redirect('ProductController/ProductListPage');
    }
    public function Product_Edit()
    {
        $pro_id = $_REQUEST['pro_id'];
        $data['tbl_product'] = $this->m_product->Edit($pro_id);
        $type_id = $data['tbl_product'][0]->type_id;
        $data['product_type'] = $this->m_product_type->TypeForEdit($type_id);
        $this->load->view('navbar_admin/navbar');
        $this->load->view('ProductListEdit', $data);
    }
    public function Product_Update()
    {
        $data['pro_id'] = $_REQUEST['pro_id'];
        $data['pro_img'] = $_REQUEST['pro_img'];
        $data['pro_name'] = $_REQUEST['pro_name'];
        $data['type_id'] = $_REQUEST['type_id'];
        $data['pro_price'] = $_REQUEST['pro_price'];
        $data['pro_kind'] = $_REQUEST['pro_kind'];
        $data['pro_limit'] = $_REQUEST['pro_limit'];
        $this->m_product->Update($data);
        redirect('ProductController/ProductListPage');
    }




    public function Basket()
    {

        redirect('CartController');
    }

    function Store()
    {
        $data = array();
        $data['tbl_product'] = $this->m_product->getRows();
        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('Store', $data);
    }
    function getCartItemByProId($pro_id)
    {
        $cart = $this->cart->contents();
        foreach ($cart as $item) {
            if ($item['id'] == $pro_id) {
                return $item;
            }
        }
        return null;
    }




    function AddtoCart($pro_id)
    {
        $product = $this->m_product->getRows($pro_id);
        $data = array(
            'id'    => $product['pro_id'],
            'qty'    => 1,
            'price'    => $product['pro_price'],
            'name'    => $product['pro_name'],
            'limit' => $product['pro_limit']
            // 'options' => array('limit' =>$product['pro_limit'])

        );

        $cart_item = $this->getCartItemByProId($pro_id);
        $cart_item_qty = 0;
        if ($cart_item) {
            $cart_item_qty = $cart_item['qty'];
            if ($cart_item_qty + $data['qty'] > $data['limit']) {

                $this->session->set_flashdata('error_message', 'คุณเพิ่มรายการนี้ถึงขีดจำกัดแล้ว.');

                redirect('ProductController/Store');
            }
        }
        $this->cart->insert($data);
        redirect('CartController/');
    }
    function AddToCus($pro_id, $req_id)
    {
        $product = $this->m_product->Pharmacy($pro_id);
        $data = array(
            'id' => $product['pro_id'],
            'qty' => 1,
            'price' => $product['pro_price'],
            'name' => $product['pro_name'],
        );
        $this->cart->insert($data);
        redirect('RequestController/AdminCall/' . $req_id . '');
    }
}