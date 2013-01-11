<?php
	
	function accountActive($bool){
		$answer;
		if($bool == 1) $answer = "Da";
		else  $answer = "Ne";
		return $answer;
	}
	
	function getUserData($id){
		include 'db_con.php';
		
		$userQuery = mysqli_query($mysqli, "SELECT * FROM members WHERE m_id = " . $id);
		$userData = mysqli_fetch_array($userQuery);
		return $userData;
	}	
	
	function names(){
		include 'db_con.php';
		
		$nameQuery = mysqli_query($mysqli, "SELECT first_name, last_name FROM members WHERE m_id = $_SESSION[userId]");
		$name = mysqli_fetch_array($nameQuery);
		
		echo $name['first_name'] . " " . $name['last_name'] .
		"&nbsp&nbsp|&nbsp&nbsp<a href=\"scripts/logout.php\">Odjava</a>";
	}
?>