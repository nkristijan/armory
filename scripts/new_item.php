<?php
	
	$type = $_POST["type"];
	$brand = $_POST["brand"];
	$model = $_POST["model"];
	$color = $_POST["color"];
	$season = $_POST["season"];
	$quantity = $_POST["quantity"];
	$description = $_POST["description"];
	
	include "db_con.php";
	
	$query = "INSERT INTO items(type, brand, model, color, season, quantity, available, description) 
	VALUES('$type', '$brand', '$model', '$color', '$season', '$quantity', '$quantity', '$description')";
	
	mysqli_query($mysqli, $query);

	echo "<script>window.location = \"../items.php\"</script>";
	
?>