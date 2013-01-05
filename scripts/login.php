<?php
	echo "<meta charset=\"UTF-8\" />";
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (!isset($username) || !isset($password)) {
		header( "Location: ../index.php" );}
	
	else if (empty($username) || empty($password)) {
		header( "Location: ../index.php" );}
		
	else{
		include 'db_con.php';
		
		$idQuery = mysql_query("SELECT m_id, account_admin FROM members WHERE username = '$username' AND password = '$password'", $con);
		$loginResult = mysql_num_rows($idQuery); 
		$id = mysql_fetch_array($idQuery);
		
		if($loginResult > 0){
			session_start();
			
			$_SESSION['logon'] = true;
			$_SESSION['userId'] = $id[0];
			$_SESSION['user'] = $id[1];			
			
			header("Location: ../user_lends.php");
			
		}
		else { 
			echo "<script>window.alert(\"Unjeli ste pogrešno korisničko ime ili zaporku.\")
					window.location = \"../index.php\"</script>";
		}
		
// 		(header("Location: ../error_pages/wrong.html"));	
	}
	
?>