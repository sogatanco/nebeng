<?php
class Adminlogin_model extends CI_Model
{
    public function cek_login($username, $pass)
    {
        $this->db->get_where('user', ['us_email'=>$username,'us_password'=>$pass, 'us_level'=>0]);
        return $this->db->affected_rows();
    }

    public function updateToken($token, $username)
    {
        $this->db->update('user',['us_token'=>$token], ['us_email'=>$username]);
    }
}
