<?php

	$itemsList = $_POST['items-id-list'];
	$lendsList = $_POST['lends-id-list'];
	$returnQuant = $_POST['quantity-list'];
	
	include 'db_con.php';
	$today = date("Y-m-d H:i:s");
	
	
	for($i=0; $i<count($lendsList); $i++){
		
		$lends = mysqli_fetch_array(mysqli_query($mysqli, "SELECT quantity FROM lends WHERE l_id= " . $lendsList[$i]));
		$items = mysqli_fetch_array(mysqli_query($mysqli, "SELECT quantity, available FROM items WHERE i_id= " . $itemsList[$i]));
		
			
		
		if($returnQuant[$i] > 0 && $returnQuant[$i] < $lends['quantity']) {
			mysqli_query($mysqli, "UPDATE items SET available = '$items[available]' + '$returnQuant[$i]' WHERE i_id = '$itemsList[$i]'");
			mysqli_query($mysqli, "UPDATE lends SET quantity = quantity - '$returnQuant[$i]' WHERE l_id = '$lendsList[$i]'");
		}
		
		else if($returnQuant[$i] >= $lends['quantity']) {
			mysqli_query($mysqli, "UPDATE items SET available = '$items[available]' + '$lends[quantity]' WHERE i_id = '$itemsList[$i]'");
			mysqli_query($mysqli, "UPDATE lends SET active = 0, return_date = '$today' WHERE l_id = " . $lendsList[$i]);
		}
		
		
	}
	
	echo "<script>window.location = \"../lends.php\"</script>";
	
?>