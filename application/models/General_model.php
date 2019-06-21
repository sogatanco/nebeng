<?php
class General_model extends CI_Model
{
    public function getBengkel($id, $pemilik, $kategori){
        if ($id!=NULL){
            return $this->db->get_where('v_bengkel', ['bk_id'=>$id])->result_array();
        }
        elseif($pemilik!=NULL){
            $this->db->order_by('bk_id','desc');
            return $this->db->get_where('v_bengkel', ['bk_pemilik'=>$pemilik, 'bk_approved'=>1])->result_array();
        }
        elseif($kategori!=NULL){
            $this->db->order_by('bk_id','desc');
            return $this->db->get_where('v_bengkel', ['bk_kategori'=>$kategori, 'bk_approved'=>1])->result_array();
        }
        else{
            $this->db->order_by('bk_id','desc');
            return $this->db->get_where('v_bengkel', ['bk_approved'=>1])->result_array();
        }
    }


    public function getUser($email){
        
        $this->db->select('us_email, us_nama, us_nomorhp, us_jk, us_pekerjaan, us_profil, us_gabung');
        $this->db->from('user');
        $this->db->where('us_level', 1);
        if($email!=NULL){
            $this->db->where('us_email', $email);
            return $this->db->get()->result_array();
        }
        else{
            return $this->db->get()->result_array();
        }
    }


    public function getUlasan($idbengkel){
        return $this->db->get_where('ulasan', ['ul_idbengkel'=>$idbengkel])->result_array();
    }
}
