<?php

class Messages extends CI_Controller{
	
	
	function sms (){
		
		$this->load->view('sms');
	}
	
	function email (){
		
		$this->load->view('email');
	}
	
	
}
