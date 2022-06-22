<?php

// require '../assets/vendor/PHPMailer/src/Exception.php';
// require '../assets/vendor/PHPMailer/src/PHPMailer.php';
// require '../assets/vendor/PHPmailer/src/SMTP.php';


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';




//Create an instance; passing `true` enables exceptions

$mail = new PHPMailer(true);
try {

  //Server settings
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.mail.yahoo.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'tchamistephane@yahoo.fr';                     //SMTP username
  $mail->Password   = 'facejtnaqfxbbmwq';                               //SMTP password
  $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom($_POST['email'], 'Mailer');
  $mail->addAddress('tchamistephane@hotmail.com', 'TCHAMI');               //Name is optional
  $mail->addReplyTo('tchamistephane@yahoo.fr', 'Information');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');

  //Attachments
  // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  // $mail->addAttachment('/tmp//*image.jpg', 'new.jpg');    //Optional name

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Here is the subject';
  $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {

  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
