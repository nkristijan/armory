<?php

	$con = mysql_connect("localhost","root","root");
	if (!$con) die('Could not connect: ' . mysql_error());
	mysql_set_charset("utf8", $con);
	mysql_select_db("armory", $con);
	date_default_timezone_set('Europe/Zagreb');
	
?>