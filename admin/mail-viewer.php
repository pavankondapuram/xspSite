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
<title>Sent Mail</title>
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

<p class="pageName">Sent Mail</p>
<div class="sentMailViewer">&nbsp;

<?php

if(isset($_GET['delete_mail_button_cu']))  {
$delete_mail_id=$_GET['delete_mail_id_cu'];
mysql_query("DELETE FROM sentmail_contact_us WHERE id='$delete_mail_id'");
echo '<meta http-equiv=Refresh content="0;url=contactedEnquiries?tab=2#TabbedPanels1">';
}

if(isset($_GET['delete_mail_button_sm']))  {
$delete_mail_id=$_GET['delete_mail_id_cu'];
mysql_query("DELETE FROM sentmail_contact_us WHERE id='$delete_mail_id'");
echo '<meta http-equiv=Refresh content="0;url=sentMails">';
}

if(isset($_REQUEST['sentMail_ce_button'])) {
				        $sentMail_id_ce=$_REQUEST['sentMail_id_ce'];
                        $db_data=mysql_query("SELECT date, name, email, subject, message FROM sentmail_contact_us WHERE id='$sentMail_id_ce'");
                        $disp_data=mysql_fetch_array($db_data);
                        $mail_date=$disp_data['date'];
                        $mailto_name=$disp_data['name'];
                        $mailto_email=$disp_data['email'];
						$mailto_subject=$disp_data['subject'];
						$mailto_message=$disp_data['message'];

?>

<table class="CUtableMain">

<tr>
<td class="sentMailViewerTDdes">Sent To:</td>
<td class="sentMailViewerTDlist"><?php echo $mailto_email; ?></td>
<td rowspan="3">&nbsp;</td>
</tr>

<tr>
<td class="sentMailViewerTDdes">Name:</td>
<td class="sentMailViewerTDlist"><?php echo $mailto_name; ?></td>
</tr>

<tr>
<td class="sentMailViewerTDdes">Date:</td>
<td class="sentMailViewerTDlist"><?php echo $mail_date; ?></td>
</tr>

<tr>
<td class="sentMailViewerTDdes">Subject:</td>
<td class="sentMailViewerTDsubject" colspan="2"><?php echo $mailto_subject; ?></td>
</tr>

<tr>
<td class="sentMailViewerOprt" colspan="3">
<input type="button" id="viewMailButton" class="tabelButton" onClick="location.href='contactedEnquiries?tab=2#TabbedPanels1'" value="Back" />
<form method="GET" onSubmit="return confirm('Are you sure to Delete this mail?')">
<input name="delete_mail_id_cu" type="hidden" value="<?php echo $sentMail_id_ce; ?>" />
<input id="viewMailButton" class="tabelButton" type="submit" name="delete_mail_button_cu" value="Delete" />
</form>
</td>
</tr>

<tr>
<td class="sentMailViewerTDbody" colspan="3"><?php echo $mailto_message; ?></td>
</tr>

</table>

<?php 

}

if(isset($_REQUEST['sentMail_sm_button'])) {
				        $sentMail_id_ce=$_REQUEST['sentMail_id_ce'];
                        $db_data=mysql_query("SELECT date, name, email, subject, message FROM sentmail_contact_us WHERE id='$sentMail_id_ce'");
                        $disp_data=mysql_fetch_array($db_data);
                        $mail_date=$disp_data['date'];
                        $mailto_name=$disp_data['name'];
                        $mailto_email=$disp_data['email'];
						$mailto_subject=$disp_data['subject'];
						$mailto_message=$disp_data['message'];

?>

<table class="mailViewer">

<tr>
<td class="sentMailViewerTDdes">Sent To:</td>
<td class="sentMailViewerTDlist"><?php echo $mailto_email; ?></td>
<td rowspan="3">&nbsp;</td>
</tr>

<tr>
<td class="sentMailViewerTDdes">Name:</td>
<td class="sentMailViewerTDlist"><?php echo $mailto_name; ?></td>
</tr>

<tr>
<td class="sentMailViewerTDdes">Date:</td>
<td class="sentMailViewerTDlist"><?php echo $mail_date; ?></td>
</tr>

<tr>
<td class="sentMailViewerTDdes">Subject:</td>
<td class="sentMailViewerTDsubject" colspan="2"><?php echo $mailto_subject; ?></td>
</tr>

<tr>
<td class="sentMailViewerOprt" colspan="3">
<input type="button" id="viewMailButton" class="tabelButton" onClick="location.href='sentMails'" value="Back" />
<form method="GET" onSubmit="return confirm('Are you sure to Delete this mail?')">
<input name="delete_mail_id_cu" type="hidden" value="<?php echo $sentMail_id_ce; ?>" />
<input id="viewMailButton" class="tabelButton" type="submit" name="delete_mail_button_sm" value="Delete" />
</form>
</td>
</tr>

<tr>
<td class="sentMailViewerTDbody" colspan="3"><?php echo $mailto_message; ?></td>
</tr>

</table>

<?php 
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