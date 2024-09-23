<?php
require_once "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer;
//Enable SMTP debugging.
$mail->SMTPDebug = 3;                           
//Set PHPMailer to use SMTP.
$mail->isSMTP();        
//Set SMTP host name                      
$mail->Host = "mail.infowebsoftware.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                      
//Provide username and password
$mail->Username = "test@infowebsoftware.com";             
$mail->Password = "Test@11#22";                       
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                       
//Set TCP port to connect to
$mail->Port = 587;                    
$mail->From = "test@infowebsoftware.com";
$mail->FromName = "Kailash chandra";
$mail->addAddress("info@infowebsoftware.com", "kailash chandra");
$mail->isHTML(true);
$mail->Subject = "testing ";
$mail->Body = "testing";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
echo "Message has been sent successfully";
}