<?php
class m_order extends CI_Model
{
    function __construct() {
        $this->ol_table = 'tbl_orderlist';
        $this->ord_table = 'tbl_oder';
        $this->cus_table = 'tbl_customer';
        $this->pay_table = 'tbl_payprove';
        
    }
   
    public function insert($data)
    {
        $order_id = $data['order_id'];
        $cus_id = $data['cus_id'];
        $order_datetime = $data['order_datetime'];
        $order_total = $data['order_total'];
        $order_status = $data['order_status'];
       


        $sql = "insert into tbl_order values('$order_id','$cus_id','$order_datetime','$order_total','$order_status')";
        $qr = $this->db->query($sql);
        return true;
    }
    public function insertOrderItems($data = array())
    {
         // Insert order items
         $insert = $this->db->insert_batch($this->ol_table, $data);

         // Return the status
         return $insert?true:false;
    }
    public function update($data)
    {
        $order_id = $data['order_id'];

        $sql = "update tbl_order set order_status = 'ชำระเงินแล้ว' where order_id = '$order_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function payprove($data)
    {
         // Insert order items
         $pay_id = $data['pay_id'];
         $order_id = $data['order_id'];
         $pay_slip = $data['pay_slip'];
         $adm_id = $data['adm_id'];
         $prove_status = $data['prove_status'];
         
        
 
 
         $sql = "insert into tbl_payprove values('$pay_id','$order_id','$pay_slip','$adm_id','$prove_status')";
         $qr = $this->db->query($sql);
         return true;
    }
    
    
    
}
?>
