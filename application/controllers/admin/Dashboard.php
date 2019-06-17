<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() { 
        parent::__construct();
        if(!get_cookie('token')&& !get_cookie('login')){
            redirect('admin/login');
        }
        else if(get_cookie('login')!=true){
            redirect('admin/login');
        } 
     } 

	
	public function index()
	{
		$this->load->view('dashboard');
	}
}
