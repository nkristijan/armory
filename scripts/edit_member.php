<?php
	
	$id = $_POST["id"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$phonenumber = $_POST["phonenum"];
	
	$con = mysql_connect("localhost","root","root");
	if (!$con){
	  die('Could not connect: ' . mysql_error());
	}
	mysql_set_charset("utf8", $con);
	mysql_select_db("armory", $con);
	
	$checkQuery = mysql_query("SELECT username FROM members WHERE username = '$username' AND m_id != '$id'", $con);
	if(mysql_num_rows($checkQuery)>0){ 
	echo "<script>
			window.alert(\"Vec postoji korisnik sa takvim usernameom!\")
			window.history.back()</script>";
	die();
	}
		
	$query = "UPDATE members 
	SET first_name='$firstname', last_name='$lastname', username='$username', email='$email', phone_number='$phonenumber'
	WHERE m_id = " . $id;

	if (!mysql_query($query,$con))
	  {
	  die('Error: ' . mysql_error());
	  }

	echo "<script>window.location = \"../members.php\"</script>";
	mysql_close($con);
	
?>