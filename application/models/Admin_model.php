<?php
class Admin_model extends CI_Model
{
    public function approveBengkel($id)
    {
        $this->db->update('bengkel', ['bk_approved'=>1], ['bk_id'=>$id]);
        return $this->db->affected_rows();
    }

    public function getBengkel($id)
    {
        if($id!=NULL){
            return $this->db->get_where('bengkel', ['bk_id'=>$id, 'bk_approved'=>0])->result_array();
        }
        else{
            return $this->db->get_where('bengkel', ['bk_approved'=>0])->result_array();
        }
    }
}