<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Products extends CI_Controller{
    
    function  __construct(){
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
    
    function Store(){
        $data = array();
        $data['tbl_product'] = $this->m_product->getRows();
        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('Store', $data);
    }
    
    function AddtoCart($pro_id)
    {
        $product = $this->m_product->getRows($pro_id);
        $data = array(
                'id'    => $product['pro_id'],
                'qty'    => 1,
                'price'    => $product['pro_price'],
                'name'    => $product['pro_name'],
                'img' => $product['pro_img']
        );
        $this->cart->insert($data);        
        // redirect('Products/Store');
        redirect('Cart/');       
    }
    function AddToCus($pro_id,$req_id)
    {
        $product = $this->m_product->Pharmacy($pro_id);
        $data = array( 
            'id' => $product['pro_id'],
            'qty' => 1,
            'price' => $product['pro_price'],
            'name' => $product['pro_name'],   
        );
        $success = $this->cart->insert($data);
        
        // $data = array();
        // $data['cartItems'] = $this->cart->contents();
        // $data['req_detail'] = $this->m_request->RqDetail($req_id);
        // $data['tbl_product'] = $this->m_product->Pharmacy();
        // $this->load->view('navbar_admin/navbar');
        // $this->load->view('RqDetail', $data);
        redirect('controller/AdminCall/'.$req_id.'');
        
        
    }
    
}