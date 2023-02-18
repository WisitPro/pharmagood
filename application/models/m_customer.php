<?php
class m_customer extends CI_Model
{
    public function construct()
    {
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
        $cus_pass = MD5($data['cus_pass']);
        $sql = "select * from tbl_customer where cus_user='$cus_user'
and cus_pass='$cus_pass'";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function Register($data)
    {
        $cus_id = $data['cus_id'];
        $cus_name = $data['cus_name'];
        $cus_phone = $data['cus_phone'];
        $cus_user = $data['cus_user'];
        $cus_pass = $data['cus_pass'];
        $Account = $this->GetUser($cus_user, $cus_id);
        if ($Account == false) {
            $sql = "INSERT INTO tbl_customer VALUES('$cus_id','$cus_name','$cus_phone','$cus_user',MD5('$cus_pass'))";
            $qr = $this->db->query($sql);
            return true;
        } elseif($Account == true) {
            return false;
        }
        else{
            return false;
        }

        // $cus_add=$data['cus_add'];

    }
    public function specf_cus($cus_id)
    {
        $sql = "select * from tbl_customer where cus_id='$cus_id'";
        $query = $this->db->query($sql, array($cus_id));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function GetUser($cus_user)
    {
        $sql = "select * from tbl_customer where cus_user = '$cus_user' ";
        $query = $this->db->query($sql, array($cus_user));
        if ($query->num_rows() <= 0) {
            $sql2 = "select * from tbl_admin where adm_user = '$cus_user'  ";
            $query2 = $this->db->query($sql2, array($cus_user));
            if ($query2->num_rows() <= 0) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }
}
