<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/ImplementJwt.php';

class Bengkel extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->objOfJwt=new ImplementJwt();
        $this->load->model('Bengkel_model', 'bengkel');
    }

    public function index_post()
    {
        $token=$this->objOfJwt->DecodeToken($this->rest->key);

        if($this->bengkel->cekLimit($token['username'])>2){
            $this->response([
                'status' => false,
                'message' => 'you reach the limit'
            ], REST_Controller::HTTP_BAD_REQUEST); 
        }

        else{

            $image=$this->post('foto');
            $image=base64_decode($image);
            $image_name = md5(uniqid(rand(), true));
            $filename = 'bengkel_'.$token['username'].$image_name.'.'.'png';
            $path="/home/fowt6686/public_html/nebeng/asset/images/";
            if(file_put_contents($path.$filename, $image)){
                $data=[
                    'bk_namabengkel'=>$this->post('nama'),
                    'bk_deskripsi'=>$this->post('desc'),
                    'bk_foto'=>$filename,
                    'bk_telpon'=>$this->post('telpon'),
                    'bk_long'=>$this->post('long'),
                    'bk_lat'=>$this->post('lat'),
                    'bk_layanan'=>$this->post('layanan'),
                    'bk_availabletime'=>$this->post('time'),
                    'bk_pemilik'=>$token['username'],
                    'bk_kategori'=>$this->post('kategori'),
                    'bk_startdate'=>date('Y-m-d')
                ];
                if($this->bengkel->addBengkel($data)>0){
                    $this->response([
                        'status' => true,
                        'message'=>'Bengkel Added'
                    ], REST_Controller::HTTP_CREATED); 
                }
                else{
                    $this->response([
                        'status' => false,
                        'message' => 'failed to add'
                    ], REST_Controller::HTTP_BAD_REQUEST); 
                }       
            }
            else{
                $this->response([
                    'status' => false,
                    'message' => 'failed to upload image'
                ], REST_Controller::HTTP_BAD_REQUEST); 
            }
           
        }
          
    }

    public function index_put(){
        $token=$this->objOfJwt->DecodeToken($this->rest->key);
        $oldImage=$this->bengkel->getOldImg($token['username'], $this->put('id'));

        $image=$this->put('foto');
        $image=base64_decode($image);
        $image_name = md5(uniqid(rand(), true));
        $filename = 'bengkel_'.$token['username'].$image_name.'.'.'png';
        $path="/home/fowt6686/public_html/nebeng/asset/images/";
        file_put_contents($path.$filename, $image);
        if(file_exists($path.$oldImage)){
            unlink($path.$oldImage);
         }


        $data=[
            'bk_namabengkel'=>$this->put('nama'),
            'bk_deskripsi'=>$this->put('desc'),
            'bk_foto'=>$filename,
            'bk_telpon'=>$this->put('telpon'),
            'bk_long'=>$this->put('long'),
            'bk_lat'=>$this->put('lat'),
            'bk_layanan'=>$this->put('layanan'),
            'bk_availabletime'=>$this->put('time'),
            'bk_kategori'=>$this->put('kategori')
        ];
        $where=[
            'bk_id'=>$this->put('id'),
            'bk_pemilik'=>$token['username']
        ];
        if($this->bengkel->editBengkel($data, $where)>0){
            $this->response([
            'status' => true,
            'message'=>'bengkel updated'
                ], REST_Controller::HTTP_OK);
        }  
        else{
            $this->response([
                'status' => FALSE,
                'message' => 'id Not Found'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }

    }

    public function delete_post(){
        $token=$this->objOfJwt->DecodeToken($this->rest->key);

        $where=[
            'bk_id'=>$this->post('id'),
            'bk_pemilik'=>$token['username']
        ];

        if($this->bengkel->deleteBengkel($where)>0){
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

    public function index_get(){
        $token=$this->objOfJwt->DecodeToken($this->rest->key);
        $id=$this->get('id');

        $bengkel=$this->bengkel->getBengkel($id, $token['username']);
        if($bengkel){
            $this->response([
                'status' => true,
                'data' =>  $bengkel
            ], REST_Controller::HTTP_OK);   
        }
        else{
            $this->response([
                'status' => false,
                'message' => 'There is no Bengkel'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }
    }


}