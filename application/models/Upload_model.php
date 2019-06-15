<?php
class Upload_model extends CI_Model
{
    public function imageProfil($data, $email){
        $this->db->update('user', $data, ['us_email'=>$email]);
    }

    public function getOldImage($email){
        $data=$this->db->get_where('user', ['us_email'=>$email])->row();
        return $data->us_profil;
    }
}
