<?php 
// $db_username = 'biovital';
// $db_password = 'biovital123';
// $db_name     = 'biovital';
// $db_host     = 'localhost';

$db_username = 'root';
$db_password = '';
$db_name     = 'induce_biovital';
$db_host     = 'localhost';

	$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
	if ($mysqli->connect_error) {
	     die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	$mysqli->set_charset("utf8");
?>