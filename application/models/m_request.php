<?php
class m_request extends CI_Model{
public function __construct(){
parent::__construct();
}
public function cus_req($data)
    {
        $req_id=$data['req_id'];
        $cus_id=$data['cus_id'];
        $req_sym=$data['req_sym'];
        $req_time=$data['req_time'];
        $req_status=$data['req_status'];
        $sql = "insert into tbl_request values('$req_id','$cus_id','$req_sym','$req_time','$req_status')";
        $qr = $this->db->query($sql);
        return true;
    }
    public function cur_req($data){
        $cus_id=$data['cus_id'];
        $sql = "select * from tbl_request where req_status='รอยืนยันการขอคำปรึกษาจากเภสัชกร' and cus_id='$cus_id' ";
        $qr = $this->db->query($sql);
        return $qr->result();
    }


    
   
}
