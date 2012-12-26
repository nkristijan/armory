<?php
	session_start();
	if(!$_SESSION['logon'] || $_SESSION['user'] != 0) {
		header("Location: error_pages/access_denied.html");
		die();
	}	
?>