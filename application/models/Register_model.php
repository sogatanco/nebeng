<?php
class Register_model extends CI_Model
{  
    public function cekUser($email){
        $this->db->get_where('user',['us_email'=>$email]);
        return $this->db->affected_rows();
    }

    public function addUser($data){
        $this->db->insert('user',$data);
        return $this->db->affected_rows();
    }
}
