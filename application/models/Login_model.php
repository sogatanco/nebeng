<?php

class Login_model extends CI_Model
{
    public function cekLogin($email, $pass){
        $resultLogin=$this->db->get_where('user',['us_email'=>$email, 'us_password'=>$pass, 'us_level'=>1]);
        if($resultLogin->num_rows()>0){
            $token=$resultLogin->row_array();
            return $token['us_token'];
        }
        else{
            return FALSE;
        }
       
    }
}
