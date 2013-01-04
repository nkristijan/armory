<?php

	$itemsList = $_POST['items-id-list'];
	$lendsList = $_POST['lends-id-list'];
	$returnQuant = $_POST['quantity-list'];
	
	include 'db_con.php';
	$today = date("Y-m-d H:i:s");
	
	
	for($i=0; $i<count($lendsList); $i++){
		
		$lends = mysql_fetch_array(mysql_query("SELECT quantity FROM lends WHERE l_id= " . $lendsList[$i], $con));
		$items = mysql_fetch_array(mysql_query("SELECT quantity, available FROM items WHERE i_id= " . $itemsList[$i], $con));
		
			
		
		if($returnQuant[$i] > 0 && $returnQuant[$i] < $lends['quantity']) {
			mysql_query("UPDATE items SET available = '$items[available]' + '$returnQuant[$i]' WHERE i_id = '$itemsList[$i]'", $con);
			mysql_query("UPDATE lends SET quantity = quantity - '$returnQuant[$i]' WHERE l_id = '$lendsList[$i]'", $con);
		}
		
		else if($returnQuant[$i] >= $lends['quantity']) {
			mysql_query("UPDATE items SET available = '$items[available]' + '$lends[quantity]' WHERE i_id = '$itemsList[$i]'", $con);
			mysql_query("UPDATE lends SET active = 0, return_date = '$today' WHERE l_id = " . $lendsList[$i], $con);
		}
		
		
	}
	
	echo "<script>window.location = \"../lends.php\"</script>";
	
?>