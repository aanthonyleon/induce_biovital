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

	function dateDiffInDays($date1, $date2) {
	    $diff = strtotime($date2) - strtotime($date1);
	  	return abs(round($diff / 86400));
	 }

	 function days_left($fecha_vencimiento){
		$today     = new DateTime('now');
		$date1     = new DateTime($fecha_vencimiento);
		$diff      = $today->diff($date1)->format("%r%a");
		$left_days = $diff;
		return $left_days;
	}

	function formatearFecha($fecha) {
	    $datetime = new DateTime($fecha);
	    
	    $dias_semana = array("Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb");
	    $meses = array("ene", "feb", "mar", "abr", "may", "jun", "jul", "ago", "sep", "oct", "nov", "dic");
	    
	    $dia_semana = $dias_semana[$datetime->format('w')];
	    $mes = $meses[$datetime->format('n') - 1];
	    
	    $hora = $datetime->format('g:i a');
	    $hora = str_replace(array('am', 'pm'), array('am', 'pm'), $hora);

	    $fecha_formateada = $dia_semana . ' ' . $datetime->format('d') . ' de ' . $mes . ' <br> ' . $hora;
	    return $fecha_formateada;
	}

?>