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
<title>Sent Mails</title>
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

<?php include('shared-resorces/main-menu.php'); ?>

<p class="pageName">Sent Mails</p>
<div class="tabbedPanelBar">&nbsp;</div>

<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Contacted Enquiries</li>
  </ul>
  
<div class="TabbedPanelsContentGroup">

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

if(isset($_GET['delete_mail_button_cu']))  {
$delete_mail_id=$_GET['delete_mail_id'];

mysql_query("DELETE FROM sentmail_contact_us WHERE id='$delete_mail_id'");
echo '<meta http-equiv=Refresh content="0;url=sentMails?tab=0#TabbedPanels1">';
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
					       <input id=\"viewMailButton\" class=\"tabelButton\" type=\"submit\" name=\"sentMail_sm_button\" value=\"Read\" />";
					 echo "</form>";
				     echo "<form method=\"GET\" onSubmit=\"return confirm('Are you sure to Delete this mail?')\">";
			   	     echo "<input name=\"delete_mail_id\" type=\"hidden\" value=".$row['id']." />";
					 echo "<input id=\"viewMailButton\" class=\"tabelButton\" type=\"submit\" name=\"delete_mail_button_cu\" value=\"Delete\" /></td>";
					 echo "</form>";
					 echo "</tr>";
                        }
?>

</table>

<?php
if($numrows==0) {
	echo "<p class=\"overFlowBar\">You have no sent mails in Contacted Enquiries</p>";
}
?>
</div>
</div>

</div>
&nbsp;</div>

<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1",{defaultTab: params.tab ? params.tab : 0});
-->
</script>

<?php 

include('shared-resorces/footer.php'); 
database_disconnect($con='');

?>
</body>
</html>