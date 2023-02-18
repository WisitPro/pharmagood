<?php
class m_product_type extends CI_Model
{
    function __construct()
    {
        $this->proTable = 'tbl_product';
    }

    public function Type()
    {
        $sql = "select * from tbl_product_type order by type_id asc ";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    public function TypeForEdit($type_id)
    {
        $type_id = $type_id;

        $sql = "select  * from tbl_product_type where type_id !='$type_id' order by type_id asc ";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
}
