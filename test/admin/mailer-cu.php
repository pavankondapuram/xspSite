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
<title>Mailer Contacted Enquiries</title>
<link href="css/divStyler.css" rel="stylesheet" type="text/css" />
<link href="css/tableStyler.css" rel="stylesheet" type="text/css" />
<link href="css/formStyler.css" rel="stylesheet" type="text/css" />
<link href="css/jsStyler.css" rel="stylesheet" type="text/css" />
<script src="scripts/SpryTooltip.js" type="text/javascript"></script>
<script src="scripts/tiny_mce.js" type="text/javascript"></script>
<script src="scripts/pop-up.js" type="text/javascript"></script>
<script type="text/javascript">
tinyMCE.init({
        theme : "advanced",
        mode : "textareas",
        plugins : "fullpage",
        theme_advanced_buttons3_add : "fullpage",
		theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : false,
		skin : "o2k7",
		plugins :"autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
		theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,advhr,|,ltr,rtl,|,spellchecker,fullscreen",
});
</script>
<link rel="shortcut icon" href="images/xspFavicon.ico" />
</head>

<body>

<?php include('shared-resorces/header.php'); ?>

<div class="panelIndex" id="panelIndexMain">&nbsp;

<?php include('shared-resorces/main-menu.php'); ?>

<p class="pageName">E-Mailer</p>

<div class="mailerIndex">&nbsp;

<?php 
echo "<div class=\"discard\"><input type=\"button\" id=\"discardButton\" class=\"tabelButton\" 
       onClick=\"location.href='contactedEnquiries?tab=0#TabbedPanels1'\" value=\"Discard\" /></div>";
$mailto_id=$_REQUEST['mailto_id'];
$db_data=mysql_query("SELECT name, email FROM contact_us WHERE id='$mailto_id'");
$disp_data=mysql_fetch_array($db_data);
$email_date=date("y/m/d");
$mailto_name=$disp_data['name'];
$mailto_email=$disp_data['email'];

if (isset($_POST['send'])) { 
	$subject=$_POST['subject'];
	$body=$_POST['body'];
	
    if (empty($subject) && empty($body) ) { 
	        echo "<p id=\"validationError\">Please Enter Subject and Message.</p><br />";
        }
    else if (!empty($subject) && empty($body) ) { 
	        echo "<p id=\"validationError\">Please Enter Message.</p><br/>"; 
        }
    else if (empty($subject) && !empty($body) ) { 
	        echo "<p id=\"validationError\">Please Enter Subject.</p><br/>"; 
        }
    else if (!empty($subject) && !empty($body) ) {    
              $headers = "MIME-Version: 1.0" . "\r\n";
              $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
              $headers .= "From: \"\"<".$reply_email.">\n";
              $headers .= "Reply-To: \"\"<".$reply_email.">\n";
	          $mail_status = mail($mailto_email, $subject, $body, $headers);
			  if($mail_status) {
	                $query=mysql_query("INSERT INTO sentmail_contact_us(date, name, email, subject, message) 
								 VALUE('$email_date', '$mailto_name', '$mailto_email', '$subject', '$body')");
                    echo "<h6 align=\"center\"><font color=\"#000000\">Email sent successfully.</font></h6><br/>";
					echo '<meta http-equiv=Refresh content="3;url=contactedEnquiries">';
					$mailto_id="";
					$mailto_name="";
                    $mailto_email="";
					$subject="";
	                $body="";
			  }
			  else { 
			     echo "<p id=\"validationError\">E-mail sending failed</p><br/>";
			  }
	    }
		
}

include('includes/mailer-form.php'); 

?>

&nbsp;</div>

&nbsp;</div>
<?php 

include('shared-resorces/footer.php'); 
database_disconnect($con='');

?>
</body>
</html>