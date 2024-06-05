<?php 
	function dates($string){
		$menor = "";
		$mayor = "";
		require_once("../../configuration/backend/helpers/multi.php");
		require_once("../../configuration/backend/helpers/formats-date.php");

		$list = multiexplode(array(","),$string);

		foreach($list as $key=>$value) {
			if (empty($menor)) {
				$menor = $value;
			}

			if (empty($mayor)) {
				$mayor = $value;
			}

			if ($value<$menor) {
				$menor = $value;
			}

			if ($value>$mayor) {
				$mayor = $value;
			}
			// echo "<br>" . $value;
		}

		echo "Del " . fecha($menor) . " al " . fecha($mayor);
	}

	// echo dates("2022-01-11,2022-01-01,2022-01-05,2022-01-13,2022-01-10,2021-12-23,2022-01-12");
?>