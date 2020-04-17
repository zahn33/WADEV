 <?php
session_start();
error_reporting(0);

require "testsmtp/class.phpmailer.php";
include 'testsmtp/PHPMailerAutoload.php';

//include 'PHPMailerAutoload.php';
function sendMail($toemail,$message,$subject)
{
$hostwebsite=$_SERVER['HTTP_HOST'];
$fromName=$hostwebsite;
//mail($toemail, $subject, $message, $headers);
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "localhost";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port =25;
$mail->IsHTML=false;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "mailadmin@alertizen.com";
//Password to use for SMTP authentication
$mail->Password = "6JVqY@gR";
//Set who the message is to be sent from

//$mail->setFrom('leads@wellesbowen.com', $fromName);

 $mail->FromName = "Alertizen Alert";
 $mail->From = '911@alertizen.com';

//Set an alternative reply-to address

//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to

//$mail->addAddress($toemail, $toemail);

$mail->addAddress('jzahn@gutconsulting.com');
//$mail->addCC('4195143173@messaging.sprintpcs.com', 'Dave');
//$mail->addBCC('toledo@accesstoledo.com', 'Dave');

//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message);
//Replace the plain text body with one created manually

//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file

//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

}

$wellesEmail="jzahn@gutconsulting.com";
$emailMsg="Test message using tpdalert mail server";
$subject="Test with new alertizen SMTP email!";

$status=sendMail($wellesEmail,$emailMsg,$subject);
?>
