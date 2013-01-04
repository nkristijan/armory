<?php
	
	$itemId = $_POST["id"];
	$quantList = $_POST["quantity-list"];
	$username = $_POST["select-user"];
	
	include "db_con.php";
	
	$today = date("Y-m-d H:i:s");
	
	$memberQuery =mysql_fetch_array(mysql_query("SELECT m_id FROM members WHERE username = '$username'", $con));
	$id = $memberQuery[0];
	
	
	for($i=0; $i<count($itemId); $i++){
		
		$seasonType = mysql_fetch_array(mysql_query("SELECT season FROM items WHERE i_id = '$itemId[$i]'", $con));
		if($seasonType[0]=='zima') $returnBy = date("Y-m-d H:i:s", strtotime('+14 day'));
		else $returnBy = date("Y-m-d H:i:s", strtotime('+1 month'));
		
		$itemsAvailable = mysql_fetch_array(mysql_query("SELECT available FROM items WHERE i_id = '$itemId[$i]'", $con));
		
		
		if($quantList[$i] >= $itemsAvailable[0]) {
			mysql_query("UPDATE items SET available = 0 WHERE i_id = " . $itemId[$i]);
			mysql_query("INSERT INTO lends (lend_date, member_id, item_id, quantity, return_by, active)
				VALUES ('$today', '$id', '$itemId[$i]', '$itemsAvailable[0]', '$returnBy', 1)");
		}
			
			
		else if ($quantList[$i] > 0 && $quantList[$i] < $itemsAvailable[0]) {
			mysql_query("UPDATE items SET available = available - " . $quantList[$i] . " WHERE i_id = " . $itemId[$i]);
			mysql_query("INSERT INTO lends (lend_date, member_id, item_id, quantity, return_by, active)
				VALUES ('$today', '$id', '$itemId[$i]', '$quantList[$i]', '$returnBy',  1)");
		}
		
		
	}
	
	echo "<script>window.location = \"../items.php\"</script>";
		
?>