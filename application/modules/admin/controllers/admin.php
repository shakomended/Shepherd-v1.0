<?php

class Admin extends CI_Controller{
		
	function __construct(){
		parent::__construct();
		
		$this->is_logged_in();
	}
	
	//checking to see if the user has been logged in a simple authentication method
	function is_logged_in(){
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		if(!isset($is_logged_in) || $is_logged_in != TRUE )
		{
		redirect('signin/index');
		}
	}	
		
	
	
	//function to load the add member form	
	function form(){
		
		$this->load->view('add_member');
	}

	
	//functions for viewing the members list
	//simple members list
	function members (){
		
		$config['base_url'] = 'http://localhost/hhdb/index.php/admin/members';
		$config['total_rows'] = $this->db->get('members_db')->num_rows();
		$config['per_page'] = 15;
		$config['num_links'] = 3;
		
		$this->pagination->initialize($config);
		$data['records'] = $this->db->get('members_db',$config['per_page'], $this->uri->segment(3));
		
		$this->load->view('memberslist', $data);
	}

	//full members list
	function membersfull (){
		
		$config['base_url'] = 'http://localhost/hhdb/index.php/admin/membersfull';
		$config['total_rows'] = $this->db->get('members_db')->num_rows();
		$config['per_page'] = 15;
		$config['num_links'] = 3;
		
		$this->pagination->initialize($config);
		$data['records'] = $this->db->get('members_db',$config['per_page'], $this->uri->segment(3));
		
		$this->load->view('membersfull', $data);
	}
	
	//function to view a single member
	function view(){
		
		$member['single'] = $this->db->get_where('members_db',array('id' => $this->uri->segment(3)));
		$this->load->view('view_member', $member);
	}
	
	//function to insert a member into the database
	function insert(){
		$this->is_logged_in();
		//validation rules
		$valid = array(
               array(
                     'field'   => 'fname', 
                     'label'   => 'First name', 
                     'rules'   => 'required|alpha'
                     
                  ),
               array(
                     'field'   => 'lname', 
                     'label'   => 'Last Name', 
                     'rules'   => 'required|alpha'
                  ),
               array(
                     'field'   => 'oname', 
                     'label'   => 'Other Name', 
                     'rules'   => 'alpha'
                  ),
               array(
                     'field'   => 'sex', 
                     'label'   => 'Gender', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'age', 
                     'label'   => 'Age Group', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'addy', 
                     'label'   => 'Address', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'marry', 
                     'label'   => 'Marital Status', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'church_stat', 
                     'label'   => 'Church Status', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'phone', 
                     'label'   => 'Phone number', 
                     'rules'   => 'required|is_natural'
                  ),
               array(
                     'field'   => 'phone2', 
                     'label'   => 'Phone number2', 
                     'rules'   => 'is_natural'
                  ),
               array(
                     'field'   => 'email', 
                     'label'   => 'Email', 
                     'rules'   => 'required|valid_email'
                  ),
                );
		//validate the data
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		// set validation rules
		$this->form_validation->set_rules($valid);	
	
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('add_member');
		}
		else
		{
			$this->load->model('dba');
			$this->dba->insert();
		
		}
	}

	//function to update member
	function update(){
		
		//validation rules
		$valid = array(
               array(
                     'field'   => 'fname', 
                     'label'   => 'First name', 
                     'rules'   => 'required|alpha'
                     
                  ),
               array(
                     'field'   => 'lname', 
                     'label'   => 'Last Name', 
                     'rules'   => 'required|alpha'
                  ),
               array(
                     'field'   => 'oname', 
                     'label'   => 'Other Name', 
                     'rules'   => 'alpha'
                  ),
               array(
                     'field'   => 'sex', 
                     'label'   => 'Gender', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'age', 
                     'label'   => 'Age Group', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'addy', 
                     'label'   => 'Address', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'marry', 
                     'label'   => 'Marital Status', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'church_stat', 
                     'label'   => 'Church Status', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'phone', 
                     'label'   => 'Phone number', 
                     'rules'   => 'required|is_natural'
                  ),
               array(
                     'field'   => 'phone2', 
                     'label'   => 'Phone number2', 
                     'rules'   => 'is_natural'
                  ),
               array(
                     'field'   => 'email', 
                     'label'   => 'Email', 
                     'rules'   => 'required|valid_email'
                  ),
                );
				
		//validate the data
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		// set validation rules
		$this->form_validation->set_rules($valid);	
	
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('edit_member');
		}
		else
		{
			$this->load->model('dba');
			$this->dba->update();
		
		}
		
	}
	
	//function to edit a single member
	function edit(){
		
		$update['id'] = $this->db->get_where('members_db',array('id' => $this->uri->segment(3)));
		$this->load->view('edit_member', $update);
	}
	
	//function to logout of the database
	function logout()  
		{  
		    $this->session->sess_destroy();  
		    $this->index();  
		} 
	function java()
	{
			$test = "yes ke";
		echo '<script type="text/javascript">
		
		alert("I am an alert box!.");	
</script>';
	}
	
	function preg(){
		
$p = array();
$p[0] = 'The';
$p[1] = 'quick';
$p[2] = 'brown';
$p[3] = 'fox';
$p[4] = 'jumped';
$p[5] = 'over';
$p[6] = 'the';
$p[7] = 'lazy';
$p[8] = 'dog';
		
$string = implode(" ",$p);
		
$patterns = array();
$patterns[0] = '/quick/';
$patterns[1] = '/brown/';
$patterns[2] = '/fox/';
$replacements = array();
$replacements[2] = 'bear';
$replacements[1] = 'black';
$replacements[0] = 'slow';
echo preg_replace($patterns, $replacements, $string);


	}
}