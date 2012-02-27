<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Members</title>
<link href="<?php echo base_url();?>/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="header"><?php $this->load->view('../includes/header') ?></div>
<div id="subheader"><h2>Add New Member</h2></div>
<div id="center2">

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

// first name field
$fname = array(
              'name'        => 'fname',
              'id'          => 'fname',
              'value'       => set_value('fname'),
              'maxlength'   => '30',
              'size'        => '20',
              'style'       => 'width:20%',
            );
echo form_error('fname');
echo form_label('First Name ', 'fname');
echo br();
echo form_input($fname);
echo br(2);

// last name field
$lname = array(
              'name'        => 'lname',
              'id'          => 'lname',
              'value'       => set_value('lname'),
              'maxlength'   => '30',
              'size'        => '20',
              'style'       => 'width:20%',
            );

echo form_error('lname');
echo form_label('Last Name ', 'lname');
echo br();
echo form_input($lname);
echo br(2);

// other name field
$oname = array(
              'name'        => 'oname',
              'id'          => 'oname',
              'value'       => set_value('oname'),
              'maxlength'   => '30',
              'size'        => '20',
              'style'       => 'width:20%',
            );


echo form_label('Other Name ', 'oname');
echo br();
echo form_input($oname);
echo br(2);

//sex
$sex = array(
                  ''  => '',
                  'F'  => 'Female',
                  'M'    => 'Male'
                  
                );


echo form_error('sex');
echo form_label('Gender ', 'sex');
echo br();
echo form_dropdown('sex', $sex);
echo br(2);

//age range
$age = array(
                  ''  => '',
                  'teens'  => '13-20',
                  'youth'    => '21-30',
                  'adult' => '31-40',
                  'adult2' => '41-50',
                  'elder' => '50-Above'
                  
                );

echo form_error('age');
echo form_label('Age Group ', 'age');
echo br();
echo form_dropdown('age', $age);
echo br(2);

// Phone
$phone = array(
              'name'        => 'phone',
              'id'          => 'phone',
              'value'       => set_value('phone'),
              'maxlength'   => '30',
              'size'        => '20',
              'style'       => 'width:20%',
            );

echo form_error('phone');
echo form_label('Phone number ', 'phone');
echo br();
echo form_input($phone);
echo br(2);


// Phone
$phone2 = array(
              'name'        => 'phone2',
              'id'          => 'phone2',
              'value'       => set_value('phone2'),
              'maxlength'   => '30',
              'size'        => '20',
              'style'       => 'width:20%',
            );

echo form_error('phone2');
echo form_label('Phone number2 ', 'phone2');
echo br();
echo form_input($phone2);
echo br(2);

//email
$email = array(
              'name'        => 'email',
              'id'          => 'email',
              'value'       => set_value('email'),
              'maxlength'   => '50',
              'size'        => '40',
              'style'       => 'width:20%',
            );

echo form_error('email');
echo form_label('Email ', 'email');
echo br();
echo form_input($email);
echo br(2);


//address
$addy = array(
              'name'        => 'addy',
              'id'          => 'addy',
              'value'       => set_value('addy'),
              'style'       => 'width:30%',
              'rows' => '5',
              'cols' => '5'
            );
echo form_error('addy');
echo form_label('Address ', 'addy');
echo br();
echo form_textarea($addy);
echo br(2);

//Marital status
$marry = array(
                  ''  => '',
                  'single'  => 'Single',
                  'married'    => 'Married',
                  'separated' => 'Separated',
                  'divorced' => 'Divorced',
                  'Widow' => 'Widowed'
                  
                );

echo form_error('marry');
echo form_label('Marital Status ', 'marry');
echo br();
echo form_dropdown('marry', $marry);
echo br(2);

//Church status
$church_stat = array(
                  ''  => '',
                  'worker'  => 'Worker',
                  'member'    => 'Member',
                  'visitor' => 'Visitor',
                  
                  
                );

echo form_error('church_stat');
echo form_label('Church Status ', 'church_stat');
echo br();
echo form_dropdown('church_stat', $church_stat);
echo br(2);

echo form_submit('submit', 'Add member!');
echo form_reset('reset', 'Reset Form');

?>

<?php echo form_close(); ?>

</div>
<div id="header"><?php $this->load->view('../includes/footer') ?></div>