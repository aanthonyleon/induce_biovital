<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid    = "";
$token  = "";
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("+", // to
                           ["body" => "Hi there", "from" => "+16089274581"]
                  );

print($message->sid);