<?php
class m_request extends CI_Model{
public function __construct(){
parent::__construct();
}
public function cus_req($data)
{
    
    $cus_id = $data['cus_id'];
    $req_sym = $data['req_sym'];
    $req_time = $data['req_time'];
    $req_status = $data['req_status'];
    
    $checkTime = $this->Time($req_time);
    if ($checkTime == true) {
        return null;
    } else {
        $sql = "INSERT INTO tbl_request VALUES('', '$cus_id', '$req_sym', '$req_time', null, null, null, '$req_status')";
        $qr = $this->db->query($sql);
        if ($qr) {
            $req_id = $this->db->insert_id();
            return $req_id;
        } else {
            return null;
        }
    }
}


public function Time($req_time){
       
    $sql = "SELECT * FROM tbl_request WHERE req_time = '$req_time'";
    $qr = $this->db->query($sql);
    if ($qr->num_rows() > 0) {
        $row = $qr->row();
        return $row->req_id; // return the existing req_id
    }
        
    $start_time = strtotime($req_time) - 1800; 
    $end_time = strtotime($req_time) + 1800; 
    $start_time = date('Y-m-d H:i:s', $start_time);
    $end_time = date('Y-m-d H:i:s', $end_time);
        
    $sql = "SELECT * FROM tbl_request WHERE req_time BETWEEN '$start_time' AND '$end_time'";
    $qr = $this->db->query($sql);
    if ($qr->num_rows() > 0) {
        $row = $qr->row();
        return $row->req_id; // return the existing req_id
    }
        
    return false;
}

    
    public function cur_req($data){
        $cus_id = $data['cus_id'];
        $req_id = $data['rq_id'];
        $sql = "select *
        from tbl_request r,tbl_customer c where r.req_id = '$req_id'
        and c.cus_id ='$cus_id' and r.cus_id ='$cus_id'  order by r.req_time desc;" ;
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function cancel($data)
    {
        $rq_id = $data['rq_id'];
        $req_modify = $data['req_modify'];


        $sql = "update tbl_request set req_status = 'ยกเลิก', req_modify = '$req_modify' where req_id = '$rq_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function List_req1(){
       
        $sql = "select * 
        from tbl_request r,tbl_customer c where r.cus_id = c.cus_id and r.req_status = 'รอยืนยัน' order by r.req_time desc;  ";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function List_req2(){
       
        $sql = "select *
        from tbl_request r,tbl_customer c where r.cus_id = c.cus_id and r.req_status = 'ยืนยันแล้ว' order by r.req_time asc;  ";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function List_req3(){
       
        $sql = "select * from tbl_request r INNER join tbl_customer c on r.cus_id = c.cus_id
        where r.req_status = 'ยกเลิก' order by r.req_time desc;  ";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function List_req4(){
       
        $sql = "select * from tbl_request r INNER join tbl_customer c on r.cus_id = c.cus_id join tbl_admin a on r.adm_id = a.adm_id 
        where r.req_status = 'เสร็จสิ้น' or r.req_status ='วิดีโอคอล' order by r.req_status asc,r.req_modify desc;  ";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function verify($data)
    {
        $req_id = $data['req_id'];
        $adm_id = $data['adm_id'];
        $req_modify = $data['req_modify'];
        $sql = "update tbl_request set req_status = 'ยืนยันแล้ว',adm_id = '$adm_id',req_modify='$req_modify' where req_id = '$req_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function DenyRQ($data)
    {  
        $req_id = $data['req_id'];
        $adm_id = $data['adm_id'];
        $req_modify = $data['req_modify'];

        $sql = "update tbl_request set req_status = 'ยกเลิก',adm_id = '$adm_id',req_modify='$req_modify' where req_id = '$req_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function SuccessRQ($data)
    {  
        $req_id = $data['req_id'];
        $adm_id = $data['adm_id'];
        $req_modify = $data['req_modify'];

        $sql = "update tbl_request set req_status = 'เสร็จสิ้น',adm_id = '$adm_id',req_modify='$req_modify' where req_id = '$req_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function videocall($data)
    {
        $req_id = $data['req_id'];
        $adm_id = $data['adm_id'];
        $req_modify = $data['req_modify'];
        
        $sql = "update tbl_request set req_status = 'วิดีโอคอล',adm_id = '$adm_id',req_modify='$req_modify' where req_id = '$req_id'";
        $qr = $this->db->query($sql);
        return true;
    }

    public function RqDetail($req_id)
    {
        
        $sql = "select * from tbl_request r,tbl_customer c where r.req_id = '$req_id' and r.cus_id = c.cus_id";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function History($cus_id)
    {
        $cus_id = $cus_id;
        $sql = "select * from tbl_request where cus_id ='$cus_id' and req_status ='เสร็จสิ้น' or req_status = 'ยกเลิก'  order by req_modify desc;";
        $qr = $this->db->query($sql);
        return $qr->result();
    }


    
   
}
