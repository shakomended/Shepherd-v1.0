<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url();?>/css/style.css" rel="stylesheet" type="text/css" />
<title>Login</title>
</head>

<body>

<div id="header">Hope Hall Members Database</div>
<div id="subheader"><h2>CRMlite10 beta</h2></div>

<div id="center2">
<h2>Administrator Login</h2>

<?php echo form_open('signin/validateadmin');?>
<?php 
// Username
$uname = array(
              'name'        => 'username',
              'id'          => 'username',
              'maxlength'   => '30',
              'size'        => '20',
              'style'       => 'width:20%',
            );

echo form_label('Username ', 'username');
echo br();
echo form_input($uname);
echo br(2);

//password field
$pass = array(
              'name'        => 'pass',
              'id'          => 'pass',
              'maxlength'   => '30',
              'size'        => '20',
              'style'       => 'width:20%',
            );

echo form_label('Password ', 'pass');
echo br();
echo form_password($pass);
echo br(2);

echo form_submit('submit', 'Login!');
echo form_reset('reset', 'Reset');
?>
<?php echo form_close(); ?>

	

</div>
</body>
</html>
