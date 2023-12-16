<?php

require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "smtp.hostinger.com";

$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->Username = "info@astrologydivine.com";
$mail->Password = "DdwvVlZChMLeSkm4%";

$mail->From = "info@astrologydivine.com";
$mail->FromName = "Test Mail from Support";
$mail->AddAddress("pankajku94@gmail.com");
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);

$mail->Subject = "Test message from server";
$mail->Body = "<b><centre>Test email via SMTP script!</centre></b>";
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if (!$mail->Send()) {
  echo "Message could not be sent. <p>";
  echo "Mailer Error: " . $mail->ErrorInfo;
  exit;
}

echo "Message has been sent";
