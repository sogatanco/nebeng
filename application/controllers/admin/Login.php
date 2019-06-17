<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() { 
        parent::__construct();
        if(get_cookie('token')&& get_cookie('login')){
			if(get_cookie('login')=="true"){
				redirect('admin/dashboard');
			}
        }
     } 
	public function index()
	{
		$this->load->view('login');
	}
}