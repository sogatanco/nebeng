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
            return $this->db->get_where('v_bengkel', ['bk_pemilik'=>$pemilik, 'bk_id'=>$id])->result_array();
        }
        else{
            $this->db->order_by('bk_id','desc');
            return $this->db->get_where('v_bengkel', ['bk_pemilik'=>$pemilik])->result_array();
        }
    }

    public function getOldImg($username, $id){
        $data=$this->db->get_where('v_bengkel', ['bk_pemilik'=>$username, 'bk_id'=>$id])->row();
        return $data->bk_foto;
    }

}