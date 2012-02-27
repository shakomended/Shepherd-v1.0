<?php $session_user = $this->session->userdata('username');?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<span class='headlinks2'>
<?php echo anchor("admin/members", 'View Members', 'title="View member"')."&#32;";
 echo anchor("admin/form", 'Add Members', 'title="Add member"')."&#32;";


 ?>
	

</span>

