<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/ImplementJwt.php';

class Register extends REST_Controller
{
    

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->objOfJwt=new ImplementJwt();
        $this->load->model('Register_model', 'user');
    }

    function index_post(){

        $email=$this->post('email');
        $pass=$this->post('pass');
        $level=1;

        if($email==NULL||$pass==NULL){
            $this->response([
                'status' => false,
                'message' => 'empty'
            ], REST_Controller::HTTP_BAD_REQUEST); 
        }
        else{
            if($this->user->cekUser($email)>0){
                $this->response([
                    'status' => false,
                    'message' => 'email was registered'
                ], REST_Controller::HTTP_BAD_REQUEST); 
            }
            else{
                $token=[
                    'username'=>$email,
                    'level'=>$level,
                    'lasUpdate'=>date("Y-m-d h:i:sa")
                ];
                $data=[
                    'us_email'=>$email,
                    'us_password'=>$pass,
                    'us_level'=>$level,
                    'us_token'=>$this->objOfJwt->GenerateToken($token)
                ];
                if($this->user->addUser($data)>0){
                    $this->response([
                        'status' => true,
                        'message'=>'Registered'
                    ], REST_Controller::HTTP_CREATED); 
                }
                else{
                    $this->response([
                        'status' => false,
                        'message' => 'Registered Failed'
                    ], REST_Controller::HTTP_BAD_REQUEST); 
                }
            }
        }
    }
}
