<?php

	
			
	$this->load->library('encrypt');
			
	$msg = 'My secret key';
			
	$ekey = $this->encrypt->encode($msg);
	
	echo $ekey;		
