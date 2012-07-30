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
<title>Contacted Enquiries</title>
<link href="css/divStyler.css" rel="stylesheet" type="text/css" />
<link href="css/tableStyler.css" rel="stylesheet" type="text/css" />
<link href="css/jsStyler.css" rel="stylesheet" type="text/css" />
<script src="scripts/SpryTooltip.js" type="text/javascript"></script>
<script src="scripts/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="scripts/SpryURLUtils.js" type="text/javascript"></script>
<script src="scripts/pop-up.js" type="text/javascript"></script>
<script type="text/javascript">
var params = Spry.Utils.getLocationParamsAsObject();
</script>
<link rel="shortcut icon" href="images/xspFavicon.ico">
</head>

<body>

<?php include('shared-resorces/header.php'); ?>

<div class="panelIndex" id="panelIndexMain">&nbsp;

<?php include('shared-resorces/main-menu.php') ?>

<p class="pageName">Contacted Enquiries</p>
<div class="tabbedPanelBar">&nbsp;</div>
<div id="TabbedPanels1" class="TabbedPanels">
      <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab" tabindex="0">Main</li>
        <li class="TabbedPanelsTab" tabindex="0">Trash</li>
        <li class="TabbedPanelsTab" tabindex="0">Sent Mails</li>
      </ul>
<div class="TabbedPanelsContentGroup">
<div class="TabbedPanelsContent">

<table class="CUtableMain">
<tr>
<th class="CUmainTHdate">Date</th>
<th class="CUmainTHname">Name<hr />Contact Number</th>
<th class="CUmainTHemail">Email<hr />IP</th>
<th class="CUmainTHmsg">Message</th>
<th class="CUmainTHstatus">Status</th>
<th class="CUmainTHoprt">Operations</th>
</tr>
    
<?php

if(isset($_GET['trash_button']))  {
$trash_id=$_GET['trash_id'];
$trash_priority=$_GET['trash_priority'];

mysql_query("UPDATE contact_us SET priority='$trash_priority' WHERE id='$trash_id'");
}

if (isset($_GET['update'])) {
	$status_id=$_GET['status_id'];
	$status=$_GET['update_status'];
	
	mysql_query("UPDATE contact_us SET status='$status' WHERE id='$status_id'");
}

if(isset($_GET['offset'])) { $offset= $_GET['offset']; }

$limit = 10;
$numresults=mysql_query("select * from contact_us WHERE priority = 1 ORDER BY id DESC");
$numrows=mysql_num_rows($numresults);

if (empty($offset)) { $offset=0; }

$db_data=mysql_query("SELECT * FROM contact_us WHERE priority = 1 ORDER BY id DESC LIMIT $offset, $limit");
				     while($row=mysql_fetch_array($db_data))
				        {
                     echo "<tr>";
					 echo "<td class=\"CUmainTDhite\">".$row['date']."</td>";
                     echo "<td class=\"CUmainTDhite\">".$row['name']."<hr />".$row['contact_no']."</td>";
                     echo "<td class=\"CUmainTDhite\">".$row['email']."<hr />".$row['ip']."</td>";
                     echo "<td class=\"CUmainTDhite\">".$row['message']."</td>";
                     echo "<td class=\"CUmainTDhite\">".$row['status'].
					      "<hr/><form method=\"GET\">
						   <input name=\"status_id\" type=\"hidden\" value=".$row['id']." />
						   <input type=\"text\" name=\"update_status\" value=\"Update Status\" onfocus=\"if(this.value=='Update Status')this.value='';\">
						   <input class=\"tabelButton\" type=\"submit\" name=\"update\" value=\"Update\"></form></td>";
				     echo "<form method=\"GET\" onSubmit=\"return confirm('Are you sure to trash this entre?')\">";
			   	     echo "<input name=\"trash_id\" type=\"hidden\" value=".$row['id']." />";
					 echo "<input name=\"trash_priority\" type=\"hidden\" value=2 />";
					 echo "<td class=\"CUmainTDhite\"><input class=\"tabelButton\" type=\"submit\" name=\"trash_button\" value=\"Trash\" />";
					 echo "</form>";
					 echo "<form action=\"mailer-cu\" method=\"GET\">";
					 echo "<input name=\"mailto_id\" type=\"hidden\" value=".$row['id']." />";
					 echo "<input class=\"tabelButton\" type=\"submit\" name=\"mailto_button\" value=\"Mail\" /></td>";
					 echo "</form>";
					 echo "</tr>";
                        }
?>

</table>

<?php    
include('includes/overflow-function-cu.php');
?>
</div>

<div class="TabbedPanelsContent">
<div class="CUtrashMain"> 
   
<table class="CUtabletrash">
<tr>
<th class="CUmainTHdate">Date</th>
<th class="CUmainTHname">Name<hr />Contact Number</th>
<th class="CUmainTHemail">Email</th>
<th class="CUmainTHmsg">Message</th>
<th class="CUmainTHstatusTrash">Status</th>
<th class="CUmainTHoprt">Operations</th>
</tr>
    
<?php

if(isset($_GET['restore_button']))  {
$restore_id=$_GET['restore_id'];
$restore_priority=$_GET['restore_priority'];

mysql_query("UPDATE contact_us SET priority='$restore_priority' WHERE id='$restore_id'");
echo '<meta http-equiv=Refresh content="0;url=contactedEnquiries?tab=1#TabbedPanels1">';
}

if(isset($_GET['delete_button']))  {
$delete_id=$_GET['delete_id'];

mysql_query("DELETE FROM contact_us WHERE id='$delete_id'");
echo '<meta http-equiv=Refresh content="0;url=contactedEnquiries?tab=1#TabbedPanels1">';
}

$numresults=mysql_query("select * from contact_us WHERE priority = 2");
$numrows=mysql_num_rows($numresults);

$db_data=mysql_query("SELECT * FROM contact_us WHERE priority = 2 ORDER BY id DESC");
				     while($row=mysql_fetch_array($db_data))
				        {
                     echo "<tr>";
					 echo "<td class=\"CUmainTDhite\">".$row['date']."</td>";
                     echo "<td class=\"CUmainTDhite\">".$row['name']."<hr />".$row['contact_no']."</td>";
                     echo "<td class=\"CUmainTDhite\">".$row['email']."</td>";
                     echo "<td class=\"CUmainTDhite\">".$row['message']."</td>";
                     echo "<td class=\"CUmainTDhite\">".$row['status']."</td>";
				     echo "<form method=\"GET\">";
			   	     echo "<input name=\"restore_id\" type=\"hidden\" value=".$row['id']." />";
					 echo "<input name=\"restore_priority\" type=\"hidden\" value=1 />";
					 echo "<td class=\"CUmainTDhite\"><input class=\"tabelButton\" type=\"submit\" name=\"restore_button\" value=\"Restore\" />";
					 echo "</form>";
					 echo "<form method=\"GET\" onSubmit=\"return confirm('Are you sure to Delete this entre?')\">";
					 echo "<input name=\"delete_id\" type=\"hidden\" value=".$row['id']." />";
					 echo "<input class=\"tabelButton\" type=\"submit\" name=\"delete_button\" value=\"Delete\" /></td>";
					 echo "</form>";
					 echo "</tr>";
                        }
?>

</table>

<?php
if($numrows==0) {
	echo "<p class=\"overFlowBar\">You have Nothing in your Trash</p>";
}
?>
</div>
</div>
    
<div class="TabbedPanelsContent">
<div class="CUtrashMain"> 
<table class="CUtabletrash">
<tr>
<th class="CUmainTHdate">Date</th>
<th class="CUmainTHname">Name</th>
<th class="CUmainTHemail">Email</th>
<th class="CUmainTHsubject">Subject</th>
<th class="CUmainTHmailOprt">Operations</th>
</tr>
    
<?php

if(isset($_GET['delete_mail_button']))  {
$delete_mail_id=$_GET['delete_mail_id'];

mysql_query("DELETE FROM sentmail_contact_us WHERE id='$delete_mail_id'");
echo '<meta http-equiv=Refresh content="0;url=contactedEnquiries?tab=2#TabbedPanels1">';
}

$numresults=mysql_query("select * from sentmail_contact_us");
$numrows=mysql_num_rows($numresults);

$db_data=mysql_query("SELECT * FROM sentmail_contact_us ORDER BY id DESC");
				     while($row=mysql_fetch_array($db_data))
				        {
                     echo "<tr>";
					 echo "<td class=\"CUmainTDhite\">".$row['date']."</td>";
                     echo "<td class=\"CUmainTDhite\">".$row['name']."</td>";
                     echo "<td class=\"CUmainTDhite\">".$row['email']."</td>";
                     echo "<td class=\"CUmainTDhite\">".$row['subject']."</td>";
				     echo "<form action=\"mail-viewer\" method=\"GET\">";
					 echo "<input name=\"sentMail_id_ce\" type=\"hidden\" value=".$row['id']." />";
					 echo "<td class=\"CUmainTDhite\">
					       <input id=\"viewMailButton\" class=\"tabelButton\" type=\"submit\" name=\"sentMail_ce_button\" value=\"Read\" />";
					 echo "</form>";
				     echo "<form method=\"GET\" onSubmit=\"return confirm('Are you sure to Delete this mail?')\">";
			   	     echo "<input name=\"delete_mail_id\" type=\"hidden\" value=".$row['id']." />";
					 echo "<input id=\"viewMailButton\" class=\"tabelButton\" type=\"submit\" name=\"delete_mail_button\" value=\"Delete\" /></td>";
					 echo "</form>";
					 echo "</tr>";
                        }
?>

</table>

<?php
if($numrows==0) {
	echo "<p class=\"overFlowBar\">You have no sent mails</p>";
}
?>
</div>
</div>
</div>
</div>

&nbsp;</div>

<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1",{defaultTab: params.tab ? params.tab : 0});
//-->
</script>

<?php 

include('shared-resorces/footer.php'); 
database_disconnect($con='');

?>
</body>
</html>