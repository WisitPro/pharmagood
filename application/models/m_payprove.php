<?php
class m_payprove extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        
        
    }
    public function payprove($pay)
    {
        
         $pay_id = $pay['pay_id'];
         $order_id = $pay['order_id'];
         $pay_slip = $pay['pay_slip'];
         
         $pay_datetime = $pay['pay_datetime'];
         $adm_id = $pay['adm_id'];
         $pay_modify = $pay['pay_modify'];
         $prove_status = $pay['prove_status'];
         
        
 
 
         $sql = "insert into tbl_payprove values('$pay_id','$order_id','$pay_slip','$pay_datetime','$adm_id','$pay_modify','$prove_status')";
         $qr = $this->db->query($sql);
         return true;
    }
    public function OrderRest()
    {
        
        $sql = "select distinct p.pay_id,p.order_id,o.order_total,c.cus_name,p.pay_slip,p.pay_datetime,p.prove_status from tbl_payprove p,tbl_admin a,tbl_customer c,tbl_order o where p.order_id = o.order_id 
        and o.cus_id = c.cus_id and p.prove_status = 'ชำระเงินแล้ว' order by p.pay_datetime asc";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    public function OrderVerified()
    {
        
        $sql = "select distinct p.pay_id,p.order_id,o.order_total,c.cus_name,p.pay_slip,
        p.pay_datetime,a.adm_name,p.pay_modify,p.prove_status from tbl_payprove p,tbl_admin a,tbl_customer c,
        tbl_order o where p.order_id = o.order_id 
        and o.cus_id = c.cus_id and p.adm_id = a.adm_id and p.prove_status = 'ยืนยันแล้ว' ;";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    
    public function OrderCancel()
    {
        
        $sql = "select p.pay_id,p.order_id,o.order_total,c.cus_name,p.pay_slip,p.pay_datetime,a.adm_name,p.pay_modify,p.prove_status from tbl_payprove p,tbl_admin a,tbl_customer c,tbl_order o where p.order_id = o.order_id 
        and o.cus_id = c.cus_id and p.adm_id = a.adm_id and p.prove_status = 'ยกเลิก';";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    public function verifying($data)
    {
        $pay_id = $data['pay_id'];
        $adm_id = $data['adm_id'];
        $pay_modify = $data['pay_modify'];

        $sql = "update tbl_payprove set prove_status = 'ยืนยันแล้ว',  pay_modify = '$pay_modify',adm_id = '$adm_id' where pay_id = '$pay_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function denying($data)
    {
        $pay_id = $data['pay_id'];
        $adm_id = $data['adm_id'];
        $pay_modify = $data['pay_modify'];

        $sql = "update tbl_payprove set prove_status = 'ยกเลิก', adm_id = '$adm_id', pay_modify = '$pay_modify' where pay_id = '$pay_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function DeliveryStatus($order_id)
    {
        $order_id =  $order_id;
       

        $sql = "update tbl_payprove set prove_status = 'จัดส่งแล้ว' where order_id = '$order_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    
   
    
    
    
    
}