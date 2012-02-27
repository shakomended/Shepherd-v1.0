<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url();?>/css/style.css" rel="stylesheet" type="text/css" />

<title>Members</title>
</head>

<body>
<div id="header"><?php $this->load->view('../includes/header') ?></div>
<div id="subheader"><h2>Members List</h2></div>
<div id="center">

<span class="link"><?php echo anchor("admin/members", 'Simple View', 'title="Simple view"');?></span>
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
	
	foreach ($records->result() as $row)
{
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
   <td><?php echo $row->fname;?></td>
   <td><?php echo $row->lname;?></td>
   <td><?php echo $row->oname;?></td>
   <td><?php echo $row->church_stat;?></td>
   <td><?php echo $row->age;?></td>
   <td><?php echo $row->gender;?></td>
   <td><?php echo $row->phone;?></td>
   <td><?php echo $row->email;?></td>
   <td><?php echo $row->address;?></td>
   <td><?php echo $row->marital_stat;?></td>
   
   <td><?php echo anchor("admin/view/$row->id", 'View', 'title="View or edit member"');?></td>
   </tr>
<?php
}
?>
</table>
<?php	
	echo form_submit('submit', 'Send Message!');
	echo form_reset('reset', 'Clear List');
	
	echo form_close();
?>

<?php 
//paginate the results
echo $this->pagination->create_links();?>



</div>
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
<div id="header"><?php $this->load->view('../includes/footer') ?></div>