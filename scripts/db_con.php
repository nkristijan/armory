<?php
	
	$mysqli = new mysqli('localhost', 'root', 'root', 'armory');
	
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	
	$mysqli->set_charset("utf8");
	
	date_default_timezone_set('Europe/Zagreb');
	
?>