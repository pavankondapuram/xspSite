<?php

// ** MySQL settings - You can get this info from your web hosting service provider ** //

/** The name of the database  */
$DB_NAME = 'thetecha_xsp';

/** MySQL database username */
$DB_USER = 'thetecha_xsp';

/** MySQL database password */
$DB_PASSWORD = '$0DLAm$kqxI{';
//$DB_PASSWORD = 'password123@';

/** MySQL hostname */
$DB_HOST = 'localhost';

/** Reply emails for sent emails */
$reply_email='info@thexsp.com';

function database_connect($DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD) {
	
	$con= @mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
	
	if(!$con) {
		die("Error: ".mysql_error());
	}
	
	$connect=mysql_select_db($DB_NAME, $con);
	
	if($connect) {
		return $connect;
	}
	
}

function database_disconnect($con='') {
	
	$discon= @mysql_close($con);
	
	if(!$discon) {
		die(mysql_error()); 
	}
	
}

?>