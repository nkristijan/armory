<?php

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (!isset($username) || !isset($password)) {
		header( "Location: ../index.php" );}
	
	else if (empty($username) || empty($password)) {
		header( "Location: ../index.php" );}
		
	else{
		include 'db_con.php';
		
		$idQuery = mysql_query("SELECT m_id FROM members WHERE username = '$username' AND password = '$password'", $con);
		$loginResult = mysql_num_rows($idQuery); 
		$id = mysql_fetch_array($idQuery);
		
		if($loginResult > 0){
			session_start();
			
			$_SESSION['logon'] = true;
			$_SESSION['userId'] = $id[0];
			$accountQuery = mysql_fetch_array(mysql_query("SELECT account_admin FROM members WHERE username = '$username' AND password = '$password'", $con));
			
			if ($accountQuery[0] == 1) {
				$_SESSION['user'] = 1;
				header("Location: ../admin_lends.php");
			}
			else{
				$_SESSION['user'] = 0;
				header("Location: ../user_lends.php");
			}
			
		}
		else die(header("Location: ../error_pages/wrong.html"));	
	}
	
?>