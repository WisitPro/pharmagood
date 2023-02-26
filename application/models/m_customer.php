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
        $cus_user = $data['cus_user'];
        $cus_pass = $data['cus_pass'];
        $cus_name = $data['cus_name'];
        $cus_phone = $data['cus_phone'];
        $cus_age = $data['cus_age'];
        $cus_height = $data['cus_height'];
        $cus_weight = $data['cus_weight'];
        $cus_gender = $data['cus_gender'];
        $Account = $this->GetUser($cus_user);
        if ($Account == false) {
            $sql = "INSERT INTO tbl_customer VALUES('','$cus_user',
            MD5('$cus_pass'),'$cus_name','$cus_phone','$cus_age', '$cus_height','$cus_weight','$cus_gender')";
            $qr = $this->db->query($sql);
            return true;
        } elseif ($Account == true) {
            return false;
        } else {
            return false;
        }

        // $cus_add=$data['cus_add'];

    }
    public function specf_cus($cus_id)
    {
        $sql = "select * from tbl_customer where cus_id='$cus_id'";
        $query = $this->db->query($sql);

        return $query->result();
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
    public function UpdateByRequest($data)
    {
        $cus_id = $data['cus_id'];
        $cus_phone = $data['cus_phone'];
        $cus_age = $data['cus_age'];
        $cus_height = $data['cus_height'];
        $cus_weight = $data['cus_weight'];
        $sql = "update tbl_customer set cus_phone ='$cus_phone',cus_age='$cus_age',cus_weight = '$cus_weight',
        cus_height ='$cus_height' where cus_id =' $cus_id';";
        $qr = $this->db->query($sql);
        return true;

        // $cus_add=$data['cus_add'];

    }
}
