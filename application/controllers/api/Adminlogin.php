<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/ImplementJwt.php';

class Adminlogin extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->objOfJwt=new ImplementJwt();
        $this->load->model('Adminlogin_model', 'admin');
    }

    public function login_post(){
        $username=$this->post('username');
        $pass=$this->post('pass');

        if($this->admin->cek_login($username, $pass)==TRUE){
            $this->response([
                'status' => false,
                'message' => 'username and password not match'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }
    }
}



