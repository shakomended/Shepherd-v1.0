<?php

class Messages extends CI_Controller{
	
	//function to send sms to members 
	function sms (){
		
		$this->load->view('sms');
	}
	
	
	//function to send emails to members
	function email (){
		
		$this->load->view('email');
	}
	
	
}
