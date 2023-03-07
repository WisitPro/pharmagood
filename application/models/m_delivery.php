<?php
class m_delivery extends CI_Model
{
    function __construct()
    {
    }

    public function InsertDelivery($data)
    {
        $order_id = $data['order_id'];
        $delivery_service = $data['delivery_service'];
        $delivery_tracking = $data['delivery_tracking'];
        $adm_id = $data['adm_id'];
        $delivery_datetime = $data['delivery_datetime'];




        $sql = "insert into tbl_delivery values('$order_id','$delivery_service','$delivery_tracking','$adm_id','$delivery_datetime')";
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
    public function DeliveryOrder()
    {


        $sql = "select * from tbl_delivery dl,tbl_order o,tbl_admin a,tbl_customer c,tbl_payprove p 
        where dl.order_id=o.order_id and dl.adm_id = a.adm_id and o.cus_id=c.cus_id and p.order_id = o.order_id order by dl.delivery_datetime DESC ; ";


        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function DeliveryExists($order_id)
    {
        $sql = "select * from tbl_delivery where order_id ='$order_id'; ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
       
    }
    public function OrderSuccess($data)
    {
        $order_id = $data['order_id'];
       

        $sql = "update tbl_delivery set delivery_status = 'จัดส่งเรียบร้อย' where order_id = '$order_id'";
        $qr = $this->db->query($sql);
        return true;
    }
}
