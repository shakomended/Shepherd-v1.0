<?php
class Login extends CI_Controller{
	function index()
	{
		$data['main_content'] = 'login_form';
		$this->load->view('includes/template',$data);
	}
	
	
}



?>