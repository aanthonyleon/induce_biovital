<?php 

	setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
	date_default_timezone_set('UTC');
	date_default_timezone_set("America/Mexico_City");
	
	function fecha($fecha) {
	  $fecha     = substr($fecha, 0, 10);
	  $numeroDia = date('d', strtotime($fecha));
	  $dia       = date('l', strtotime($fecha));
	  $mes       = date('F', strtotime($fecha));
	  $anio      = date('Y', strtotime($fecha));
	  $dias_ES   = array("Lunes", "Martes", "Mi&eacute;rcoles", "Jueves", "Viernes", "S&aacute;bado", "Domingo");
	  $dias_EN   = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
	  $meses_ES  = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	  $meses_EN  = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
	  return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
	}

	function hora_doce($hora){
		return date("g:i a",strtotime($hora));
	}

	function get_age($date){
		$from = new DateTime($date);
		$to   = new DateTime('today');
		return date_diff(date_create($date), date_create('today'))->y;
	}

	function dateDiffInDays($date1, $date2) 
	{
	    $diff = strtotime($date2) - strtotime($date1);
	    return abs(round($diff / 86400));
	}

?>