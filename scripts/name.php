<?php
	include 'db_con.php';
	
	$nameQuery = mysql_query("SELECT first_name, last_name FROM members WHERE m_id = $_SESSION[userId]", $con);
	$name = mysql_fetch_array($nameQuery);
	
	echo $name['first_name'] . " " . $name['last_name'] .
	"&nbsp&nbsp|&nbsp&nbsp<a href=\"scripts/logout.php\">Odjava</a>";
?>