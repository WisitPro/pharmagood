<?php
class m_admin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function admininfo()
    {
        $sql = "select * from tbl_admin where adm_role = 'เจ้าของกิจการ' or adm_role = 'เภสัชกร'";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    public function Pharmacist()
    {
        $sql = "select * from tbl_admin where adm_role = 'เภสัชกร'";

        $qr = $this->db->query($sql);

        return $qr->result();
    }


    public function login($data)
    {
        $adm_user = $data['adm_user'];
        $adm_pass = $data['adm_pass'];
        //$adm_pass = $data['adm_pass'];
        $sql = "SELECT * from tbl_admin where adm_user='$adm_user' and adm_pass= '$adm_pass' and adm_role !=''";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function GetUser($adm_user)
    {
       $sql = "select * from tbl_admin where adm_user = '$adm_user'";
        $query = $this->db->query($sql, array($adm_user));
        if ($query->num_rows() <= 0) {
            $sql2 = "select * from tbl_customer where cus_user = '$adm_user'";
            $query2 = $this->db->query($sql2, array($adm_user));
            if ($query2->num_rows() <= 0) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }
    
    public function Add($data)
    {
       
        $adm_name = $data['adm_name'];
        $adm_phone = $data['adm_phone'];
        $adm_user = $data['adm_user'];
        $adm_pass = $data['adm_pass'];
        $adm_role = $data['adm_role'];
        $Admin = $this->GetUser($adm_user,$adm_pass);
        if ($Admin == false) {
            $sql = "insert into tbl_admin values('','$adm_name','$adm_phone','$adm_user','$adm_pass','$adm_role')";
            $qr = $this->db->query($sql);
            return true;
        } else {
            return false;
        }
    }
    public function GetAdminById($adm_id)
    {
        $sql = "select * from tbl_admin where adm_id='$adm_id'";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function Update($data)
    {
        $adm_id = $data['adm_id'];
        $adm_name = $data['adm_name'];
        $adm_phone = $data['adm_phone'];
        $adm_user = $data['adm_user'];
        
        $adm_role = $data['adm_role'];
        $sql = "update tbl_admin set adm_name='$adm_name',adm_phone='$adm_phone',adm_user='$adm_user' ,adm_role='$adm_role' where adm_id='$adm_id'";
        $qr = $this->db->query($sql);
        return true;
       
        // $sql = "update tbl_admin set adm_name='$adm_name',adm_phone='$adm_phone',adm_user='$adm_user' ,adm_pass='$adm_pass',adm_role='$adm_role' where adm_id='$adm_id'";
        // $qr = $this->db->query($sql);
        // return true;
    }
    public function Keep($adm_id)
    {
        $sql = "UPDATE tbl_admin  set adm_role = NULL where adm_id='$adm_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function UpdateAdminPassword($data)
{
    $adm_id = $data['adm_id'];
    $adm_pass = $data['adm_pass'];
    
    $sql = "UPDATE tbl_admin SET adm_pass = '$adm_pass ' WHERE adm_id = '$adm_id'";
    $qr = $this->db->query($sql);
    return true;
}

}
