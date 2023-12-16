<?php

include('constants.php');

//Load Composer's autoloader
require __DIR__.'/phpmailer/vendor/autoload.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["to_email"])) {
    if (isset($_POST["promotion_link"])) {
      $subject = isset($_POST['subject']) ? $_POST['subject'] : "Promotion Link";

      $email_body = $_POST["promotion_link"];      

      //Create an instance; passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'info@astrologydivine.com';                     //SMTP username
        $mail->Password   = 'DdwvVlZChMLeSkm4%';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('info@astrologydivine.com', 'Mailer');
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
