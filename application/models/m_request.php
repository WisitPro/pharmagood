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
        $sql = "select c.cus_name,c.cus_phone,r.req_sym,r.req_time,r.req_status 
        from tbl_request r,tbl_customer c where r.req_status!='เสร็จสิ้น' and r.req_status!='ยกเลิก'
        and c.cus_id ='$cus_id' and r.cus_id = c.cus_id order by r.req_time desc;" ;
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function cancel($data)
    {
        $rq_id = $data['rq_id'];

        $sql = "update tbl_request set req_status = 'ยกเลิก' where req_id = '$rq_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function list_req1(){
       
        $sql = "select r.req_id,c.cus_name,c.cus_phone,r.req_sym,r.req_time,r.req_status 
        from tbl_request r,tbl_customer c where r.cus_id = c.cus_id and r.req_status = 'รอยืนยัน' order by r.req_time desc;  ";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function list_req2(){
       
        $sql = "select r.req_id,c.cus_name,c.cus_phone,r.req_sym,r.req_time,r.req_status 
        from tbl_request r,tbl_customer c where r.cus_id = c.cus_id and r.req_status = 'ยืนยันแล้ว' order by r.req_time asc;  ";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function list_req3(){
       
        $sql = "select r.req_id,c.cus_name,c.cus_phone,r.req_sym,r.req_time,r.req_status 
        from tbl_request r,tbl_customer c where r.cus_id = c.cus_id and r.req_status = 'ยกเลิก' order by r.req_time desc;  ";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function verify($req_id)
    {
        $req_id = $req_id;

        $sql = "update tbl_request set req_status = 'ยืนยันแล้ว' where req_id = '$req_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function DenyRQ($req_id)
    {
        $req_id = $req_id;

        $sql = "update tbl_request set req_status = 'ยกเลิก' where req_id = '$req_id'";
        $qr = $this->db->query($sql);
        return true;
    }


    
   
}
