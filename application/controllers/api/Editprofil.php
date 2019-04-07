<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/ImplementJwt.php';

class EditProfil extends REST_Controller
{
     
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->objOfJwt=new ImplementJwt();
        $this->load->model('Profil_model', 'profil');   
    }

    public function index_put(){
        $this->token=$this->objOfJwt->DecodeToken($this->rest->key);
        $data=[
            'us_nama'=>$this->put('nama'),
            'us_nomorhp'=>$this->put('hp'),
            'us_jk'=>$this->put('jk'),
            'us_pekerjaan'=>$this->put('pekerjaan'),
            'us_profil'=>$this->put('profil')
        ];
        if($this->profil->editProfil($data,$this->token['username'])>0){
            $this->response([
                'status' => true,
                'message'=>'updated'
            ], REST_Controller::HTTP_OK); 
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'failed to updated'
            ], REST_Controller::HTTP_BAD_REQUEST); 
        }
    }

    public function index_delete(){  
        $this->token=$this->objOfJwt->DecodeToken($this->rest->key);
        if($this->profil->deleteProfil($this->token['username'])>0){
            $this->response([
                'status' => true,
                'message'=>'deleted.'
            ], REST_Controller::HTTP_OK); 
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_BAD_REQUEST); 
        }
    }


    public function password_put(){
        $this->token=$this->objOfJwt->DecodeToken($this->rest->key);
        $lama=$this->put('lama');
        $baru=$this->put('baru');
        $email=$this->token['username'];
        
        if($this->profil->cekPass($email, $lama)==FALSE){
            $this->response([
                'status' => FALSE,
                'message' => 'Old Password not Math'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }else{
            // $token=$this->objOfJwt->generateToken($this->token);
            $data=[
                'username'=>$this->token['username'],
                'level'=>$this->token['level'],
                'lasUpdate'=>date("Y-m-d h:i:sa")
            ];
            $newToken=$this->objOfJwt->generateToken($data);

            if($this->profil->updatePass($email, $baru, $newToken)>0){
                $this->response([
                    'status' => TRUE,
                    'message' => 'updated'
                ], REST_Controller::HTTP_OK); 
            }

            else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'failed to update'
                ], REST_Controller::HTTP_NOT_FOUND); 
            }
            
        }     
   
    }

}