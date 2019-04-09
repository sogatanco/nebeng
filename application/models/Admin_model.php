<?php
class Admin_model extends CI_Model
{
    public function approveBengkel($id)
    {
        $this->db->update('bengkel', ['bk_approved'=>1], ['bk_id'=>$id]);
        return $this->db->affected_rows();
    }
}