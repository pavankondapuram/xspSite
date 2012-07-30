<?php

require_once('config.php');

database_connect($DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD);
	
$check_table=mysql_query("select * from admins");
$table_result=mysql_num_rows($check_table);
if($table_result==0) {
	echo "<meta http-equiv=\"refresh\" content=\"0; url=installation\" />";
}
else {
	
session_start();
  $error_msg = "";

if ( (isset($_COOKIE['id']) && isset($_COOKIE['name'])) || (isset($_SESSION['id']) && isset($_SESSION['name'])) ) {
	$_COOKIE['id'] = $_SESSION['id'];
    $_COOKIE['name'] = $_SESSION['name'];
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/main';
    header('Location: ' . $home_url);
}

else if ( (!isset($_COOKIE['id']) && !isset($_COOKIE['name'])) || (!isset($_SESSION['id']) && !isset($_SESSION['name'])) )  {
     if (isset($_POST['submit'])) {
     $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	 if(!$con) { 
	 die('Could not connect: '.mysql_error()); 
	 }
      
	 $username = mysqli_real_escape_string($con, trim($_POST['username']));
     $password = mysqli_real_escape_string($con, trim($_POST['password']));
	  
	 if (!empty($username) && !empty($password)) {
	 $query = "SELECT id, name, username, auth_keys FROM admins WHERE username = '$username' AND password = SHA('$password')";
     $data = mysqli_query($con, $query);

     if (mysqli_num_rows($data) == 1) {
     $row = mysqli_fetch_array($data);
     if(isset($_POST['remember']) && $_POST['remember'] == 'yes') {
		  $_SESSION['id'] = $row['id'];
          $_SESSION['name'] = $row['name'];
		  $_SESSION['auth_keys'] = $row['auth_keys'];
          setcookie('id', $row['id'], time() + (60 * 60 * 24 * 15));
          setcookie('name', $row['name'], time() + (60 * 60 * 24 * 15));
		  setcookie('auth_keys', $row['auth_keys'], time() + (60 * 60 * 24 * 15));
		  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/main';
          header('Location: ' . $home_url);
		  }
	 else {
		  $_SESSION['id'] = $row['id'];
          $_SESSION['name'] = $row['name'];
		  $_SESSION['auth_keys'] = $row['auth_keys'];
		  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/main';
          header('Location: ' . $home_url);
		  }
		}
     else {
     $error_msg = "Sorry, you must enter a valid username and password to LogIn";
     }
     }
     else {
     $error_msg = "Sorry, you must enter your username and password to LogIn";
     }
   }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/universal.css" />
<link rel="shortcut icon" href="images/xspFavicon.ico" />
<title>XSP Log In</title>
</head>

<body class="installerBody">
<div class="wrapper-installer">
  <div class="xsp-installer"></div>
  <div class="logo-installer"></div>
  <div class="shadow-installer"></div>
  <div class="text-installer">Log In</div>
</div>

<div id="message">
<?php
if (empty($_SESSION['id'])) {
echo '<p>' . $error_msg . '</p>';
}
?>
</div>

<?php include('includes/login-form.php'); ?>

</body>
<?php 
}
database_disconnect($con='');
?>