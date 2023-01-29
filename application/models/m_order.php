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
    public function cancel($data)
    {
        $order_id = $data['order_id'];

        $sql = "update tbl_order set order_status = 'ยกเลิก' where order_id = '$order_id'";
        $qr = $this->db->query($sql);
        return true;
    }

    public function remove($data)
    {
        $order_id = $data['order_id'];

        $sql = "delete from tbl_orderlist where order_id = '$order_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function OrderHistory($data)
    {
        $cus_id = $data["cus_id"];
        $sql = "select o.order_id,o.order_datetime,p.pro_name,p.pro_price,l.qty,l.sub_total 
        from tbl_product p,tbl_orderlist l,tbl_order o where l.pro_id = p.pro_id and o.order_id = l.order_id 
        and o.cus_id ='$cus_id' and o.order_status ='ชำระเงินแล้ว' order by o.order_datetime DESC";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    
    
    
}
?>
