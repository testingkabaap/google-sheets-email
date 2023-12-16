<?php

include('constants.php');

$emailTemplate = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head><meta content="text/html; charset=utf-8" http-equiv="Content-Type"/><meta content="width=device-width" name="viewport"/><meta content="IE=edge" http-equiv="X-UA-Compatible"/>
	<title></title>
</head>
<body style="padding: 0;margin:0;">
<div style="background-color: #f5f5f5;padding: 20px;">
<h1 style="text-align: center;"><span style="color:#e74c3c;"><tt><strong>' . BRAND_NAME . '</strong></tt></span></h1>

<div style="max-width: 600px;margin-left: auto;margin-right: auto;background-color: #ffffff;min-height: 100px;box-shadow: 0 0 5px #fe7c04;border-radius: 5px;padding: 10px;">
<h2 style="text-align: center;"><font face="Arial, Helvetica, sans-serif">PROMOTION LINK</font></h2>

<p style="text-align: center;"><font face="Arial, Helvetica, sans-serif">some text paragraph</font></p>

<p style="text-align: center;"><a href="{link}" style="background-color:#fe7c04;font-weight:bold;display:block;width:fit-content;margin-left:auto;margin-right:auto;padding:10px 20px;color:#ffffff;text-decoration:none;border-radius:5px;"><span style="font-family:Arial,Helvetica,sans-serif;">Click to Proceed</span></a></p>

<p style="text-align: center;"><span style="font-family:Arial,Helvetica,sans-serif;"><span style="font-size:12px;">if above button is not working copy below link and paste in to your browser<br />
<font color="#3498db">{link}</font></span></span></p>
</div>

<div style="max-width: 600px;margin-left: auto;margin-right: auto;text-align: center;">
<h3><span style="font-family:Comic Sans MS,cursive;">Stay In Touch</span></h3>

<ul style="margin: 0;padding: 0;">
  ' . (!empty(FACEBOOK_LINK) ? '<li style="display: inline-block;margin: 5px;"><a href="' . FACEBOOK_LINK . '"><img alt="Facebook" src="https://1.bp.blogspot.com/-AX8vg7IdS2g/X1ClPNqWe6I/AAAAAAAAdTM/ai2kKzC95Vg9uXi5HvQCka44dR56q3NvgCPcBGAYYCw/s100/facebook.png" style="width: 40px; height: 40px;" /></a></li>' : '') . '
  ' . (!empty(INSTAGRAM_LINK) ? '<li style="display: inline-block;margin: 5px;"><a href="' . INSTAGRAM_LINK . '"><img alt="instagram" src="https://1.bp.blogspot.com/-YlYus9orhB4/X1ClO88_bgI/AAAAAAAAdTY/2T5Wq-vAIDIYCkn0g1blmD65phSUm9zwACPcBGAYYCw/s0/instagram.png" style="width: 40px; height: 40px;" /></a></li>' : '') . '
	' . (!empty(WHATSAPP_LINK) ? '<li style="display: inline-block;margin: 5px;"><a href="' . WHATSAPP_LINK . '"><img alt="whatsapp" src="https://1.bp.blogspot.com/-RTpm0E7wurU/X1ClO5lsh3I/AAAAAAAAdTg/t7CSH5KmOEckFQi2gDJaI4r1VBRB11lMwCPcBGAYYCw/s0/whatsapp.png" style="width: 40px; height: 40px;" /></a></li>' : '') . '
</ul>

<p style="margin-bottom: 0;"><span style="font-family:Georgia,serif;">Email Sent by ' . BRAND_NAME . '</span></p>
</div>
</div>
</body>
</html>';

//Load Composer's autoloader
require __DIR__ . '/phpmailer/vendor/autoload.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["to_email"])) {
    if (isset($_POST["promotion_link"])) {
      $subject = isset($_POST['subject']) ? $_POST['subject'] : "Promotion Link";

      // $email_body = $_POST["promotion_link"];
      $email_body = str_replace("{link}", $_POST['promotion_link'], $emailTemplate);

      //Create an instance; passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = SMTP_HOST;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = SMTP_USERNAME;                     //SMTP username
        $mail->Password   = SMTP_PASSWORD;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = SMTP_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom(FROM_EMAIL, BRAND_NAME);
        // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress($_POST["to_email"]);               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $email_body;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Message has been sent';
        $RES = ["status" => true, "status_code" => 200, "message" => "Email Sent Successfully"];
      } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $RES = ["status" => false, "status_code" => 400, "message" => "Email could not be sent", "error" => $mail->ErrorInfo];
      }
    } else $RES = ["status" => false, "status_code" => 400, "message" => "Promotion Link Required"];
  } else $RES = ["status" => false, "status_code" => 400, "message" => "To Email Required"];
} else $RES = ["status" => false, "status_code" => 400, "message" => "Invalid Request"];
echo json_encode($RES);
die;
