<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
 
  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('adm_role')==='0'){
          $this->load->view('AdminHomePage');
      }else{
          echo "Access Denied";
      }
 
  }
 
  function Pharmacist(){
    //Allowing akses to staff only
    if($this->session->userdata('adm_role')==='1'){
      $this->load->view('HomePage');
    }else{
        echo "Access Denied";
    }
  }
 
 
}