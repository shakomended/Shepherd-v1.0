<?php

class MY_Input extends CI_Input{
	
	function __construct(){
		parent::__construct();
	}
	
	function save_query($fields){
			
		$CI =& get_instance();
		
		$CI->db->insert('query', array('query_string' =>http_build_query($fields)));
		
		return $CI->db->insert_id();
		
	}
	
	function load_query($query_id){
			
		$CI =& get_instance();
		
		$rows = $CI->db->get_where('query', array('query_id' => $query_id))->result();
		if(isset($rows[0])){
		parse_str($rows[0] -> query_string,$_GET);
		}
		
	}
}
