<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url();?>/css/style.css" rel="stylesheet" type="text/css" />

<title>Members</title>
</head>

<body>
<div id="header"><?php $this->load->view('../includes/header') ?></div>
<div id="header"><?php $this->load->view('sms_header') ?></div>
<div id="subheader"><h2>Messages Center</h2></div>

<div id="center">
	
	<span class="link"><?php echo anchor("admin/members", 'Simple View', 'title="Advanced Form"');?></span>
<?php 

echo form_open('admin/insert'); ?>
<?php

//select set
set_select('sex','female');
set_select('sex','male');
set_select('age','teens');
set_select('age','youth');
set_select('age','adult');
set_select('age','adult2');
set_select('age','elder');
set_select('marry','single');
set_select('marry','separated');
set_select('marry','widowed');
set_select('marry','divorced');
set_select('marry','married');
set_select('church_stat','worker');
set_select('church_stat','member');
set_select('church_stat','visitor');


//sender
$sender = array(
                  ''  => '',
                  'HopeHall'    => 'HopeHall',
                  'YouthChurch'  => 'YouthChurch',
                  'WorkersDir'  => 'WOrkersDir',
                  'Daughters.O.G'  => 'Daughters.O.G',
                  'CorneliusMen'  => 'CorneliusMen',
                  
                  
                );


echo form_error('sender');
echo form_label('Sender ', 'sender');
echo br();
echo form_dropdown('sender', $sender);
echo br(2);

//predefined List
$def_list = array(
                  ''  => '',
                  'all'  => 'All Members',
                  'youth'    => 'youth',
                  'adult' => '31-40',
                  'adult2' => '41-50',
                  'elder' => '50-Above'
                  
                );

echo form_error('def_list');
echo form_label('Predefined_List ', 'def_list');
echo br();
echo form_dropdown('der_list', $def_list);
echo br(2);



//message
$msg = array(
              'name'        => 'msg',
              'id'          => 'msg',
              'value'       => set_value('msg'),
              'style'       => 'width:30%',
              'rows' => '5',
              'cols' => '5'
            );
echo form_error('msg');
echo form_label('Message', 'msg');
echo br();
echo form_textarea($msg);
echo br(2);



echo form_submit('submit', 'Add member!');
echo form_reset('reset', 'Reset Form');

?>

<?php echo form_close(); ?>

<?php

if (isset($_POST['submit']) and $_POST['submit'] == "Send")
{
	require_once('sendSMSclass.php');
	
	$gsm = $_POST['gsm']; 						//MSISDN's seperated by comma
	$username 		= $_POST['username'];    	//your username
	$password 		= $_POST['password'];    	//your password
	$sender 		= $_POST['sender'];
	$isflash 		= $_POST['isflash'];      	//Is flash message (1 or 0)
	$type			= $_POST['messagetype'];	//msg type ("bookmark" - for wap push, "longSMS" for text messages only)
	$bookmark 		= $_POST['bookmark'];		//wap url (example: www.google.com)
	$messagetext 	        = $_POST['messagetext'];

	// Note: replace sign "+" with "%2b" for sender and message text or it will be replaced with empty space
	$sender = str_replace("+","%2b",$sender);
	$messagetext = str_replace("+","%2b",$messagetext);

	$SENDSMS = new SendSMSclass();
	$response = $SENDSMS->SendSMS($username,$password,$sender,$messagetext,$isflash, $gsm, $type, $bookmark); //IsFlash must be 0 or 1
	
	echo $response;
	
}
?>
</div>
</body>
</html>


