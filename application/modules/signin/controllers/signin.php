<?php

class Signin extends CI_Controller{
		
	function __construct(){
		parent::__construct();		
		
	}
		
		
	function index(){
		$logged_in = $this->session->userdata('is_logged_in');
		if($logged_in != TRUE){
		
			$this->load->view('login');	
		}
		else{
			$this->load->view('success');	
		}
		
		
	}
	

	//function to validate the administrator credentials
	function validateadmin(){
		
	$this->load->model('validate_admin');
	$query = $this->validate_admin->validate();
	
	if($query)//if the users info is in the database
	{
		$data = array(
			'username' => $this->input->post('username'),
			'is_logged_in' => true
		);
		$this->session->set_userdata($data);
		redirect("signin/index");
	}	
	else
	{ $this->index();}
	}	


//function to logout of the database
	function logout()  
		{  
		    $this->session->sess_destroy();  
		   $this->load->view('login');	
		} 



}
	