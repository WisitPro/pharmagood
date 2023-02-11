<?php
class m_admin extends CI_Model{
public function __construct(){
parent::__construct();
}
public function admininfo()
    {
        $sql = "select * from tbl_admin";

        $qr = $this->db->query($sql);

        return $qr->result();
    }

public function login($data)
    {
        $adm_user = $data['adm_user'];
        $adm_pass = MD5($data['adm_pass']);
        $sql = "select * from tbl_admin where adm_user='$adm_user'and adm_pass='$adm_pass'";
        $qr = $this->db->query($sql);
        return $qr->result();

    }
    public function Add($data){
        $adm_id=$data['adm_id'];
        $adm_name=$data['adm_name'];
        $adm_phone=$data['adm_phone'];
        $adm_user=$data['adm_user'];
        $adm_pass=$data['adm_pass'];
        $adm_role=$data['adm_role'];
        $sql = "insert into tbl_admin values('$adm_id','$adm_name','$adm_phone','$adm_user',MD5('$adm_pass'),'$adm_role')";
        $qr = $this->db->query($sql);
        return true;
    }
    public function Edit($adm_id){
        $sql = "select * from tbl_admin where adm_id='$adm_id'";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function Update($data){
        $adm_id=$data['adm_id'];
        $adm_name=$data['adm_name'];
        $adm_phone=$data['adm_phone'];
        $adm_user=$data['adm_user'];
        $adm_pass=$data['adm_pass'];
        $adm_role=$data['adm_role'];
        $sql = "update tbl_admin set adm_name='$adm_name',adm_phone='$adm_phone',adm_user='$adm_user' ,adm_pass='$adm_pass',adm_role='$adm_role' where adm_id='$adm_id'";
        $qr = $this->db->query($sql);
        return true;

    }
    public function Remove($adm_id){
        $sql = "delete from tbl_admin where adm_id='$adm_id'";
        $qr = $this->db->query($sql);
        return true;
    }


}
