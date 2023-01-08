<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        $this->load->model('m_product');
    }
    
    function index(){
        $data = array();
        
        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();
        
        // Load the cart view
        $this->load->view('Basket', $data);
    }
    
    function updateItemQty(){
        $update = 0;
    
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $price = $this->input->get('price'); // price increase
        
        // Update item in the cart
        if(!empty($rowid)){
            $data = array(
                'rowid' => $rowid,
                'price' => $this->cart->get_item($rowid)['price'] + $price,
                'subtotal' => $this->cart->get_item($rowid)['subtotal'] + $price
            );
            $update = $this->cart->update($data);
        }

        
        // Update cart subtotal
        $this->cart->update_cart();
        
        // Return response
        echo $update?'ok':'err';
        }
        

    }
    
    function removeItem($rowid){
        // Remove item from cart
        $remove = $this->cart->remove($rowid);
        
        // Redirect to the cart page
        redirect('cart');
    }
    
