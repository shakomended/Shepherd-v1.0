<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url();?>/css/style.css" rel="stylesheet" type="text/css" />
<title>View Member</title>
</head>

<body>

<div id="header"><?php $this->load->view('../includes/header') ?></div>
<div id="subheader"><h2>Welcome to the Database</h2></div>

<div id="center">
<?php
$attributes = array('class' => 'members', 'name' => 'memform');
	echo form_open('messages', $attributes);
?>
<table cellpadding="6px",border="2px">
	<th>
		<td><input type="checkbox" name="Check_ctr" value="yes"onClick="Check(document.memform.check_list)"></td>
		<td>First</td>
		<td>Last</td>
		<td>Other</td>
		<td>Church_Stat</td>
		<td>Group</td>
		<td>Gender</td>
		<td>Phone</td>
		<td>Email</td>
		<td>Address</td>
		<td>Marital_stat</td>
		<td>View</td>
	</th>
<?php 

	
	echo "<p><b>".$total."</b> Results found. You searched for:<b> ".$string."</b></p>";
	
	
	foreach ($data as $row)
{
	
	
	
	
	//change search string to bold
	
	$m_id =$row['id'];
	$chkbox = array(
    'name'		=>'check_list',
    'value'        => $row->id,
    'id'          => $row->id,
    'style'       => 'margin:10px',
    );
  ?>
  <tr>
  	<td></td>
   <td><?php echo form_checkbox($chkbox);?></td>	
   
   <td><?php $fname = $row['fname'];
	echo preg_replace("/$string/i", "<strong class='red'>$string</strong>", $fname);
	?>
	</td>
   
   <td>
   	<?php $lname = $row['lname'];
	echo preg_replace("/$string/i", "<strong class='red'>$string</strong>", $lname);
	?>
	</td>
	
   <td><?php 
	$oname = $row['oname'];
	echo preg_replace("/$string/i", "<strong class='red'>$string</strong>", $oname);
	?></td>
   
   <td><?php $church = $row['church_stat'];
	echo preg_replace("/$string/i", "<strong class='red'>$string</strong>", $church);
	?></td>
	
   <td><?php $age = $row['age'];
	echo preg_replace("/$string/i", "<strong class='red'>$string</strong>", $age);?></td>
	
   <td><?php $gender = $row['gender'];
	echo preg_replace("/$string/i", "<strong class='red'>$string</strong>", $gender);?></td>
	
   <td><?php $phone = $row['phone'];
	echo preg_replace("/$string/i", "<strong class='red'>$string</strong>", $phone);?></td>
	
   <td><?php $email = $row['email'];
	echo preg_replace("/$string/i", "<strong class='red'>$string</strong>", $email);?></td>
	
   <td><?php $addy = $row['address'];
	echo preg_replace("/$string/i", "<strong class='red'>$string</strong>", $addy);?></td>
	
   <td><?php $marry = $row['marital_stat'];
	echo preg_replace("/$string/i", "<strong class='red'>$string</strong>", $marry);?></td>
   
   <td><?php echo anchor("admin/view/$m_id", 'View', 'title="View or edit member"');?></td>
   </tr>
<?php
}
?>
</table>
<?php
	echo $this->pagination->create_links();
	echo br(2);
	echo form_submit('submit', 'Send Message!');
	echo form_reset('reset', 'Clear List');
	
	echo form_close();
?>
<script type="text/javascript" charset="UTF-8">
	$('tr:odd').css('background', '#e3e3e3');
	
</script>
<SCRIPT LANGUAGE="JavaScript">
	<!-- Begin
function Check(chk)
{
if(document.memform.Check_ctr.checked==true){
for (i = 0; i < chk.length; i++)
chk[i].checked = true ;
}else{

for (i = 0; i < chk.length; i++)
chk[i].checked = false ;
}
}

// End -->
</script>

</div>
</body>
</html>
