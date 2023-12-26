<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '.\src\Exception.php'; // path to file
require '.\src\PHPMailer.php'; // path to file
require '.\src\SMTP.php'; // path to file

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
				
$to = 'ilincaosipov21@gmail.com';

$mail = new PHPMailer;
$mail->isSMTP();

// $mail->SMTPDebug = 1;

$mail->Host = 'ssl://smtp.gmail.com';

$mail->SMTPAuth = true;
$mail->Username = 'wi*****@gmail.com'; // mail user account for sending emails
$mail->Password = 'fjtdy*****tdmdkm'; // application password required to auth
$mail->SMTPSecure = 'SSL';
$mail->Port = '465';

$mail->CharSet = 'UTF-8';
$mail->From = 'wi*****@gmail.com';  // from mail
$mail->FromName = 'App Form'; // from name
$mail->addAddress($to, 'App informer');

$mail->isHTML(true);

$mail->Subject = 'New Form Submission - ' . date("d/m/y") . " " . time();
$mail->Body = "User Name: {$_POST['name']}<br> User Email: {$_POST['email']}<br> Subject: {$_POST['subject']}<br> User Message: " . nl2br($_POST['message']);
$mail->AltBody = "User Name: {$_POST['name']}\r\n User Email: {$_POST['email']}\r\n Subject: {$_POST['subject']}\r\n User Message: {$_POST['message']}";

if ($mail->send()) {
	$answer = '1';
	header("Location: contact.html"); // redirect to contact page
} else {
	$answer = '0';
	header("Location: blog.html"); // redirect back to blog
}
die($answer);

?>
