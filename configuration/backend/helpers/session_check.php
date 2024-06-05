<?php 
	if(isset($_COOKIE['BIOVITAL_USER']) && isset($_COOKIE['BIOVITAL_ID']) && isset($_COOKIE['BIOVITAL_NAME']) && isset($_COOKIE['BIOVITAL_ACCESS'])) {
		$BIOVITAL_USER   = $_COOKIE['BIOVITAL_USER'];
		$BIOVITAL_ID     = $_COOKIE['BIOVITAL_ID'];
		$BIOVITAL_NAME   = $_COOKIE['BIOVITAL_NAME'];
		$BIOVITAL_ACCESS = $_COOKIE['BIOVITAL_ACCESS'];
	}else{
		header("Location: ../index.php");
	}
?>