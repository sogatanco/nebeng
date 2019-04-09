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

    public function deleteBengkel($id)
    {
        $this->db->delete('bengkel',['bk_id'=>$id]);
        return $this->db->affected_rows();
    }

    public function deleteUser($username)
    {
        $this->db->delete('user', ['us_email'=>$username, 'us_level'=>1]);
        return $this->db->affected_rows();
    }

    public function deleteUlasan($id)
    {
        $this->db->delete('ulasan', ['ul_id'=>$id]);
        return $this->db->affected_rows();
    }


}