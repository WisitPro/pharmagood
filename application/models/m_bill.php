<?php
class m_bill extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        
        
    }
    public function import($data)
    {
        
         $bill_no = $data['pay_id'];
         $pay_id = $data['pay_id'];
         $bill_date = $data['pay_modify'];
         
 
         $sql = "insert into tbl_bills values('$bill_no','$pay_id','$bill_date')";
         $qr = $this->db->query($sql);
         return true;
    }
    
    public function OrderDetail($pay_id)
    {
        $pay_id = $pay_id;
        
        // $sql = "select * from tbl_payprove p,tbl_admin a,tbl_customer c,tbl_order o,tbl_orderlist ol,tbl_product pd,tbl_bills b  where p.pay_id = '$pay_id' and p.order_id = o.order_id 
        // and o.cus_id = c.cus_id and o.order_id = ol.order_id and ol.pro_id = pd.pro_id and p.pay_id = b.bill_no ";
        $sql = "select * from tbl_payprove pp,tbl_order o,tbl_orderlist ol,tbl_customer c,tbl_product p,tbl_bills b 
        where pp.pay_id = '$pay_id'and pp.order_id=o.order_id and o.order_id = ol.order_id and o.cus_id = c.cus_id and ol.pro_id = p.pro_id and b.pay_id = pp.pay_id; ";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    
    
    
}
