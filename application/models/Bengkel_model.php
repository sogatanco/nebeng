<?php

class Bengkel_model extends CI_Model
{
    public function addBengkel($data){
        $this->db->insert('bengkel', $data);
        return $this->db->affected_rows();
    }

    public function cekLimit($email){
        return $this->db->get_where('bengkel',['bk_pemilik'=>$email])->num_rows(); 
    }

    public function editBengkel($data, $where){
        $this->db->update('bengkel', $data, $where);
        return $this->db->affected_rows();
    }

    public function deleteBengkel($where){
        $this->db->delete('bengkel', $where);
        return $this->db->affected_rows();
    }

    public function getBengkel($id, $pemilik){
        if($id!=NULL){
            return $this->db->get_where('bengkel', ['bk_pemilik'=>$pemilik, 'bk_id'=>$id])->result_array();
        }
        else{
            return $this->db->get_where('bengkel', ['bk_pemilik'=>$pemilik])->result_array();
        }
    }

}