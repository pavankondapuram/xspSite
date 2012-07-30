<?php
	
	$check_admin = mysql_num_rows(mysql_query("SELECT id, auth_keys FROM admins WHERE id='{$_SESSION['id']}' AND auth_keys='{$_SESSION['auth_keys']}'"));
	if($check_admin==0) { 
	echo "<meta http-equiv=\"refresh\" content=\"0; url=logout\" />";
	}
	
?>