<?php
class m_customer extends CI_Model{
public function construct(){
parent::__construct();
}
public function cusinfo()
    {
        $sql = "select * from tbl_customer";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    public function login($data)
    {
        $cus_user = $data['cus_user'];
        $cus_pass = $data['cus_pass'];
        $sql = "select * from tbl_customer where cus_user='$cus_user'
and cus_pass='$cus_pass'";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function insert($data){
        $cus_id=$data['cus_id'];
        $cus_name=$data['cus_name'];
        $cus_phone=$data['cus_phone'];
        $cus_user=$data['cus_user'];
        $cus_pass=$data['cus_pass'];
        
        $cus_add=$data['cus_add'];
        $sql = "insert into tbl_customer values('$cus_id','$cus_name','$cus_phone','$cus_user','$cus_pass','$cus_add')";
        $qr = $this->db->query($sql);
        return true;
    }
    public function specf_cus($cus_id)
    {
        $sql = "select cus_name,cus_phone from tbl_customer where cus_id='$cus_id'";

        $qr = $this->db->query($sql);

        return $qr->result();
    }


}
