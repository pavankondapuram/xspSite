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
<title>Trash</title>
<link href="css/divStyler.css" rel="stylesheet" type="text/css" />
<link href="css/tableStyler.css" rel="stylesheet" type="text/css" />
<link href="css/jsStyler.css" rel="stylesheet" type="text/css" />
<script src="scripts/SpryTooltip.js" type="text/javascript"></script>
<script src="scripts/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="scripts/SpryURLUtils.js" type="text/javascript"></script>
<script type="text/javascript">
var params = Spry.Utils.getLocationParamsAsObject();
</script>
<script src="scripts/pop-up.js" type="text/javascript"></script>
<link rel="shortcut icon" href="images/xspFavicon.ico">
</head>

<body>
<?php include('shared-resorces/header.php'); ?>

<div class="panelIndex" id="panelIndexMain">&nbsp;

<?php include('shared-resorces/main-menu.php'); ?>

<p class="pageName">Trash</p>
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
<th class="CUmainTHname">Name<hr />Contact Number</th>
<th class="CUmainTHemail">Email</th>
<th class="CUmainTHmsg">Message</th>
<th class="CUmainTHstatusTrash">Status</th>
<th class="CUmainTHoprt">Operations</th>
</tr>
    
<?php

if(isset($_GET['restore_button_cu']))  {
$restore_id=$_GET['restore_id'];
$restore_priority=$_GET['restore_priority'];

mysql_query("UPDATE contact_us SET priority='$restore_priority' WHERE id='$restore_id'");
echo '<meta http-equiv=Refresh content="0;url=trash?tab=0#TabbedPanels1">';
}

if(isset($_GET['delete_button_cu']))  {
$delete_id=$_GET['delete_id'];

mysql_query("DELETE FROM contact_us WHERE id='$delete_id'");
echo '<meta http-equiv=Refresh content="0;url=trash?tab=0#TabbedPanels1">';
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
					 echo "<td class=\"CUmainTDhite\"><input class=\"tabelButton\" type=\"submit\" name=\"restore_button_cu\" value=\"Restore\" />";
					 echo "</form>";
					 echo "<form method=\"GET\" onSubmit=\"return confirm('Are you sure to Delete this entre?')\">";
					 echo "<input name=\"delete_id\" type=\"hidden\" value=".$row['id']." />";
					 echo "<input class=\"tabelButton\" type=\"submit\" name=\"delete_button_cu\" value=\"Delete\" /></td>";
					 echo "</form>";
					 echo "</tr>";
                        }
?>

</table>

<?php
if($numrows==0) {
	echo "<p class=\"overFlowBar\">You have Nothing in your Contacted Enquiries Trash</p>";
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