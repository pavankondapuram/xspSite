<?php
require_once('config.php');
database_connect($DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD);

$date=date("y/m/d");
$name=$_POST['name'];
$email=$_POST['email'];
$contact_no=$_POST['contact_no'];
$message=$_POST['message'];
$priority=$_POST['priority'];
$ip=$_SERVER['REMOTE_ADDR'];

				$query = mysql_query("INSERT INTO contact_us (date, name, email, contact_no, message, priority, ip)
									  VALUE('$date', '$name', '$email', '$contact_no', '$message', '$priority', '$ip')");
				if(!$query) {
					echo "Error: ".mysql_error();
			        echo "Unable to send your message. Please send an email manually to ".$reply_email.". Sorry for the in convince.";
				}
				else {
					echo "We have received your message, Thank you.";
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
	                $body_message .= 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
                    $headers .= "From: \"\"<".$email.">\n";
                    $headers .= "Reply-To: \"\"<".$email.">\n";
	                $mail_status = mail($mail_to, $subject, $body_message, $headers);
					}
				}
database_disconnect($con='');


?>