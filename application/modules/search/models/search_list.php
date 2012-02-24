<?php

class Search_list extends CI_Model{
	
	function index(){
	
	
	//the search query
	$string = $this->session->userdata('query_string');
	$s = parse_str($string);
	$fields = array(
		'fname' => $fname, 
		'lname' => $lname, 
		'oname' => $oname,
		'gender' => $gender,
		'age' => $age,
		'phone' => $phone,
		'email' => $email,
		'address' => $address,
		'marital_stat' => $marital_stat,
		'church_stat' => $church_stat
		);
	
	
	//the pagination configuration

		
		$result_num = 8;
		$this->db->or_like($fields);
		$q = $this->db->get('members_db');
		$config['base_url'] = "http://localhost/hhdb/search/query";
		$config['total_rows'] = $q->num_rows();
		$config['per_page'] = $result_num;
		$config['num_links'] = 5;
				
		$this->pagination->initialize($config);
		//pagination config ended
		//query continued
		 
		$this->db->or_like($fields);
		$query = $this->db->get('members_db',$result_num,$this->uri->segment(3));
		$result['total'] = $q->num_rows;
	
	if ($query->num_rows() > 0)
	{
		
		$result['string']= $fname;
		$result['data'] = $query->result_array();
		$this->load->view('search',$result);

}	  
	else{ echo "No result found";}
	}	

	
	
//end of model class
}
