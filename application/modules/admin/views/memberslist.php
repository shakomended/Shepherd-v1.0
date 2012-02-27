<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url();?>/css/style.css" rel="stylesheet" type="text/css" />

<title>Members</title>
</head>

<body>
<div id="header"><?php $this->load->view('../includes/header') ?></div>
<div id="header"><?php $this->load->view('data_header') ?></div>
<div id="subheader"><h2>Database Center</h2></div>

<div id="center2">
<span class='link'><?php echo anchor("admin/membersfull", 'Full View', 'title="Full view"');?></span>
<?php echo "<p><b>".$total_rows."</b> Results found. You searched for:<b> ".$string."</b></p>";?>
<table cellpadding="6px",border="2px">
	<thead>
	<th>#</th>	
	<th>First name</th>
	<th>Last name</th>
	<th>Group</th>
	<th>Church_Stat</th>
	<th>View</th>
	</thead>	
<?php 

	echo form_open();
	foreach ($records->result() as $row)
{
	$chkbox = array(
    'name'        => $row->id,
    'id'          => $row->id,
    'style'       => 'margin:10px',
    );
  ?>
  <tr>
   <td><?php echo form_checkbox($chkbox);?></td>	
   <td><?php echo $row->fname;?></td>
   <td><?php echo $row->lname;?></td>
   <td><?php echo $row->age;?></td>
   <td><?php echo $row->church_stat;?></td>
   <td><?php echo anchor("admin/view/$row->id", 'View', 'title="View or edit member"');?></td>
   </tr>
<?php
}
?>
</table>
<?php
	//paginate the results
	echo $this->pagination->create_links();
	echo br(2);
	//form buttons
	echo form_submit('submit', 'Send Message!');
	echo form_reset('reset', 'Clear List');
	
	echo form_close();
?>
<div>
	
	<?php $this->load->view('statistics');?>
</div>






</div>
<script type="text/javascript" charset="UTF-8">
	$('tr:odd').css('background', '#e3e3e3');
	
</script>
</body>
</html>