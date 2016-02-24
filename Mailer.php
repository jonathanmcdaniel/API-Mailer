<?php
require './PHPMailer/PHPMailerAutoload.php';
require 'MailerConfig.php';

/**
* Class to simplify and unify sending emails
*/
class Mailer
{

  function __construct()
  {
  }

  /**
  * Function to send an email
  * @param  String $subject         Subject Line of the email
  * @param  String $body            Plain text email body
  * @param  String $htmlBody      HTML formatted version of email body
  * @param  String $toAddress    Email address of recipient
  * @param  String $fromName    Name to display for the sender
  * @return boolean                      True/False of whether email sent successfully
  */
  function sendMail($subject, $body, $htmlBody, $toAddress, $fromName){
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = MailerConfig::MAIL_SERVER;
    $mail->SMTPAuth = MailerConfig::MAIL_SERVER_SMTP_AUTH;
    $mail->Username = MailerConfig::SENDING_ACCOUNT_EMAIL_ADDRESS;
    $mail->Password = MailerConfig::SENDING_ACCOUNT_PASSWORD;
    $mail->SMTPSecure = MailerConfig::MAIL_SERVER_SECURITY_TYPE;
    $mail->Port = MailerConfig::MAIL_SERVER_PORT;

    $mail->setFrom(MailerConfig::SENDING_ACCOUNT_EMAIL_ADDRESS, $fromName);
    $mail->addAddress($toAddress);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $htmlBody;
    $mail->AltBody = $body;

    if(!$mail->send()) {
      return false;
    } else {
      return true;
    }
  }

}

?>
