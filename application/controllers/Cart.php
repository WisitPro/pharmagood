<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // Load cart library
        $this->load->library('cart');

        // Load product model
        $this->load->model('m_product');
    }

    function index()
    {
        $data = array();

        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();

        // Load the cart view
        $this->load->view('Basket', $data);
    }

    function updateItemQty($rowid,$qty)
    {
        $cart = $this->cart->get_item($rowid);
        $data = array(
            'rowid'    => $rowid,
            'qty'    => $qty,
            
    );

        // Update cart subtotal
        $this->cart->update($data);
        redirect("Cart/");
        
        // Return response
        
    }
    function updateItemQty2($rowid,$qty)
    {
        $cart = $this->cart->get_item($rowid);
        $data = array(
            'rowid'    => $rowid,
            'qty'    => $qty,
            
    );

        // Update cart subtotal
        $this->cart->update($data);
        redirect("Cart/");
        
        // Return response
        
    }


}

function removeItem($rowid)
{
    // Remove item from cart
    $remove = $this->cart->remove($rowid);
    
    // Redirect to the cart page
    redirect('Cart/');
}

?>