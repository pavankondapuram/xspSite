<?php

require_once('config.php');

database_connect($DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD);
	
$check_table=mysql_query("select * from admins");
$table_result=mysql_num_rows($check_table);
if($table_result==0) {
	echo "<meta http-equiv=\"refresh\" content=\"0; url=installation\" />";
}
else {
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/universal.css" />
<link rel="shortcut icon" href="images/xspFavicon.ico" />
<title>Lost Password</title>
</head>

<body class="installerBody">
<div class="wrapper-installer">
  <div class="xsp-installer"></div>
  <div class="logo-installer"></div>
  <div class="shadow-installer"></div>
  <div class="text-installer">Lost your Password?</div>
</div>

<?php

session_start();

if (isset($_SESSION['id'])) {
	$_COOKIE['id'] = $_SESSION['id'];
    $_COOKIE['name'] = $_SESSION['name'];
	
     echo "<div id=\"message\"><p>You are logged in as ". $_SESSION['name'] . ". Please logout to access full page.\n"."</p>
		  <input type=\"button\" onClick=\"location.href='logout'\" value=\"Log Out\" />
		  <input type=\"button\" onClick=\"location.href='main'\" value=\"Do It Later\" />
		  </div>";
}

?>

<div id="message">
<?php
if (!isset($_SESSION['id'])) {

if(isset($_POST['submit'])) {
	$email=$_POST['email'];
	$form=false;
	
	if(empty($email)) {  
    echo "<p>Please enter an email address</p>\n";
	$form=true;
    }
}

else {
	$form=true;
}

if(!empty($email)) {
	if (!preg_match("/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is", $email)) { 
	echo "<p>The e-mail you entered is not valid</p>\n";
	$form=true;
	}
	if(preg_match("/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is", $email)) {
	$check_email = mysql_num_rows(mysql_query("SELECT * FROM admins WHERE email='$email'"));
	if($check_email!=1) { 
	echo "<p>ERROR: There is no admin registered with that email address.</p>\n";
	$form=true;
	}
				
	else if($check_email==1) {
	require('includes/pwd-generator.php');
	$change_password=mysql_query("UPDATE admins SET password=SHA('$random_password') WHERE email='$email'");
	$fetch_username=mysql_query("SELECT * FROM admins WHERE email='$email'");
	$row=mysql_fetch_array($fetch_username);
	$full_name=$row['name'];
	$username=$row['username'];
	if(!$change_password) { 
	echo "Error: ".mysql_error();
	$form=true;
	}
	
	else if($change_password) {
	require('includes/pwd-reset-mailer.php');
	echo "<p>Check your email for the new password.</p>\n";
	echo "<a class=\"loginBelow_link\" href=\"login\">Log In</a>";
	$form=false;
	}
	}
	}
}
?>

</div>

<?php 

if($form) { include('includes/remember-pwd-form.php'); } } ?>

</body>
<?php 
}
database_disconnect($con='');
?>