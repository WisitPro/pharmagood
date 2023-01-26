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
         $adm_id = $data['adm_id'];
         $prove_status = $data['prove_status'];
         
        
 
 
         $sql = "insert into tbl_payprove values('$pay_id','$order_id','$pay_slip','$adm_id','$prove_status')";
         $qr = $this->db->query($sql);
         return true;
    }
    
    
}
