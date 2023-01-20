<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Products extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        $this->load->model('m_product');
    }
    
    function Store(){
        $data = array();
        $data['tbl_product'] = $this->m_product->getRows();
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
    
}