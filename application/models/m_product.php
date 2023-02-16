<?php
class m_product extends CI_Model
{
    function __construct()
    {
        $this->proTable = 'tbl_product';
        $this->typeTable = 'tbl_product_type';
    }
    // public function getRows($pro_id = '')
    // {
    //     $this->db->select('*');
    //     $this->db->from($this->proTable);


    //     if ($pro_id) {
    //         $this->db->where('pro_id', $pro_id);
    //         $query = $this->db->get();
    //         $result = $query->row_array();
    //     } else {
    //         $this->db->order_by('type_id', 'ASC');
    //         $query = $this->db->get();
    //         $result = $query->result_array();
    //     }

    //     // Return fetched data
    //     return !empty($result) ? $result : false;
    // }
    public function getRows($pro_id = '')
    {

        if ($pro_id) {
            $sql = "select * from tbl_product p,tbl_product_type t where p.type_id = t.type_id and p.pro_id = '$pro_id';";
            $qr = $this->db->query($sql);
            $result = $qr->row_array();
        } else {
            $sql = "select * from tbl_product p,tbl_product_type t where p.type_id = t.type_id and p.pro_kind !='ยาควบคุมพิเศษ' order by t.type_id asc ;";
            $qr = $this->db->query($sql);
            $result = $qr->result_array();
        }

        // Return fetched data
        return !empty($result) ? $result : false;
    }
    public function Product()
    {
        $sql = "select * from tbl_product p,tbl_product_type t where p.type_id = t.type_id
        ORDER BY t.type_id ASC ";

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
    public function Pharmacy($pro_id = '')
    {
        $this->db->select('*');
        $this->db->from($this->proTable);


        if ($pro_id) {
            $sql = "select * from tbl_product p,tbl_product_type t where p.type_id = t.type_id and p.pro_id = '$pro_id';";
            $qr = $this->db->query($sql);
            $result = $qr->row_array();
        } else {
            $sql = "select * from tbl_product p,tbl_product_type t where p.type_id = t.type_id order by t.type_id asc ;";
            $qr = $this->db->query($sql);
            $result = $qr->result_array();
        }

        // Return fetched data
        return !empty($result) ? $result : false;
    }
    public function Product_Add($data)
    {
        $pro_id = $data['pro_id'];
        $pro_img = $data['pro_img'];
        $pro_name = $data['pro_name'];
        $type_id = $data['type_id'];
        $pro_price = $data['pro_price'];
        $pro_kind = $data['pro_kind'];
        $pro_limit = $data['pro_limit'];
        $existing_product = $this->Pharmacy($pro_id);
        if ($existing_product) {
            // Return an error message or take appropriate action
            return false;
        } else {



            $sql = "insert into tbl_product values('$pro_id','$pro_img','$pro_name','$type_id','$pro_price','$pro_kind','$pro_limit')";
            $qr = $this->db->query($sql);
            return true;
        }
    }
    public function Remove($pro_id)
    {
        $sql = "delete from tbl_product where pro_id='$pro_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function Edit($pro_id)
    {
        $pro_id = $pro_id;
        $sql = "select * from tbl_product p,tbl_product_type t where p.type_id = t.type_id and p.pro_id = '$pro_id'
        ORDER BY t.type_id asc ";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function Update($data)
    {
        $pro_id = $data['pro_id'];
        $pro_img = $data['pro_img'];
        $pro_name = $data['pro_name'];
        $type_id = $data['type_id'];
        $pro_kind = $data['pro_kind'];
        $pro_price = $data['pro_price'];
        $pro_limit = $data['pro_limit'];
        $sql = "update tbl_product set pro_img='$pro_img',
        pro_name='$pro_name' ,
        type_id='$type_id' ,
        pro_kind='$pro_kind',
        pro_price='$pro_price',
        pro_limit='$pro_limit'
        where pro_id='$pro_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    function getDrugBySearch($pro_name)
    {
        if (empty($pro_name))
            return null;

        $sql = "SELECT * FROM tbl_product pd
        JOIN tbl_product_type t ON pd.type_id = t.type_id
        WHERE pd.pro_name LIKE ? OR t.type_name LIKE ? AND pd.pro_kind !='ยาควบคุมพิเศษ'
        ORDER BY pd.pro_name DESC";

        $qr = $this->db->query($sql, array('%' . $pro_name . '%', '%' . $pro_name . '%'));

        return $qr->result();
    }
}
