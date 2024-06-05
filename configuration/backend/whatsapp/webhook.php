<?php 
  include("../private/conexion.php");

  $my_verify_token = 'induce_marketing';
  $challenge       = $_GET['hub_challenge'];
  $verify_token    = $_GET['hub_verify_token'];

  if($my_verify_token === $verify_token){
    echo $challenge;
    exit;
  }

  $access_token = '';
  $response = file_get_contents("php://input");
  file_put_contents("respuestas/respuesta_" . uniqid() . ".txt" ,$response);
  $response1 = $response;

  $response = json_decode($response,true);
  $from     = $response['entry'][0]['changes'][0]['value']['messages'][0]['from'];
  $text     = $response['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'];
  $name     = $response['entry'][0]['changes'][0]['value']['contacts'][0]['profile']['name'];

  $rcheck = $mysqli->query("SELECT * FROM `whatsapp_contactos` WHERE contacto='$from'");
  if (mysqli_num_rows($rcheck)>0) {
    # code...
  }else{
    $radd_contact = $mysqli->query("INSERT INTO `whatsapp_contactos`(`id`, `contacto`, `nombre`, `date_register`) VALUES (NULL,'$from','$name',NOW())");
  }

  $radd_message = $mysqli->query("INSERT INTO `whatsapp_mensaje`(`id`, `response`, `contact`, `text`, `name`, `date_register`) VALUES (NULL,'$response1','$from','$text','$name',NOW())");

  $rta_message = '
    {
      "messaging_product": "whatsapp",
      "recipient_type": "individual",
      "to": "524434183099",
      "type": "text",
      "text": {
        "preview_url": false,
        "body": "Hola amigo"
      }
    }';

  // send_reply($rta_message);

  function send_reply($rta_message){
    $url="https://graph.facebook.com/v16.0/112830705034574/messages";
    $ch = curl_init();
    
    $headers = array(
       "Content-Type: application/json",
       "Authorization: Bearer $access_token"
    );

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $rta_message);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $st=curl_exec($ch);
    $result = json_decode($st,TRUE);
    file_put_contents("resultados/resultado.txt" , json_encode($result));
    return $result;
  }

?>