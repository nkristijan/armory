<?php
	
	$itemId = $_POST["id"];
	$quantList = $_POST["quantity-list"];
	$username = $_POST["select-user"];
	
	include "db_con.php";
	
	$today = date("Y-m-d H:i:s");
	
	$memberQuery =mysqli_fetch_array(mysqli_query($mysqli, "SELECT m_id FROM members WHERE username = '$username'"));
	$id = $memberQuery[0];
	
	
	for($i=0; $i<count($itemId); $i++){
		
		$seasonType = mysqli_fetch_array(mysqli_query($mysqli, "SELECT season FROM items WHERE i_id = '$itemId[$i]'"));
		if($seasonType[0]=='zima') $returnBy = date("Y-m-d H:i:s", strtotime('+14 day'));
		else $returnBy = date("Y-m-d H:i:s", strtotime('+1 month'));
		
		$itemsAvailable = mysqli_fetch_array(mysqli_query($mysqli, "SELECT available FROM items WHERE i_id = '$itemId[$i]'"));
		
		
		if($quantList[$i] >= $itemsAvailable[0]) {
			mysqli_query($mysqli, "UPDATE items SET available = 0 WHERE i_id = " . $itemId[$i]);
			mysqli_query($mysqli, "INSERT INTO lends (lend_date, member_id, item_id, quantity, return_by, active)
				VALUES ('$today', '$id', '$itemId[$i]', '$itemsAvailable[0]', '$returnBy', 1)");
		}
			
			
		else if ($quantList[$i] > 0 && $quantList[$i] < $itemsAvailable[0]) {
			mysqli_query($mysqli, "UPDATE items SET available = available - " . $quantList[$i] . " WHERE i_id = " . $itemId[$i]);
			mysqli_query($mysqli, "INSERT INTO lends (lend_date, member_id, item_id, quantity, return_by, active)
				VALUES ('$today', '$id', '$itemId[$i]', '$quantList[$i]', '$returnBy',  1)");
		}
		
		
	}
	
	echo "<script>window.location = \"../items.php\"</script>";
		
?>