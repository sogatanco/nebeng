<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {
    function __construct() { 
        parent::__construct();
        if(!get_cookie('token')&& !get_cookie('login')){
            redirect('admin/login');
        }
        else if(get_cookie('login')!=true){
            echo get_cookie('token');
        } 
     } 

	public function bengkel($kategori)
	{ 
		$this->load->view($kategori);
	}
}