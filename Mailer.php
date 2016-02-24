<?php
require './PHPMailer/PHPMailerAutoload.php';

/**
*
*/
class Mailer
{

  function __construct()
  {
  }

  function sendMail($subject, $body, $htmlBody, $toAddress){
    $mail = new PHPMailer;

    //$mail->SMTPDebug = 2;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'user@domain.com';                 // SMTP username
    $mail->Password = 'password';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('user@domain.com', 'User');
    $mail->addAddress($toAddress);               // Name is optional

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body = $htmlBody;
    $mail->AltBody = $body;

    if(!$mail->send()) {
      return 0;
    } else {
      return 1;
    }
  }

}

?>
