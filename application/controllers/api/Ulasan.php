<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/ImplementJwt.php';

class Ulasan extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->objOfJwt=new ImplementJwt();
        $this->load->model('Ulasan_model', 'ulasan');
    }

    public function index_post(){
        $token=$this->objOfJwt->DecodeToken($this->rest->key);

        $data=[
            'ul_idbengkel'=>$this->post('idbengkel'),
            'ul_ulasan'=>$this->post('ulasan'),
            'ul_rating'=>$this->post('rating'),
            'ul_user'=>$token['username']
        ];

        if($this->ulasan->addUlasan($data)>0){
            $this->response([
                'status' => true,
                'message'=>'Ulasan Added'
            ], REST_Controller::HTTP_CREATED); 
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'failed to add ulasan'
            ], REST_Controller::HTTP_BAD_REQUEST); 
        }
    }

    public function index_delete(){
        $token=$this->objOfJwt->DecodeToken($this->rest->key);

        $where=[
            'ul_id'=>$this->delete('id'),
            'ul_user'=>$token['username']
        ];

        if($this->ulasan->deleteUlasan($where)>0){
            $this->response([
                'status' => true,
                'message'=>'ulasan deleted'
                    ], REST_Controller::HTTP_OK);
        }
        else{
            $this->response([
                'status' => FALSE,
                'message' => 'id Not Found'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }
    }


}