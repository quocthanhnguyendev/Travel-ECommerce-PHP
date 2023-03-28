<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Mailer
{
  function __construct()
  {
  }

  function SendMail($title, $content, $emailAddress)
  {
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
      $mail->isSMTP(); //Send using SMTP
      $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
      $mail->SMTPAuth = true; //Enable SMTP authentication
      $mail->Username = 'toilaquocthanhday@gmail.com'; //SMTP username
      $mail->Password = 'tuxwywoexmkybuug'; //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
      $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('toilaquocthanhday@gmail.com', 'ITC Travel');
      $mail->addAddress($emailAddress); //Add a recipient
      // $mail->addAddress('ellen@example.com'); //Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      // //Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

      //Content
      $mail->isHTML(true); //Set email format to HTML
      $mail->Subject = $title;
      $mail->Body = $content;
      // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo '<script> alert("Đã gửi thông tin xác nhận qua email, hãy kiểm tra !") </script>';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}
?>