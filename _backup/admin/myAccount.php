<?php 

require_once('config.php');
authenticate();
database_connect($DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD);
admin_pass();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Account</title>
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

<p class="pageName">My Account</p>
<div class="profileIndex" id="profileIndexHeight">&nbsp;
<?php

$db_data=mysql_query("SELECT id, date, username, name, email, type FROM admins WHERE id='".$_SESSION['id']."'");
$row=mysql_fetch_array($db_data);
?>
<form class="profile_viewer" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<?php

include('includes/account-form.php');

if (isset($_POST['update_profile'])) {
   $name=$_POST['name'];
   $email=$_POST['email'];
   $new_password=$_POST['new_password'];
   $retype_password=$_POST['retype_password'];
   if (!empty($new_password) && empty($retype_password) ) { 
	    echo "<p id=\"validationError\">Password did not match</p><br/>"; 
    }
   else if(empty($name)) {
		echo "<p id=\"validationError\">Name Cannot be empty</p><br/>";
	}
   else if(empty($email)) {
		echo "<p id=\"validationError\">Email Cannot be empty</p><br/>";
	}
   else if(!preg_match("/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is", $email)) {
				echo "<p id=\"validationError\">The email you entered is not valid</p>";
	}
   else if (empty($new_password) && !empty($retype_password) ) { 
	    echo "<p id=\"validationError\">Password did not match</p><br/>"; 
    }
   else if (empty($new_password) && empty($retype_password) && !empty($name) && !empty($email) ) { 
	    mysql_query("UPDATE admins SET name='$name', email='$email' WHERE id='".$_SESSION['id']."'");
        echo "<p id=\"validationError\">Profile Updated</p><br/>" ;
		echo "<meta http-equiv=\"refresh\" content=\"5; url=myAccount\" />";
    }
   elseif (!empty($new_password) && !empty($retype_password) ) {
	   if($new_password!=$retype_password) {
		    echo "<p id=\"validationError\">Password did not match</p><br/>";
	    }
	   else if($new_password==$retype_password) {
          mysql_query("UPDATE admins SET name='$name', email='$email', password=SHA('$new_password') WHERE id='".$_SESSION['id']."'");
          echo "<p id=\"validationError\">Profile Updated</p><br/>" ;
	      echo "<meta http-equiv=\"refresh\" content=\"5; url=myAccount\" />";
	    }
    }
}
?>
</form>

<?php

if(isset($_POST['reset_cookies'])) {
	
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
		
        mysql_query("UPDATE admins SET auth_keys='$auth_keys' WHERE id='".$_SESSION['id']."'");
        $success_msg = "All existing cookies are invalidated succesfully<br/>
		                You will be logged out automatically with in 10 seconds" ;
	    echo "<meta http-equiv=\"refresh\" content=\"10; url=logout\" />";	
}

?>

<table class="resetCookies">

<tr>
<td>
You can reset cookies at any point in time to invalidate all existing cookies. This will promt you to log in again.
</td>
<td>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
<input type="submit" class="buttonReg" id="button_resetCookies" value="Reset Cookies" name="reset_cookies" />
</form>
</td>
</tr>

<tr>
<td colspan="2">
<p id="validationError"><?php if(isset($_POST['reset_cookies'])) { echo $success_msg; } ?></p>
</td>
</tr>

</table>

&nbsp;</div>
&nbsp;</div>

<?php

include('shared-resorces/footer.php'); 
database_disconnect($con='');

?>
</body>
</html>