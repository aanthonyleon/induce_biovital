<?php 
	$tipo_1 ='
		{
		    "messaging_product": "whatsapp",
		    "to": "'.$whatsapp_id.'",
		    "type": "template",
		    "template": {
		        "name": "hello_world",
		        "language": {
		            "code": "en_US"
		        }
		    }
		}';

	$tipo_2 = '
        {
          "messaging_product": "whatsapp",
          "recipient_type": "individual",
          "to": "'.$whatsapp_id.'",
          "type": "text",
          "text": {
            "preview_url": false,
            "body": "'.$mensaje_contestacion.'"
          }
        }';
        
?>