<?php
class m_information extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        
        
    }
     
    public function BankInPayment()
    {
        
        $sql = "select * from tbl_information where key_1 = 'ธนาคาร' ;";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    
    
    
}
