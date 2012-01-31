<?php

class Validate_admin extends CI_Model{
	
	
	
	//validate admin access
	function validate(){
			
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password',md5($_POST['pass']));
		$query = $this->db->get('admins');
		
		if($query->num_rows == 1){
			
			return true;
		}
		
	}
	
	
	
}
