<?php
	session_start();
	if(!$_SESSION['logon']) {
		header("Location: error_pages/access_denied.html");
		die();
	}	
?>