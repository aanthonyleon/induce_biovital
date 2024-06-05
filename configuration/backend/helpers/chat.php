<?php 
	function respuesta_chat($mensaje){
		// $mensaje = eliminar_acentos($mensaje);

		// $array1 = array("información");
		// $array2 = array("proyecto","prollectó");

		// if (in_array($mensaje, $array1)) {
		// 	$respuesta = "¿Qué información necesitas?";
		// }else if (in_array($mensaje, $array2)) {
		// 	$respuesta = "Puedes comunicarte al teléfono +52 443 390 7993 o enviar un correo a ventas@induce.mx";
		// }else{
		// 	$respuesta = "¿Cómo puedo ayudarte?";
		// }

		// return $respuesta;

		$array1 = array("información","informacion");
		$array2 = array("proyecto","prollectó");
		$array3 = array("información a");

		if(str_replace($array1, '', strtolower($mensaje)) !== strtolower($mensaje)) {
			$respuesta = "¿Qué información necesitas?";
		}else if(str_replace($array2, '', strtolower($mensaje)) !== strtolower($mensaje)) {
			$respuesta = "Puedes comunicarte al teléfono +52 443 390 7993 o enviar un correo a ventas@induce.mx";
		}else if(str_replace($array3, '', strtolower($mensaje)) !== strtolower($mensaje)) {
			$respuesta = '<p>Te damos las siguientes opciones:</p>
						  <div class="d-grid gap-2 d-md-block">
							<button class="btn btn-success" type="button">Contactar por WhatsApp</button>
							<button class="btn btn-danger" type="button">Enviar correo electrónico</button>
						  </div>';
		}else {
			$respuesta = "¿Cómo puedo ayudarte?";
		}

		return $respuesta;
	}

	function eliminar_acentos($cadena){
		
		//Reemplazamos la A y a
		$cadena = str_replace(
		array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
		array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
		$cadena
		);

		//Reemplazamos la E y e
		$cadena = str_replace(
		array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
		array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
		$cadena );

		//Reemplazamos la I y i
		$cadena = str_replace(
		array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
		array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
		$cadena );

		//Reemplazamos la O y o
		$cadena = str_replace(
		array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
		array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
		$cadena );

		//Reemplazamos la U y u
		$cadena = str_replace(
		array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
		array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
		$cadena );

		//Reemplazamos la N, n, C y c
		$cadena = str_replace(
		array('Ñ', 'ñ', 'Ç', 'ç'),
		array('N', 'n', 'C', 'c'),
		$cadena
		);
		
		return $cadena;
	}
?>