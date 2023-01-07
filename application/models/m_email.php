<?php
class m_email extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function all()
    {
        $sql = "select * from emails";

        $qr = $this->db->query($sql);

        return $qr->result();
    }
    public function insert_email($data)
    {
        $email = $data['email'];
        $tag = $data['tag'];
        $note = $data['note'];


        $sql = "insert into emails values('$email','$tag','$note')";
        $qr = $this->db->query($sql);
        return true;
    }
    function delete($email)
    {
        $this->db->where('email', $email);
        $this->db->delete('emails');
    }
    public function edit($email){
        $sql = "select * from emails where email='$email'";
        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function update($data){
        $email = $data['email'];
        $tag = $data['tag'];
        $note = $data['note'];
        $sql = "update emails set tag='$tag',
        note='$note' 
        where email='$email'";
        $qr = $this->db->query($sql);
        return true;

    }
}
?>