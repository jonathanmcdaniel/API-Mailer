<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require 'Mailer.php';
$requestMethod =  $_SERVER['REQUEST_METHOD'];

//-----------------------------------------------------------------------------------------------------------
//
// Handle the POST Request
//
//-----------------------------------------------------------------------------------------------------------
if ($requestMethod === "POST")
{
  // Receive Data From POST Body
  $data = json_decode(file_get_contents('php://input'), true);

  if (!isset($data["subject"])) {
    echo "'subject' must be provided in the post body.";
    http_response_code(500);
    return;
  }
  if (!isset($data["body"])) {
    echo "'body' must be provided in the post body.";
    http_response_code(500);
    return;
  }
  if (!isset($data["htmlBody"])) {
    echo "'htmlBody' must be provided in the post body.";
    http_response_code(500);
    return;
  }
  if (!isset($data["toAddress"])) {
    echo "'toAddress' must be provided in the post body.";
    http_response_code(500);
    return;
  }
  if (!isset($data["fromName"])) {
    echo "'fromName' must be provided in the post body.";
    http_response_code(500);
    return;
  }
  $subject = $data['subject'];
  $body = $data['body'];
  $htmlBody = $data['htmlBody'];
  $toAddress = $data['toAddress'];
  $fromName = $data['fromName'];

  $mailer = new Mailer();

  $sendSuccess = $mailer->sendMail($subject, $body, $htmlBody, $toAddress, $fromName);

  if ($sendSuccess === true){
    http_response_code(200);
  } else {
    echo "An error occured while sending the message";
    http_response_code(500);
  }
}



//-----------------------------------------------------------------------------------------------------------
//
// Handle OPTIONS Request for CORS Issue
//
//-----------------------------------------------------------------------------------------------------------
elseif ($requestMethod === "OPTIONS") {
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: Content-Type');
  header("Access-Control-Allow-Methods: POST, OPTIONS");
}



//-----------------------------------------------------------------------------------------------------------
//
// Handle All Other Requests
//
//-----------------------------------------------------------------------------------------------------------
else {
  http_response_code(405);
}

 ?>
