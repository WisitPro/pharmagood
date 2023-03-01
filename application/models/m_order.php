<?php
class m_order extends CI_Model
{
    function __construct()
    {
        $this->ol_table = 'tbl_orderlist';
    }

    // public function insert($data)
    // {

    //     $cus_id = $data['cus_id'];
    //     $order_datetime = $data['order_datetime'];
    //     $order_total = $data['order_total'];
    //     $order_address = $data['order_address'];
    //     $order_phone = $data['order_phone'];

    //     $sql = "INSERT INTO tbl_order (order_id, cus_id, order_datetime, order_total, order_address, order_phone, order_status) 
    //     VALUES (NULL, '$cus_id', '$order_datetime', '$order_total', '$order_address', '$order_phone', 'ยังไม่ชำระเงิน')";

    //     $qr = $this->db->query($sql);
    //     if (!$qr) {
    //         $error = $this->db->error();
    //         echo "Database error: " . $error['message'];
    //         return null;
    //     } else {

    //         return $qr;
    //     }
    // }
    public function insert($data)
    {
        $cus_id = $data['cus_id'];
        $order_datetime = $data['order_datetime'];
        $order_total = $data['order_total'];
        $order_address = $data['order_address'];
        $order_phone = $data['order_phone'];

        $sql = "INSERT INTO tbl_order (order_id, cus_id, order_datetime, order_total, order_address, order_phone,order_type, order_status) 
            VALUES (NULL, '$cus_id', '$order_datetime', '$order_total', '$order_address', '$order_phone',1,'ยังไม่ชำระเงิน')";

        $this->db->query($sql);

        if ($this->db->affected_rows() == 1) {
            $insert_id = $this->db->insert_id();
            $result = $this->db->get_where('tbl_order', array('order_id' => $insert_id))->row_array();
            return $result;
        } else {
            return null;
        }
    }
    public function InsertAfterCall($data)
    {
        $cus_id = $data['cus_id'];
        $order_datetime = $data['date'];
        $order_total = $data['total'];
       

        $sql = "INSERT INTO tbl_order VALUES (NULL, '$cus_id', '$order_datetime', '$order_total', '', '',2, 'ยังไม่ชำระเงิน')";

        $this->db->query($sql);

        if ($this->db->affected_rows() == 1) {
            $insert_id = $this->db->insert_id();
            $result = $this->db->get_where('tbl_order', array('order_id' => $insert_id))->row_array();
            return $result;
        } else {
            return null;
        }
    }

    public function insertOrderItems($data = array())
    {
        // Insert order items
        $insert = $this->db->insert_batch($this->ol_table, $data);

        // Return the status
        return $insert ? true : false;
    }
    public function update($data)
    {
        $order_id = $data['order_id'];
        $order_address = $data['order_address'];
        $order_phone = $data['order_phone'];

        $sql = "update tbl_order set order_status = 'ชำระเงินแล้ว',order_address ='$order_address'
        ,order_phone='$order_phone' where order_id = '$order_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function cancel($order_id)
    {

        $sql = "update tbl_order set order_status = 'ยกเลิก' where order_id = '$order_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function verifying($order)
    {
       $order_id = $order;
        $sql = "update tbl_order set order_status = 'ยืนยันแล้ว' where order_id = '$order_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function getOrderIdByPayId($pay_id) {
        $sql = "SELECT order_id FROM tbl_payprove WHERE pay_id = '$pay_id'";
        $qr = $this->db->query($sql, array($pay_id));
        $result = $qr->row();
    
        if ($result) {
            return $result->order_id;
        } else {
            return false;
        }
    }
    public function delivery($data)
    {
        $order_id = $data['order_id'];

        $sql = "update tbl_order set order_status = 'จัดส่งแล้ว' where order_id = '$order_id'";
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
        $sql = "select * from tbl_order o,tbl_payprove pp,tbl_orderlist ol,tbl_product p
        where o.order_status!='ยังไม่ชำระเงิน' and o.cus_id='$cus_id' and o.order_id = ol.order_id and o.order_id = pp.order_id and ol.pro_id = p.pro_id
       
        order by o.order_status DESC,o.order_datetime DESC";

        $qr = $this->db->query($sql);
        $result = $qr->result();
        $grouped_result = array();

        foreach ($result as $item) {
            $grouped_result[$item->order_id][] = $item;
        }

        return $grouped_result;
    }
    public function ListMyOrder()
    {
        $cus_id = $this->session->userdata('cus_id');
        $sql = "select * from tbl_order o,tbl_orderlist ol,tbl_product p
        where o.order_status = 'ยังไม่ชำระเงิน' and o.order_status != 'ยกเลิก' and o.cus_id='$cus_id' and o.order_id = ol.order_id and ol.pro_id = p.pro_id
       
        order by o.order_status DESC,o.order_datetime ASC";

        $qr = $this->db->query($sql);
        $result = $qr->result();
        $grouped_result = array();

        foreach ($result as $item) {
            $grouped_result[$item->order_id][] = $item;
        }

        return $grouped_result;
    }
    public function GetOrderById($order_id)
    {
        $sql = "SELECT * FROM tbl_order o,tbl_orderlist ol,tbl_product p
        WHERE o.order_id = '$order_id' AND o.order_id = ol.order_id AND ol.pro_id = p.pro_id";

        $qr = $this->db->query($sql);
        return $qr->result();
    }
    // public function GetOrderById($order_id)
    // {     
    //     $sql = "SELECT * FROM tbl_order o,tbl_orderlist ol,tbl_product p
    //     WHERE o.order_id = '$order_id' AND o.order_id = ol.order_id AND ol.pro_id = p.pro_id";

    //     $qr = $this->db->query($sql);
    //     $result = $qr->result();
    //     $grouped_result = array();

    //     foreach ($result as $item) {
    //         $grouped_result[$item->order_id][] = $item;
    //     }

    //     return $grouped_result;
    // }
    // public function OrderListHistory($data)
    // {
    //     $cus_id = $data["cus_id"];
    //     $sql = "select * from tbl_order o,tbl_orderlist ol,tbl_product p 
    //     where o.order_status!='ยังไม่ชำระเงิน' and o.cus_id='$cus_id' and o.order_id = ol.order_id and ol.pro_id = p.pro_id;";

    //     $qr = $this->db->query($sql);

    //     return $qr->result();
    // }



    public function OrderDelivery()
    {

        $sql = "select distinct p.pay_id,p.order_id,o.order_total,c.cus_name,p.pay_slip,p.pay_datetime,p.prove_status from tbl_payprove p,tbl_admin a,tbl_customer c,tbl_order o where p.order_id = o.order_id 
        and o.cus_id = c.cus_id and o.order_status = 'จัดส่งแล้ว' order by p.pay_datetime asc";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    public function OrderDetail($pay_id)
    {
        $pay_id = $pay_id;

        $sql = "select * from tbl_payprove pp,tbl_order o,tbl_orderlist ol,tbl_customer c,tbl_product p
        where pp.pay_id = '$pay_id' and pp.order_id = o.order_id and pp.order_id = ol.order_id and o.cus_id = c.cus_id and p.pro_id = ol.pro_id; ";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    public function OrderSuccess($data)
    {
        $order_id = $data['order_id'];
        $sql = "update tbl_order set order_status = 'จัดส่งเรียบร้อย' where order_id = '$order_id'";
        
        $qr = $this->db->query($sql);
        return true;
    }
    public function OrderAddress($data)
    {
        $order_id = $data['order_id'];
        $order_phone = $data['order_phone'];
        $order_address = $data['order_address'];
        $sql = "update tbl_order set order_phone = '$order_phone',order_address = '$order_address' where order_id = '$order_id'";
        
        $qr = $this->db->query($sql);
        return $order_id;
    }
    
   
}
