<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/ImplementJwt.php';

class Admin extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->objOfJwt=new ImplementJwt();
        $this->load->model('Admin_model', 'admin');
    }
// melihat list bengkel yang perlu ditinjau
    function viewbengkel_get(){
        $id=$this->get('id');
        $bengkel=$this->admin->getBengkel($id);

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

// proses approve bengkel 
    function approvebengkel_put(){
        $id=$this->put('idbengkel');

        if($this->admin->approveBengkel($id)>0)
        {
            $this->response([
                'status' => true,
                'message'=>'bengkel approved'
            ], REST_Controller::HTTP_OK);
        }
        else{
            $this->response([
                'status' => FALSE,
                'message' => 'Failed to approve'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }   
    }


}