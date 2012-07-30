<?php
require_once('../config.php');

$date=date("y/m/d");
$name=$_POST['name'];
$email=$_POST['email'];
$contact_no=$_POST['contact_no'];
$message=$_POST['message'];
$priority=$_POST['priority'];
$ip=$_SERVER['REMOTE_ADDR'];

				$con = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
				if(!$con) {
					die('Error: '.mysql_error());
				}
				mysql_select_db(DB_NAME, $con);
				$query = mysql_query("INSERT INTO contact_us (date, name, email, contact_no, message, priority, ip)
									  VALUE('$date', '$name', '$email', '$contact_no', '$message', '$priority', '$ip')");
				if(!$query) {
					echo "Error: ".mysql_error();
			        echo "Unable to send your message. Please send an email manually to ".$admin_email.". Sorry for the in convince.";
				}
				else {
					echo "We have received your message and you will be contacted soon. Thank you.";
					$email_alert=mysql_query("SELECT * FROM admins WHERE priority=1");
			        while($row=mysql_fetch_array($email_alert))
                    {
					$mail_to=$row['email'];
					$subject='You have a new message from the XSP site visitor ';
					$body_message='From: '.$name."\n";
					$body_message .= 'E-mail: '.$email."\n";
                    $body_message .= 'Contact Number: '.$contact_no."\n";
	                $body_message .= 'Message: '.$message."\n";
	                $body_message .= 'IP: '.$ip."\n";
	                $body_message .= 'Login to XSP admin panal to take further actions: ';
	                $body_message .= 'http://www.thexsp.com/admin';
                    $headers .= "From: \"\"<".$email.">\n";
                    $headers .= "Reply-To: \"\"<".$email.">\n";
	                $mail_status = mail($mail_to, $subject, $body_message, $headers);
					}
				}
				mysql_close($con);


?>