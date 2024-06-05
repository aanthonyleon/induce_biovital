<?php 
	function get_decimales($total){
		$whole    = intval($total);
		$decimal1 = ($total) - $whole;
		$decimal2 = round($decimal1, 2);
		$decimals = substr($decimal2, 2);
		if ($decimals == 0) { $decimals = "00"; }
		if ($decimals == 1) { $decimals = "10"; }
		if ($decimals == 2) { $decimals = "20"; }
		if ($decimals == 3) { $decimals = "30"; }
		if ($decimals == 4) { $decimals = "40"; }
		if ($decimals == 5) { $decimals = "50"; }
		if ($decimals == 6) { $decimals = "60"; }
		if ($decimals == 7) { $decimals = "70"; }
		if ($decimals == 8) { $decimals = "80"; }
		if ($decimals == 9) { $decimals = "90"; }

		echo $decimals;
	}
?>