<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/ImplementJwt.php';

class Upload extends REST_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->objOfJwt=new ImplementJwt();
         $this->load->model('Upload_model', 'mupload');
    }

    public function profil_put(){
        $token=$this->objOfJwt->DecodeToken($this->rest->key);
        $image=$this->put("image");
        $image=base64_decode($image);
        $image_name = md5(uniqid(rand(), true));
        $filename = $token['username'].$image_name.'.'.'png';
        $path="/home/fowt6686/public_html/nebeng/asset/images/null.jpg";
        if(file_put_contents($path , $image)){
            $data=[
                'us_profil'=>$filename
            ];
            $this->mupload->imageProfil($data, $token['username']);
            $this->response([
                'status' => TRUE,
                'message' => 'uploaded'
            ], REST_Controller::HTTP_OK); 
        }
        else{
            $this->response([
                'status' => FALSE,
                'message' => 'failed to upload'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }

        $this->response([
                    'status' => FALSE,
                    'message' => $this->mupload->getOldImage($token['username'])
                ], REST_Controller::HTTP_NOT_FOUND); 

       
        
    }
}