<?php

	function whoLendItem($itemId){
		$con = mysql_connect("localhost","root","root");
		mysql_set_charset("utf8", $con);
		mysql_select_db("armory", $con);
		
		$usernameQuery = mysql_query("SELECT members.username 
								FROM members 
								JOIN lends ON members.m_id = lends.member_id 
								JOIN items ON lends.item_id = items.i_id 
								WHERE items.i_id = " . $itemId, $con);
		$loanedBy = mysql_fetch_array($usernameQuery);
		//mysql_close($con);
		return $loanedBy['username'];
	}
	
	function accountActive($bool){
		$answer;
		if($bool == 1) $answer = "Da";
		else  $answer = "Ne";
		return $answer;
	}
	
	function getUserData($id){
		$con = mysql_connect("localhost","root","root");
		mysql_set_charset("utf8", $con);
		mysql_select_db("armory", $con);
		
		$userQuery = mysql_query("SELECT * FROM members WHERE m_id = " . $id, $con);
		$userData = mysql_fetch_array($userQuery);
		mysql_close($con);
		return $userData;
	}	
?>