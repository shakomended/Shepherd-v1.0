<?php $session_user = $this->session->userdata('username');?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<span class='headlinks2'>
<?php echo anchor("admin/members", 'Send SMS', 'title="Send SMS"')."&#32;";
 echo anchor("admin/form", 'Send Email', 'title="Send Email"')."&#32;";


 ?>
	

</span>

