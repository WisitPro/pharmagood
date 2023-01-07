<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Line_notify extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
        $this->load->model('m_admin');
        $this->load->model('m_customer');
        $this->load->model('m_product');
        $this->load->model('m_basket');
        $this->load->model('m_request');

    }
    public function index(){
        $this->load->view('Line_view');

    }
    public function sent_to_line()
    {
        $this->form_validation->set_rules('req_id', 'รหัสคำร้องขอคำปรึกษา');
        $this->form_validation->set_rules('cus_id', 'รหัสบัตรประชาชนลูกค้า', 'required');
        $this->form_validation->set_rules('req_sym', 'อาการเบื้องต้น', 'required');
        $this->form_validation->set_rules('req_time', 'เวลานัด', 'required');
        $this->form_validation->set_rules('req_status', 'สถานะ', 'required');
        

        $this->form_validation->set_message('required', ' จำเป็นต้องกรอกข้อมูล {field} ก่อน');

        if ($this->form_validation->run() == FALSE) {
            echo "<script>";
            echo "alert(\"เกิดข้อผิดพลาดในการส่งคำร้องขอ \");";
            echo "window.history.back()";
            echo "</script>";
            
            
        } else {
            $data['req_id'] = $_REQUEST['req_id'];
            $data['cus_id'] = $_REQUEST['cus_id'];
            $data['req_sym'] = $_REQUEST['req_sym'];
            $data['req_time'] = $_REQUEST['req_time'];
            $data['req_status'] = $_REQUEST['req_status'];
            
            $success = $this->m_request->cus_req($data);
            if ($success) {
                $data['msg'] = "complete";
            } else {
                $data['msg'] = "error";
            }

            $data['tbl_request'] = $this->m_request->cur_req($data);
            
            $this->load->view('ShowRequest',$data);
            
            
        }
        
        
        }   

}