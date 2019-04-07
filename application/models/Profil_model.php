<?php
class Profil_model extends CI_Model
{
    public function editProfil($data, $email){
        $this->db->update('user',$data, ['us_email'=>$email]);
        return $this->db->affected_rows();
    }

    public function deleteProfil($email){
        $this->db->delete('user',['us_email'=>$email]);
        return $this->db->affected_rows();
    }

    public function cekPass($email, $lama){
        $data=$this->db->get_where('user', ['us_email'=>$email])->row_array();
        if($data['us_password']==$lama){
            return TRUE;
        }
        return FALSE;
    }

    public function updatePass($email, $baru, $newtoken){
        $this->db->update('user', ['us_password'=>$baru, 'us_token'=>$newtoken], ['us_email'=>$email]);
        return $this->db->affected_rows();
    }
}