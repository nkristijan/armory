<?php
	
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$phonenumber = $_POST["phonenum"];
	$password = rand(100000, 999999);

	date_default_timezone_set('Europe/Zagreb');
	$datecreated = date("Y-m-d H:i:s");
	
	$con = mysql_connect("localhost","root","root");
	if (!$con){
	  die('Could not connect: ' . mysql_error());
	}
	mysql_set_charset("utf8", $con);
	mysql_select_db("armory", $con);

	$query = "INSERT INTO members (first_name, last_name, username, password, email, phone_number, date_created, account_active)
	VALUES ('$firstname', '$lastname', '$username', '$password', '$email', '$phonenumber', '$datecreated', '1')";

	if (!mysql_query($query,$con))
	  {
	  die('Error: ' . mysql_error());
	  }

	echo "<script>window.location = \"../members.php\"</script>";
	mysql_close($con);
	
?>