<?php 
	session_start();
	session_destroy();
	unset($_COOKIE['BIOVITAL_USER']); 
	setcookie('BIOVITAL_USER', null, -1, '/');
	setcookie("BIOVITAL_USER", "", time()-3600);

	unset($_COOKIE['BIOVITAL_ID']); 
	setcookie('BIOVITAL_ID', null, -1, '/');
	setcookie("BIOVITAL_ID", "", time()-3600);

	unset($_COOKIE['BIOVITAL_NAME']); 
	setcookie('BIOVITAL_NAME', null, -1, '/');
	setcookie("BIOVITAL_NAME", "", time()-3600);

	unset($_COOKIE['BIOVITAL_ACCESS']); 
	setcookie('BIOVITAL_ACCESS', null, -1, '/');
	setcookie("BIOVITAL_ACCESS", "", time()-3600);
	
	header("Location: ../../../sistema/index.php");
?>