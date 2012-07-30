<?php

require_once('../config.php');

database_connect($DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD);
	
$check_db = "select * from admins";
$db_result = @mysql_query($check_db);
if($db_result) {
	echo "<meta http-equiv=\"refresh\" content=\"0; url=../\" />";
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
  <div class="text-installer">Web App Installer</div>
</div>
<div id="installNotes">
<?php

$install_app=false;
	
if(isset($_GET['runInstaller'])) {
         
		 include('mysql-intialize.php');

         if(!mysql_query($admins) || !mysql_query($contactUs) || !mysql_query($sentmailContactUs)) {
	            die('MySql Error: '.mysql_error());
	            $install_app=true;
				$register_admin=false;
         }

         else { 
               echo "<p align=\"center\">Step 1 successfully completed</p>";
               echo "<button id=\"installButton\" onClick=\"location.href='register'\">Next</button>";
	           $installation_MySql=false;
         }
         database_disconnect($con='');
}

else {
	$install_app=true;
}

if($install_app) {
include('install-guide.php');
}
?>
</div>
</body>
</html>
<?php } ?>