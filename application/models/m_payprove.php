<?php
class m_payprove extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        
        
    }
    public function payprove($data)
    {
        
         $pay_id = $data['pay_id'];
         $order_id = $data['order_id'];
         $pay_slip = $data['pay_slip'];
         $pay_datetime = $data['pay_datetime'];
         $adm_id = $data['adm_id'];
         $pay_modify = $data['pay_modify'];
         $prove_status = $data['prove_status'];
         
        
 
 
         $sql = "insert into tbl_payprove values('$pay_id','$order_id','$pay_slip','$pay_datetime','$adm_id','$pay_modify','$prove_status')";
         $qr = $this->db->query($sql);
         return true;
    }
    public function OrderRest()
    {
        
        $sql = "select p.pay_id,p.order_id,c.cus_name,p.pay_slip,p.pay_datetime,p.prove_status from tbl_payprove p,tbl_admin a,tbl_customer c,tbl_order o where p.order_id = o.order_id 
        and o.cus_id = c.cus_id and p.prove_status = 'ชำระเงินแล้ว';";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    public function OrderVerified()
    {
        
        $sql = "select p.pay_id,p.order_id,c.cus_name,p.pay_slip,p.pay_datetime,a.adm_name,p.pay_modify,p.prove_status from tbl_payprove p,tbl_admin a,tbl_customer c,tbl_order o where p.order_id = o.order_id 
        and o.cus_id = c.cus_id and p.prove_status = 'ยืนยันแล้ว';";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    public function OrderCancel()
    {
        
        $sql = "select p.pay_id,p.order_id,c.cus_name,p.pay_slip,p.pay_datetime,a.adm_name,p.pay_modify,p.prove_status from tbl_payprove p,tbl_admin a,tbl_customer c,tbl_order o where p.order_id = o.order_id 
        and o.cus_id = c.cus_id and p.prove_status = 'ยกเลิก';";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    public function verifying($data)
    {
        $pay_id = $data['pay_id'];
        $adm_id = $data['adm_id'];
        $pay_modify = $data['pay_modify'];

        $sql = "update tbl_payprove set prove_status = 'ยืนยันแล้ว', adm_id = '$adm_id', pay_modify = '$pay_modify' where pay_id = '$pay_id'";
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
    
    
    
}
