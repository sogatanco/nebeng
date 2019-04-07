<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/ImplementJwt.php';

class General extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->objOfJwt=new ImplementJwt();
        $this->load->model('General_model', 'general');
    }

    public function bengkel_get()
    {
        $id=$this->get('id');
        $pemilik=$this->get('pemilik');
        $kategori=$this->get('kategori');
        $bengkel=$this->general->getBengkel($id, $pemilik, $kategori);

        if($bengkel){
            $this->response([
                'status' => true,
                'data' =>  $bengkel
            ], REST_Controller::HTTP_OK);   
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'bengkel not found'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }   
    }

    public function user_get(){

        $email=$this->get('email');

        $user=$this->general->getUser($email);
        
        if($user){
            $this->response([
                'status' => true,
                'data' =>  $user
            ], REST_Controller::HTTP_OK);   
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'user not found'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }

    }

    public function ulasan_get(){
        $idbengkel=$this->get('idbengkel');
        $ulasan=$this->general->getUlasan($idbengkel);

        if($ulasan){
            $this->response([
                'status' => true,
                'data' =>  $ulasan
            ], REST_Controller::HTTP_OK);   
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'tidak ada ulasan'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }
    }

}