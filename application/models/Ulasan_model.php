<?php
class Ulasan_model extends CI_Model
{
    public function addUlasan($data)
    {
        $this->db->insert('ulasan', $data);
        return $this->db->affected_rows();
    }

    public function deleteUlasan($where)
    {
        $this->db->delete('ulasan', $where);
        return $this->db->affected_rows();
    }
}