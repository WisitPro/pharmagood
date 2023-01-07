<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        $this->load->model('product');
    }
    
    function index(){
        $data = array();
        
        // Fetch products from the database
        $data['products'] = $this->product->getRows();
        
        // Load the product list view
        $this->load->view('products/index', $data);
    }
    
    function addToCart($pro_id){
        
        // Fetch specific product by ID
        $product = $this->product->getRows($pro_id);
        
        // Add product to the cart
        $data = array(
            'id'    => $product['pro_id'],
            'qty'    => 1,
            'price'    => $product['pro_price'],
            'name'    => $product['pro_name'],
            
        );
        $this->cart->insert($data);
        
        // Redirect to the cart page
        redirect('Products/');
    }
    
}