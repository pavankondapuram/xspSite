<?php 

require_once('includes/authentication.php');
require_once('config.php');
database_connect($DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD);
include('includes/admin-pass.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Admin</title>
<link href="css/divStyler.css" rel="stylesheet" type="text/css" />
<link href="css/tableStyler.css" rel="stylesheet" type="text/css" />
<link href="css/formStyler.css" rel="stylesheet" type="text/css" />
<link href="css/jsStyler.css" rel="stylesheet" type="text/css" />
<script src="scripts/SpryTooltip.js" type="text/javascript"></script>
<script src="scripts/pop-up.js" type="text/javascript"></script>
<link rel="shortcut icon" href="images/xspFavicon.ico" />
</head>

<body>
<?php include('shared-resorces/header.php'); ?>

<div class="panelIndex" id="panelIndexMain">&nbsp;

<?php include('shared-resorces/main-menu.php'); ?>

<p class="pageName">Add Administrator</p>
<div class="profileIndex" id="addAdminIndexHeight">&nbsp;

<?php

$access=mysql_query("SELECT * FROM admins where id='".$_SESSION['id']."'");
$check=mysql_fetch_array($access);
             if($check['priority']==1)
					 {
?>

<div id="validationMessage">

<?php

if(isset($_POST['add_admin'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$retype_password=$_POST['retype_password'];
	$type=$_POST['type'];
	$date=date("y/m/d");
	
	if(empty($name) || empty($email) || empty($username) || empty($password) || empty($retype_password)) {  
	echo "Please fill in all the fields<br/>";
	}
	
	if($type=="Select-Type") {
	echo "Select Admin Type<br/>";
	}
	
	$check_username = mysql_num_rows(mysql_query("SELECT * FROM admins WHERE username='$username'"));
	$check_email = mysql_num_rows(mysql_query("SELECT * FROM admins WHERE email='$email'"));
	
	if($check_username==1) { 
	echo "Username already exists in our database, please choose a different username<br/>";
	}
	
	if($check_email==1) {
	echo "E-mail id already exists in our database, Please choose a different email id<br/>";
	}
}

if(!empty($name) && !empty($email) && !empty($username) && 
   !empty($password) && !empty($retype_password) && ($type=="Admin") && ($check_username==0) && ($check_email==0)) {  

    if (!preg_match("/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is", $email)) { 
	echo "Email you entered is not valid<br/>";
	}
	else if ($password!=$retype_password) {
    echo "password did not match<br/>"; 
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
				          VALUE('$username', SHA('$password'), '$date', '$name', '$email', '$auth_keys', '2', '$type')");
	if(!$query) { 
	$message = mysql_error(); 
	}
	echo "Admin successfully added";
	$mail_to = $email;
    $subject = "XSP Administrator Account";
	$body_message = "Your account is set on xsp as admin\n";
    $body_message .= "User Name: ".$username."\n";
	$body_message .= "Password: You selected during registration\n";
	$body_message .= 'Login to XSP admin panal to take further actions: ';
	$body_message .= 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    $headers = "From: \"\"<".$reply_email.">\n";
    $headers .= "Reply-To: \"\"<".$reply_email.">\n";
	$mail_status = mail($mail_to, $subject, $body_message, $headers);
	$name="";
    $email="";
    $username="";
    $password="";
    $retype_password="";
	}

}

else if(!empty($name) && !empty($email) && !empty($username) && 
		!empty($password) && !empty($retype_password) && ($type=="Super-Admin") && ($check_username==0) && ($check_email==0)) {  

    if (!preg_match("/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is", $email)) { 
	echo "Email you entered is not valid";
	}
	else if ($password!=$retype_password) {
    echo "password did not match";
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
				          VALUE('$username', SHA('$password'), '$date', '$name', '$email', '$auth_keys', '1', '$type')");
	if(!$query) { 
	$message = mysql_error(); 
	}
	echo "Super admin successfully added";
	$mail_to = $email;
    $subject = "XSP Administrator Account";
	$body_message = "Your account is set on xsp as Super admin\n";
    $body_message .= "User Name: ".$username."\n";
	$body_message .= "Password: You selected during registration\n";
	$body_message .= 'Login to XSP admin panal to take further actions: ';
	$body_message .= 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    $headers = "From: \"\"<".$reply_email.">\n";
    $headers .= "Reply-To: \"\"<".$reply_email.">\n";
	$mail_status = mail($mail_to, $subject, $body_message, $headers);
	$name="";
    $email="";
    $username="";
    $password="";
    $retype_password="";
	}
}

?>

</div>
<form class="profile_viewer" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

<?php

include('includes/addAdmin-form.php');

?>

</form>

<?php

}
else {
echo "<p id=\"adminError\">
This area can be viewed only by super administrators, You dont have enough permission.
</p>";
}

?>

&nbsp;</div>
&nbsp;</div>

<?php 

include('shared-resorces/footer.php'); 
database_disconnect($con='');

?>
</body>
</html>