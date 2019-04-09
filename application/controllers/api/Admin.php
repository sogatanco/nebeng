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

// fungsi untuk menghapus bengkel
    function deletebengkel_delete(){
        $id=$this->delete('id');

        if($this->admin->deleteBengkel($id)>0){
            $this->response([
                'status' => true,
                'message'=>'bengkel deleted'
            ], REST_Controller::HTTP_OK);
        }
        else{
            $this->response([
                'status' => FALSE,
                'message' => 'id Not Found'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }
    }

    // fungsi untuk hapus user
    function deleteuser_delete(){
        $username=$this->delete('username');

        if($this->admin->deleteUser($username)>0){
            $this->response([
                'status'=>true,
                'message'=>'user deleted'
            ],REST_Controller::HTTP_OK);
        }
        else{
            $this->response([
                'status' => FALSE,
                'message' => 'user Not Found'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }
    }

    // fungsi untuk hapus ulasan
    function deleteulasan_delete(){
        $id=$this->delete('id');

        if($this->admin->deleteUlasan($id)>0){
            $this->response([
                'status' => true,
                'message'=>'ulasan deleted'
            ], REST_Controller::HTTP_OK);
        }
        else{
            $this->response([
                'status' => FALSE,
                'message' => 'ulasan Not Found'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }
    }


}