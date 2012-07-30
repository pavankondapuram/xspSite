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
<title>Administrator Accounts</title>
<link href="css/divStyler.css" rel="stylesheet" type="text/css" />
<link href="css/tableStyler.css" rel="stylesheet" type="text/css" />
<link href="css/formStyler.css" rel="stylesheet" type="text/css" />
<link href="css/jsStyler.css" rel="stylesheet" type="text/css" />
<script src="scripts/SpryTooltip.js" type="text/javascript"></script>
<script src="scripts/pop-up.js" type="text/javascript"></script>
<link rel="shortcut icon" href="images/xspFavicon.ico">
</head>

<body>
<?php include('shared-resorces/header.php'); ?>

<div class="panelIndex" id="panelIndexMain">&nbsp;

<?php include('shared-resorces/main-menu.php'); ?>

<p class="pageName"> Manage Administrators</p>

<?php

if (isset($_GET['delete_button'])) {
$id=$_GET['id'];

mysql_query("DELETE FROM admins WHERE id='$id'");
echo '<meta http-equiv=Refresh content="0;url=administrator?reload=1">';
}

if (isset($_GET['update_type'])) {
   $id=$_GET['id'];
   $make_type=$_GET['make_type'];

   if($make_type=="Super-Admin" ) {
           $update=mysql_query("UPDATE admins SET priority=1, type='$make_type' WHERE id='$id'");
		   if(!$update) { echo "Error: ".mysql_error(); }
		   else {
			   echo "<p id=\"adminError\">Type Updated</p>";
			   echo "<meta http-equiv=\"refresh\" content=\"5; url=administrator\" />";
		   }
       }
   else if($make_type=="Admin") {
           $update=mysql_query("UPDATE admins SET priority=2, type='$make_type' WHERE id='$id'");
		   if(!$update){ echo "Error: ".mysql_error(); }
		   else {
			   echo "<p id=\"adminError\">Type Updated</p>";
			   echo "<meta http-equiv=\"refresh\" content=\"5; url=administrator\" />";
		   }
       }
   else if($make_type=="Select-Type") {
           echo "<p id=\"adminError\">Please Select Type</P>";
       }
}
?>
<div class="adminsIndex">&nbsp;
<table class="adminTableMain">
<tr>
<th class="adminTHid">ID</th>
<th class="CUmainTHemail">Name<hr />User Name<hr />E-mail</th>
<th class="CUmainTHstatus">Change Admin Type</th>
<th class="CUmainTHoprt">&nbsp;</th>
</tr>

<?php
$db_data=mysql_query("SELECT * FROM admins ORDER BY id DESC");
$access=mysql_query("SELECT * FROM admins where id='".$_SESSION['id']."'");
$check=mysql_fetch_array($access);
             if($check['priority']==1)
					 {
				     while($row=mysql_fetch_array($db_data))
				        {
                     echo "<tr>";
					 echo "<td class=\"CUmainTDhite\">".$row['id']."</td>";
                     echo "<td class=\"CUmainTDhite\">".$row['name']."<hr/>".$row['username']."<hr/>".$row['email']."</td>";
                     echo "<td class=\"CUmainTDhite\">".$row['type']."<hr/>";
					 echo "<form method=\"get\">";
					 echo "<input name=\"id\" type=\"hidden\" value=".$row['id']." />";
					 echo "<select name=\"make_type\">
					       <option>Select-Type</option>
                           <option>Admin</option>
                           <option>Super-Admin</option>
                           </select>";
					 echo "<input class=\"tabelButton\" name=\"update_type\" type=\"submit\" value=\"Update Type\" />";
					 echo "</form></td>";
				     echo "<td class=\"CUmainTDhite\">
					       <form method=\"GET\" onSubmit=\"return confirm('Are you sure to delete this admin?')\">";
			   	     echo "<input name=\"id\" type=\"hidden\" value=".$row['id']." />";
					 echo "<input class=\"tabelButton\" type=\"submit\" name=\"delete_button\" value=\"Delete\" />";
					 echo "</form></td>";
					 echo "</tr>";
                        }
					 }
			  else
			         {
				     echo "<p id=\"adminError\">
					 This area can be viewed only by super administrators, You dont have enough permission.
					 </p>";
					 }

?>

</table>
&nbsp;</div>
&nbsp;</div>

<?php 

include('shared-resorces/footer.php'); 
database_disconnect($con='');

?>
</body>
</html>