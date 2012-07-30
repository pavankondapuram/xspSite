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
<title>XSP Administration</title>
<link href="css/divStyler.css" rel="stylesheet" type="text/css" />
<link href="css/jsStyler.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/xspFavicon.ico">
<script src="scripts/SpryTooltip.js" type="text/javascript"></script>
<script src="scripts/SpryCollapsiblePanel.js" type="text/javascript"></script>
<script src="scripts/pop-up.js" type="text/javascript"></script>
</head>

<body>

<?php include('shared-resorces/header.php'); ?>

<div class="panelIndex" id="panelIndexMain">&nbsp;

<div id="CollapsiblePanel1" class="CollapsiblePanel">
<div class="CollapsiblePanelTab" tabindex="0">Data Management</div>
<div class="CollapsiblePanelContent">

<a id="followMe1" class="icon" href="contactedEnquiries"><img src="images/contactedEnquiries.png" border="0" /></a>
<div class="tooltipContent" id="following1">View, edit, manage and mail to Contacted Enquries</div>

<p class="panelMenuDescription">
This section provides general management facilities for your data. You can view and manage the list of your data and contacts. Manage all kinds of input from your website at one place.
</p>

</div>
</div>

<div id="CollapsiblePanel2" class="CollapsiblePanel">
<div class="CollapsiblePanelTab" tabindex="0">Administrator Profiles</div>
<div class="CollapsiblePanelContent">

<a id="followMe3" class="icon" href="myAccount"><img src="images/yourProfile.png" border="0" /></a>
<div class="tooltipContent" id="following3">View and edit your Profile</div>

<a id="followMe2" class="icon" href="addAdmin"><img src="images/add-admin.png" border="0" /></a>
<div class="tooltipContent" id="following2">Add Administrator</div>

<a id="followMe4" class="icon" href="administrator"><img src="images/admins.png" border="0" /></a>
<div class="tooltipContent" id="following4">Manage all Administrators</div>

<p class="panelMenuDescription">
This section allows you to manage and edit your profile details. You can add, view and manage the list of other administrator from here.
</p>

</div>
</div>

<div id="CollapsiblePanel3" class="CollapsiblePanel">
<div class="CollapsiblePanelTab" tabindex="0">Mailers and Trash</div>
<div class="CollapsiblePanelContent">

<a id="followMe5" class="icon" href="sentMails"><img src="images/sentMails.png" border="0" /></a>
<div class="tooltipContent" id="following5">View all sent mails</div>

<a id="followMe6" class="icon" href="trash"><img src="images/trash.png" border="0" /></a>
<div class="tooltipContent" id="following6">View and restore deleted items from trash</div>

<p class="panelMenuDescription">
This section provides you the view of trash and sent mails, also you can send email news letter to your email subscribers.
</p>

</div>
</div>

&nbsp;</div>

<script type="text/javascript">
<!--
var followTrigger = new Spry.Widget.Tooltip('following1', '#followMe1', {followMouse: true,  offsetX: -110, offsetY: 30});
var followTrigger = new Spry.Widget.Tooltip('following2', '#followMe2', {followMouse: true,  offsetX: -110, offsetY: 30});
var followTrigger = new Spry.Widget.Tooltip('following3', '#followMe3', {followMouse: true, offsetX: -110, offsetY: 30});
var followTrigger = new Spry.Widget.Tooltip('following4', '#followMe4', {followMouse: true, offsetX: -110, offsetY: 30});
var followTrigger = new Spry.Widget.Tooltip('following5', '#followMe5', {followMouse: true, offsetX: -110, offsetY: 30});
var followTrigger = new Spry.Widget.Tooltip('following6', '#followMe6', {followMouse: true, offsetX: -110, offsetY: 30});
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1", { duration: 500, enableKeyboardNavigation:true });
var CollapsiblePanel2 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel2", { duration: 500, enableKeyboardNavigation:true });
var CollapsiblePanel3 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel3", { duration: 500, enableKeyboardNavigation:true });
//-->
</script>

<?php 

include('shared-resorces/footer.php'); 
database_disconnect($con='');

?>

</body>
</html>