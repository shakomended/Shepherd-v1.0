<?php

class Search extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	
	function index(){
	$this->load->library('form_validation');
	//validate the information	
	$this->form_validation->set_rules('searchbox', 'Search Box', 'required|min_length[3]');
	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
	
		if ($this->form_validation->run() == FALSE)
		{
			echo '<script type="text/javascript">
			alert("Oopps!! There is a problem with your seacrch.It should be THREE(3) characters or More!!.")
  window.location.assign("http://localhost/hhdb/admin/members")</script>';
		}
		else
		{
			
			$search = $this->input->post('searchbox');	
	
	//array of search
		$fields = array(
		'fname' => $search, 
		'lname' => $search, 
		'oname' => $search,
		'gender' => $search,
		'age' => $search,
		'phone' => $search,
		'email' => $search,
		'address' => $search,
		'marital_stat' => $search,
		'church_stat' => $search
		);
		
		$qstring = $this->session->userdata('query_string');
		if(isset($qstring)){
		
			$this->session->unset_userdata('query_string');
			
		}
		
			$query = array('query_string' => http_build_query($fields));
			$this->session->set_userdata($query);	
			redirect('search/query');
		
		}
			
	}
	function usertime(){
		$date = new DateTime('');
$s = $date->format('Y-m-d');

$t = $date->format('H:i:s');
echo $s;
echo br();
echo $t;


	}
	
	
	
	function query(){
		
		
		
		$this->load->model('search_list');
		$this->search_list->index();
	}
//end of controller
}
