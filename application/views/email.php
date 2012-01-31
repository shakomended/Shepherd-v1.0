<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMS Form</title>
</head>

<body>
<div id="container">
<h2>SMS Form</h2>
<?php echo form_open();?>
<?php
//message sender
$sender = array(
                  ''  => '',
                  'RFCA'  => 'RFCA',
                  'Youth'    => 'Youth',
                  'Hope Hall' => 'Hope Hall',
                  'ForeRunner' => 'ForeRunner',
                  'Work Dir' => 'Work Dir',
                  
                  
                );

echo form_error('sender');
echo form_label('Sender', 'sender');
echo br();
echo form_dropdown('sender', $sender);
echo br(2);

//
$sbjct = array(
              'name'        => 'sbjct',
              'id'          => 'sbjct',
              'value'       => set_value('sbjct'),
              'maxlength'   => '30',
              'size'        => '20',
              'style'       => 'width:20%',
            );

echo form_error('sbjct');
echo form_label('Subject ', 'sbjct');
echo br();
echo form_input($sbjct);
echo br(2);

//address
$msg = array(
              'name'        => 'msg',
              'id'          => 'msg',
              'value'       => set_value('addy'),
              'style'       => 'width:30%',
              'rows' => '15',
              'cols' => '5'
            );
echo form_error('msg');
echo form_label('Message ', 'msg');
echo br();
echo form_textarea($msg);
echo br(2);

echo form_button('messages/recieve', 'Add Recipients');
echo br(2);

echo form_submit('submit', 'Send Message!');
echo form_reset('reset', 'Reset Form');
?>

<?php echo form_close();?>


</div>
</body>
</html>
