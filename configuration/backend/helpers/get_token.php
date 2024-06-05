<?php 
	// include("./private/conexion.php");

	$fecha_actual = date('Y-m-d');

	$rget_token = $mysqli->query("SELECT * FROM whatsapp_token");
	if ($rget_token)
	{
		while($array = $rget_token->fetch_object())
		{
			$token_token         = $array->token;
			$token_actualizacion = $array->actualizacion;
		}
	}
?>