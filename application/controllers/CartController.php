<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CartController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // Load cart library
        $this->load->library('cart');

        // Load product model
        $this->load->model('m_product');
        $this->load->model('m_admin');
        $this->load->model('m_customer');
        $this->load->model('m_product');
        $this->load->model('m_request');
        $this->load->model('m_order');
        $this->load->model('m_payprove');
        $this->load->model('m_bill');
    }

    function index()
    {

        $data = array();

        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();
        

        // Load the cart view
        $this->session->unset_userdata('order_id');
        $this->load->view('navbar_customer/navbar_cus');
        $this->load->view('Basket', $data);
    }
    function remove($rowid, $req_id)
    {

        $this->cart->remove($rowid);

        $data = array();
        $data['cartItems'] = $this->cart->contents();
        $data['req_detail'] = $this->m_request->RqDetail($req_id);
        $data['tbl_product'] = $this->m_product->Pharmacy();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('AdminVideoCall', $data);
    }

    function updateItemQty($rowid, $qty)
    {
        $cart = $this->cart->get_item($rowid);
        $data = array(
            'rowid'    => $rowid,
            'qty'    => $qty,

        );

        // Update cart subtotal
        $this->cart->update($data);
        redirect("CartController/");

        // Return response

    }
    function updateItemQty2($rowid, $qty)
    {
        $cart = $this->cart->get_item($rowid);
        $data = array(
            'rowid'    => $rowid,
            'qty'    => $qty,

        );

        // Update cart subtotal
        $this->cart->update($data);
        redirect("CartController/");

        // Return response

    }


 function removeItem($rowid)
    {
        // Remove item from cart
        $remove = $this->cart->remove($rowid);

        // Redirect to the cart page
        redirect('CartController/');
    }
}