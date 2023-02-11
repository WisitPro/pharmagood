<?php
class m_request extends CI_Model{
public function __construct(){
parent::__construct();
}
public function cus_req($data)
    {
        $req_id=$data['req_id'];
        $cus_id=$data['cus_id'];
        $cus_phone=$data['cus_phone'];
        $req_sym=$data['req_sym'];
        $req_time=$data['req_time'];
        $req_status=$data['req_status'];
        $sql = "insert into tbl_request values('$req_id','$cus_id','$cus_phone','$req_sym','$req_time','$req_status')";
        $qr = $this->db->query($sql);
        return true;
    }
    public function cur_req($data){
        $cus_id = $data['cus_id'];
        $req_id = $data['rq_id'];
        $sql = "select r.req_id,r.cus_id,c.cus_name,r.cus_phone,r.req_sym,r.req_time,r.req_status 
        from tbl_request r,tbl_customer c where r.req_id = '$req_id'
        and c.cus_id ='$cus_id' and r.cus_id ='$cus_id'  order by r.req_time desc;" ;
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
    public function List_req1(){
       
        $sql = "select r.req_id,c.cus_name,r.cus_phone,r.req_sym,r.req_time,r.req_status 
        from tbl_request r,tbl_customer c where r.cus_id = c.cus_id and r.req_status = 'รอยืนยัน' order by r.req_time desc;  ";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function List_req2(){
       
        $sql = "select r.req_id,c.cus_name,r.cus_phone,r.req_sym,r.req_time,r.req_status 
        from tbl_request r,tbl_customer c where r.cus_id = c.cus_id and r.req_status = 'ยืนยันแล้ว' order by r.req_time asc;  ";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function List_req3(){
       
        $sql = "select r.req_id,c.cus_name,r.cus_phone,r.req_sym,r.req_time,r.req_status 
        from tbl_request r,tbl_customer c where r.cus_id = c.cus_id and r.req_status = 'ยกเลิก' order by r.req_time desc;  ";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function List_req4(){
       
        $sql = "select r.req_id,c.cus_name,c.cus_phone,r.req_sym,r.req_time,r.req_status 
        from tbl_request r,tbl_customer c where r.cus_id = c.cus_id 
        and r.req_status = 'วิดีโอคอล' or r.req_status = 'เสร็จสิ้น' order by r.req_time desc;  ";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function verify($req_id)
    {

        $sql = "update tbl_request set req_status = 'ยืนยันแล้ว' where req_id = '$req_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function DenyRQ($req_id)
    {  

        $sql = "update tbl_request set req_status = 'ยกเลิก' where req_id = '$req_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function SuccessRQ($req_id)
    {  

        $sql = "update tbl_request set req_status = 'เสร็จสิ้น' where req_id = '$req_id'";
        $qr = $this->db->query($sql);
        return true;
    }
    public function videocall($req_id)
    {
        
        $sql = "update tbl_request set req_status = 'วิดีโอคอล' where req_id = '$req_id'";
        $qr = $this->db->query($sql);
        return true;
    }

    public function RqDetail($req_id)
    {
        
        $sql = "select * from tbl_request r,tbl_customer c where r.req_id = '$req_id' and r.cus_id = c.cus_id";
        $qr = $this->db->query($sql);
        return $qr->result();
    }


    
   
}
