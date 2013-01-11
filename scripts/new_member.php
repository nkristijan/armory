<?php
	
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$phonenumber = $_POST["phonenum"];
	$password = rand(100000, 999999);

	include "db_con.php";
	
	$today = date("Y-m-d H:i:s");

	$query = "INSERT INTO members (first_name, last_name, username, password, email, phone_number, date_created, account_active)
	VALUES ('$firstname', '$lastname', '$username', '$password', '$email', '$phonenumber', '$today', '1')";

	mysqli_query($mysqli, $query);

	echo "<script>window.location = \"../members.php\"</script>";
	mysql_close($con);
	
?>