<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url();?>/css/style.css" rel="stylesheet" type="text/css" />
<title>View Member</title>
</head>

<body>
<div id="header"><?php $this->load->view('../includes/header') ?></div>
<div id="header"><?php $this->load->view('data_header') ?></div>
<div id="subheader"><h2>Database Center</h2></div>

<div id="center">
<?php foreach ($single->result() as $row)?>
<h2><?php echo $row->fname." ".$row->lname;?></h2>

<?php 



	
	echo "Firstname: ".$row->fname."<br/>";
   echo "Lastname: ".$row->lname."<br/>";
   echo "Othername: ".$row->oname."<br/>";
   echo "Gender: ".$row->gender."<br/>";
   echo "Age: ".$row->age."<br/>";
   echo "Phone: ".$row->phone."<br/>";
   echo "Email: ".$row->email."<br/>";
   echo "Address: ".$row->address."<br/>";
   echo "Marital Stat: ".$row->marital_stat."<br/>";
   echo "Church Stat: ".$row->church_stat."<br/>";
   echo anchor("admin/edit/$row->id", 'Edit', 'title="Edit member"');
 ?>

</div>
</body>
</html>
