<?php

class Dba extends CI_Model {

	function __construct(){
		parent::__construct();
		
	}
	
	//function to check for duplicate entry
	function check(){
		//$this->load->library('database');	
		$this->db->where('fname',$this->input->post('fname'));
		$this->db->where('phone',$this->input->post('phone'));
		$this->db->where('email',$this->input->post('email'));
		
		$query = $this->db->get('members_db');
		
		if($query->num_rows == 1){
			return true;
		}
		
	}
	//function to insert the data
	function insert(){
	
		
		
		//actual insert of the data
		$data = array(
		   'fname' =>  $this->input->post('fname'),
		   'lname' => $this->input->post('lname'),
		   'oname' => $this->input->post('oname'),
		   'gender' => $this->input->post('sex'),
		   'age' => $this->input->post('age'),
		   'phone' => $this->input->post('phone'),
		   'phone2' => $this->input->post('phone2'),
		   'email' => $this->input->post('email'),
		   'address' => $this->input->post('addy'),
		   'marital_stat' => $this->input->post('marry'),
		   'church_stat' => $this->input->post('church_stat')
		);
		
		//search for duplicate entry
		//$this->load->model('duplicate');
		if($this->check()== true)
		{
			echo '<script type="text/javascript">
	alert("Duplicate Entry, Press back to re-enter data!!")
</script>';
			die();
			
		}
		else{
		//everything ok insert data into the database
		$this->db->insert('members_db', $data);
		//logs
		$mem_id = $this->db->insert_id();	
			
			$date = new DateTime('');
		$d = $date->format('Y-m-d');
		$t = $date->format('H:i:s');
	$logs = array(
	'mem_id' => $mem_id,
	'admin' => $this->session->userdata('username'),
	'date' => $d,
	'time' => $t,
	'action' => 'add'
	);

	$this->db->insert('logs', $logs);
		} 
		
		echo '<script type="text/javascript">
	var r=confirm("Member successfully added to database");
if (r==true)
  {
  window.location.replace("http://localhost/hhdb/index.php/admin/members")
  }
else
  {
  alert("Oopps!! You made a mistake? Just search for the member and edit it.")
  window.location.replace("http://localhost/hhdb/index.php/admin/members")
  }
</script>';
		
		}
	
	
	
		
	//insert the data
	function update(){
		
		
		//actual insert of the data
		$data = array(
		   'fname' =>  $this->input->post('fname'),
		   'lname' => $this->input->post('lname'),
		   'oname' => $this->input->post('oname'),
		   'gender' => $this->input->post('sex'),
		   'age' => $this->input->post('age'),
		   'phone' => $this->input->post('phone'),
		   'phone2' => $this->input->post('phone2'),
		   'email' => $this->input->post('email'),
		   'address' => $this->input->post('addy'),
		   'marital_stat' => $this->input->post('marry'),
		   'church_stat' => $this->input->post('church_stat')
		);
		
		$this->db->where('id', $this->uri->segment(3));
		$this->db->update('members_db', $data); 
		echo "Member info updated successfully";
		echo anchor("admin/members", 'Members List', 'title="Go back to List"');
		
		
		//logs
		$mem_id = $this->uri->segment(3);	
			
			$date = new DateTime('');
		$d = $date->format('Y-m-d');
		$t = $date->format('H:i:s');
	$logs = array(
	'mem_id' => $mem_id,
	'admin' => $this->session->userdata('username'),
	'date' => $d,
	'time' => $t,
	'action' => 'update'
	);

	$this->db->insert('logs', $logs);
		
	
	
	}
	
	
	 
}
?>