<?php 

	function createRandomID() {
		$chars = "00ef4809gh3232303aboxlkmvfkdzplspkokflsxkknxadcd345c2knckshi598905c093284c0idokohefkj46ijk765674387l789";

		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
		
		while ($i <= 7) {
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}
		
		return $pass;
	}

	function generateRandomStringdos($length = 10) { 
		return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
	}


?>