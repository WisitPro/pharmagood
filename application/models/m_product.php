<?php
class m_product extends CI_Model
{
    function __construct() {
        $this->proTable = 'tbl_product';
        
    }
    public function getRows($pro_id = '')
    {
        $this->db->select('*');
        $this->db->from($this->proTable);
        

        if ($pro_id) {
            $this->db->where('pro_id', $pro_id);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $this->db->order_by('pro_type', 'ASC');
            $query = $this->db->get();
            $result = $query->result_array();
        }

        // Return fetched data
        return !empty($result) ? $result : false;
    }
    public function Product()
    {
        $sql = "select * from tbl_product 
        ORDER BY CONVERT (pro_kind using tis620) ASC,pro_type ";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    public function Store()
    {
        $sql = "select * from tbl_product where 
        pro_kind='ยาทั่วไป' ORDER BY CONVERT (pro_type using tis620) ASC";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    public function Product_Add($data)
    {
        $pro_id = $data['pro_id'];
        $pro_img = $data['pro_img'];
        $pro_name = $data['pro_name'];
        $pro_type = $data['pro_type'];
        $pro_price = $data['pro_price'];
        $pro_kind = $data['pro_kind'];


        $sql = "insert into tbl_product values('$pro_id','$pro_img','$pro_name','$pro_type','$pro_price','$pro_kind')";
        $qr = $this->db->query($sql);
        return true;
    }
    public function Remove($pro_id)
    {
        $sql = "delete from tbl_product where pro_id='$pro_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function Edit($pro_id)
    {
        $sql = "select * from tbl_product where pro_id='$pro_id'";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function Update($data)
    {
        $pro_id = $data['pro_id'];
        $pro_img = $data['pro_img'];
        $pro_name = $data['pro_name'];
        $pro_type = $data['pro_type'];
        $pro_price = $data['pro_price'];
        $pro_kind = $data['pro_kind'];
        $sql = "update tbl_product set pro_img='$pro_img',
        pro_name='$pro_name' ,
        pro_type='$pro_type' ,
        pro_price='$pro_price' ,
        pro_kind='$pro_kind'
        where pro_id='$pro_id'";
        $qr = $this->db->query($sql);
        return true;
    }
}
