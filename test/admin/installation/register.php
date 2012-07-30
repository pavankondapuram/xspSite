<?php

require_once('../config.php');

database_connect($DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD);
	
$check_table=mysql_query("select * from admins");
$table_result=mysql_num_rows($check_table);
if($table_result>0) {
	echo "<meta http-equiv=\"refresh\" content=\"0; url=../index\" />";
}
else {

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/universal.css" />
<link rel="shortcut icon" href="../images/xspFavicon.ico" />
<title>XSP APP Installer</title>
</head>

<body class="installerBody">
<div class="wrapper-installer">
  <div class="xsp-installer"></div>
  <div class="logo-installer"></div>
  <div class="shadow-installer"></div>
  <div class="text-installer">Registration</div>
</div>

<?php 

if(isset($_POST['register'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$retype_password=$_POST['retype_password'];
	$priority=$_POST['priority'];
	$type=$_POST['type'];
	$date=date("y/m/d");
	$form=false;
	
	if(empty($name) || empty($email) || empty($username) || empty($password) || empty($retype_password)) {  
	$message = "All the fields are mandatory, please fill in all";
	$form=true;
	}
}

else{  
    $form=true;  
}

if(!empty($name) && !empty($email) && !empty($username) && !empty($password) && !empty($retype_password)) {  

    if (!preg_match("/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is", $email)) { 
	$message = "The e-mail you entered is not valid";
	$form=true;
	}
	else if ($password!=$retype_password) {
    $message = "Password did not match"; 
	$form=true;
	}
	else if (preg_match("/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is", $email) 
	         && ($password==$retype_password)) {
     
	 $auth_keys_length = 40;
     function make_auth_keys() {
     list($usec, $sec) = explode(' ', microtime());
     return (float) $sec + ((float) $usec * 100000);
     }
     srand(make_auth_keys());
     $alfa = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
     $auth_keys = "";
     for($i = 0; $i < $auth_keys_length; $i ++) {
     $auth_keys .= $alfa[rand(0, strlen($alfa))];
     } 

	$query = mysql_query("INSERT INTO admins (username, password, date, name, email, auth_keys, priority, type)
				          VALUE('$username', SHA('$password'), '$date', '$name', '$email', '$auth_keys', '$priority', '$type')");
	if(!$query) { 
	$message = mysql_error(); 
	}
	$message = "Application successfully installed on server";
	echo "<div class=\"finishDiv\">";
	echo "<button id=\"installButton\" onClick=\"location.href='../'\">Finish</button>";
	echo "</div>";
	$form=false;
	}
}

?>

<div id="message">
<?php if(isset($_POST['register'])) { echo $message; } ?>
</div>

<?php if($form) { include('registration-form.php'); } ?>

</body>
<?php 
} 
database_disconnect($con='');
?>