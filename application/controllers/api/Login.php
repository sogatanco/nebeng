<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/ImplementJwt.php';

class Login extends REST_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->objOfJwt=new ImplementJwt();
        $this->load->model('Login_model', 'login');
        $this->load->model('Register_model', 'user');
    }

    function index_post()
    {
        $email=$this->post('email');
        $pass=$this->post('pass');

        if($this->user->cekUser($email)<1){
            $this->response([
                'status' => false,
                'message' => 'user not found'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }
        
        else{ 
            if($this->login->cekLogin($email, $pass)==FALSE) {
                
                $this->response([
                    'status' => false,
                    'message' => 'username and password not match'
                ], REST_Controller::HTTP_NOT_FOUND); 
            }
            else{
                $token=$this->login->cekLogin($email, $pass);
                $data=$this->objOfJwt->DecodeToken($token);
                $this->response([
                    'status' => true,
                    'token' => $token,
                    'data'=>$data
                ], REST_Controller::HTTP_OK); 
            }
            
        }
    }

    function admin_post(){
        $username=$this->post('username');
        $pass=$this->post('pass');

        if($this->login->loginAdmin($username, $pass)>0){
            $datatoken=[
                'username'=>$username,
                'level'=>0,
                'lastLogin'=>date("Y-m-d h:i:sa"),
                'ipaddress'=>$this->input->ip_address()
            ];
            $token=$this->objOfJwt->GenerateToken($datatoken);
            $this->login->updateToken($token, $username);
            $this->response([
                'status' => true,
                'token' => $token,
                'data'=>$datatoken
            ], REST_Controller::HTTP_OK); 
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'username and password not match'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }
    }
}
