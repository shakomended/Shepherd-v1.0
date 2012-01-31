<?php

class Lib_test extends CI_Controller{
	
	
	function value(){
		
		
		$this->load->library('test_lib');
		$this->test_lib->test('hello'); 
	}
	
	function insert(){
		
		$fields = array(
		'fname' => 'chris', 
		'lname' => 'woghiren', 
		'oname' => 'tolu',
		'gender' => 'male',
		'age' => 27,
		'phone' => 2348074533441,
		'email' => 'osahon2k2@yahoo.com',
		'address' => 'iponri',
		'marital_stat' => 'single',
		'church_stat' => 'worker'
		);
		
		$this->input->post($fields);
		
	}
	
	function form(){
		
		$this->load->library("Form_validation");
		$this->form_validation->test();
	}
	
	function input(){
		
		$this->input->load_query();
	}
}
