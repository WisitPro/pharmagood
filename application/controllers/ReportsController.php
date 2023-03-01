<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class ReportsController extends CI_Controller
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
        $this->load->model('m_product_type');
        $this->load->model('m_request');
        $this->load->model('m_order');
        $this->load->model('m_payprove');
        $this->load->model('m_bill');
        $this->load->model('m_reports');


        //helper
        $this->load->helper('form', 'url');
    }
    public function ReportsPage()
    {
        $data['admin_list'] = $this->m_admin->Pharmacist();
        $data['product_type_list'] = $this->m_product_type->Type();
        $data['product_unit'] = $this->m_product->Unit();

        $this->load->view('navbar_admin/navbar');
        $this->load->view('component/ReportsFilter', $data);
    }
    public function ReportFilter()
    {
        $Reset = isset($_REQUEST['Reset']) ? $_REQUEST['Reset'] : null;
        if($Reset){
            redirect('ReportsController/ReportsPage');
        }
        $data['Subject'] = $_REQUEST['Subject'];
        
        $data['day1'] = isset($_REQUEST['day1']) ? $_REQUEST['day1'] : null;
        $data['day2'] = isset($_REQUEST['day2']) ? $_REQUEST['day2'] : null;

        $data['product_type'] = isset($_REQUEST['product_type']) ? $_REQUEST['product_type'] : null;
        $data['pro_id'] = isset($_REQUEST['pro_id']) ? $_REQUEST['pro_id'] : null;
        $data['pro_unit'] = isset($_REQUEST['pro_unit']) ? $_REQUEST['pro_unit'] : null;

        $data['admin'] = isset($_REQUEST['admin']) ? $_REQUEST['admin'] : null;
        $data['req_status'] = isset($_REQUEST['req_status']) ? $_REQUEST['req_status'] : null;

        $data['order_type'] = isset($_REQUEST['order_type']) ? $_REQUEST['order_type'] : null;
        $data['order_status'] = isset($_REQUEST['order_status']) ? $_REQUEST['order_status'] : null;

        $data['order_id'] = isset($_REQUEST['order_id']) ? $_REQUEST['order_id'] : null;



        $this->load->view('navbar_admin/navbar');
        $data['product_type_list'] = $this->m_product_type->Type();
        $data['product_unit'] = $this->m_product->Unit();
        $data['admin_list'] = $this->m_admin->Pharmacist();
        if ($data['Subject'] == 1) {
            $data['report'] = $this->m_reports->IncomeReports($data);
            if ($data['report'] == null) {
                echo "<script>";
                echo "alert(\"ไม่พบข้อมูลตามเงื่อนไขที่คุณเลือก\");";
                echo "</script>";
                $data['print'] = '0';
                $this->load->view('component/ReportsFilter', $data);
            } else {
                $data['print'] = '1';
                $this->load->view('component/ReportsFilter', $data);
                $this->load->view('Reports/IncomeReport', $data);
                // $back = $this->IncomeReport($data);
            }
        } elseif ($data['Subject'] == 2) {
            $data['report'] = $this->m_reports->PharmacistTask($data);
            if ($data['report'] == null) {
                echo "<script>";
                echo "alert(\"ไม่พบข้อมูลตามเงื่อนไขที่คุณเลือก\");";
                echo "</script>";
                $data['print'] = '0';
                $this->load->view('component/ReportsFilter', $data);
            } else {
                $data['print'] = '1';
                $this->load->view('component/ReportsFilter', $data);
                $this->load->view('Reports/RequestReport', $data);
                // $back = $this->IncomeReport($data);
            }
        } elseif ($data['Subject'] == 3) {
            $data['report'] = $this->m_reports->OrderReport($data);
            if ($data['report'] == null) {
                echo "<script>";
                echo "alert(\"ไม่พบข้อมูลตามเงื่อนไขที่คุณเลือก\");";
                echo "</script>";
                $data['print'] = '0';
                $this->load->view('component/ReportsFilter', $data);
            } else {
                $data['print'] = '1';
                $this->load->view('component/ReportsFilter', $data);
                $this->load->view('Reports/OrderReport', $data);
                // $back = $this->IncomeReport($data);
            }
        }elseif ($data['Subject'] == 4) {
            $data['report'] = $this->m_reports->DeliveryReport($data);
            if ($data['report'] == null) {
                echo "<script>";
                echo "alert(\"ไม่พบข้อมูลตามเงื่อนไขที่คุณเลือก\");";
                echo "</script>";
                $data['print'] = '0';
                $this->load->view('component/ReportsFilter', $data);
            } else {
                $data['print'] = '1';
                $this->load->view('component/ReportsFilter', $data);
                $this->load->view('Reports/DeliveryReport', $data);
                // $back = $this->IncomeReport($data);
            }
        } elseif ($data['Subject'] == 5) {
            $data['report'] = $this->m_reports->OrderlistReport($data);
            if ($data['report'] == null) {
                echo "<script>";
                echo "alert(\"ไม่พบข้อมูลตามเงื่อนไขที่คุณเลือก\");";
                echo "</script>";
                $data['print'] = '0';
                $this->load->view('component/ReportsFilter', $data);
            } else {
                $data['print'] = '1';
                $this->load->view('component/ReportsFilter', $data);
                $this->load->view('Reports/OrderlistReport', $data);
                // $back = $this->IncomeReport($data);
            }
        }else {
            echo "<script>";
            echo "alert(\"ไม่พบข้อมูล\");";
            echo "setTimeout(function(){ window.location.href = 'http://localhost/pharmagood/index.php/ReportsController/ReportsPage';3000 }, 1);";
            echo "</script>";
        }
    }
    public function ReportsPage2()
    {
        $data['admin_list'] = $this->m_admin->Pharmacist();
        $data['product_type'] = $this->m_product_type->Type();
        $this->load->view('navbar_admin/navbar');
        $this->load->view('component/ReportsFilter', $data);
    }
   
}
