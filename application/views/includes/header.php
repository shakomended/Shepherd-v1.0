<?php $session_user = $this->session->userdata('username');?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<span class='headlinks'>
<?php echo anchor("admin/members", 'View Members', 'title="View member"')."&#32;";
 echo anchor("admin/form", 'Add Members', 'title="Add member"')."&#32;";

 ?>
	
<div class="logout">


Welcome <?php echo $session_user."&#32;"; ?>
<?php echo anchor('signin/logout', 'Logout');?></div>


<div id="search"><?php 

$searchbox = array(
              'name'        => 'searchbox',
              
              'maxlength'   => '40',
              'size'        => '20',
              'style'       => 'width:70%',
            );
$searchform = array(
              'name'        => 'searchform',
             
             
            );
echo form_open('search', $searchform); 

 echo form_input($searchbox);
 echo form_submit('submit', 'Go!');
 echo form_close();
 ?>
</div>
</span>

