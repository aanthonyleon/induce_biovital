<?php
include("modelo.php");
if (!isset($_POST['work'])) 
{
    print false;
    exit;
}

$work = $_POST['work']; 
switch($work)
{
    case 'mail_cotizacion':
        mail_cotizacion();
        break;

    case 'mail_recibo':
        mail_recibo();
        break;
    
    case 'mail_orden':
        mail_orden();
        break;

    case 'whatsapp_recibo':
        whatsapp_recibo();
        break;

    case 'enviar_correo':
        enviar_correo();
        break;

    default:

        print false;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Twilio\Rest\Client;

function mail_cotizacion(){
    
    $pdf          = $_POST['pdf'];
    $user_mail    = $_POST['mail'];
    $data_mensaje = $_POST['mensaje'];
    $asunto       = $_POST['asunto'];

    $url = 'https://induce.mx/sistema/docs/pdf/saves/cotizaciones/' . $pdf;

    // include("../mail/_formato-cotizacion.php");
    include("../mail/_formato-pagina-cotizacion.php");

    require '../mail/src/PHPMailer.php';
    require '../mail/src/Exception.php';
    require '../mail/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.ionos.mx';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ventas@induce.mx';                     //SMTP username
        $mail->Password   = '&$hi?FK!rK%D';                               //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;
        $mail->SMTPSecure = "ssl";

        $mail->From = "ventas@induce.mx";
        $mail->FromName = "Induce Marketing";
        $mail->AddReplyTo('ventas@induce.mx','Induce Marketing');

        $mail->setFrom('ventas@induce.mx', 'Induce Marketing');
        $mail->addAddress($user_mail);               //Name is optional
        $mail->addReplyTo('ventas@induce.mx', 'Soporte');

//         $mail->AddEmbeddedImage('imagen.png', 'logo_2u');

        //Recipients
        // $mail->From = 'info@induce.mx';

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $message;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->Send()) {
           echo 'Mail not sent, error: ' . $mail->ErrorInfo;
        } else {
           echo 'Message has been sent correctly.';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // $filename  = $pdf;
 //    $path      = '../docs/pdf/saves/cotizaciones/';
    // $file      = $path.$filename;

    // $mailto  = $mail;
 //    $subject = $asunto;

    // $content   = file_get_contents($file);
    // $content   = chunk_split(base64_encode($content));
    // $uid       = md5(uniqid(time()));
    // $file_name = basename($file);

    // // header
    // $header = "From: INDUCE<willyanthonye@gmail.com>\r\n";
    // $header .= "Reply-To: $mail\r\n";
    // $header .= "MIME-Version: 1.0\r\n";
    // $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

    // // message & attachment
    // $nmessage = "--".$uid."\r\n";
    // $nmessage .= "Content-type:text/html; charset=iso-8859-1\r\n";
    // $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    // $nmessage .= $message."\r\n\r\n";
    // $nmessage .= "--".$uid."\r\n";
    // $nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
    // $nmessage .= "Content-Transfer-Encoding: base64\r\n";
    // $nmessage .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n\r\n";
    // $nmessage .= $content."\r\n\r\n";
    // $nmessage .= "--".$uid."--";

    // if (mail($mailto, $subject, $nmessage, $header)) {
    //     echo "sent";
    // } else {
    //   echo "Error al enviar el correo.";
    // }
}

function mail_recibo(){

    // include("../../../configuration/backend/private/conexion.php");

    $pdf          = $_POST['pdf'];
    $user_mail    = $_POST['mail'];
    $data_mensaje = $_POST['mensaje'];
    $asunto       = $_POST['asunto'];
    $plantilla_id = $_POST['plantilla_id'];

    if (!empty($_POST['id_prospecto'])) {
        $id_prospecto = $_POST['id_prospecto'];
    }else{
        $id_prospecto = 0;
    }

    // if ($plantilla_id!=undefined || $plantilla_id!=null) {
    //     $rget_plantilla = $mysqli->query("SELECT * FROM plantillas_correo WHERE id=$plantilla_id");
    //     if ($rget_plantilla)
    //     {
    //         while($array = $rget_plantilla->fetch_object())
    //         {
    //             $titulo    = $array->titulo;
    //             $data_mensaje = $array->plantilla;
    //         }
    //     }
    // }else{
    //     $plantilla = $data_mensaje;
    // }

    $url = 'https://induce.mx/sistema/docs/pdf/saves/recibos_pago/' . $pdf;
    $url_factura = 'https://induce.mx/facturacion/' . $id_prospecto . '/Usuario';

    // include("../../../configuration/backend/mail/_formato-cotizacion.php");
    include("../../../configuration/backend/mail/test.php");

    require '../../../configuration/backend/mail/src/PHPMailer.php';
    require '../../../configuration/backend/mail/src/Exception.php';
    require '../../../configuration/backend/mail/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.ionos.mx';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ventas@induce.mx';                     //SMTP username
        $mail->Password   = '&$hi?FK!rK%D';                               //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;
        $mail->SMTPSecure = "ssl";

        $mail->From = "ventas@induce.mx";
        $mail->FromName = "Induce Marketing";
        $mail->AddReplyTo('ventas@induce.mx','Induce Marketing');

        $mail->setFrom('ventas@induce.mx', 'Induce Marketing');
        $mail->addAddress($user_mail);               //Name is optional
        $mail->addReplyTo('ventas@induce.mx', 'Soporte');

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $message;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );

        if(!$mail->Send()) {
           echo 'Mail not sent, error: ' . $mail->ErrorInfo;
        } else {
           echo 'Message has been sent correctly.';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function mail_orden(){
    
    $pdf          = $_POST['pdf'];
    $user_mail    = $_POST['mail'];
    $data_mensaje = $_POST['mensaje'];
    $asunto       = $_POST['asunto'];

    $url = 'https://induce.mx/sistema/docs/pdf/saves/ordenes_compra/' . $pdf;

    include("../mail/_formato-cotizacion.php");

    require '../mail/src/PHPMailer.php';
    require '../mail/src/Exception.php';
    require '../mail/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.ionos.mx';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ventas@induce.mx';                     //SMTP username
        $mail->Password   = '&$hi?FK!rK%D';                              //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;
        $mail->SMTPSecure = "ssl";

        $mail->From = "ventas@induce.mx";
        $mail->FromName = "Induce Marketing";
        $mail->AddReplyTo('ventas@induce.mx','Induce Marketing');

        $mail->setFrom('ventas@induce.mx', 'Induce Marketing');
        $mail->addAddress($user_mail);               //Name is optional
        $mail->addReplyTo('ventas@induce.mx', 'Soporte');

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $message;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );

        if(!$mail->Send()) {
           echo 'Mail not sent, error: ' . $mail->ErrorInfo;
        } else {
           echo 'Message has been sent correctly.';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// function whatsapp_recibo(){
    
//     require_once 'whatsapp/vendor/autoload.php';
//     $whatsapp_send_recibo_id           = $_POST['whatsapp_send_recibo_id'];
//     $whatsapp_send_recibo_pdf          = $_POST['whatsapp_send_recibo_pdf'];
//     $whatsapp_send_recibo_id_prospecto = $_POST['whatsapp_send_recibo_id_prospecto'];
//     $whatsapp_asunto_correo_recibo     = $_POST['whatsapp_asunto_correo_recibo'];
//     $whatsapp_send_recibo_mensaje      = $_POST['whatsapp_send_recibo_mensaje'];
//     $whatsapp_send_recibo_telefono     = $_POST['whatsapp_send_recibo_telefono'];

//     $sid    = "AC727158cd92498cd45fe2a7b10373f76b"; 
//     $token  = "ac5f7375de80acab3bcbe698d5393ac5"; 
//     $twilio = new Client($sid, $token);

//     $url = 'Puedes descargarlo en este link: https://induce.mx/sistema/docs/pdf/saves/recibos_pago/' . $whatsapp_send_recibo_pdf;

//     $message = $twilio->messages ->create("whatsapp:+521" . $whatsapp_send_recibo_telefono, // to 
//         array( 
//             "from" => "whatsapp:+14155238886",
//             "body" => $whatsapp_send_recibo_mensaje . $url
//         )
//     );

//     print($message);
// }

function whatsapp_recibo(){
    
    $whatsapp_send_recibo_id           = $_POST['whatsapp_send_recibo_id'];
    $whatsapp_send_recibo_pdf          = $_POST['whatsapp_send_recibo_pdf'];
    $whatsapp_send_recibo_id_prospecto = $_POST['whatsapp_send_recibo_id_prospecto'];
    $whatsapp_asunto_correo_recibo     = $_POST['whatsapp_asunto_correo_recibo'];
    $whatsapp_send_recibo_mensaje      = $_POST['whatsapp_send_recibo_mensaje'];
    $whatsapp_send_recibo_telefono     = $_POST['whatsapp_send_recibo_telefono'];

    $url = '\n\nPuedes descargarlo en este link: https://induce.mx/sistema/docs/pdf/saves/recibos_pago/' . $whatsapp_send_recibo_pdf;

    $access_token = 'EAAvzZAjW2lcQBABZB3EiNkRnXjVkX4IUFUUxhbdAY8MudSroUX43QOZBtLJSbuui7Fk1GUIN2Rm0TvS4g7UCeYsssoSr2nMNNZBciE2KUEDqOp0ZBBzOzaQKf292CUnjAGBP5pmCSBovgehCCCbyKmAkBbt4zxRrSIrwTYhshP6H9PH2d4vdsPGGRA4ncjiw9sREUMyqlMAZDZD';
	
	$tipo_1 ='
		{
		    "messaging_product": "whatsapp",
            "to": "'.$whatsapp_send_recibo_telefono.'",
		    "type": "template",
		    "template": {
		        "name": "induce_home",
		        "language": {
		            "code": "es_MX"
		        }
		    }
		}';

	$tipo_2 = '
        {
          "messaging_product": "whatsapp",
          "recipient_type": "individual",
          "to": "'.$whatsapp_send_recibo_telefono.'",
          "type": "text",
          "text": {
            "preview_url": false,
            "body": "'.$whatsapp_send_recibo_mensaje . $url.'"
          }
        }';
	
	$rta_message = $tipo_2;
	

      /* $rta_message = '
        {
          "messaging_product": "whatsapp",
          "recipient_type": "individual",
          "to": "'.$whatsapp_send_recibo_telefono.'",
          "type": "text",
          "text": {
            "preview_url": false,
            "body": "'.$whatsapp_send_recibo_mensaje . $url.'"
          }
        }'; */

      $url="https://graph.facebook.com/v16.0/109965602060685/messages";
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
      $st = curl_exec($ch);
      $result = json_decode($st,TRUE);
      // print json_encode($result);
      echo "sent";
}

function enviar_correo(){
    
    $para        = $_POST['para'];
    $cc          = $_POST['cc'];
    $bcc         = $_POST['bcc'];
    $titulo      = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $data_mensaje = $descripcion;
    
    include("../mail/_formato-pagina.php");

    require '../mail/src/PHPMailer.php';
    require '../mail/src/Exception.php';
    require '../mail/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.ionos.mx';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ventas@induce.mx';                     //SMTP username
        $mail->Password   = '&$hi?FK!rK%D';                               //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;
        $mail->SMTPSecure = "ssl";

        $mail->From = "ventas@induce.mx";
        $mail->FromName = "Induce Marketing";
        $mail->AddReplyTo('ventas@induce.mx','Induce Marketing');

        $mail->setFrom('ventas@induce.mx', 'Induce Marketing');
        $mail->addAddress($para);               //Name is optional
        $mail->addReplyTo('ventas@induce.mx', 'Soporte');

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $titulo;
        $mail->Body    = $message;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );

        if(!$mail->Send()) {
           echo 'Mail not sent, error: ' . $mail->ErrorInfo;
        } else {
           echo 'Message has been sent correctly.';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}